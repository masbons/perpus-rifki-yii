<?php

require 'vendor/autoload.php';

$title = 'Consumers Report';
$model = new Review();

$objPHPExcel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
$sheet=0;

$objPHPExcel->setActiveSheetIndex($sheet);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->setTitle($title);

$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 1, $model->getAttributeLabel('judul_buku'));
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 1, $model->getAttributeLabel('mobile'));
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 1, $model->getAttributeLabel('email'));
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, 1, $model->getAttributeLabel('email_verified'));
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, 1, $model->getAttributeLabel('status'));
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, 1, $model->getAttributeLabel('previously_ordered'));
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, 1, $model->getAttributeLabel('created_at'));

foreach ($data->getModels() as $dk => $dv){
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $dk+2, $dv->name);
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $dk+2, $dv->mobile);
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $dk+2, $dv->email);
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $dk+2, $dv->email_verified?"Yes":"No");
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $dk+2, Consumer::$statuses[$dv->status]);
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $dk+2, $dv->getPreviouslyOrdered()?"Yes":"No");
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $dk+2, date(Yii::$app->params['dateFormat'].' '.Yii::$app->params['timeFormat'], $dv->created_at));
}

header('Content-Type: application/vnd.ms-excel');
$filename = $title.".xls";
header('Content-Disposition: attachment;filename='.$filename .' ');
header('Cache-Control: max-age=0');
$objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPExcel, 'Xls');
$objWriter->save('php://output');
die();
Read from an excel file:
$file = 'uploads/abc.xls';
$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file);
$objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($file);
		
$transaction = Yii::$app->db->beginTransaction();
try{
	$num=$objPHPExcel->getSheetCount();//get number of sheets
	$sheetnames=$objPHPExcel->getSheetNames();//get sheet names
	for($i = 0 ; $i < $num ; $i++){
		$sheet = $objPHPExcel->getSheet($i);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();
						 
		//$row is start 2 because first row assigned for heading.         
		for($row=2; $row<=$highestRow; ++$row){
			$rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
			$emptyRow = true;
			foreach($rowData as $k => $v){
				if($v){
					$emptyRow = false;
				}
			}
			if($emptyRow){
				break;//this can be changed to continute to allow blank row in the excelsheet, otherwise loop will be terminated if blank row is found.
			}
						
			//save to branch table.
			$model = new Product;
			$model->name = $rowData[0][0];
			$model->description = $rowData[0][1];
			$model->price = $rowData[0][2];
			$model->weight = $rowData[0][3];
			$model->save();
		}
	}
	$transaction->commit();
}catch(Exception $e){
	$transaction->rollBack();
}
unlink($file);
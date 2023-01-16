<?php

use app\models\Penulis;
use app\models\Penerbit;
use app\models\Book;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\mpdf\Pdf;
/** @var yii\web\View $this */
/** @var app\models\PenulisSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Penerbit';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penerbit-index">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-outline">
              <div class="card-header">
                <h2 class="card-title">Daftar Penerbit</h2>
              </div>
              <div class="card-body">

    <p>
     <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
     <?= Html::a('<i class="fa fa-print"></i> Export Excel Buku', Yii::$app->request->url.'&export=1', ['class' => 'btn btn-warning btn-flat']) ?>
           <!-- <?= Html::a('<i class="fa fa-print"></i> Export Excel Daftar Buku', ['/export/index'], ['class' => 'btn btn-success btn-flat']) ?> -->
    <?= Html::a('<i class="fa fa-print"></i> Export Pdf Daftar Buku', ['report'], ['class' => 'btn btn-danger btn-flat']) ?> 
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'header' => 'Nama Penerbit',
                'attribute' => 'nama',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Alamat',
                'attribute' => 'alamat',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Telepon',
                'attribute' => 'telepon',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'header' => 'Email',
                'attribute' => 'email',
                'headerOptions' => ['class'=>'text-center'],
            ],
            [
                'class' =>'yii\grid\DataColumn',
                'attribute' => 'Jumlah Buku',
                'value' =>'PenerbitCount',
            ],
            
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Penerbit $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

   </div>
    <?php Pjax::end(); ?>

</div>
</div>
</div>
</div>
</section>
</div>
<?php

use app\models\Book;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use kartik\mpdf\Pdf;
use kartik\export\ExportMenu;
/** @var yii\web\View $this */
/** @var app\models\BookSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index box box-primary">



   <div class="box-header">




   </div>
</div>

<div class="book-index">


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-outline">
              <div class="card-header">
                <h2 class="card-title">Daftar Buku</h2>
            </div>
            <div class="card-body">
                <p>
                    <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('<i class="fa fa-print"></i>Export Excel Data Buku', ['ExportMenu'], ['class' => 'btn btn-warning', 'target' => '_blank']) ?>
                    <!-- coba pake beda controller -->
                      <?= Html::a('<i class="fa fa-print"></i>Export PDF Data Buku', ['report'], ['class' => 'btn btn-danger', 'target' => '_blank']) ?>
                </p>

                <?php Pjax::begin(); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'nama',
                        'tahun_terbit',
                        'penulis.penulis',
                        'penerbit.nama',
                        'kategori.kategori',
                        'sinopsis:ntext',
                        'image',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Book $model, $key, $index, $column) {
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

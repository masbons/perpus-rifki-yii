<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Penerbit;
use app\models\Kategori;
use app\models\Penulis;

/** @var yii\web\View $this */
/** @var app\models\Book $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="book-form">

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Buku</h3>
            </div>
            <div class="card-body">
              <?php $form = ActiveForm::begin(); ?>

              <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'tahun_terbit')->textInput() ?>

              <?= $form->field($model, 'id_penulis')->textInput(['maxlength' => true]) ?>


              <?= $form->field($model, 'id_kategori')->textInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'sinopsis')->textarea(['rows' => 6]) ?>

              <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>


              <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
              </div>
            </div>
            <?php ActiveForm::end(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

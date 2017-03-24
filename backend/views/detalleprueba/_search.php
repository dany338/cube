<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DetallepruebaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalleprueba-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idPrueba') ?>

    <?= $form->field($model, 'idOperation') ?>

    <?= $form->field($model, 'cordX1') ?>

    <?= $form->field($model, 'cordY1') ?>

    <?php // echo $form->field($model, 'cordZ1') ?>

    <?php // echo $form->field($model, 'cordX2') ?>

    <?php // echo $form->field($model, 'cordY2') ?>

    <?php // echo $form->field($model, 'cordZ2') ?>

    <?php // echo $form->field($model, 'vlrW') ?>

    <?php // echo $form->field($model, 'resultado') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('yii', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

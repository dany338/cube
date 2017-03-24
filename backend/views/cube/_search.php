<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CubeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cube-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idProfile') ?>

    <?= $form->field($model, 'cordX') ?>

    <?= $form->field($model, 'cordY') ?>

    <?= $form->field($model, 'cordZ') ?>

    <?php // echo $form->field($model, 'vlrW') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('yii', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cube */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cube-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idProfile')->textInput() ?>

    <?= $form->field($model, 'cordX')->textInput() ?>

    <?= $form->field($model, 'cordY')->textInput() ?>

    <?= $form->field($model, 'cordZ')->textInput() ?>

    <?= $form->field($model, 'vlrW')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

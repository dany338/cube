<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Prueba */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prueba-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCaso')->textInput() ?>

    <?= $form->field($model, 'tamanio')->textInput() ?>

    <?= $form->field($model, 'nroOperaciones')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

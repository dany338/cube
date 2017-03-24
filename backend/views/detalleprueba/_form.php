<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Detalleprueba */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalleprueba-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPrueba')->textInput() ?>

    <?= $form->field($model, 'idOperation')->textInput() ?>

    <?= $form->field($model, 'cordX1')->textInput() ?>

    <?= $form->field($model, 'cordY1')->textInput() ?>

    <?= $form->field($model, 'cordZ1')->textInput() ?>

    <?= $form->field($model, 'cordX2')->textInput() ?>

    <?= $form->field($model, 'cordY2')->textInput() ?>

    <?= $form->field($model, 'cordZ2')->textInput() ?>

    <?= $form->field($model, 'vlrW')->textInput() ?>

    <?= $form->field($model, 'resultado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\select2\Select2;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model backend\models\Caso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caso-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="panel panel-default">
            <div class="panel-heading"># de casos (T)</div>
            <div class="panel-body">
                <?= $form->field($model, 'nroCasos')->textInput(['maxlength' => 2]) ?>
            </div>
    </div>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.container-items',
        'widgetItem' => '.prueba-item',
        'limit' => 2,
        'min' => 1,
        'insertButton' => '.add-prueba',
        'deleteButton' => '.remove-prueba',
        'model' => $modelsPrueba[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'tamanio',
            'nroOperaciones',
        ],
    ]); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Prueba</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover container-items">
                <thead>
                    <tr>
                    <th>Pruebas</th>
                    <th>Detalle Pruebas</th>
                    <th class="text-center" style="width: 90px;">
                        <button type="button" class="add-prueba btn btn-success btn-xs"><span class="fa fa-plus"></span></button>
                    </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($modelsPrueba as $indexPrueba => $modelPrueba): ?>  
                    <tr class="prueba-item">
                    <td class="vcenter">
                        <?php
                            // necessary for update action.
                            if (! $modelPrueba->isNewRecord) {
                                echo Html::activeHiddenInput($modelPrueba, "[{$indexPrueba}]id");
                            }
                        ?>
                        <span class="panel-title-prueba">Prueba #: <?= ($indexPrueba + 1) ?></span>
                        <?= $form->field($modelPrueba, "[{$indexPrueba}]tamanio")->label(false)->textInput(['maxlength' => true]) ?>
                        <?= $form->field($modelPrueba, "[{$indexPrueba}]nroOperaciones")->label(false)->textInput(['maxlength' => true]) ?>
                    </td>
                    <td>
                        <?= $this->render('_form-detalle', [
                            'form' => $form,
                            'indexPrueba' => $indexPrueba,
                            'modelsDetalle' => $modelsDetalle[$indexPrueba],
                        ]) ?>
                    </td>
                    <td class="text-center vcenter" style="width: 90px; verti">
                        <button type="button" class="remove-prueba btn btn-danger btn-xs"><span class="fa fa-minus"></span></button>
                    </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Next >>') : Yii::t('yii', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $script = <<< JS

    jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
        jQuery(".dynamicform_wrapper .panel-title-prueba").each(function(index) {
            jQuery(this).html("Prueba #: " + (index + 1))
        });
    });

    jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
        jQuery(".dynamicform_wrapper .panel-title-prueba").each(function(index) {
            jQuery(this).html("Prueba #: " + (index + 1))
        });
    });

JS;
$this->registerJs($script, View::POS_READY, 'my-script');
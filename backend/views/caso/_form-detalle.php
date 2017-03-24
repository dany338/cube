<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\select2\Select2;
use backend\models\Operation;
use yii\web\View;
?>
<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_inner',
    'widgetBody' => '.container-detalles',
    'widgetItem' => '.detalle-item',
    'limit' => 4,
    'min' => 1,
    'insertButton' => '.add-detalle',
    'deleteButton' => '.remove-detalle',
    'model' => $modelsDetalle[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'idOperation',
        'cordX1',
        'cordY1',
        'cordZ1',
        'cordX2',
        'cordY2',
        'cordZ2',
        'vlrW',        
    ],
]); ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Operación</th>
            <th class="text-center">
                <button type="button" class="add-detalle btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
            </th>
        </tr>
    </thead>
    <tbody class="container-detalles">
    <?php foreach ($modelsDetalle as $indexDetalle => $modelDetalle): ?>
        <tr class="detalle-item">
            <td class="vcenter">
                <?php
                    // necessary for update action.
                    if (! $modelDetalle->isNewRecord) {
                        echo Html::activeHiddenInput($modelDetalle, "[{$indexPrueba}][{$indexDetalle}]id");
                    }
                ?>
                <?= $form->field($modelDetalle, 'idOperation')->widget(Select2::classname(), [
                    'data' => Operation::getOperations(),
                    'language' => 'es',
                    'options' => ['placeholder' => 'SELECCIONE UNA OPERACIÓN ...', 'tab-index' => 0],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false); ?>
                <?= $form->field($modelDetalle, "[{$indexPrueba}][{$indexDetalle}]cordX1")->label(false)->textInput(['maxlength' => true, 'placeholder' => 'X1']) ?>
                <?= $form->field($modelDetalle, "[{$indexPrueba}][{$indexDetalle}]cordY1")->label(false)->textInput(['maxlength' => true, 'placeholder' => 'Y1']) ?>
                <?= $form->field($modelDetalle, "[{$indexPrueba}][{$indexDetalle}]cordZ1")->label(false)->textInput(['maxlength' => true, 'placeholder' => 'Z1']) ?>
                <?= $form->field($modelDetalle, "[{$indexPrueba}][{$indexDetalle}]cordX2")->label(false)->textInput(['maxlength' => true, 'placeholder' => 'X2']) ?>
                <?= $form->field($modelDetalle, "[{$indexPrueba}][{$indexDetalle}]cordY2")->label(false)->textInput(['maxlength' => true, 'placeholder' => 'Y2']) ?>
                <?= $form->field($modelDetalle, "[{$indexPrueba}][{$indexDetalle}]cordZ2")->label(false)->textInput(['maxlength' => true, 'placeholder' => 'Z2']) ?>
                <?= $form->field($modelDetalle, "[{$indexPrueba}][{$indexDetalle}]vlrW")->label(false)->textInput(['maxlength' => true, 'placeholder' => 'W']) ?>
            </td>
            <td class="text-center vcenter" style="width: 90px;">
                <button type="button" class="remove-detalle btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
            </td>
        </tr>
     <?php endforeach; ?>
    </tbody>
</table>
<?php DynamicFormWidget::end(); ?>
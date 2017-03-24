<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Caso */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Casos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nroCasos',
        ],
    ]) ?>

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
            <tr>
                <td>
                    <span>(N): <?=$modelPrueba->tamanio ?> </span> <span>(M): <?=$modelPrueba->nroOperaciones ?> </span>
                </td>
                <td>
                    <?php foreach ($modelPrueba->detallepruebas as $indexDetalle => $modelDetalle): ?>
                    Operación: <span><?=$modelDetalle->idOperation0->operation?></span>: <span>x1: <?=$modelDetalle->cordX1?></span> <span>y1: <?=$modelDetalle->cordY1?></span> <span>z1: <?=$modelDetalle->cordZ1?></span> <span>x2: <?=$modelDetalle->cordX2?></span> <span>y2: <?=$modelDetalle->cordY2?></span> <span>z2: <?=$modelDetalle->cordZ2?></span>salida: -->  <span><?=$modelDetalle->resultado?> </span>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

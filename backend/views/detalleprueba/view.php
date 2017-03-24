<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Detalleprueba */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Detallepruebas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleprueba-view">

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
            'idPrueba',
            'idOperation',
            'cordX1',
            'cordY1',
            'cordZ1',
            'cordX2',
            'cordY2',
            'cordZ2',
            'vlrW',
            'resultado',
        ],
    ]) ?>

</div>

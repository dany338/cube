<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Detalleprueba */

$this->title = Yii::t('yii', 'Update {modelClass}: ', [
    'modelClass' => 'Detalleprueba',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Detallepruebas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="detalleprueba-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

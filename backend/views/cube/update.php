<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cube */

$this->title = Yii::t('yii', 'Update {modelClass}: ', [
    'modelClass' => 'Cube',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Cubes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="cube-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

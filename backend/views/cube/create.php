<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cube */

$this->title = Yii::t('yii', 'Create Cube');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Cubes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cube-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

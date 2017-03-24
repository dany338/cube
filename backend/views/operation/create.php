<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Operation */

$this->title = Yii::t('yii', 'Create Operation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Operations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

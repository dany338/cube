<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Detalleprueba */

$this->title = Yii::t('yii', 'Create Detalleprueba');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Detallepruebas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleprueba-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

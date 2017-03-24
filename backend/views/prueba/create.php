<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Prueba */

$this->title = Yii::t('yii', 'Create Prueba');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Pruebas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prueba-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

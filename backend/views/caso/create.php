<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Caso */

$this->title = Yii::t('yii', 'Create Caso');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Casos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'         => $model,
        'modelsPrueba'  => $modelsPrueba,
        'modelsDetalle' => $modelsDetalle,
    ]) ?>

</div>

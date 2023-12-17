<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Organization $model */

$this->title = 'Update Organization: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="organization-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'action' => '/organization/update?id='.$model->id,
        'model' => $model,
		'events' => $events,
		'cheked' => $cheked,
    ]) ?>

</div>

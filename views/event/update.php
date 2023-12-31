<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Events $model */

$this->title = 'Update Events: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="events-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
		'action' => '/event/update?id='.$model->id,
        'model' => $model,
		'organization' => $organization,
		'cheked' => $cheked,
    ]) ?>

</div>

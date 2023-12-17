<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Organization $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="organization-form">

    <form action="<?= $action; ?>" method="post">
	
	<?= Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []) ?>
	
	  <div class="mb-3">
		<label for="fio" class="form-label">ФИО</label>
		<input type="text" class="form-control" id="fio" name="fio" value="<?= $model->fio; ?>">
	  </div>
	  <div class="mb-3">
		<label for="email" class="form-label">E-mail</label>
		<input type="text" class="form-control" id="email" name="email" value="<?= $model->email; ?>">
	  </div>
	  <div class="mb-3">
		<label for="phone" class="form-label">Телефон</label>
		<input type="text" class="form-control" id="phone" name="phone" value="<?= $model->phone; ?>">
	  </div>
	  <div class="mb-3">
	      <label for="events" class="form-label">Мероприятия</label>
		  <select class="form-select" multiple id="events" name="events[]">
			  <?php foreach ($events as $item): ?>
			  <option value="<?php echo $item->id; ?>" <?php if(isset($cheked[$item->id])): ?>selected<?php endif; ?>><?php echo $item->title; ?></option>
			  <?php endforeach; ?>
			</select>
	   </div>
	  <button type="submit" class="btn btn-primary">Сохранить</button>
	</form>

</div>

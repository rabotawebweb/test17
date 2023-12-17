<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Events $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="events-form">

    <form action="<?= $action; ?>" method="post">
	
	<?= Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []) ?>
	
	  <div class="mb-3">
		<label for="title" class="form-label">Название</label>
		<input type="text" class="form-control" id="title" name="title" value="<?= $model->title; ?>">
	  </div>
	  <div class="mb-3">
		<label for="date" class="form-label">Дата</label>
		<input type="datetime-local" class="form-control" id="date" name="date" value="<?= date('Y-m-d H:i', $model->date); ?>">
	  </div>
	  <div class="mb-3">
		  <label for="body" class="form-label">Описание</label>
		  <textarea class="form-control" id="body" rows="3" name="body"><?= $model->body; ?></textarea>
		</div>
	  <div class="mb-3">
	      <label for="organization" class="form-label">Организаторы</label>
		  <select class="form-select" multiple id="organization" name="organization[]">
			  <?php foreach ($organization as $item): ?>
			  <option value="<?php echo $item->id; ?>" <?php if(isset($cheked[$item->id])): ?>selected<?php endif; ?>><?php echo $item->fio; ?></option>
			  <?php endforeach; ?>
			</select>
	   </div>
	  <button type="submit" class="btn btn-primary">Сохранить</button>
	</form>

</div>

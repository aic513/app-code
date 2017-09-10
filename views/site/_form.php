<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fragments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fragments-form">
	
	<? $form = ActiveForm::begin(); ?>
	
	<?=$form->field($model, 'text')->textarea(['rows' => 10, 'cols' => 9, 'placeholder' => 'Write your fragment here'])->label('Fragment text')?>
	
	<?
	$model->private = 1;
	echo $form->field($model, 'private')->radioList([0 => 'Public', 1 => 'Private'])->label('Select type of fragment');
	?>
	
	<div class="form-group">
		<?=Html::submitButton('Create fragment', ['class' => 'btn btn-primary'])?>
	</div>
	
	<? ActiveForm::end(); ?>

</div>
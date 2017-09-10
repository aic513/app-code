<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="fragments-form">
	
	<? $form = ActiveForm::begin(); ?>
	
	<?=$form->field($model, 'text')->textarea(['rows' => 10, 'cols' => 9, 'placeholder' => 'Write your fragment here'])->label('Fragment text')?>
	
	<?=$form->field($model, 'private')->radioList([0 => 'Public', 1 => 'Private'])?>
	
	<div class="form-group">
		<?=Html::submitButton($model->isNewRecord ? 'Create Fragment' : 'Update Fragment', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
	</div>
	
	<? ActiveForm::end(); ?>

</div>
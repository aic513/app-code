<?php
use yii\helpers\Html;
$this->title = 'Update Fragments: ' . $model->_id;
$this->params['breadcrumbs'][] = 'Create';

?>

<div class="fragments-create">

    <h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
	'model' => $model,
]) ?>

</div>
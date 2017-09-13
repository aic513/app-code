<?
use yii\widgets\DetailView;

$this->title = 'Update Fragments: ' . $model->_id;
$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => (string)$model->_id]];

echo DetailView::widget([
	'model' => $model,
	'attributes' => [
		'text',
	],

]);

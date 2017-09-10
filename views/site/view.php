<?
use yii\widgets\DetailView;
use yii\helpers\Html;

$this->title = 'Update Fragments: ' . $model->_id;
$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => (string)$model->_id]];
?>

	<p>
		<?

		if (!Yii::$app->user->isGuest) {
			echo Html::a('Delete', ['/site/delete', 'id' => (string) $model->_id], ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Are you sure, that you want to delete this fragment from your app?', 'method' => 'post',],]);
			echo Html::a('Update', ['/site/update', 'id' => (string) $model->_id], ['class' => 'btn btn-primary col-xs-offset-1']);
		}
		?>

	</p>
<?
echo DetailView::widget([
	'model' => $model,
	'attributes' => [
		'text',
	],

]);

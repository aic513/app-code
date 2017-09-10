<?php

use yii\helpers\Html;

$this->title = 'The system of storing fragments';
?>
<div class="site-index">

	<?=(!Yii::$app->user->isGuest) ? Html::a('Create fragment', ['/site/create'], ['class' => 'btn btn-success']) : ''?>

	<div class="jumbotron">
		<h1><?= Html::encode($this->title) ?></h1>
	</div>

	<div class="body-content">
		<div class="row">
			<ul>
				<?
				foreach ($fragments as $fragment) {
					$date = date("Y-m-d H:i:s", $fragment->create_at);
					$text = \yii\helpers\StringHelper::truncateWords((string) $fragment->text, 10, '...');
					echo "{$date} <li>".Html::a($text, ['/site/view/', 'id' => (string) $fragment->_id])."</li><hr>";
				}
				?>
			</ul>
		</div>

	</div>
</div>

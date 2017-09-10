<?php

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

	<?=(!Yii::$app->user->isGuest) ? Html::a('Create fragment', ['/site/create'], ['class' => 'btn btn-success']) : ''?>

	<div class="jumbotron">
		<h1> The system of storing fragments</h1>
	</div>

	<div class="body-content">
		<div class="row">
			<ul>
				<?
				foreach ($fragments as $fragment) {
					$text = \yii\helpers\StringHelper::truncateWords((string) $fragment->text, 10, '...');
					echo "<li>".Html::a($text, ['/site/view/', 'id' => (string) $fragment->_id])."</li><hr>";
				}
				?>
			</ul>
		</div>

	</div>
</div>

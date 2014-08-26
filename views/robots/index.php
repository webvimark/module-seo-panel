<?php
/**
 * @var $this yii\web\View
 * @var $file string
 */
use yii\helpers\Html;

$this->title = 'Robots.txt';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<strong>
			<i class='fa fa-th'></i> <?= $this->title ?>
		</strong>
	</div>
	<div class="panel-body">

		<?= Html::beginForm() ?>

		<?= Html::textarea('robots', $file, ['rows'=>25, 'class'=>'form-control']) ?>

		<br/>
		<?= Html::submitButton('<i class="fa fa-check"></i> Сохранить', ['class'=>'btn btn-success']) ?>

		<?= Html::endForm() ?>
	</div>
</div>

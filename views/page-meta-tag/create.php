<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\SeoPanel\models\PageMetaTag $model
 */

$this->title = 'Создание мета тега';
$this->params['breadcrumbs'][] = ['label' => 'Мета теги страниц', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-meta-tag-create">

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>
				<span class="glyphicon glyphicon-th"></span> <?= Html::encode($this->title) ?>
			</strong>
		</div>
		<div class="panel-body">

			<?= $this->render('_form', compact('model')) ?>
		</div>
	</div>

</div>

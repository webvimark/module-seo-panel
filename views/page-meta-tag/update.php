<?php

use webvimark\modules\SeoPanel\SeoPanelModule;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\SeoPanel\models\PageMetaTag $model
 */

$this->title = SeoPanelModule::t('app', 'Editing meta tag by url') . ': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => SeoPanelModule::t('app', 'Meta tags by url'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editing')
?>
<div class="page-meta-tag-update">

	<div class="panel panel-default">
		<div class="panel-body">

			<?= $this->render('_form', compact('model')) ?>
		</div>
	</div>

</div>

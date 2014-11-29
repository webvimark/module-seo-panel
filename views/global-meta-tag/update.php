<?php

/**
 * @var yii\web\View $this
 * @var webvimark\modules\SeoPanel\models\GlobalMetaTag $model
 */

use webvimark\modules\SeoPanel\SeoPanelModule;

$this->title = SeoPanelModule::t('app', 'Editing global meta tag') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => SeoPanelModule::t('app', 'Global meta tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editing')
?>
<div class="global-meta-tag-update">

	<div class="panel panel-default">
		<div class="panel-body">

			<?= $this->render('_form', compact('model')) ?>
		</div>
	</div>

</div>

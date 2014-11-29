<?php

use webvimark\modules\SeoPanel\SeoPanelModule;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\SeoPanel\models\GlobalMetaTag $model
 */

$this->title = SeoPanelModule::t('app', 'Creating global meta tag');
$this->params['breadcrumbs'][] = ['label' => SeoPanelModule::t('app', 'Global meta tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="global-meta-tag-create">

	<div class="panel panel-default">
		<div class="panel-body">

			<?= $this->render('_form', compact('model')) ?>
		</div>
	</div>

</div>

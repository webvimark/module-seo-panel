<?php

use webvimark\modules\SeoPanel\SeoPanelModule;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\SeoPanel\models\PageMetaTag $model
 */

$this->title = SeoPanelModule::t('app', 'Creating meta tag by url');
$this->params['breadcrumbs'][] = ['label' => SeoPanelModule::t('app', 'Meta tags by url'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-meta-tag-create">

	<div class="panel panel-default">
		<div class="panel-body">

			<?= $this->render('_form', compact('model')) ?>
		</div>
	</div>

</div>

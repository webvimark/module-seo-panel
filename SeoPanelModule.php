<?php

namespace webvimark\modules\SeoPanel;

use Yii;

class SeoPanelModule extends \yii\base\Module
{
	public $controllerNamespace = 'webvimark\modules\SeoPanel\controllers';


	public function init()
	{
		parent::init();

		$this->registerTranslations();
	}

	public function registerTranslations()
	{
		Yii::$app->i18n->translations['modules/seo-panel/*'] = [
			'class'          => 'yii\i18n\PhpMessageSource',
			'sourceLanguage' => 'en',
			'basePath'       => '@vendor/webvimark/module-seo-panel/messages',
			'fileMap'        => [
				'modules/seo-panel/app' => 'app.php',
			],
		];
	}

	public static function t($category, $message, $params = [], $language = null)
	{
		return Yii::t('modules/seo-panel/' . $category, $message, $params, $language);
	}
}

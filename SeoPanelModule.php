<?php

namespace webvimark\modules\SeoPanel;

use Yii;

class SeoPanelModule extends \yii\base\Module
{
	/**
	 * Helps to check if translations have been registered already
	 *
	 * @var bool
	 */
	protected static $_translationsRegistered = false;

	public $controllerNamespace = 'webvimark\modules\SeoPanel\controllers';

	/**
	 * I18N helper
	 *
	 * @param string      $category
	 * @param string      $message
	 * @param array       $params
	 * @param null|string $language
	 *
	 * @return string
	 */
	public static function t($category, $message, $params = [], $language = null)
	{
		if ( !static::$_translationsRegistered )
		{
			Yii::$app->i18n->translations['modules/seo-panel/*'] = [
				'class'          => 'yii\i18n\PhpMessageSource',
				'sourceLanguage' => 'en',
				'basePath'       => '@vendor/webvimark/module-seo-panel/messages',
				'fileMap'        => [
					'modules/seo-panel/app' => 'app.php',
				],
			];

			static::$_translationsRegistered = true;
		}

		return Yii::t('modules/seo-panel/' . $category, $message, $params, $language);
	}
}

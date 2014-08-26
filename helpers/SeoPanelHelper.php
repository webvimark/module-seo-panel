<?php


namespace webvimark\modules\SeoPanel\helpers;


use webvimark\modules\SeoPanel\models\GlobalMetaTag;
use webvimark\modules\SeoPanel\models\PageMetaTag;
use yii\web\View;
use Yii;

class SeoPanelHelper
{
	/**
	 * For Menu
	 *
	 * @return array
	 */
	public static function menuItems()
	{
		return [
			['label' => '<i class="fa fa-globe"></i> Глобальные мета теги', 'url' => ['/seo-panel/global-meta-tag/index']],
			['label' => '<i class="fa fa-file-audio-o"></i> Мета теги страниц', 'url' => ['/seo-panel/page-meta-tag/index']],
			['label' => '<i class="fa fa-rocket"></i> Robots.txt', 'url' => ['/seo-panel/robots/index']],
		];
	}


	/**
	 *
	 * @param View $view
	 */
	public static function registerMetaTags($view)
	{
		self::registerGlobalMetaTags($view);

		self::registerMetaTagsByUrl($view);
	}

	/**
	 * Register keywords, description and set title for page
	 *
	 * @param View $view
	 */
	protected static function registerMetaTagsByUrl($view)
	{
		$metaTag = PageMetaTag::find()
			->andWhere(['url'=>Yii::$app->request->absoluteUrl])
			->asArray()
			->one();


		if ( $metaTag['title'] )
		{
			$view->title = $metaTag['title'];
		}

		if ( $metaTag['keywords'] )
		{
			$view->registerMetaTag([
				'name'=>'keywords',
				'content'=>$metaTag['keywords'],
			], 'keywords');
		}

		if ( $metaTag['description'] )
		{
			$view->registerMetaTag([
				'name'=>'description',
				'content'=>$metaTag['description'],
			], 'description');
		}
	}

	/**
	 * Register global meta tags like verifications and so on
	 *
	 * @param View $view
	 */
	protected static function registerGlobalMetaTags($view)
	{
		$globalMetaTags = Yii::$app->cache->get('__globalMetaTags');

		if ( $globalMetaTags === false )
		{
			$globalMetaTags = GlobalMetaTag::find()
				->andWhere(['active'=>1])
				->asArray()
				->all();

			Yii::$app->cache->set('__globalMetaTags', $globalMetaTags, 3600*24);
		}

		foreach ($globalMetaTags as $globalTag)
		{
			$view->registerMetaTag([
				'name'=>$globalTag['name'],
				'content'=>$globalTag['content'],
			], $globalTag['name']);
		}
	}
} 
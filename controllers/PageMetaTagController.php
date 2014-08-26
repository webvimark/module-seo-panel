<?php

namespace webvimark\modules\SeoPanel\controllers;

use Yii;
use webvimark\modules\SeoPanel\models\PageMetaTag;
use webvimark\modules\SeoPanel\models\search\PageMetaTagSearch;
use webvimark\components\AdminDefaultController;
use yii\filters\VerbFilter;

/**
 * PageMetaTagController implements the CRUD actions for PageMetaTag model.
 */
class PageMetaTagController extends AdminDefaultController
{
	/**
	 * @var PageMetaTag
	 */
	public $modelClass = 'webvimark\modules\SeoPanel\models\PageMetaTag';

	/**
	 * @var PageMetaTagSearch
	 */
	public $modelSearchClass = 'webvimark\modules\SeoPanel\models\search\PageMetaTagSearch';

	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
		];
	}
}

<?php

namespace webvimark\modules\SeoPanel\controllers;

use Yii;
use webvimark\modules\SeoPanel\models\GlobalMetaTag;
use webvimark\modules\SeoPanel\models\search\GlobalMetaTagSearch;
use webvimark\components\AdminDefaultController;
use yii\filters\VerbFilter;

/**
 * GlobalMetaTagController implements the CRUD actions for GlobalMetaTag model.
 */
class GlobalMetaTagController extends AdminDefaultController
{
	/**
	 * @var GlobalMetaTag
	 */
	public $modelClass = 'webvimark\modules\SeoPanel\models\GlobalMetaTag';

	/**
	 * @var GlobalMetaTagSearch
	 */
	public $modelSearchClass = 'webvimark\modules\SeoPanel\models\search\GlobalMetaTagSearch';

	/**
	 * @var string
	 */
	public $layout = '//back';
}

<?php

namespace webvimark\modules\SeoPanel\controllers;

use webvimark\components\BaseController;
use Yii;
use yii\base\Exception;

class RobotsController extends BaseController
{
	public $layout = '//back';

	/**
	 * @return string
	 */
	public function actionIndex()
	{
		$this->ensureFileExists();

		if ( isset( $_POST['robots'] ) )
		{
			file_put_contents(Yii::getAlias('@webroot') . '/robots.txt', $_POST['robots']);

			return $this->redirect(['index']);
		}

		$file = file_get_contents(Yii::getAlias('@webroot') . '/robots.txt');

		return $this->render('index', compact('file'));
	}

	/**
	 * Check if robots.txt exists and try to create if it's not
	 *
	 * @throws \yii\base\Exception
	 */
	protected function ensureFileExists()
	{
		if ( ! is_file(Yii::getAlias('@webroot') . '/robots.txt') )
		{
			if ( file_put_contents(Yii::getAlias('@webroot') . '/robots.txt', '') === false )
			{
				throw new Exception('Could not create file robots.txt');
			}
		}
	}
}

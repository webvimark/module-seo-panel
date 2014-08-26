<?php

namespace webvimark\modules\SeoPanel\models;

use Yii;
use webvimark\helpers\LittleBigHelper;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "page_meta_tag".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 */
class PageMetaTag extends \webvimark\components\BaseActiveRecord
{
	/**
	* @inheritdoc
	*/
	public static function tableName()
	{
		return 'page_meta_tag';
	}

	/**
	* @inheritdoc
	*/
	public function behaviors()
	{
		return [
			TimestampBehavior::className(),
		];
	}

	/**
	* @inheritdoc
	*/
	public function rules()
	{
		return [
			[['url'], 'required'],
			[['url'], 'unique'],
			[['url'], 'url'],
			[['created_at', 'updated_at'], 'integer'],
			[['url', 'title', 'keywords', 'description'], 'string', 'max' => 255],
		];
	}

	/**
	* @inheritdoc
	*/
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'url' => 'Ссылка на страницу',
			'title' => 'Title',
			'keywords' => 'Keywords',
			'description' => 'Description',
			'created_at' => 'Создано',
			'updated_at' => 'Обновлено',
		];
	}

	/**
	* Generate url from the name
	*
	* @return bool
	*/
	public function beforeValidate()
	{
		$this->url = $this->url ? $this->url : LittleBigHelper::slug($this->name);

		return parent::beforeValidate();
	}
}

<?php

namespace webvimark\modules\SeoPanel\models;

use webvimark\modules\SeoPanel\SeoPanelModule;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "global_meta_tag".
 *
 * @property integer $id
 * @property integer $active
 * @property string $name
 * @property string $content
 * @property integer $created_at
 * @property integer $updated_at
 */
class GlobalMetaTag extends \webvimark\components\BaseActiveRecord
{
	/**
	* @inheritdoc
	*/
	public static function tableName()
	{
		return 'global_meta_tag';
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
			[['active', 'created_at', 'updated_at'], 'integer'],
			[['name', 'content'], 'required'],
			[['name', 'content'], 'trim'],
			[['name', 'content'], 'string', 'max' => 255]
		];
	}

	/**
	* @inheritdoc
	*/
	public function attributeLabels()
	{
		return [
			'id'         => 'ID',
			'active'     => Yii::t('app', 'Active'),
			'name'       => SeoPanelModule::t('app', 'Meta tag name'),
			'content'    => SeoPanelModule::t('app', 'Meta tag content'),
			'created_at' => Yii::t('app', 'Created'),
			'updated_at' => Yii::t('app', 'Updated'),
		];
	}

	/**
	 * Invalidate cache
	 *
	 * @inheritdoc
	 */
	public function afterSave($insert, $changedAttributes)
	{
		parent::afterSave($insert, $changedAttributes);

		Yii::$app->cache->delete('__globalMetaTags');
	}

	/**
	 * Invalidate cache
	 *
	 * @inheritdoc
	 */
	public function afterDelete()
	{
		parent::afterDelete();

		Yii::$app->cache->delete('__globalMetaTags');
	}
}

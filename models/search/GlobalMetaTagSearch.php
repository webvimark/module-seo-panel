<?php

namespace webvimark\modules\SeoPanel\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use webvimark\modules\SeoPanel\models\GlobalMetaTag;

/**
 * GlobalMetaTagSearch represents the model behind the search form about `webvimark\modules\SeoPanel\models\GlobalMetaTag`.
 */
class GlobalMetaTagSearch extends GlobalMetaTag
{
	public function rules()
	{
		return [
			[['id', 'active', 'created_at', 'updated_at'], 'integer'],
			[['name', 'content'], 'safe'],
		];
	}

	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	public function search($params)
	{
		$query = GlobalMetaTag::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => Yii::$app->request->cookies->getValue('_grid_page_size', 20),
			],
			'sort'=>[
				'defaultOrder'=>['id'=> SORT_DESC],
			],
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
			'global_meta_tag.id' => $this->id,
			'global_meta_tag.active' => $this->active,
			'global_meta_tag.created_at' => $this->created_at,
			'global_meta_tag.updated_at' => $this->updated_at,
		]);

        	$query->andFilterWhere(['like', 'global_meta_tag.name', $this->name])
			->andFilterWhere(['like', 'global_meta_tag.content', $this->content]);

		return $dataProvider;
	}
}

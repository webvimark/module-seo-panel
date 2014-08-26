<?php

namespace webvimark\modules\SeoPanel\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use webvimark\modules\SeoPanel\models\PageMetaTag;

/**
 * PageMetaTagSearch represents the model behind the search form about `webvimark\modules\SeoPanel\models\PageMetaTag`.
 */
class PageMetaTagSearch extends PageMetaTag
{
	public function rules()
	{
		return [
			[['id', 'created_at', 'updated_at'], 'integer'],
			[['url', 'title', 'keywords', 'description'], 'safe'],
		];
	}

	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	public function search($params)
	{
		$query = PageMetaTag::find();

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
			'page_meta_tag.id' => $this->id,
			'page_meta_tag.created_at' => $this->created_at,
			'page_meta_tag.updated_at' => $this->updated_at,
		]);

        	$query->andFilterWhere(['like', 'page_meta_tag.url', $this->url])
			->andFilterWhere(['like', 'page_meta_tag.title', $this->title])
			->andFilterWhere(['like', 'page_meta_tag.keywords', $this->keywords])
			->andFilterWhere(['like', 'page_meta_tag.description', $this->description]);

		return $dataProvider;
	}
}

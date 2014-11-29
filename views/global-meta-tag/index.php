<?php

use webvimark\modules\SeoPanel\SeoPanelModule;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use webvimark\extensions\GridBulkActions\GridBulkActions;
use webvimark\extensions\GridPageSize\GridPageSize;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var webvimark\modules\SeoPanel\models\search\GlobalMetaTagSearch $searchModel
 */

$this->title = SeoPanelModule::t('app', 'Global meta tags');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="global-meta-tag-index">

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<div class="panel panel-default">
		<div class="panel-body">

			<div class="row">
				<div class="col-xs-6">
					<p>
						<?= Html::a('<span class="glyphicon glyphicon-plus-sign"></span> ' . SeoPanelModule::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
					</p>
				</div>

				<div class="col-xs-6 text-right">
					<?= GridPageSize::widget(['pjaxId'=>'global-meta-tag-grid-pjax']) ?>
				</div>
			</div>


			<?php Pjax::begin([
				'id'=>'global-meta-tag-grid-pjax',
			]) ?>

			<?= GridView::widget([
				'id'=>'global-meta-tag-grid',
				'dataProvider' => $dataProvider,
				'pager'=>[
					'options'=>['class'=>'pagination pagination-sm'],
					'hideOnSinglePage'=>true,
					'lastPageLabel'=>'>>',
					'firstPageLabel'=>'<<',
				],

				'layout'=>'{items}<div class="row"><div class="col-sm-8">{pager}</div><div class="col-sm-4 text-right">{summary}'.GridBulkActions::widget(['gridId'=>'global-meta-taggrid']).'</div></div>',

			'filterModel' => $searchModel,
				'columns' => [
					['class' => 'yii\grid\SerialColumn', 'options'=>['style'=>'width:10px'] ],

					[
				'attribute'=>'name',
				'value'=>function($model){
						return Html::a($model->name, ['update', 'id'=>$model->id], ['data-pjax'=>0]);
					},
				'format'=>'raw',
			],
			'content',
			[
				'class'=>'webvimark\components\StatusColumn',
				'attribute'=>'active',
				'toggleUrl'=>Url::to(['toggle-attribute', 'attribute'=>'active', 'id'=>'_id_']),
			],

					['class' => 'yii\grid\CheckboxColumn', 'options'=>['style'=>'width:10px'] ],
					[
						'class' => 'yii\grid\ActionColumn',
						'contentOptions'=>['style'=>'width:70px; text-align:center;'],
					],
				],
			]); ?>
		
			<?php Pjax::end() ?>
		</div>
	</div>
</div>

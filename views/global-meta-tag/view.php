<?php

use webvimark\modules\SeoPanel\SeoPanelModule;
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\SeoPanel\models\GlobalMetaTag $model
 */

$this->title = SeoPanelModule::t('app', 'Details of the global meta tag') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => SeoPanelModule::t('app', 'Global meta tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="global-meta-tag-view">


	<div class="panel panel-default">
		<div class="panel-body">

			<p>
				<?= Html::a(SeoPanelModule::t('app', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
				<?= Html::a(SeoPanelModule::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
				<?= Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], [
					'class' => 'btn btn-sm btn-danger pull-right',
					'data' => [
						'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
						'method' => 'post',
					],
				]) ?>
			</p>

			<?= DetailView::widget([
				'model' => $model,
				'attributes' => [
									'id',
					[
						'attribute'=>'active',
						'value'=>($model->active == 1) ?
								'<span class="label label-success">'.Yii::t('yii', 'Yes').'</span>' :
								'<span class="label label-warning">'.Yii::t('yii', 'No').'</span>',
						'format'=>'raw',
					],
					'name',
					'content',
					'created_at:datetime',
					'updated_at:datetime',
				],
			]) ?>

		</div>
	</div>
</div>

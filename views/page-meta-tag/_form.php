<?php

use webvimark\modules\SeoPanel\SeoPanelModule;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\SeoPanel\models\PageMetaTag $model
 * @var yii\bootstrap\ActiveForm $form
 */
?>
<div class="page-meta-tag-form">

	<?php $form = ActiveForm::begin([
		'id'=>'page-meta-tag-form',
		'layout'=>'horizontal',
		'validateOnBlur'=>false,
	]); ?>

	<?= $form->field($model, 'url')->textInput(['maxlength' => 255]) ?>

	<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

	<?= $form->field($model, 'keywords')->textInput(['maxlength' => 255]) ?>

	<?= $form->field($model, 'description')->textInput(['maxlength' => 255]) ?>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<?php if ( $model->isNewRecord ): ?>
				<?= Html::submitButton(
					'<span class="glyphicon glyphicon-plus-sign"></span> ' . SeoPanelModule::t('app', 'Create'),
					['class' => 'btn btn-success']
				) ?>
			<?php else: ?>
				<?= Html::submitButton(
					'<span class="glyphicon glyphicon-ok"></span> ' . SeoPanelModule::t('app', 'Save'),
					['class' => 'btn btn-primary']
				) ?>
			<?php endif; ?>

			<?= Html::a(SeoPanelModule::t('app', 'Cancel'), ['index'], ['class'=>'btn btn-default']) ?>
		</div>
	</div>

	<?php ActiveForm::end(); ?>

</div>


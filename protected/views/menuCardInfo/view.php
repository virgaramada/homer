<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->menu_card_id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->menu_card_id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'menu_card_id',
'menu_card_name',
'quantity',
array(
			'name' => 'unitCode',
			'type' => 'raw',
			'value' => $model->unitCode !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->unitCode)), array('invMetricUnitInfo/view', 'id' => GxActiveRecord::extractPkValue($model->unitCode, true))) : null,
			),
'price_amount',
array(
			'name' => 'currencyCode',
			'type' => 'raw',
			'value' => $model->currencyCode !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->currencyCode)), array('currency/view', 'id' => GxActiveRecord::extractPkValue($model->currencyCode, true))) : null,
			),
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('barBillingOrders')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->barBillingOrders as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('barBillingOrder/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('menuInfos')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->menuInfos as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('menuInfo/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('restoBillingOrders')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->restoBillingOrders as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('restoBillingOrder/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>
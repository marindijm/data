<?php
/* @var $this WaterpointsController */
/* @var $model Waterpoint */

$this->breadcrumbs=array(
	'Waterpoints'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Waterpoint', 'url'=>array('index')),
	array('label'=>'Create Waterpoint', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('waterpoint-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Waterpoints</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'waterpoint-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'waterpoint_id',
		'waterpoint_name',
		'district_name',
		'division_name',
		'location_name',
		'directions',
		/*
		'promoter',
		'promoter_contact_1',
		'promoter_contact_2',
		'assistant_promoter',
		'assistant_promoter_contact_1',
		'assistant_promoter_contact_2',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

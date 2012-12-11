<?php
/* @var $this WaterpointsController */
/* @var $model Waterpoint */

$this->breadcrumbs=array(
	'Waterpoints'=>array('index'),
	$model->waterpoint_id,
);

$this->menu=array(
	array('label'=>'List Waterpoint', 'url'=>array('index')),
	//array('label'=>'Create Waterpoint', 'url'=>array('create')),
	array('label'=>'Update Waterpoint', 'url'=>array('update', 'id'=>$model->waterpoint_id)),
	//array('label'=>'Delete Waterpoint', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->waterpoint_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Waterpoint', 'url'=>array('admin')),
);
?>

<h1>View Waterpoint #<?php echo $model->waterpoint_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'waterpoint_id',
		'waterpoint_name',
		'district_name',
		'division_name',
		'location_name',
		'directions',
		'promoter',
		'promoter_contact_1',
		'promoter_contact_2',
		'assistant_promoter',
		'assistant_promoter_contact_1',
		'assistant_promoter_contact_2',
	),
)); ?>

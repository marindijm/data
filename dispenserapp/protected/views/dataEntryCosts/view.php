<?php
/* @var $this DataEntryCostsController */
/* @var $model DataEntryCosts */

$this->breadcrumbs=array(
	'Data Entry Costs'=>array('index'),
	$model->cost_rec_id,
);

$this->menu=array(
	array('label'=>'List Costs', 'url'=>array('index')),
	array('label'=>'Create Costs', 'url'=>array('create')),
	array('label'=>'Update Costs', 'url'=>array('update', 'id'=>$model->cost_rec_id)),
	array('label'=>'Delete Costs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cost_rec_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Costs', 'url'=>array('admin')),
);
?>

<h1>View DataEntryCosts #<?php echo $model->cost_rec_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'reg_no',
		'service_date',
		'oil_lubricant_type',
		'oil_lubricant_quantity',
		'oil_lubricant_total_cost',
		'outsource_material',
		'outsource_material_cost',
		'outsource_labour_total_cost',
		'description_of_ourtsource_work_performed',
		'odometer_reading',
		'duration_week',
		'costyear',
		'analysisperiod',
		'cost_rec_id',
	),
)); ?>

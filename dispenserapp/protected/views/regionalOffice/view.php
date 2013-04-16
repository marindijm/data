<?php
/* @var $this RegionalOfficeController */
/* @var $model RegionalOffice */

$this->breadcrumbs=array(
	'Regional Offices'=>array('index'),
	$model->office_id,
);

$this->menu=array(
	array('label'=>'List RegionalOffice', 'url'=>array('index')),
	array('label'=>'Create RegionalOffice', 'url'=>array('create')),
	array('label'=>'Update RegionalOffice', 'url'=>array('update', 'id'=>$model->office_id)),
	array('label'=>'Delete RegionalOffice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->office_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RegionalOffice', 'url'=>array('admin')),
);
?>

<h1>View RegionalOffice #<?php echo $model->office_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'office_id',
		'office_name',
	),
)); ?>

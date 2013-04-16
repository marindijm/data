<?php
/* @var $this RegionalOfficeController */
/* @var $model RegionalOffice */

$this->breadcrumbs=array(
	'Regional Offices'=>array('index'),
	$model->office_id=>array('view','id'=>$model->office_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RegionalOffice', 'url'=>array('index')),
	array('label'=>'Create RegionalOffice', 'url'=>array('create')),
	array('label'=>'View RegionalOffice', 'url'=>array('view', 'id'=>$model->office_id)),
	array('label'=>'Manage RegionalOffice', 'url'=>array('admin')),
);
?>

<h1>Update RegionalOffice <?php echo $model->office_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
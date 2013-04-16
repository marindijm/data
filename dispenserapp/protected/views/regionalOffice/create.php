<?php
/* @var $this RegionalOfficeController */
/* @var $model RegionalOffice */

$this->breadcrumbs=array(
	'Regional Offices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RegionalOffice', 'url'=>array('index')),
	array('label'=>'Manage RegionalOffice', 'url'=>array('admin')),
);
?>

<h1>Create RegionalOffice</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
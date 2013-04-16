<?php
/* @var $this RegionalOfficeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Regional Offices',
);

$this->menu=array(
	array('label'=>'Create RegionalOffice', 'url'=>array('create')),
	array('label'=>'Manage RegionalOffice', 'url'=>array('admin')),
);
?>

<h1>Regional Offices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

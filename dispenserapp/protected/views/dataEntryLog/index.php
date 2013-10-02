<?php
/* @var $this DataEntryLogController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Data Entry Logs',
);
$this->menu=array(
	array('label'=>'Create Logging', 'url'=>array('create')),
	array('label'=>'Manage Logging', 'url'=>array('admin')),
);
?>
<h1>Data Entry Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

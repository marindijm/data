<?php
/* @var $this DataEntryCostsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Data Entry Costs',
);

$this->menu=array(
	array('label'=>'Create Costs', 'url'=>array('create')),
	array('label'=>'Manage Costs', 'url'=>array('admin')),
);
?>
<?php //include 'menuall.php'; ?>
<h1>Data Entry Costs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this IssuesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Issues',
);

$this->menu=array(
	array('label'=>'Create Issue', 'url'=>array('create')),
	array('label'=>'Manage Issue', 'url'=>array('admin')),
);
?>

<h1>Issues</h1>
<h2>New Issues</h2>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'issue-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$model,
	'columns'=>array(
		'issueid',
		//'waterpointid',
		array('name'=>'waterpointid', 'type'=>'raw', 'value'=>'CHtml::link( ($data->waterpoint->waterpoint_name . " (" . $data->waterpointid . ")") , array("waterpoints/view", "id"=>$data->waterpointid))', 'header'=>'Waterpoint'),
		'date_created',
		'status',
		'user_assigned',
		//'issuetypeid',
		array('name'=>'issuetypeid', 'header'=>'Issue Type', 'value'=>'$data->issuetype->issuetypename'),
		/*
		'issuesourceid',
		'createdby',
		'resolvedby',
		*/
		'date_resolved',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

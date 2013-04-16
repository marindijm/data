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
		array('name'=>'office', 'header'=>'Regional Office', 'value'=>$model->region->office_name),
	),
)); 
?>
<h3> Issues for this Waterpoint </h3>

<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'issue-grid',
    'dataProvider' => $dataProvider,
    //'filter'=>$model,
    'columns' => array(
        //'issueid',
        array('name' => 'issueid', 'type' => 'raw', 'value' => 'CHtml::link( ($data->issueid  ) , array("issues/view", "id"=>$data->issueid))', 'header' => 'Issue ID'),
        //'waterpointid',
        array('name' => 'waterpointid', 'type' => 'raw', 'value' => 'CHtml::link( ($data->waterpoint->waterpoint_name . " (" . $data->waterpointid . ")") , array("waterpoints/view", "id"=>$data->waterpointid))', 'header' => 'Waterpoint'),
        'date_created',
        'status',
        //'user_assigned',
        array('name' => 'user_assigned', 'type' => 'raw', 'value' => 'CHtml::link( ($data->user_assigned) , array("users/view", "id"=>$data->user_assigned))', 'header' => 'User Assigned'),
        //'issuetypeid',
        array('name' => 'issuetypeid', 'header' => 'Issue Type', 'value' => '$data->issuetype->issuetypename'),
        /*
          'issuesourceid',
          'createdby',
          'resolvedby',
         */
        'date_resolved',
		array('name'=>'issuetypeid', 'header'=>'Regional Office', 'value'=>'$data->waterpoint->region->office_name'),
        array
            (
            'class' => 'CButtonColumn',
            'template' => '{assign}{view}',
            'buttons' => array
                (
                'assign' => array
                    (
                    'label' => '[ + ]',
                    //TODO: find icon
                    'url' => 'Yii::app()->createUrl("issues/assign", array("id"=>$data->issueid))',
                )
            ),
        ),
    ),
));

?>
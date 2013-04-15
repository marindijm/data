<?php
/* @var $this UsersController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->user_id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->user_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_id',
		'username',
		'email',
		'role',
	),
)); ?>

<h3> Issues Created By This User </h3>

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


<h3> Issues Assigned To This User </h3>

<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'issue-grid',
    'dataProvider' => $issuesAssigned,
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


<h3> Issues Resolved By This User </h3>

<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'issue-grid',
    'dataProvider' => $issuesResolved,
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



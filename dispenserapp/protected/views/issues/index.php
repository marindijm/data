<?php
/* @var $this IssuesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Issues',
);

include 'menuall.php';
?>

<h1>Issues</h1>

<h2>Assigned But Not Resolved</h2>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'issue-grid',
    'dataProvider' => $assigned_unresolved,
    //'filter'=>$model,
    'columns' => array(
        //'issueid',
        array('name' => 'issueid', 'type' => 'raw', 'value' => 'CHtml::link( ($data->issueid  ) , array("issues/view", "id"=>$data->issueid))', 'header' => 'Issue ID'),
        //'waterpointid',
        array('name' => 'waterpointid', 'type' => 'raw', 'value' => 'CHtml::link( ($data->waterpoint->waterpoint_name . " (" . $data->waterpointid . ")") , array("waterpoints/view", "id"=>$data->waterpointid))', 'header' => 'Waterpoint'),
        'date_created',
        //'status',
        array('name' => 'status', 
             'type' => 'raw', 
             'value' => 'CHtml::checkbox( $data->status, $data->status , array("disabled" =>"true"))', 
             'header' => 'Resolved?'),
        //'user_assigned',		
		array('header'=>'User Assigned', 'type' => 'raw','value'=>'CHtml::link( ($data->userAssigned->username. " (" . $data->user_assigned . ")") , array("users/view", "id"=>$data->user_assigned))'),
		
        //'issuetypeid',
        array('name' => 'issuetypeid', 'header' => 'Issue Type', 'value' => '$data->issuetype->issuetypename'),
        /*
          'issuesourceid',
          'createdby',
          'resolvedby',
         */
        'date_resolved',
		array('name'=>'issuetypeid', 'header'=>'Regional Office', 'value'=>'$data->waterpoint->region->office_name'),
		'dispenser_functional',
        array
            (
            'class' => 'CButtonColumn',
            'template' => '{assign}{view}{delete}',
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
<h2>Unassigned</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'issue-grid',
    'dataProvider' => $unassigned,
	//'dataProvider'=>$model->search(),
    //'filter'=>$model,
    'columns' => array(
        //'issueid',
        array('name' => 'issueid', 'type' => 'raw', 'value' => 'CHtml::link( ($data->issueid  ) , array("issues/view", "id"=>$data->issueid))', 'header' => 'Issue ID'),
        //'waterpointid',
        array('name' => 'waterpointid', 'type' => 'raw', 'value' => 'CHtml::link( ($data->waterpoint->waterpoint_name . " (" . $data->waterpointid . ")") , array("waterpoints/view", "id"=>$data->waterpointid))', 'header' => 'Waterpoint'),
        'date_created',
        //'status',
         array('name' => 'status', 
             'type' => 'raw', 
             'value' => 'CHtml::checkbox( $data->status, $data->status , array("disabled" =>"true"))', 
             'header' => 'Resolved?'),
        //'user_assigned',
		array('header'=>'User Assigned', 'value'=>'$data->user_assigned'),
        //'issuetypeid',
        array('name' => 'issuetypeid', 'header' => 'Issue Type', 'value' => '$data->issuetype->issuetypename'),
        /*
          'issuesourceid',
          'createdby',
          'resolvedby',
         */
        'date_resolved',
		array('name'=>'issuetypeid', 'header'=>'Regional Office', 'value'=>'$data->waterpoint->region->office_name'),
		'dispenser_functional',
        array
            (
            'class' => 'CButtonColumn',
            'template' => '{assign}{view}{delete}',
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

<h2>Recently Resolved</h2>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'issue-grid',
    'dataProvider' => $resolved,
    //'filter'=>$model,
    'columns' => array(
        //'issueid',
        array('name' => 'issueid', 'type' => 'raw', 'value' => 'CHtml::link( ($data->issueid  ) , array("issues/view", "id"=>$data->issueid))', 'header' => 'Issue ID'),
        //'waterpointid',
        array('name' => 'waterpointid', 'type' => 'raw', 'value' => 'CHtml::link( ($data->waterpoint->waterpoint_name . " (" . $data->waterpointid . ")") , array("waterpoints/view", "id"=>$data->waterpointid))', 'header' => 'Waterpoint'),
        'date_created',
        //'status',
        array('name' => 'status', 
             'type' => 'raw', 
             'value' => 'CHtml::checkbox( $data->status, $data->status , array("disabled" =>"true"))', 
             'header' => 'Resolved?'),
        //'user_assigned',		
		array('header'=>'User Assigned', 'type' => 'raw','value'=>'CHtml::link( ($data->userAssigned->username. " (" . $data->user_assigned . ")") , array("users/view", "id"=>$data->user_assigned))'),
		
        //'issuetypeid',
        array('name' => 'issuetypeid', 'header' => 'Issue Type', 'value' => '$data->issuetype->issuetypename'),
        /*
          'issuesourceid',
          'createdby',
          'resolvedby',
         */
        'date_resolved',
		array('name'=>'issuetypeid', 'header'=>'Regional Office', 'value'=>'$data->waterpoint->region->office_name'),
		'dispenser_functional',
        array
            (
            'class' => 'CButtonColumn',
            'template' => '{assign}{view}{delete}',
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

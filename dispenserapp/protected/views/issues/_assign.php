<?php
/* @var $this IssuesController */
/* @var $model Issue */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'issueid',
		//'waterpointid',
		array('label'=>'Waterpoint', 'type'=>'raw', 'value'=>CHtml::link($model->waterpoint->waterpoint_name . ' (' . $model->waterpointid . ')', array('waterpoints/view','id'=>$model->waterpointid))),
		'date_created',
		array('label' => 'Resolved?', 'type' => 'raw', 'value' => CHtml::checkbox( $model->status, $model->status , array("disabled" =>"true"))),
		array('label'=>'User Assigned', 'value'=>$model->getAssigned()),
		array('label'=>'Issue Type', 'value'=>$model->issuetype->issuetypename),
                array('label'=>'Issue Source', 'value'=>$model->issuesource->description),
		array('label'=>'Created By', 'value'=>$model->getCreatedBy()),
	),
)); ?>
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'issue-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'user_assigned'); ?>
		<?php echo $form->dropDownList($model,'user_assigned', CHtml::listData(User::model()->findAll(array('order'=>'username ASC')), 'user_id', 'username')); ?>
		<?php echo $form->error($model,'user_assigned'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
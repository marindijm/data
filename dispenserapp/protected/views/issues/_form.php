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
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->checkBox($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'issuetypeid'); ?>
		<?php echo $form->dropDownList($model,'issuetypeid', CHtml::listData(Issuetype::model()->findAll(), 'issuetypeid', 'issuetypename')); ?>
		<?php echo $form->error($model,'issuetypeid'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'user_comments'); ?>
		<?php echo $form->textArea($model,'user_comments',array('rows'=>4, 'cols'=>50)); ?>
		<?php echo $form->error($model,'user_comments'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
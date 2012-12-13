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
		'status',
		'user_assigned',
		array('label'=>'Issue Type', 'value'=>$model->issuetype->issuetypename),
                array('label'=>'Issue Source', 'value'=>$model->issuesource->description),
		'createdby',
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
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
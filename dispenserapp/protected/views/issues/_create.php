<?php
/* @var $this IssuesController */
/* @var $model Issue */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'issue-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'waterpointid'); ?>
		<?php echo $form->dropDownList($model,'waterpointid', CHtml::listData(Waterpoint::model()->findAll(), 'waterpoint_id', 'waterpoint_name')); ?>
		<?php echo $form->error($model,'waterpointid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issuetypeid'); ?>
		<?php echo $form->dropDownList($model,'issuetypeid', CHtml::listData(Issuetype::model()->findAll(), 'issuetypeid', 'issuetypename')); ?>
		<?php echo $form->error($model,'issuetypeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issuesourceid'); ?>
		<?php echo $form->dropDownList($model,'issuesourceid', CHtml::listData(Issuesource::model()->findAll(), 'issuesourceid', 'description')); ?>
		<?php echo $form->error($model,'issuesourceid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
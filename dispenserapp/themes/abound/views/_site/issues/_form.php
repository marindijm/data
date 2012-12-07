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
		<?php echo $form->textField($model,'waterpointid'); ?>
		<?php echo $form->error($model,'waterpointid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_created'); ?>
		<?php echo $form->dateField($model,'date_created'); ?>
		<?php echo $form->error($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->checkBox($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_assigned'); ?>
		<?php echo $form->textField($model,'user_assigned'); ?>
		<?php echo $form->error($model,'user_assigned'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issuetypeid'); ?>
		<?php echo $form->dropDownList($model,'issuetypeid', CHtml::listData(Issuetype::model()->findAll(), 'issuetypeid', 'issuetypename')); ?>
		<?php echo $form->error($model,'issuetypeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issuesourceid'); ?>
		<?php echo $form->textField($model,'issuesourceid'); ?>
		<?php echo $form->error($model,'issuesourceid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createdby'); ?>
		<?php echo $form->textField($model,'createdby'); ?>
		<?php echo $form->error($model,'createdby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resolvedby'); ?>
		<?php echo $form->textField($model,'resolvedby'); ?>
		<?php echo $form->error($model,'resolvedby'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'date_resolved'); ?>
		<?php echo $form->dateField($model,'date_resolved'); ?>
		<?php echo $form->error($model,'date_resolved'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
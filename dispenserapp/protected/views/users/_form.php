<?php
/* @var $this UsersController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'openid_identity'); ?>
		<?php echo $form->textField($model,'openid_identity',array('size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'openid_identity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'session_id'); ?>
		<?php echo $form->textField($model,'session_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'session_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loggedin'); ?>
		<?php echo $form->checkBox($model,'loggedin'); ?>
		<?php echo $form->error($model,'loggedin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
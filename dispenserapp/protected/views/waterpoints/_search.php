<?php
/* @var $this WaterpointsController */
/* @var $model Waterpoint */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'waterpoint_id'); ?>
		<?php echo $form->textField($model,'waterpoint_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'waterpoint_name'); ?>
		<?php echo $form->textField($model,'waterpoint_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'district_name'); ?>
		<?php echo $form->textField($model,'district_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'division_name'); ?>
		<?php echo $form->textField($model,'division_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location_name'); ?>
		<?php echo $form->textField($model,'location_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'directions'); ?>
		<?php echo $form->textField($model,'directions',array('size'=>60,'maxlength'=>20000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'promoter'); ?>
		<?php echo $form->textField($model,'promoter',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'promoter_contact_1'); ?>
		<?php echo $form->textField($model,'promoter_contact_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'promoter_contact_2'); ?>
		<?php echo $form->textField($model,'promoter_contact_2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'assistant_promoter'); ?>
		<?php echo $form->textField($model,'assistant_promoter',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'assistant_promoter_contact_1'); ?>
		<?php echo $form->textField($model,'assistant_promoter_contact_1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'assistant_promoter_contact_2'); ?>
		<?php echo $form->textField($model,'assistant_promoter_contact_2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
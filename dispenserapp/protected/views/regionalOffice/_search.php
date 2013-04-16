<?php
/* @var $this RegionalOfficeController */
/* @var $model RegionalOffice */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'office_id'); ?>
		<?php echo $form->textField($model,'office_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'office_name'); ?>
		<?php echo $form->textField($model,'office_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
<?php
/* @var $this IssuesourcesController */
/* @var $model Issuesource */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'issuesourceid'); ?>
		<?php echo $form->textField($model,'issuesourceid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'issuesource'); ?>
		<?php echo $form->textField($model,'issuesource',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
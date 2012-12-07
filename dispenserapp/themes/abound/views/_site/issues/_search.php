<?php
/* @var $this IssuesController */
/* @var $model Issue */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'issueid'); ?>
		<?php echo $form->textField($model,'issueid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'waterpointid'); ?>
		<?php echo $form->textField($model,'waterpointid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->checkBox($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_assigned'); ?>
		<?php echo $form->textField($model,'user_assigned'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'issuetypeid'); ?>
		
		<?php echo $form->dropDownList($model,'issuetypeid', CHtml::listData(Issuetype::model()->findAll(), 'issuetypeid', 'issuetypename')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'issuesourceid'); ?>
		<?php echo $form->textField($model,'issuesourceid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdby'); ?>
		<?php echo $form->textField($model,'createdby'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resolvedby'); ?>
		<?php echo $form->textField($model,'resolvedby'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_resolved'); ?>
		<?php echo $form->textField($model,'date_resolved'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
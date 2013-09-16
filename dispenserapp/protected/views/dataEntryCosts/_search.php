<?php
/* @var $this DataEntryCostsController */
/* @var $model DataEntryCosts */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'reg_no'); ?>
		<?php echo $form->textField($model,'reg_no',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_date'); ?>
		<?php echo $form->textField($model,'service_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oil_lubricant_type'); ?>
		<?php echo $form->textField($model,'oil_lubricant_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oil_lubricant_quantity'); ?>
		<?php echo $form->textField($model,'oil_lubricant_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oil_lubricant_total_cost'); ?>
		<?php echo $form->textField($model,'oil_lubricant_total_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'outsource_material'); ?>
		<?php echo $form->textField($model,'outsource_material',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'outsource_material_cost'); ?>
		<?php echo $form->textField($model,'outsource_material_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'outsource_labour_total_cost'); ?>
		<?php echo $form->textField($model,'outsource_labour_total_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description_of_ourtsource_work_performed'); ?>
		<?php echo $form->textArea($model,'description_of_ourtsource_work_performed',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'odometer_reading'); ?>
		<?php echo $form->textField($model,'odometer_reading'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'duration_week'); ?>
		<?php echo $form->textField($model,'duration_week',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'costyear'); ?>
		<?php echo $form->textField($model,'costyear'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'analysisperiod'); ?>
		<?php echo $form->textField($model,'analysisperiod'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cost_rec_id'); ?>
		<?php echo $form->textField($model,'cost_rec_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
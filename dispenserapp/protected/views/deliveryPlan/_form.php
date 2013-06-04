<?php
/* @var $this DeliveryPlanController */
/* @var $model DeliveryPlan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'delivery-plan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object
                'attribute'=>'start_date', //attribute name
                'mode'=>'date', //use "time","date" or "datetime" (default)
                'options'=>array("dateFormat"=>'yy-mm-dd'), // jquery plugin options
                'language' => ''
            ));
		?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>
	<div class="row">
		<?php echo CHtml::label("Staff Assigned", "userString");?>
		<?php echo CHtml::textField("userString");?>
	</div>
	<div class="row">
		<?php echo CHtml::label("Wpt Assigned", "waterpointString");?>
		<?php echo CHtml::textField("waterpointString");?>
	</div>
	<!--<div class="row">
		<?php //echo $form->labelEx($model,'start_date'); ?>
		<?php //echo $form->textField($model,'start_date'); ?>
		<?php //echo $form->error($model,'start_date'); ?>
	</div>-->
	<div class="row">
		<?php echo $form->labelEx($model,'deliveries_per_day'); ?>
		<?php echo $form->textField($model,'deliveries_per_day'); ?>
		<?php echo $form->error($model,'deliveries_per_day'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
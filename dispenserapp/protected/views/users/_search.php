<?php
/* @var $this UsersController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
<<<<<<< HEAD
<<<<<<< HEAD
	</div>

	<div class="row">
		<?php echo $form->label($model,'role'); ?>
		<?php echo $form->textField($model,'role',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
=======
	</div>

	<div class="row">
		<?php echo $form->label($model,'role'); ?>
		<?php echo $form->textField($model,'role',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
>>>>>>> 7bff53bb31e53dfcc0505a9c7c0b10addae97a98
=======
	</div>

	<div class="row">
		<?php echo $form->label($model,'openid_identity'); ?>
		<?php echo $form->textField($model,'openid_identity',array('size'=>60,'maxlength'=>1024)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'session_id'); ?>
		<?php echo $form->textField($model,'session_id',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loggedin'); ?>
		<?php echo $form->checkBox($model,'loggedin'); ?>
	</div>

	<div class="row buttons">
>>>>>>> parent of ae9b68a... server changes
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
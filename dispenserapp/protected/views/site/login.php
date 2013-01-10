<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<div>
<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($form); ?>

<div>
<?php echo CHtml::activeLabel($form,'email'); ?>
<?php echo CHtml::activeTextField($form,'email') ?>
</div>

<div>
<?php echo CHtml::activeLabel($form,'password'); ?>
<?php echo CHtml::activePasswordField($form,'password') ?>
</div>

<div>
<?php echo CHtml::submitButton('Login'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->
<<<<<<< HEAD
<?php
/* @var $this IssuesController */
/* @var $data Issue */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('issueid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->issueid), array('view', 'id'=>$data->issueid)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('waterpointid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->waterpoint->waterpoint_name . ' (' . $data->waterpointid . ')'), array('waterpoints/view', 'id'=>$data->waterpointid));  ?>
	<br />
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_assigned')); ?>:</b>
	<?php echo CHtml::encode($data->user_assigned); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuetypeid')); ?>:</b>
	<?php echo CHtml::encode($data->issuetype->issuetypename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuesourceid')); ?>:</b>
	<?php echo CHtml::encode($data->issuesourceid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('createdby')); ?>:</b>
	<?php echo CHtml::encode($data->createdby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resolvedby')); ?>:</b>
	<?php echo CHtml::encode($data->resolvedby); ?>
	<br />

	*/ ?>
    <b><?php echo CHtml::encode($data->getAttributeLabel('date_resolved')); ?>:</b>
	<?php echo CHtml::encode($data->date_resolved); ?>
	<br />
	
	
</div>

=======
<?php
/* @var $this IssuesController */
/* @var $data Issue */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('issueid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->issueid), array('view', 'id'=>$data->issueid)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('waterpointid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->waterpoint->waterpoint_name . ' (' . $data->waterpointid . ')'), array('waterpoints/view', 'id'=>$data->waterpointid));  ?>
	<br />
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::checkbox( $data->status, $data->status , array("disabled" =>"true")); ?>
	<br />
     

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_assigned')); ?>:</b>
	<?php echo CHtml::encode($data->user_assigned); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuetypeid')); ?>:</b>
	<?php echo CHtml::encode($data->issuetype->issuetypename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('issuesourceid')); ?>:</b>
	<?php echo CHtml::encode($data->issuesourceid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('createdby')); ?>:</b>
	<?php echo CHtml::encode($data->createdby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resolvedby')); ?>:</b>
	<?php echo CHtml::encode($data->resolvedby); ?>
	<br />

	*/ ?>
    <b><?php echo CHtml::encode($data->getAttributeLabel('date_resolved')); ?>:</b>
	<?php echo CHtml::encode($data->date_resolved); ?>
	<br />
	
	
</div>

>>>>>>> 7bff53bb31e53dfcc0505a9c7c0b10addae97a98

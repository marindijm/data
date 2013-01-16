<<<<<<< HEAD
<<<<<<< HEAD
<?php
/* @var $this IssuesController */
/* @var $model Issue */

$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->issueid=>array('view','id'=>$model->issueid),
	'Assign',
);

include 'menuone.php';
?>

<h1>Assign Issue <?php echo $model->issueid; ?> to User</h1>

=======
=======
>>>>>>> parent of ae9b68a... server changes
<?php
/* @var $this IssuesController */
/* @var $model Issue */

$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->issueid=>array('view','id'=>$model->issueid),
	'Assign',
);

include 'menuone.php';
?>

<<<<<<< HEAD
<h1>Assign Issue <?php echo $model->issueid; ?> to User</h1>

>>>>>>> 7bff53bb31e53dfcc0505a9c7c0b10addae97a98
=======
<h1>Assign Issue <?php echo $model->issueid; ?>to User</h1>

>>>>>>> parent of ae9b68a... server changes
<?php echo $this->renderPartial('_assign', array('model'=>$model)); ?>
<?php
/* @var $this WaterpointsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Waterpoints',
);


$this->menu = array(
    //array('label' => 'Create Waterpoint', 'url' => array('create')),
    //array('label' => 'Manage Waterpoint', 'url' => array('admin')),
	array('label' => 'Waterpoints Report', 'url' => array('wpreport')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle(); 
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('waterpoint-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1> Waterpoints</h1>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'waterpoint-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'waterpoint_id',
        'waterpoint_name',
        'district_name',
        'division_name',
        'location_name',
        'promoter',
        'promoter_contact_1',
        array
            (
            'class' => 'CButtonColumn',
            'template' => '{view}{update}',
            
        ),
    ),
));
?>

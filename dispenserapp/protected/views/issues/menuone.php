<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$this->menu=array(
	
	array('label'=>'Assign Issue', 'url'=>array('assign', 'id'=>$model->issueid)),
        array('label'=>'Resolve Issue', 'url'=>array('update', 'id'=>$model->issueid)),
	array('label'=>'Delete Issue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->issueid),'confirm'=>'Are you sure you want to delete this item?')),
        array('label'=>' '),
        array('label'=>'List Issue', 'url'=>array('index')),
	array('label'=>'Create Issue', 'url'=>array('create')),
        array('label'=>'Manage Issue', 'url'=>array('admin')),
        
);

?>

<?php
/* @var $this ConnectionController */
/* @var $model Connection */

$this->breadcrumbs=array(
	'Connections'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Connection', 'url'=>array('index')),
	array('label'=>'Create Connection', 'url'=>array('create')),
	array('label'=>'Update Connection', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Connection', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Connection', 'url'=>array('admin')),
);
?>

<h1>View Connection #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'connector',
		'connectee',
		'type',
		'status',
	),
)); ?>

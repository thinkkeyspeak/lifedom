<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->first_name; ?> <?php echo $model->family_name; ?></h1>

<?php
$this->beginWidget('webroot.protected.components.ConnectWidget', array(
	'currentProfile'=>$model,
	));
$this->endWidget(); ?>

<?php 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'dob',
		'pob',
	),
)); ?>

<div id="posts"> 
	<?php //Lists posts by author. Change to 'destination' field instead.?>
		<?php $this->renderPartial('_posts', array(
			'user'=>$model,
			'posts'=>$model->posts,
			)); ?>
</div>
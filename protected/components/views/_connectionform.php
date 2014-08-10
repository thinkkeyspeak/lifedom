<?php
/* @var $model Connection */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'_connectionForm',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		is my
		 <?php echo $form->dropDownList($model,'type',Lookup::items('Connection'));?>
		 <?php echo CHtml::submitButton('Connect!');?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
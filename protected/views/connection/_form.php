<?php
/* @var $this ConnectionController */
/* @var $model Connection */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'connection-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'connectee'); ?>
		<?php echo $form->textField($model,'connectee'); ?>
		<?php echo $form->error($model,'connectee'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'type',Lookup::items('Connection')); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownList($model,'status',Lookup::items('ConnectionStatus')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
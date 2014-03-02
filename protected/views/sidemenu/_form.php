<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sidemenu-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($lookup); ?>

	<div class="row">
		<?php echo $form->labelEx($lookup,'name'); ?>
		<?php echo $form->textField($lookup,'name',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($lookup,'name'); ?>
	</div>	
	
	<div class="row">
		<?php 
			  echo $form->dropDownList($category_relations,
										'parent_id', 
										CHtml::listData(SMLookup::model()->findAll(), 
														'c_id', 
														'name'), 
										array('empty'=>'Wybierz kategoriê / Utwórz korzeñ'));
		?>				
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($lookup->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('u_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->u_id), array('view', 'id'=>$data->u_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surname')); ?>:</b>
	<?php echo CHtml::encode($data->surname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nickname')); ?>:</b>
	<?php echo CHtml::encode($data->nickname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postal_code')); ?>:</b>
	<?php echo CHtml::encode($data->postal_code); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('newsletter')); ?>:</b>
	<?php echo CHtml::encode($data->newsletter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_of_opinions')); ?>:</b>
	<?php echo CHtml::encode($data->number_of_opinions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_of_companies')); ?>:</b>
	<?php echo CHtml::encode($data->number_of_companies); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activated')); ?>:</b>
	<?php echo CHtml::encode($data->activated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penalty_points')); ?>:</b>
	<?php echo CHtml::encode($data->penalty_points); ?>
	<br />

	*/ ?>

</div>
<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

?>

<h1>Create Users</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
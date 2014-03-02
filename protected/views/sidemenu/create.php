<?php
/* @var $this UsersController */
/* @var $model Users */


?>

<h1>Add categories</h1>

<?php $this->renderPartial('_form', array('lookup'=>$lookup,
										  'category_relations'=>$category_relations,)); ?>
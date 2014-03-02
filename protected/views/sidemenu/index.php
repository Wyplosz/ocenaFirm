<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<?php $this->drawSubCategories($sorted_categories, $sorted_relations, 1, 0, $parents); ?>
<br />

<br />
<?php

	$companies=$this->get_companies($id_param);
	foreach($companies as $company)
	{
		echo $company->name."<br /><br />".$company->description."<br /><br /><hr>";
	}
	
?>
<?php //$this->show_companies(); ?>
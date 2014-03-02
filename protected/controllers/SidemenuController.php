<?php

class SidemenuController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function drawSubCategories($categories, $category_relations, $position, $depth, $parents)
	{
		foreach($category_relations[$position] as $relation)
		{
			if(in_array($relation, $parents))
			{
				for($j=0;$j<$depth;$j++)
					echo "---";		
				if(isset($categories[$relation]))	
					echo "<a href='".$this->createUrl("sidemenu/index", array("id"=>$relation))."'>".$categories[$relation]."</a><br />";
			}
			if(isset($category_relations[$relation])){
				$depth++;
				$this->drawSubCategories($categories, $category_relations, $relation, $depth, $parents);
				$depth--;
			}
		}
	}
	
	public function findParent($category_relations, $nod)
	{
		foreach($category_relations as $relation => $sub_relation)
		{
			if($nod===$sub_relation[0] || array_search($nod, $sub_relation))
				return $relation;					
		}	
		return false;
	}
	
	public function returnParents($category_relations, $nod)
	{		
		$path = array();
		
		while($nod>=1)
		{
			$path[] = $nod;
			$nod = $this->findParent($category_relations, $nod);
		}
		
		return $path;
	}	
	
	public function actionIndex()
	{
		if(isset($_GET['id']))
			$id_param=$_GET['id'];
		else 
			$id_param=0;
		
		$categories=Yii::app()->db->createCommand('SELECT c_id, name 
												   FROM tbl_sidemenu_lookup 
												   ORDER BY c_id ASC')->query();
		$category_relations=Yii::app()->db->createCommand('SELECT * 
												  FROM tbl_sidemenu_relations 
												  ORDER BY parent_id ASC')->query();
		
		foreach($categories as $category)
		{
			$sorted_categories[$category['c_id']] = $category['name'];
		}
		
		foreach($category_relations as $relation)
		{
			if(!isset($sorted_relations[$relation['parent_id']]))
				$sorted_relations[$relation['parent_id']]=array();
			array_push($sorted_relations[$relation['parent_id']], $relation['child_id']);
		}
		
		$children=array();
		
		if($id_param)
		{
			if(isset($sorted_relations[$id_param]))
			{
				$children=$sorted_relations[$id_param];
			}
		}
			
		$parents=array_merge($this->returnParents($sorted_relations, $id_param), 
							 $sorted_relations[1],
							 $children);
		
		$this->render('index',array(
			'sorted_categories'=>$sorted_categories,
			'sorted_relations'=>$sorted_relations,
			'parents'=>$parents,
			'id_param'=>$id_param,
		));
	}

	public function actionCreate()
	{
		$lookup=new SMLookup;
		$category_relations = new SMRelations;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SMLookup']) && isset($_POST['SMRelations']))
		{
			$query = 'SELECT COUNT(*) 
					  FROM tbl_sidemenu_lookup';
			$child = Yii::app()->db->createCommand($query)->queryScalar();	
			
			if($child)
				$_POST['SMRelations']['child_id'] = $child+1;
			else
				$_POST['SMRelations']['child_id'] = 0;
			
			
			$category_relations->attributes=$_POST['SMRelations'];
			$lookup->attributes=$_POST['SMLookup'];
			
			if($category_relations->save())			
				$lookup->save();													
		}
		
		$this->render('create',array(
			'lookup'=>$lookup,
			'category_relations'=>$category_relations,
		));		
	
	}
	
	public function get_companies($category)
	{		
		$model=Companies::model();
		$companies=$model->findAll(array(
			'select' => 'name, description, category',
			'condition' => 'category=:category',
			'params' => array(':category' => $category)
		));		
		
		return $companies;
	}
	
}
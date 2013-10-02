<?php

class MortocycleAnalysisRecordsController extends Controller
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
				'actions'=>array('index','view','report','details'),
				'roles' => array('reader'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'roles' => array('writer'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles' => array('admin'),
			),
			array('deny',  // deny all users
				//'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	 
	/*
	 *Give all report models
	 */
	public function actionReport() {
		$allAnalysis = new CActiveDataProvider('MortocycleAnalysisRecords',array(
        		'pagination' => array(
            	'pageSize' => 10,
             ),
		));
		$this->render('analysisReport', array(
            'allAnalysis' => $allAnalysis,
        ));
	}
	
	/*
	 * Morto Details
	 */
	public function actionDetails(){
		$details = new CActiveDataProvider('Details',array(
        		'pagination' => array(
            	'pageSize' => 10,
             ),
		));
		$this->render('index', array(
            'details' => $details,
        ));
	}	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$details = new CActiveDataProvider('Details',array(
        		'pagination' => array(
            	'pageSize' => 10,
             ),
		));
		$this->render('index', array(
            'details' => $details,
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DataEntryLog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DataEntryLog']))
			$model->attributes=$_GET['DataEntryLog'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=DataEntryLog::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='data-entry-log-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

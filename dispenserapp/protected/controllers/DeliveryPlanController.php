<?php

class DeliveryPlanController extends Controller
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
				'actions'=>array('index','view','admin', 'viewPlan'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{	
		$dataProvider = new CActiveDataProvider('Delivery', array(
                    'criteria' => array(
                        'condition' => 'delivery_plan_id = :deliveryid',
                        'params' => array(':deliveryid' => $id),
                    ),
                    'sort' => array(
                        'defaultOrder' => 'staff_id DESC',
                    ),
                    'pagination' => array(
                        'pageSize' => 30,
                    ),
		));
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'dataProvider' => $dataProvider
		));
	}
	
	public function actionViewPlan($id, $deliveries)
	{
		$dataProvider = new CActiveDataProvider('Delivery', array(
                    'criteria' => array(
                        'condition' => 'delivery_plan_id = :deliveryid',
                        'params' => array(':deliveryid' => $id),
                    ),
                    'sort' => array(
                        'defaultOrder' => 'staff_id DESC',
                    ),
                    'pagination' => array(
                        'pageSize' => 30,
                    ),
		));
		$this->render('viewPlan',array(
			'model'=>$this->loadModel($id),
			'deliveries'=>$deliveries,
			'dataProvider' => $dataProvider
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new DeliveryPlan;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DeliveryPlan']))
		{
			$model->attributes=$_POST['DeliveryPlan'];
			$staffArray = preg_split("/,/", $_POST['userString']);
			$waterpointsArray = preg_split("/,/",$_POST['waterpointString']);
			//$deliveryPlan = new DeliveryPlan("Delivery Plan - " . date('Y-m-d'), $enteredStartDate, $numberOfStaff,  $deliveries, $optDelivery, $endDate);
			
			$model->end_date = $model->start_date; //temporary date for db sake
			if($model->save())
			
			$returnArray = $this->createDeliveries($model->name, $model->start_date, $model->deliveries_per_day, $staffArray, $waterpointsArray , $model->delivery_plan_id);
			$scheduledDeliveries = $returnArray[0];
			$endDate = $returnArray[1];
			
			$model->end_date = $endDate;
			$model->save();
			
			
				$this->redirect(array('viewPlan',
				'id'=>$model->delivery_plan_id,
				'deliveries'=>implode(",", $scheduledDeliveries)
				));
			
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DeliveryPlan']))
		{
			$model->attributes=$_POST['DeliveryPlan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->delivery_plan_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('DeliveryPlan');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DeliveryPlan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DeliveryPlan']))
			$model->attributes=$_GET['DeliveryPlan'];

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
		$model=DeliveryPlan::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='delivery-plan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function createDeliveries($name, $enteredStartDate, $optDelivery, $staffArray, $waterpointsArray , $deliveryPlanId)
	{
		$numberOfStaff = sizeof($staffArray);
		$numberOfWaterpoints = sizeof($waterpointsArray);
				
		$deliveries = array();

		$perStaffWpts = $numberOfWaterpoints / $numberOfStaff; 
		$currWaterpoint = 0;
		$endDate = $enteredStartDate;
		for($i = 0; $i < $numberOfStaff; $i ++)//for each staff member
		{
			$start = $enteredStartDate; //first date of delivery	
			$dateCount = 0;		
			for($assignedDel = 0; $assignedDel <  $perStaffWpts ; $assignedDel++){
			
				if($dateCount == $optDelivery){
					$dateCount = 0; $start++;
				}
				if($currWaterpoint > $numberOfWaterpoints -1)
					break;
				$del = new Delivery;
				
				/*$delivery_id
				 * @property integer $waterpoint_id
				 * @property integer $staff_id
				 * @property integer $delivery_plan_id
				 * @property string $delivery_date
				 */
				$del->waterpoint_id = $waterpointsArray[$currWaterpoint];
				$del->delivery_date =$start;
				$del->staff_id =$staffArray[$i];
				$del->delivery_plan_id= $deliveryPlanId;
				
				$del->save();
				
				array_push($deliveries, $del->delivery_id);
				
				$currWaterpoint++;
				$dateCount ++;
			}
			
			//get the last start Date (furthest out)
			if($endDate < $start) $endDate = $start;
		}
		 
		 return array($deliveries, $endDate);
		
	}
}
<?php

class IssuesController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() { 
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'roles' => array('reader'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'assign', 'resolve'),
                'roles' => array('writer'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'roles' => array('admin'),
            ),
            array('deny', // deny all users
               // 'roles' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Issue;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Issue'])) {
            $model->attributes = $_POST['Issue'];
            $model->date_created = date('Y-m-d');
            $model->issuesourceid = 3;
            $model->createdby = Yii::app()->user->id;
            $model->status = false;

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->issueid));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }
	
	/**
     * Resolves an issue
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionResolve($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Issue'])) {
            $model->attributes = $_POST['Issue'];
             $model->date_resolved = date('Y-m-d');
            $model->resolvedby = Yii::app()->user->id;
            
            if ($model->save())
                $this->redirect(array('admin', 'id' => $model->issueid));
        }

        $this->render('resolve', array(
            'model' => $model,
        ));
    }
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Issue'])) {
            $model->attributes = $_POST['Issue'];
            if ($model->save())
                $this->redirect(array('admin', 'id' => $model->issueid));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionAssign($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Issue'])) {
            $model->attributes = $_POST['Issue'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->issueid));
        }

        $this->render('assign', array(
            'model' => $model,
        ));
    }
	
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        
        $unassigned = new CActiveDataProvider('Issue', array(
                    'criteria' => array(
                        'condition' => 'user_assigned IS null',
                       // 'params' => array(':var_assigned' => null),
                    ),
                    'sort' => array(
                        'defaultOrder' => 'date_created DESC',
                    ),
                    'pagination' => array(
                        'pageSize' => 30,
                    ),
                ));

        $resolved = new CActiveDataProvider('Issue', array(
                    'criteria' => array(
                        'condition' => 'status IS TRUE',
                       // 'params' => array(':var_assigned' => null),
                    ),
                    'sort' => array(
                        'defaultOrder' => 'date_resolved DESC',
                    ),
                    'pagination' => array(
                        'pageSize' => 30,
                    ),
                ));
				
	 $assigned_unresolved = new CActiveDataProvider('Issue', array(
                    'criteria' => array(
                        'condition' => 'user_assigned IS NOT null and status IS FALSE',
                       // 'params' => array(':var_assigned' => null),
                    ),
                    'sort' => array(
                        'defaultOrder' => 'date_created DESC',
                    ),
                    'pagination' => array(
                        'pageSize' => 30,
                    ),
                ));
        $this->render('index', array(
            'unassigned' => $unassigned,
			'assigned_unresolved' =>  $assigned_unresolved,
            'resolved' => $resolved,
            ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Issue('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Issue']))
            $model->attributes = $_GET['Issue'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Issue::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'issue-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

<<<<<<< HEAD
<?php

class WaterpointsController extends Controller {

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
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'actions' => array('delete'),
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        
        $dataProvider = new CActiveDataProvider('Issue', array(
                    'criteria' => array(
                        'condition' => 'waterpointid = :wptid',
                        'params' => array(':wptid' => $id),
                    ),
                    'sort' => array(
                        'defaultOrder' => 'date_created DESC',
                    ),
                    'pagination' => array(
                        'pageSize' => 30,
                    ),
                ));
        
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'dataProvider' => $dataProvider
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Waterpoint;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Waterpoint'])) {
            $model->attributes = $_POST['Waterpoint'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->waterpoint_id));
        }

        $this->render('create', array(
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

        if (isset($_POST['Waterpoint'])) {
            $model->attributes = $_POST['Waterpoint'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->waterpoint_id));
        }

        $this->render('update', array(
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
        /* $dataProvider=new CActiveDataProvider('Waterpoint');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          ));
         * 
         */
        $model = new Waterpoint('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Waterpoint']))
            $model->attributes = $_GET['Waterpoint'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Waterpoint('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Waterpoint']))
            $model->attributes = $_GET['Waterpoint'];

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
        $model = Waterpoint::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'waterpoint-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
=======
<?php

class WaterpointsController extends Controller {

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
                'actions' => array('create', 'update'),
                'roles' => array('writer'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin'),
                'roles' => array('admin'),
            ),
            array('deny', // deny all users
                'actions' => array('delete'),
                'roles' => array('admin'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        
        $dataProvider = new CActiveDataProvider('Issue', array(
                    'criteria' => array(
                        'condition' => 'waterpointid = :wptid',
                        'params' => array(':wptid' => $id),
                    ),
                    'sort' => array(
                        'defaultOrder' => 'date_created DESC',
                    ),
                    'pagination' => array(
                        'pageSize' => 30,
                    ),
                ));
        
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'dataProvider' => $dataProvider
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Waterpoint;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Waterpoint'])) {
            $model->attributes = $_POST['Waterpoint'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->waterpoint_id));
        }

        $this->render('create', array(
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

        if (isset($_POST['Waterpoint'])) {
            $model->attributes = $_POST['Waterpoint'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->waterpoint_id));
        }

        $this->render('update', array(
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
        /* $dataProvider=new CActiveDataProvider('Waterpoint');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          ));
         * 
         */
        $model = new Waterpoint('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Waterpoint']))
            $model->attributes = $_GET['Waterpoint'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Waterpoint('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Waterpoint']))
            $model->attributes = $_GET['Waterpoint'];

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
        $model = Waterpoint::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'waterpoint-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
>>>>>>> 7bff53bb31e53dfcc0505a9c7c0b10addae97a98

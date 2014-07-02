<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\User;
use yii\web\Request;
class UserController extends Controller {
    public $model;
    function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->model = new User();
    }

   public function actionIndex(){

       return $this->render('index');
    }
    public function actionRegister(){
        $r = new Request;

        

        if($r->isPost){

           $ui= $r->post();
           $ui = $ui['User'];
           if($this->model->register($ui)){
              $this->redirect($r->getBaseUrl() .'index.php?r='. 'user/welcome');
           }
        

            $this->model->save();
            $this->model->error = 'test';

        }

       
       return $this->render('register', ['model'=> $this->model, 'error' => $this->model->error ]);
    }   
    public function actionWelcome(){
        return $this->render('welcome');
    }

        
   }   



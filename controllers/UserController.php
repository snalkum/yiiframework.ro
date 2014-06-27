<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\User;
use yii\web\Request;
class UserController extends Controller {
   public function actionIndex(){
       return $this->render('index');
   }
   public function actionRegister(){
        $r = new Request;
         $model = new User;
        if($r->isPost){
            $model->saveUser();
        }
      
       return $this->render('register', ['model'=> $model]);
   }   
   
}
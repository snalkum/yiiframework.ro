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
        if($r->isPost){
            echo 'test';
        }
       $model = new User;
       return $this->render('register', ['model'=> $model]);
   }   
   
}
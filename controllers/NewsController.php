<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;
use yii\db\Query;
use yii\web\Request;
class NewsController extends Controller{
  
  
    public $layout='main';

    public function actionIndex(){
        return $this->render('index');
    }
    public function actionAdd(){
        $model = new News();
        $r = new Request;
        if($r->isPost){
            if($model->saveData($r->post())){
                return $this->render('add', ['model' => $model, 'validated' => true]);
            }
            else{
                 return $this->render('add', ['model' => $model, 'validated' => false]);
            }
        }
            return $this->render('add', ['model' => $model]);
    }
    public function actionDelete($id){
        
    }
}
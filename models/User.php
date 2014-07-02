<?php

namespace app\models;

use Yii;

use yii\validators\EmailValidator;



/**
 * This is the model class for table "users".
 *
 * @property integer $user_id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $salt
 * @property string $registration_date
 * @property integer $user_status
 * @property string $activation_key
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface{
    public $id;
    public $username;
    public $password;
    public $repassword;
    public $email;
    public $salt;
    public $registration_date;
    public $user_status;
    public $activation_key;
    public $authKey;
    public $accessToken;
    public $error = array();
    public $group_id;
    public $error;

    
    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];
    
   public static function findIdentity($id){
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }


    public static function findIdentityByAccessToken($token)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }


    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        return $this->authKey;
    }


    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


    public static function tableName()
    {
        return 'users';
    }
   
    function rules()
    {
        return [

          
        ];
    }
    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
    return $randomString;
}
    public function register($data){
       
         if(strlen($data['username']) < 3){
            $this->error[] = 'Minim 3 caractere pentru numele de utilizator';
         }
         if($data['password'] !== $data['repassword']){
            $this->error[] = 'Parolele trebuie sa fie identice';
         }
         if(count($this->error) >0 ){
             return  false;
         }
         $mailValidator = new EmailValidator();
         if($mailValidator->validate($data['email'])){
             $this->error[] = 'Mail invalid';
         }
         $this->username = $data['username'];
         $this->group_id=0; //Initial group id
         $this->salt = $this->generateRandomString(10);
        $this->password= sha1(sha1($data['password']) . md5($this->salt));
        $this->email = $data['email']; 
         $this->activation_key= sha1( $this->generateRandomString(40) );
         if($this->save($data)){
             return true;
         } else{
             return false;
         }
         
            

    }
    
    
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'salt' => 'Salt',
            'registration_date' => 'Registration Date',
            'user_status' => 'User Status',
            'activation_key' => 'Activation Key',
        ];
    }
}

<?php

namespace app\models;

use Yii;

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
            [['username', 'password', 'email', 'salt', 'registration_date', 'activation_key'], 'required'],
            [['username'], 'string'],
            ['password', 'compare', 'compareAttribute' => 'repassword', 'on' => 'register'],
            [['registration_date'], 'safe'],
            [['user_status'], 'integer'],
            [['password', 'salt', 'activation_key'], 'string', 'max' => 40],
            [['email'], 'string', 'max' => 255]
        ];
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

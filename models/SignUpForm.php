<?php


namespace app\models;


use Yii;
use yii\base\Model;
use yii\httpclient\Client;

class SignUpForm extends Model
{
    public $fio;
    public $phone_number;
    public $address;
    public $email;
    public $password;
    public $username;
    public $passport;

    public function rules()
    {
        return [
            [['fio','phone_number','address','email','password','username'], 'required'],
            [['fio'], 'string', 'min' => 3, 'max' => 255],
            ['phone_number','unique', 'targetClass'=>'app\models\UserInfo'],
            [['phone_number','address'],'number'],
            ['phone_number','string', 'min'=>12],
            ['passport','string' , 'min' => 9, 'max' => 9],
            ['email','email'],
            ['username','unique', 'targetClass'=>'app\models\User'],
            ['email','unique', 'targetClass'=>'app\models\User']
        ];
    }

    public function registerUser(){
        $user = new User();
        $rand = rand(99999,1000000);
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        $user->created_date = date('Y-m-d H:i:s');
        $user->update_date = date('Y-m-d H:i:s');
        $user->creator = 9;
        $user->status = 2000;
        $user->sms_code = "{$rand}";
        $user->phone_number = $this->phone_number;
        $user->address = $this->address;
        $user->fio = $this->fio;
        $user->passport = $this->passport;
        if($user->save()){
            return true;
        }else{
            debug($user->errors);
        }
    }

    public function attributeLabels()
    {
        return [
          'fio' => 'FIO',
            'address' => 'Okrug',
            'phone_number' => 'Telefon raqam',
            'username' => 'Login',
            'password' => 'Parol',
            'passport' => "Passport seria va raqami"
        ];
    }

}
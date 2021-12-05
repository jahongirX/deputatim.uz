<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends Common implements \yii\web\IdentityInterface
{

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [

            [['username','email'],'required'],
            [['username','password','email','avatar','address','phone_number','fio','passport'],'string', 'max' => 255],
            [['username','email'] , 'unique', 'targetClass' => 'app\models\User'],
            ['status', 'integer'],
            ['sms_code', 'string']

        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return !empty(self::findOne($id)) ? new static(self::findOne($id)) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::find()->all() as $user) {
            if ($user->access_token === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {

        foreach (self::find()->asArray()->all() as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function generatePassword(){
        $this->password = Yii::$app->security->generatePasswordHash($this->password);
    }

    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function beforeSave($insert)
    {
        $this->generateAuthKey();
        return parent::beforeSave($insert);
    }

}

<?php


namespace app\controllers;


use Yii;
use yii\base\BaseObject;
use yii\httpclient\Client;
use yii\web\Controller;

class GeneralController extends Controller
{
    public function sendSms($phone_number,$text){
        $client = new Client();

        $token = Yii::$app->params['sms_token'];
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('http://notify.eskiz.uz/api/message/sms/send')
            ->setHeaders(["Authorization: Bearer {$token}"])
            ->setData(['mobile_phone' => $phone_number, 'message' => "Your Confirm code is {$text}"])
            ->send();
        return true;
    }
}
<?php


namespace app\widgets;


use app\models\User;
use Yii;
use yii\bootstrap5\Widget;

class Header extends Widget
{
    public function run(){
        $user = User::findOne(Yii::$app->user->getId());
        return $this->render('header',compact('user'));
    }
}
<?php


namespace app\controllers;


class DeputatController extends GeneralController
{
    public function actionView($id){
        $model = \app\models\Deputat::findOne($id);
        return $this->render('view',compact('model'));
    }
}
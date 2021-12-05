<?php


namespace app\controllers;


use app\models\ConfirmSmsForm;
use app\models\Deputat;
use app\models\LoginForm;
use app\models\Order;
use app\models\Problem;
use app\models\SignInForm;
use app\models\SignUpForm;
use app\models\User;
use app\models\UserInfo;
use Yii;
use yii\base\BaseObject;
use yii\bootstrap5\ActiveForm;
use yii\filters\AccessControl;
use yii\httpclient\Client;
use yii\web\Response;
use function Sodium\compare;

class UserController extends GeneralController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login','sign-up','confirm-sms','send-sms'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles'=>['@'],

                    ],
                ],
            ],

        ];
    }

    public function actionLogin(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignInForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $user = User::findOne(Yii::$app->user->getId());
            if($user->status == 2000)
                return $this->redirect('profile');
            else
                return $this->redirect('deputat');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout(){
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionProfile(){

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $user = User::findOne(Yii::$app->user->getId());
        $myProblems = Problem::find()->all();
        return $this->render('profile',compact('user','myProblems'));
    }


    public function actionSignUp(){

        if (!Yii::$app->user->isGuest) {
            return $this->redirect("profile");
        }

        $model = new SignUpForm();

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())){
            if($model->registerUser()){
                return $this->redirect("profile");
            }

        }
        return $this->render('sign-up',compact('model'));
    }
    public function actionAddProblem(){

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Problem();
        if($model->load(Yii::$app->request->post())){
            $user = User::findOne(Yii::$app->user->getId());
            $model->user_id = $user->id;
            $model->deputat_id = $user->address;
            $model->status = 1;
            if($model->save()){
                $deputat = Deputat::findOne($model->deputat_id);
                $deputat->problems++;
                $deputat->save();
                return $this->redirect('profile');
            }else{
                debug($model->errors);
            }
        }
        return $this->render('add-problem',compact('model'));
    }

    public function actionEditProblem($id){

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = Problem::findOne($id);
        $user = User::findOne(Yii::$app->user->getId());
        return $this->render('edit-problem',compact('model','user'));
    }

    public function actionProblemAccept($id){

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = Problem::findOne($id);
        $model->status = 4;
        $model->save();

        $deputat = Deputat::findOne($model->deputat_id);
        $deputat->solved++;
        $deputat->save();

        return $this->redirect('profile');
    }

    public function actionProblemDecline($id){

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = Problem::findOne($id);
        $model->status = 3;
        $model->save();
        return $this->redirect('profile');
    }

    public function actionDeputat(){

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $user = User::findOne(Yii::$app->user->getId());
        $myProblems = Problem::find()->all();
        return $this->render('deputat',compact('user','myProblems'));
    }

    public function actionProblemView($id){

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $user = User::findOne(Yii::$app->user->getId());

        $model = Problem::findOne($id);
        $model->status = 2;
        $model->save();

        if($model->load(Yii::$app->request->post())){
            $model->status = 5;
            if($model->save()){
                return $this->redirect('deputat');
            }
        }

        return $this->render('problem-view',compact('model','user'));
    }
}
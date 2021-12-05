<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$js = <<<JS
    $('#signupform-phone_number').on('keydown',function (e){
        if(e.which == 107 || e.which == 16 || e.shiftKey){
            return false;
        }
    })
JS;

$this->registerJs($js);

$css = <<<CSS
    label{
        font-weight: bold;
    }
CSS;

$this->registerCss($css);


$this->title = "Ro'yxatdan o'tish";
?>
<section class="product_page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="site-login col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h1><?= Html::encode($this->title) ?></h1>
                        <p>Ro'yxatdan o'tish uchun formani to'ldiring</p>

                        <?php $form = ActiveForm::begin([
                            'id' => 'register-form'
                        ]); ?>

                        <div class="row">

                            <div class="col-lg-6">
                                <?= $form->field($model, 'fio')->textInput(['autofocus' => true]) ?>
                            </div>

                            <div class="col-lg-6">
                                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                            </div>

                            <div class="col-lg-6">
                                <?= $form->field($model, 'address')->dropDownList(Yii::$app->params['okrugs']) ?>
                            </div>

                            <div class="col-lg-6">
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                            </div>

                            <div class="col-lg-6">
                                <?= $form->field($model, 'phone_number')->input('number',['autofocus' => true]) ?>
                            </div>

                            <div class="col-lg-6">
                                <?= $form->field($model, 'password')->passwordInput() ?>
                            </div>

                            <div class="col-lg-6">
                                <?= $form->field($model, 'passport')->textInput(['autofocus' => true]) ?>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-lg-12">
                                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary w-100', 'name' => 'login-button']) ?>
                            </div>
                        </div>
                    </div>
                </div>


            <?php ActiveForm::end(); ?>

        </div>
        </div>
    </div>
</section>

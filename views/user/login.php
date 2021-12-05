<?php

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';

$css = <<<CSS
    .invalid-feedback{
        display:block;
    }
CSS;

$this->registerCss($css);



?>
<section class="product_page">
    <div class="container">
        <div class="card">

            <div class="card-body">

                <div class="site-login">
                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>Kirish uchun Login va Parolni kiriting:</p>

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-1 col-form-label'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>


                    <div class="form-group">
                        <div class="offset-lg-1 col-lg-11">
                            <?= Html::submitButton('Kirish', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                            <a href="<?=\yii\helpers\Url::to(['user/sign-up'])?>" class="btn btn-primary">Ro'yxatdan o'tish</a>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

            </div>

        </div>


    </div>
</section>

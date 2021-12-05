<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = "Muammo kiritish";

?>
<div class="card">
    <div class="card-body">

        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin([
            'id' => 'register-form'
        ]); ?>

            <div class="row">

                <div class="col-lg-12">
                    <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>
                </div>

                <div class="col-lg-12">
                    <?= $form->field($model, 'body')->textarea(['autofocus' => true,'rows'=>6]) ?>
                </div>

                <div class="col-lg-12">
                    <?= $form->field($model, 'file')->fileInput(Yii::$app->params['okrugs']) ?>
                </div>

            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary w-100', 'name' => 'login-button']) ?>
                </div>
            </div>


        <?php ActiveForm::end(); ?>

    </div>
</div>
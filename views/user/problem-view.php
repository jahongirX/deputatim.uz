<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<section class="breadcrumb_block">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::home()?>">Asosiy</a></li>
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::to(['user/profile'])?>">Profil</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$model->title?></li>
            </ol>
        </nav>
    </div>
</section>

<section class="profile">
    <div class="container">
        <div class="row">

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">

                        <h3><?=$model->title?></h3>

                        <table class="mb-3 table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th>Sarlavha: </th>
                                <td><?=$model->title?></td>
                            </tr>
                            <tr>
                                <th>Muammo matni: </th>
                                <td><?=$model->body?></td>
                            </tr>

                            <tr>
                                <th>Biriktirilgan fayl: </th>
                                <td><?=$model->file?></td>
                            </tr>

                            <tr>
                                <th>Javob Xati: </th>
                                <td><?=$model->deputat_answer?></td>
                            </tr>

                            <tr>
                                <th>Muammo holati: </th>
                                <td>
                                    <?php if ($model->status == 1): ?>

                                        <span class="btn btn-warning"><?=Yii::$app->params['problem_status'][$model->status]?></span>

                                    <?php elseif ($model->status == 2): ?>

                                        <span class="btn btn-info"><?=Yii::$app->params['problem_status'][$model->status]?></span>

                                    <?php elseif ($model->status == 3): ?>

                                        <span class="btn btn-danger"><?=Yii::$app->params['problem_status'][$model->status]?></span>

                                    <?php elseif ($model->status == 4): ?>

                                        <span class="btn btn-success"><?=Yii::$app->params['problem_status'][$model->status]?></span>

                                    <?php elseif ($model->status == 5): ?>

                                        <span class="btn btn-primary"><?=Yii::$app->params['problem_status'][$model->status]?></span>

                                    <?php endif; ?>
                                </td>
                            </tr>

                            <?php if($model->status == 5):?>

                                <tr>
                                    <th>Amal : </th>
                                    <td><a href="<?=\yii\helpers\Url::to(['user/problem-accept','id' => $model->id])?>" class="btn btn-success">Hal qilindi</a> <a href="<?=\yii\helpers\Url::to(['user/problem-decline','id' => $model->id])?>" class="btn btn-danger">Hal qilinmadi</a></td>
                                </tr>

                            <?php endif; ?>

                            </tbody>
                        </table>

                        <div>
                            <h3>Muammoga javob yozish</h3>
                            <?php $form = ActiveForm::begin([
                                'id' => 'register-form'
                            ]); ?>

                            <div class="col-lg-12">
                                <?= $form->field($model, 'deputat_answer')->textarea(['autofocus' => true,'rows'=>6]) ?>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <?= Html::submitButton('Javob yuborish', ['class' => 'btn btn-primary w-100', 'name' => 'login-button']) ?>
                                </div>
                            </div>


                            <?php ActiveForm::end(); ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="user_image">
                            <img src="/images/user.png" alt="" style="width: 100%">
                        </div>
                        <p class="text-center"><?=$user->username?>, Xush kelibsiz</p>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

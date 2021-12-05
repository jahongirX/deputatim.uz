<?php

/* @var $this yii\web\View */

$this->title = 'Deputatim.uz - Deputatlarning reyting baholash tizimi.';
?>

<div class="row">

    <div class="col-md-8">

        <div class="card">
            <div class="card-body">

                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A52b2ecb176611f5c1d21237f4dcf62520e7df78784f98b0c65f7be5580c64571&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>

            </div>
        </div>

    </div>

    <div class="col-md-4 ">

        <div class="card mb-3">

            <div class="card-body">

                <form action="">
                    <div class="input_item mb-3">
                        <label for="region" class="form-label">Viloyat</label>
                        <select name="" id="region" class="form-control">
                            <option value="1">Surxondaryo</option>
                        </select>
                    </div>
                    <div class="input_item mb-3">
                        <label for="region" class="form-label">Shahar/Tuman</label>
                        <select name="" id="region" class="form-control">
                            <option value="1">Termiz shahri</option>
                        </select>
                    </div>
                    <div class="input_item">
                        <button class="btn btn-primary w-100">Izlash</button>
                    </div>
                </form>

            </div>

        </div>

        <div class="card">
            <div class="card-body">

                <ul class="deputats">
                    <?php if(!empty($models)): ?>
                        <?php foreach ($models as $model): ?>
                            <a class="list-group-item deputat_item" href="<?=\yii\helpers\Url::to(['deputat/view','id'=>$model->id])?>">
                                <div class="deputat_image">
                                    <img src="images/user.png" alt="">
                                </div>
                                <div class="deputat_info">
                                    <div class="name"><?=$model->fio?></div>
                                    <div class="okrug badge bg-danger"><?=$model->okrug?> - Okrug</div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>


                </ul>

            </div>
        </div>

    </div>

</div>

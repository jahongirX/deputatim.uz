<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<section class="breadcrumb_block">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::home()?>">Asosiy</a></li>
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::home()?>">Deputatlar</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$model->fio?></li>
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

                        <h3><?=$model->fio?></h3>

                        <table class="mb-3 table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th>Fio: </th>
                                <td><?=$model->fio?></td>
                            </tr>
                            <tr>
                                <th>Viloyat: </th>
                                <td>Surxondaryo</td>
                            </tr>

                            <tr>
                                <th>Tuman/Shahar </th>
                                <td>Termiz shahri</td>
                            </tr>

                            <tr>
                                <th>Okrug</th>
                                <td><?=$model->okrug?></td>
                            </tr>

                            <tr>
                                <th>Jami muammolar soni</th>
                                <td><?=$model->problems?></td>
                            </tr>

                            <tr>
                                <th>Hal qilingan muammolar soni</th>
                                <td><?=$model->solved?></td>
                            </tr>

                            <tr>
                                <th>Kontaktlar</th>
                                <td><?=$model->contacts?></td>
                            </tr>

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

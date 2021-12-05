<section class="breadcrumb_block">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::home()?>">Asosiy</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil</li>
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

                        <h3>Men yuborgan muammolar</h3>

                        <table class="table table-striped table-bordered">
                            <thead class="table-success">
                                <th>#</th>
                                <th>Muammo sarlavhasi</th>
                                <th>status</th>
                            </thead>
                            <tbody>
                                <?php if(!empty($myProblems)): ?>
                                    <?php $i = 1; foreach ($myProblems as $problem): ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><a href="<?=\yii\helpers\Url::to(['user/edit-problem','id' => $problem->id])?>"><?=$problem->title?></a></td>
                                            <td>

                                                <?php if ($problem->status == 1): ?>

                                                    <span class="btn btn-warning"><?=Yii::$app->params['problem_status'][$problem->status]?></span>

                                                <?php elseif ($problem->status == 2): ?>

                                                    <span class="btn btn-info"><?=Yii::$app->params['problem_status'][$problem->status]?></span>

                                                <?php elseif ($problem->status == 3): ?>

                                                    <span class="btn btn-danger"><?=Yii::$app->params['problem_status'][$problem->status]?></span>

                                                <?php elseif ($problem->status == 4): ?>

                                                    <span class="btn btn-success"><?=Yii::$app->params['problem_status'][$problem->status]?></span>

                                                <?php elseif ($problem->status == 5): ?>

                                                    <span class="btn btn-primary"><?=Yii::$app->params['problem_status'][$problem->status]?></span>

                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                <?php else: ?>
                                    <tr class="alert alert-warning" >
                                        <th colspan="3">Siz tomondan hech qanday muammo qo'shilmagan! Iltimos, muammongiz mavjud bo'lsa, bizga yuboring!</th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

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
                        <p>
                            <a href="<?=\yii\helpers\Url::to(['user/add-problem'])?>" class="btn btn-success w-100">
                                Muammo joylash
                            </a>
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

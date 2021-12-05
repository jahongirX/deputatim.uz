<header class="mb-5">
    <nav class="bg-primary py-2">
        <div class="container">
            <div class="row justify-content-between w-100">

                <div class="col-md-6">
                    <a class="logo" href="<?=\yii\helpers\Url::home()?>">Deputatim.uz</a>
                </div>

                <div class="col-md-6 text-right">
                    <?php if(empty($user)): ?>
                        <a class="btn btn-success" href="<?=\yii\helpers\Url::to(['user/sign-up'])?>">Ro'yxatdan o'tish</a>
                        <a class="btn btn-secondary" href="<?=\yii\helpers\Url::to(['user/login'])?>">Tizimga kirish</a>

                    <?php else: ?>

                        <?php if($user->status == 2000): ?>

                            <a href="<?=\yii\helpers\Url::to(['user/profile'])?>" class="btn btn-info">Profil,<?=$user->username?></a>
                            <a href="<?=\yii\helpers\Url::to(['user/add-problem'])?>" class="btn btn-success">Muammo joylash</a>
                            <a href="<?=\yii\helpers\Url::to(['user/logout'])?>" class="btn btn-danger">Chiqish</a>

                        <?php else: ?>

                            <a href="<?=\yii\helpers\Url::to(['user/deputat'])?>" class="btn btn-info">Profil,<?=$user->username?></a>
                            <a href="<?=\yii\helpers\Url::to(['user/deputat'])?>" class="btn btn-warning">Kelib tushgan muammolar</a>
                            <a href="<?=\yii\helpers\Url::to(['user/logout'])?>" class="btn btn-danger">Chiqish</a>

                        <?php endif;?>

                    <?php endif; ?>
                </div>

            </div>

        </div>
    </nav>
</header>
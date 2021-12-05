<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

$actionName = Inflector::camel2id(StringHelper::basename($generator->modelClass));

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::to(['/admin'])?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=\yii\helpers\Url::to(["/admin/{$actionName}"])?>"><?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?></a></li>
                    <li class="breadcrumb-item active"><?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?> <?=Yii::$app->controller->action->id?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

    <?= "<?php " ?>$form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-8">

            <div class="card">

                <div class="card-body">

                    <?php foreach ($generator->getColumnNames() as $attribute) {
                        if (in_array($attribute, $safeAttributes)) {
                            echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
                        }
                    } ?>

                </div>

            </div>

        </div>
        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                </div>

            </div>

        </div>

    <div class="form-group">
        <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Save') ?>, ['class' => 'btn btn-success']) ?>
    </div>

    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>

    </div>

</section>

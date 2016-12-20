<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Items */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <p>
                    <?php 
                        $src = str_replace('url=', 'src=', explode(' ', $model->enclosure)[0]);
                        echo "<img class=\"img-responsive\" " . $src . " />";
                    ?>
                </p>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'description')->textarea(['rows' =>16]) ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>

    

    <?php ActiveForm::end(); ?>

</div>

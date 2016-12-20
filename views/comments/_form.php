<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($newComment, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($newComment, 'items_id')->hiddenInput(['value' => 661])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($newComment->isNewRecord ? 'Create' : 'Update', ['class' => $newComment->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

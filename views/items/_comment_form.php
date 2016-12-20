<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<h2>Add new comment</h2>

<div class="comments-form">

    <?php 
      Pjax::begin();
      $form = ActiveForm::begin(['action' => '/web/items/add_comment?id='.$items_id]);
    ?>

    <?= $form->field($newComment, 'body')->textarea(['rows' => 5])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($newComment->isNewRecord ? 'Add comment' : 'Update', ['class' => ($newComment->isNewRecord ? 'btn btn-success' : 'btn btn-primary'), 'data-pjax' => 1]) ?>
    </div>

    <?php 
      ActiveForm::end();
      Pjax::end();
    ?>

</div>
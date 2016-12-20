<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Items */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-view">

    <h1><?= $model->title; ?></h1>
    <p>
        <?php 
            $src = str_replace('url=', 'src=', explode(' ', $model->enclosure)[0]);
            echo "<img class=\"img-responsive\" " . $src . " />";
        ?>
    </p>
    <p>
        <?= 
            $model->description;
        ?>
    </p>

    <p>
        <?php 
            echo "<a href=\"".$model->link."\" >NASA original article link</a>";
        ?>
    </p>

    <p>
        <?= $this->render('_comment_form', [
            'newComment' => $newComment,
            'items_id' => $model->id,
        ]) ?>
    </p>

    <h2>Comments for the picture:</h2>

    <div class="comments-index">

        <p>
            <ul>
            <?php
                foreach ($comments as $comment) {
                    echo "<li>".$comment->body."</li>";
                }
            ?>
            </ul>
        </p>
</div>

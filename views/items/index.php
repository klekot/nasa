<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\Helper;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">

    <h1><?= $items[0]->source ?></h1>

    <p><a class="btn btn-lg btn-success" href="/web/site/update_feed">Refresh list</a></p>

    <table class="table table-responsive">
        <thead>
            <th>ID</th>
            <th>Actions</th>
            <th>Title</th>
            <th>Publication date</th>
            <th>Upload date</th>
            <th>Comments</th>
        </thead>
        <tbody>
        <?php
            foreach ($items as $item) {
                Pjax::begin(['id' => 'pjax-container']);
                echo "<tr>".
                        "<td>".
                            $item->id.
                        "</td>".
                        "<td>".
                            "<a href=\"update?id=$item->id\">".
                                "Edit ".
                            "</a>".
                            "or ".
                            "<a data-confirm=\"Are you sure?\" href=\"delete?id=$item->id\" data-pjax=\"1\">".
                                "Delete".
                            "</a>".
                        "</td>".
                        "<td>".
                            "<a href=\"view?id=$item->id\">".
                                $item->title.
                            "</a>".
                        "</td>".
                        "<td>".
                            "<a href=\"$item->link\">".
                                date("d.m.y g:i", strtotime($item->publication_date)).
                            "</a>".
                        "</td>".
                        "<td>".
                            date("d.m.y g:i", strtotime($item->upload_date)).
                        "</td>".
                        "<td>".
                            Helper::getComment_count($item->id).
                        "</td>".
                     "</tr>";
                Pjax::end();
            }
        ?>
        </tbody>
    </table>
    
</div>

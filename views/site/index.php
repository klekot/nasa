<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>NASA RSS FEED</h1>
        <p align="center">
          <?php $src = "src=\"http://www.nasa.gov/sites/default/files/thumbnails/image/ngc6357.jpg\""; ?>
          <?= "<img class=\"img-responsive\" " . $src . " style=\"max-width: 400px;\" />"; ?>
        </p>
        <p><a class="btn btn-lg btn-success" href="/web/items/index">Get list</a></p>
    </div>

</div>

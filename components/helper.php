<?php
namespace app\components;

use app\models\Comments;

class Helper
{
    public static function getComment_count($items_id)
    {
        return Comments::find()->where(['items_id' => $items_id])->count();
    }
}
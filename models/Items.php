<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property integer $id
 * @property string $title
 * @property string $publication_date
 * @property string $upload_date
 * @property string $link
 * @property string $description
 * @property string $enclosure
 * @property string $guid
 * @property string $source
 *
 * @property Comments[] $comments
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['publication_date', 'upload_date'], 'safe'],
            [['description'], 'string'],
            [['title', 'link', 'enclosure', 'guid', 'source'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'publication_date' => 'Publication Date',
            'upload_date' => 'Upload Date',
            'link' => 'Link',
            'description' => 'Description',
            'enclosure' => 'Enclosure',
            'guid' => 'Guid',
            'source' => 'Source',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['items_id' => 'id']);
    }

    public static function parseRssFrom($rss)
    {
        date_default_timezone_set('Europe/Moscow');
        $date = date('d.m.Y H:i:s');

        $xml = @simplexml_load_file( $rss);
        if($xml===false) die('Error parse RSS: '.$rss);
        foreach($xml->xpath('//item') as $item){
            $model = new Items();
            $model->title = (string) $item->title;
            $model->link = (string) $item->link;
            $model->description = (string) $item->description;
            $temp_array = array();
            foreach ($item->enclosure->attributes() as $key => $value) {
                $temp_array[] = $key . "=\"" . $value . "\"";
            }
            $model->enclosure = (string) implode(' ', $temp_array);
            $model->guid = (string) $item->guid;
            $model->source = (string) $item->source;
            $model->publication_date = Yii::$app->formatter->asDatetime($item->pubDate, 'yyyy-MM-dd HH:mm:ss');
            $model->upload_date = Yii::$app->formatter->asDatetime($date, 'yyyy-MM-dd HH:mm:ss');
            if(!Items::find()->where(['link' => $item->link])->one()) $model->save();
        }
    }
}

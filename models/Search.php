<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Search extends ActiveRecord
{
    public $query = '';

    public function getCount()
    {
        $count = Yii::$app->db->createCommand($this->getQueryString(true))
            ->bindValue(':query', '%' . $this->query . '%')->queryScalar();
        return $count;
    }

    public function getQueryString($count = false)
    {
        $attribute = "t.*";
        if ($count)
            $attribute = 'COUNT(*)';
        $sql = "SELECT " . $attribute . " FROM 
                (
                    SELECT 'tbl_post' as table_name, id, title, content FROM tbl_post
                ) AS t WHERE t.title LIKE :query OR t.content LIKE :query ORDER BY id DESC
               ";
        return $sql;
    }

    public function getUrl($table, $id)
    {
        $url = "";
        switch ($table) {
            case "post":
                $url = Post::findOne($id)->getFrontendUrl();
                break;
            default:
                $url = Post::findOne($id)->getFrontendUrl();
        }
        return $url;
    }
}

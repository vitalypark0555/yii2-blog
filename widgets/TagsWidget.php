<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 09.11.2018
 * Time: 0:01
 */

namespace app\widgets;


use app\models\Tag;
use yii\base\Widget;

class TagsWidget extends Widget
{
    public $template = 'default';

    public function run()
    {
        $tags = Tag::find()->orderBy('frequency')->all();
        return $this->render('tags/' . $this->template, [
            'tags' => $tags,
        ]);
    }
}
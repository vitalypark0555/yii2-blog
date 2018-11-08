<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 09.11.2018
 * Time: 0:06
 */

namespace app\widgets;


use app\models\Comment;
use yii\base\Widget;

class RecentCommentsWidget extends Widget
{
    public $template = 'default';
    public $limit = 4;

    public function run()
    {
        $recentComments = Comment::find()->orderBy('id DESC')->limit($this->limit)->all();
        return $this->render('recent-comments/' . $this->template, [
            'recentComments' => $recentComments,
        ]);
    }
}
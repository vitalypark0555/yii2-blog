<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 03.10.2018
 * Time: 18:58
 */

namespace app\widgets;


use app\models\Post;
use yii\base\Widget;

class RecentPostsWidget extends Widget
{
    public $template = 'default';
    public $limit = 4;

    public function run()
    {
        $recentPosts = Post::find()->orderBy('id DESC')->limit($this->limit)->all();
        return $this->render('recent-posts/' . $this->template, [
            'recentPosts' => $recentPosts,
        ]);
    }
}
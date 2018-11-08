<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 09.11.2018
 * Time: 0:15
 */

namespace app\widgets;


use app\models\Category;
use yii\base\Widget;

class CategoriesWidget extends Widget
{
    public $template = 'default';

    public function run()
    {
        $categories = Category::find()->orderBy('name')->all();
        return $this->render('categories/' . $this->template, [
            'categories' => $categories,
        ]);
    }
}
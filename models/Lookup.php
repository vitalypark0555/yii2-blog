<?php

namespace app\models;

/**
 * This is the model class for table "{{%tbl_lookup}}".
 *
 * @property int $id
 * @property string $name
 * @property int $code
 * @property string $type
 * @property int $position
 */
class Lookup extends \yii\db\ActiveRecord
{
    private static $_items = array();

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_lookup}}';
    }

    public static function items($type)
    {
        if (!isset(self::$_items[$type]))
            self::loadItems($type);
        return self::$_items[$type];
    }

    private static function loadItems($type)
    {
        self::$_items[$type] = [];
        $models = self::find()->where(['type' => $type])->all();
        foreach ($models as $model)
            self::$_items[$type][$model->code] = $model->name;
    }

    public static function item($type, $code)
    {
        if (!isset(self::$_items[$type]))
            self::loadItems($type);
        return isset(self::$_items[$type][$code]) ? self::$_items[$type][$code] : false;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'type', 'position'], 'required'],
            [['code', 'position'], 'integer'],
            [['name', 'type'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'type' => 'Type',
            'position' => 'Position',
        ];
    }
}

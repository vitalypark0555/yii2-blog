<?php

namespace app\models;

/**
 * This is the model class for table "{{%tbl_tag}}".
 *
 * @property int $id
 * @property string $name
 * @property int $frequency
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_tag}}';
    }

    public static function array2string($tags)
    {
        return implode(', ', $tags);
    }

    public static function getTagNames()
    {
        $tags = self::find()->all();
        $tagNames = [];
        foreach ($tags as $tag) {
            $tagNames[] = $tag->name;
        }
        return $tagNames;
    }

    public static function updateFrequency($oldTags, $newTags)
    {
        $oldTags = self::string2array($oldTags);
        $newTags = self::string2array($newTags);
        self::addTags(array_values(array_diff($newTags, $oldTags)));
        self::removeTags(array_values(array_diff($oldTags, $newTags)));
    }

    public static function string2array($tags)
    {
        return preg_split('/\s*,\s*/', trim($tags), -1, PREG_SPLIT_NO_EMPTY);
    }

    public static function addTags($tags)
    {
        Tag::updateAllCounters(['frequency' => 1], ['name' => $tags]);
        foreach ($tags as $name) {
            if (!self::findOne(['name' => $name])) {
                $tag = new Tag;
                $tag->name = $name;
                $tag->frequency = 1;
                $tag->save();
            }
        }
    }

    public static function removeTags($tags)
    {
        if (empty($tags))
            return;
        Tag::deleteAll(['name' => $tags]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['frequency'], 'integer'],
            [['name'], 'string', 'max' => 128],
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
            'frequency' => 'Frequency',
        ];
    }
}

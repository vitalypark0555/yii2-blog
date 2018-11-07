<?php

namespace app\models;

/**
 * This is the model class for table "{{%tbl_comment}}".
 *
 * @property int $id
 * @property string $content
 * @property int $status
 * @property int $create_time
 * @property string $author
 * @property string $email
 * @property string $url
 * @property int $post_id
 *
 * @property Post $post
 */
class Comment extends \yii\db\ActiveRecord
{
    const STATUS_PENDING = 1;
    const STATUS_APPROVED = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'author', 'email'], 'required'],
            [['content'], 'string'],
            [['status', 'create_time', 'post_id'], 'integer'],
            [['author', 'email', 'url'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'author' => 'Author',
            'email' => 'Email',
            'url' => 'Website',
            'post_id' => 'Post',
        ];
    }

    public function approve()
    {
        $this->status = Comment::STATUS_APPROVED;
        $this->save();
    }

    public static function pendingCommentCount()
    {
        return self::find()->where(['status' => self::STATUS_PENDING])->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord)
                $this->create_time = time();
            return true;
        } else
            return false;
    }
}

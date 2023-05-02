<?php

namespace frontend\resources\models;

class Post extends \common\models\Post
{
    public function fields()
    {
        return ['id','title', 'body'];
    }

    public function extraFields()
    {
        return ['created_at', 'updated_at', 'created_by', 'comments'];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CommentQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }

}
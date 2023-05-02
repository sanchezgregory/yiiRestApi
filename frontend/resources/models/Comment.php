<?php

namespace frontend\resources\models;

class Comment extends \common\models\Comment
{
    public function fields()
    {
        return ['id','post_id','title', 'body'];
    }

    public function extraFields()
    {
        return ['post','created_at', 'updated_at', 'created_by'];
    }

    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }

}
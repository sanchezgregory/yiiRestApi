<?php

namespace frontend\controllers;

use frontend\resources\models\Comment;
use yii\rest\ActiveController;

class CommentController extends ActiveController
{
    public $modelClass = Comment::class;


}
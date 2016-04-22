<?php

namespace api\controllers;

use yii\rest\ActiveController;

class BookController extends ActiveController
{
    public $modelClass = 'api\v1\models\Book';
}
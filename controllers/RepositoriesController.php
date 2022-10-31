<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class RepositoriesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'usersData' => Yii::$app->cache->get('usersData')
        ]);
    }

}
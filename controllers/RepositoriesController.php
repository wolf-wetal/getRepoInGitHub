<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class RepositoriesController extends Controller
{
    public function actionIndex()
    {
        //$id = Yii::$app->cache->get('id');
/*        $users_id = Yii::$app->cache->get('users_id');
        $url_repository = Yii::$app->cache->get('url_repository');
        $date = Yii::$app->cache->get('date');*/
        return $this->render('index', [
            'usersData' => Yii::$app->cache->get('usersData')
        ]);
    }

}
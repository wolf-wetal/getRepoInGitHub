<?php

namespace app\controllers;

use app\models\Users;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UsersController extends Controller
{

    public function actionIndex()
    {
        $users = Users::find()->all();

        return $this->render('index', [
            'users' => $users,
        ]);
    }

    public function actionUpdate()
    {
        $pos = $this->request->post();

        $user = Users::findOne($pos['id']);

        if (!isset($user)) {
            throw new NotFoundHttpException("Не найден такой пользователь");
        }

        $user->scenario = 'update';

        if ($this->request->isPost && $user->load($this->request->post()) && $user->save()) {
            return $this->redirect('index');
        }

        $user->updateAttributes(['nickname' => $pos['nickname']]);

        return $this->render('update', [
            'user' => $user
        ]);
    }


}
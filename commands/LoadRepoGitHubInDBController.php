<?php

namespace app\commands;

use app\models\Repositories;
use app\models\Users;
use DateTime;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\db\Query;
use yii\httpclient\Client;

class LoadRepoGitHubInDBController extends Controller
{
    /**
     *
     */
    public function actionIndex()
    {
        try {


            $users = $this->getUsers();

            foreach ($users as $user) {

                $userGitHub = $this->requestC($user['nickname']);

                foreach ($userGitHub as $data) {

                    $dataUser[] = [
                        'url_repository' => $data['html_url'],
                        'date' => $data['updated_at'],
                        'user_id' => $user['id']
                    ];

                }

            }

            $this->saveData($dataUser);

            foreach ($this->getDataDB() as $getData) {

                $dataUserSet[] = [
                    'nickname' => $this->getUserN($getData['users_id'])['nickname'],
                    'url_repository' => $getData['url_repository'],
                    'date' => $getData['date'],
                ];

            }

            Yii::$app->cache->flush();
            Yii::$app->cache->set('usersData', $dataUserSet);

            return ExitCode::OK;

        } catch (\Exception $e) {
            echo $e;
            return ExitCode::UNSPECIFIED_ERROR;
        }
    }

    public function requestC($user)
    {
        $client = new Client();
        $url = 'https://api.github.com/users/' . $user . '/repos?per_page=10&sort=updated';
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl($url)
            ->setOptions([
                'userAgent' => 'PostmanRuntime/7.29.2',

            ])
            ->send();
        return $response->data;

    }

    public function getUsers()
    {
        return Users::find()
            ->asArray()
            ->all();

    }

    public function getUserN($id)
    {
        return Users::findOne($id);

    }

    public function saveData($dataUser)
    {
        foreach ($dataUser as $data) {
            $repository = new Repositories();
            $transaction = Repositories::getDb()->beginTransaction();
            try {
                $repository->users_id = $data['user_id'];
                $repository->url_repository = $data['url_repository'];
                $repository->date = date_format(new DateTime($data['date']), 'Y-m-d H:i:s');
                $repository->save();
                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
                echo $e;
            }
        }
    }

    public function getDataDB()
    {
        return Repositories::find()
            ->asArray()
            ->orderBy('date DESC')
            ->limit(10)
            ->all();
    }

}

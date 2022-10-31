<?php

namespace app\models;

use yii\db\ActiveRecord;

class Repositories extends ActiveRecord
{

    public static function tableName()
    {
        return parent::tableName();
    }

    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id' => 'users_id']);
    }

}
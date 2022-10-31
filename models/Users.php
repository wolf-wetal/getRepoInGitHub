<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель таблицы users.
 *
 * @property int $id
 * @property string $nickname
 */
class Users extends ActiveRecord
{

    public static function tableName()
    {
        return parent::tableName();
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'nickname' => 'nickname'
        ];
    }

    public function rules()
    {
        return [
            ['nickname', 'required'],
            ['nickname', 'string']
        ];
    }

}
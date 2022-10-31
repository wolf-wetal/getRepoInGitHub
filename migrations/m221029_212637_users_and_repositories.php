<?php

use yii\db\Schema;
use yii\db\Migration;


/**
 * Class m221029_212637_users_and_repositories
 */
class m221029_212637_users_and_repositories extends Migration
{
    /**
     * @var mixed
     */
    private $tableUsers = 'users';
    private $tableRepositories = 'repositories';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable($this->tableUsers, [
            'id' => 'pk',
            'nickname' => Schema::TYPE_STRING . ' NOT NULL',
        ]);

        $this->createTable($this->tableRepositories, [
            'id' => 'pk',
            'users_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'url_repository' => Schema::TYPE_STRING . ' NOT NULL',
            'date' => Schema::TYPE_DATE . ' NOT NULL',

        ]);

        $this->createIndex('inx_user_id', $this->tableUsers, 'id', true);
        $this->createIndex('inx_repository_id', $this->tableRepositories, 'id', true);

        $this->batchInsert($this->tableUsers, ['nickname'], [
                ['krsriq'],
                ['barryvdh'],
                ['sgolemon'],
                ['phoerious'],
                ['naderman'],
                ['patrickbrouwers'],
                ['sebastianbergmann'],
                ['thtg88'],
                ['bakerkretzmar'],
                ['stayallive'],
            ]
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableUsers);
        $this->dropTable($this->tableRepositories);
    }

}

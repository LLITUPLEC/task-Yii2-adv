<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task`.
 */
class m191128_165008_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey()->comment('Порядковый номер'),
            'title' => $this->string(),
            'created_at' => $this->string()->comment('Дата начала'),
            'updated_at' => $this->string()->comment('Дата окончания'),
            'user_id' => $this->integer()->comment('Создатель задачи'),
            'description' => $this->text()->comment('Описание события'),
        ]);

        // создание реляционной связи на пользователей
        $this->addForeignKey(
            'fk_task_user',
            'task', 'user_id',
            'user', 'id',
            'cascade'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_task_user', 'task');
        $this->dropTable('task');
    }
}

<?php


namespace frontend\models;


use common\models\User;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class - Task(задача)
 *
 * @package frontend\models
 *
 * @property int $id [int(11)]  Порядковый номер
 * @property string $title [varchar(255)]  Название задачи
 * @property int $user_id [int(11)]  Создатель задачи
 * @property string $description Описание задачи
 *
 * @property-read User $user
 *
 * @property int $created_at [int(11)]
 * @property int $updated_at [int(11)]
 */
class Task extends ActiveRecord
{
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],

            [['title', 'description'], 'string'],
            [['title'], 'string', 'min' => 2, 'max' => 80],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '#',
            'title' => 'Название',
            'user_id' => 'Пользователь',
            'description' => 'Описание события',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата последнего изменения',
        ];
    }

    /**
     * Магический метод для получение зависимого объекта из БД
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
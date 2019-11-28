<?php

/**
 * @var $this yii\web\View
 * @var $model Task
 */

use frontend\models\Task;
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

    <div class="row">
        <h1>Просмотр задачи</h1>

        <div class="form-group pull-right">
            <?= Html::a('К списку', ['task/index'], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Изменить', ['task/update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            // activity.id - пример перезаписи названия столбца
            'label' => 'Порядковый номер',
            'attribute' => 'id',
        ],
        [
            // activity.id - пример перезаписи значения
            'label' => 'Порядковый номер',
            'value' => function (Task $model) {
                return "# {$model->id}";
            },
        ],
        //'id',
        'title',
        //'user_id',
        [
            'label' => 'Имя создателя',
            'attribute' => 'user.username', // авто-подключение зависимостей
            // $model->user->username
        ],
        'description',
        'created_at:date',
        'updated_at:date',
    ],
]); ?>
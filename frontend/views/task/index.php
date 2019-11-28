<?php

/* @var $this yii\web\View */

use frontend\models\Task;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

$columns = [
    [
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
        'attribute' => 'user_id', // авто-подключение зависимостей
        'value' => function (Task $model) {
            return $model->user->username;
        }
        // $model->user->username
    ],
    'created_at:date',
];

if (Yii::$app->user->can('user')) {
    $columns[] = [
        'class' => ActionColumn::class,
        'header' => 'Операции',
    ];
}

?>

    <div class="row">
        <h1>Список задач</h1>

        <div class="form-group pull-right">
            <?= Html::a('Создать', ['task/update'], ['class' => 'btn btn-success pull-right']) ?>
        </div>
    </div>

<?= GridView::widget([
    'dataProvider' => $provider, // $provider->getModels() [....]
    'columns' => $columns,
]) ?>
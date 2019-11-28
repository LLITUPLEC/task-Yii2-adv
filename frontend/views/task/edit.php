<?php

use yii\helpers\Html; ?>

<div class="row">
    <h1><?= Html::encode($model->id ? $model->title : 'Новая задача') ?></h1>

    <div class="form-group pull-right">
        <?= Html::a('Отмена', ['task/index'], ['class' => 'btn btn-info']) ?>
    </div>
</div>

<?= $this->render('_form', [
    'model' => $model,
]) ?>


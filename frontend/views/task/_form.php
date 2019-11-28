<?php

use frontend\models\Task;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model Task
 * @var $form ActiveForm
 */

?>
<div class="activity-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['autocomplete' => 'off']) ?>
    <?php //= $form->field($model, 'user_id')->textInput(['autocomplete' => 'off']) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>

    <div class="form-group" style="margin-top: 40px;">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

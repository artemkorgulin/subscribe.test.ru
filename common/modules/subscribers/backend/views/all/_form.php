<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\subscribers\common\models\Subscribers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subscribers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $events = [];
    $all = \common\modules\subscribers\common\models\Events::find()->all();
    foreach ($all as $p) $events[$p->id] = $p->name;
    ?>

    <?= $form->field($model, 'event')->dropDownList($events)?>

    <?= $form->field($model, 'client')->textInput(['maxlength' => true]) ?>

    <?php
    $blocked = [];
    $allblockded = \common\modules\subscribers\common\models\Blocked::find()->all();
    foreach ($allblockded as $p) $blocked[$p->id] = $p->name;

    ?>

    <?= $form->field($model, 'blocked')->dropDownList($blocked)?>

    <?= $form->field($model, 'date_create')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_update')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

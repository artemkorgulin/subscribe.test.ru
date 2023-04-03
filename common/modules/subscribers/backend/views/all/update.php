<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\subscribers\common\models\Subscribers */

$this->title = 'Редактирование: ' . $model->client;
$this->params['breadcrumbs'][] = ['label' => 'Подписчики', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->client, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="subscribers-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

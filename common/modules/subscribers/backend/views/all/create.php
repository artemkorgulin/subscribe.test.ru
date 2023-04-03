<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\subscribers\common\models\Subscribers */

$this->title = 'Добавление подписчика';
$this->params['breadcrumbs'][] = ['label' => 'Подписчики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscribers-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

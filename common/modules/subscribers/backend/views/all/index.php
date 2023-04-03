<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\subscribers\backend\models\SubscribersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подписчики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscribers-index">

    <p>
        <?= Html::a('Добавить подписчика', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'eventName',
                'value' => function( $event )
                {
                    return $event->events->name ?? '-';
                },
            ],
            'client',
            [
                'attribute' => 'blockedName',
                'value' => function( $blocked )
                {
                    return $blocked->blockeds->name ?? '-';
                },
            ],
            'date_create',
            'date_update',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php
namespace common\modules\subscribers\backend;
use common\modules\subscribers\backend\assets\BackendAsset;

class SusbscribersModule extends \common\modules\subscribers\common\SusbscribersModule
{
    /**
     * Конфигуратор меню админ-панели
     * @return array
     */
    public static function backend()
    {
        return [
            'title' => 'Подписчики',
            'asset' => BackendAsset::className(),
            'icon'  => 'icon.png',
            'tools' => [
                'all'     => ['title' => 'Список подписчиков', 'visible' => true]
            ],
        ];
    }
}
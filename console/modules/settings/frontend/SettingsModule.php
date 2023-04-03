<?php
namespace common\modules\settings\frontend;
use common\modules\settings\common\models\Settings;
use yii\base\Module;

class SettingsModule extends Module
{
    public function init()
    {
        if ($all = Settings::find()->all()) foreach ($all as $setting) {
            /** @var Settings $setting */
            \Yii::$app->params[$setting->const_name] = $setting->value;
        }
    }
}
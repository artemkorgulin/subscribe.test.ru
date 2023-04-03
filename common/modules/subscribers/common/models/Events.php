<?php

namespace common\modules\subscribers\common\models;

use Yii;

/**
 * This is the model class for table "{{%events}}".
 *
 * @property integer $id
 * @property string $key
 * @property string $hint
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%events}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'hint'], 'string', 'max' => 255],
            [['key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'hint' => 'Hint',
        ];
    }
}

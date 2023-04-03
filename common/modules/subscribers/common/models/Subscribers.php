<?php

namespace common\modules\subscribers\common\models;

use Yii;

/**
 * This is the model class for table "subscribers".
 *
 * @property integer $id
 * @property integer $type_id
 * @property string $event
 * @property string $client
 * @property string $blocked
 * @property string $date_create
 * @property string $date_update
 *
 * @property UserProfile[] $userProfiles
 */
class Subscribers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscribers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client','date_create','date_update'], 'string'],
            [['type_id'], 'integer'],
            [['client','event','blocked'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Тип',
            'eventName' => 'Событие',
            'event' => 'Событие',
            'client' => 'Получатель',
            'blockedName' => 'Блокирован',
            'blocked' => 'Блокирован',
            'date_create' => 'Дата создания',
            'date_update' => 'Дата обновления',
        ];
    }

    public function getEventNameString($withEmpty = false)
    {
        $arr = [
            12  => 'Регистрация',
            13  => 'Верификация',
            14  => 'Вход',
            15  => 'Отправка сообщения',
            16 => 'Выход'
        ];

        $event = '';
        if($arr[$withEmpty]) {
            $event = $arr[$withEmpty];
        } else {
            $event = 0;
        }
        return $event;
    }

    public function getBlockedNameString($withEmpty = false)
    {
        $arr = [
            1  => 'Да',
            2  => 'Нет'
        ];

        $blocked = '';
        if($arr[$withEmpty]) {
            $blocked = $arr[$withEmpty];
        } else {
            $blocked = 0;
        }
        return $blocked;
    }

    public function getEventType($withEmpty = false)
    {
        $arr = [
            0  => 'Регистрация',
            7  => 'Верификация',
            8  => 'Вход',
            9  => 'Отправка сообщения',
            10 => 'Выход'
        ];
        if (!$withEmpty) unset($arr[0]);
        return $arr;
    }

    public function getEventName() {
        return $this->event['name'];
    }

    public function getBlockedName() {
        return $this->blocked['name'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasOne(Events::className(), ['id' => 'event']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlockeds()
    {
        return $this->hasOne(Blocked::className(), ['id' => 'blocked']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfiles()
    {
        return $this->hasMany(UserProfile::className(), ['school_id' => 'id']);
    }
}

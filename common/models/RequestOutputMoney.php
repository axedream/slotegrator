<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "request_output_money".
 *
 * @property int $id
 * @property int|null $user_id Ссылка на пользователя
 * @property int|null $bonus_id Ссылка на тип бонуса
 * @property int|null $bonus_value Количество единиц бонусов
 * @property int|null $now Запрос исполняется
 * @property int|null $wait_now Запрос поставлен в ожидание на исполнение
 * @property int|null $started Запрос начал исполняться
 * @property string|null $status статус очереди
 * @property string|null $bank_status Статус операции банка
 * @property string|null $bank_message Сообщение банка
 * @property string|null $date_start Дата-время выполнения НАЧАЛО
 * @property string|null $date_stop Дата-время выполнения ОКОНЧАНИЕ
 */
class RequestOutputMoney extends \yii\db\ActiveRecord
{
    const STATUS_WAIT       = 'WAIT';
    const STATUS_IN_WORK    = 'WORK';
    const STATUS_CLOSE      = 'FINISH';

    /**
     * Получаем список статусов
     *
     * @return mixed
     * @throws \Exception
     */
    public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatusesArray(), $this->status);
    }

    /**
     * Статусы
     *
     * @return array
     */
    public static function getStatusesArray()
    {
        return [
            self::STATUS_WAIT => 'В ожидании',
            self::STATUS_IN_WORK => 'В работе',
            self::STATUS_CLOSE => 'Обработан',
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_output_money';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'bonus_id', 'bonus_value', 'now', 'wait_now', 'started'], 'integer'],
            [['bank_message'], 'string'],
            [['date_start', 'date_stop'], 'safe'],
            [['status', 'bank_status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'bonus_id' => 'Bonus ID',
            'bonus_value' => 'Bonus Value',
            'now' => 'Now',
            'wait_now' => 'Wait Now',
            'started' => 'Started',
            'status' => 'Status',
            'bank_status' => 'Bank Status',
            'bank_message' => 'Bank Message',
            'date_start' => 'Date Start',
            'date_stop' => 'Date Stop',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bonus_limit".
 *
 * @property int $id
 * @property int|null $bonus_id Ссылка на бонус
 * @property int|null $range_from Минимальное количество единиц получаемых бонусов
 * @property int|null $range_to Максимальное колличество единиц получаемых бонусов
 * @property int|null $is_active =1 Бонус доступен для получения
 */
class BonusLimit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bonus_limit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bonus_id', 'range_from', 'range_to', 'is_active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bonus_id' => 'Bonus ID',
            'range_from' => 'Range From',
            'range_to' => 'Range To',
            'is_active' => 'Is Active',
        ];
    }
}

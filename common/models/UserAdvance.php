<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_advance".
 *
 * @property int $id
 * @property int|null $user_id Ссылка на пользователя, таблицу user
 * @property int|null $count_ball_loyalty Текущее количество баллов лояльности
 * @property int|null $bonus_id Если = 0 бонус не получен, елси 1 = ссылка на таблицу user_bonus, -1 отказ от бонуса
 * @property int|null $count_money текущее колличество денег на счете
 */
class UserAdvance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_advance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'count_ball_loyalty', 'bonus_id', 'count_money'], 'integer'],
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
            'count_ball_loyalty' => 'Count Ball Loyalty',
            'bonus_id' => 'Bonus ID',
            'count_money' => 'Count Money',
        ];
    }
}

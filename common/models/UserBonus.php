<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_bonus".
 *
 * @property int $id
 * @property int|null $bonus_id Ссылка на бонус
 * @property int|null $bonus_value Количество единиц бонусов
 * @property int|null $user_id id пользователя, которому принадлежит бонус
 * @property string|null $type тип операции add-добавить del-списать
 */
class UserBonus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_bonus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bonus_id', 'bonus_value', 'user_id'], 'integer'],
            [['type'], 'string', 'max' => 255],
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
            'bonus_value' => 'Bonus Value',
            'user_id' => 'User ID',
            'type' => 'Type',
        ];
    }
}

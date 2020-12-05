<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bonus_actiont".
 *
 * @property int $id
 * @property int|null $bonus_id Ссылка на бонус
 * @property int|null $to_bonus_id Ссылка на бонус в который можно конвертировать, если 0 конвертировать нелья
 * @property float|null $to_convert_multiplier Множитель при конвертации
 * @property int|null $to_send_from Возможность совершить посылку до пользователя
 * @property int|null $to_send_bank Возможность совершить выплату на счет
 */
class BonusActiont extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bonus_actiont';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bonus_id', 'to_bonus_id', 'to_send_from', 'to_send_bank'], 'integer'],
            [['to_convert_multiplier'], 'number'],
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
            'to_bonus_id' => 'To Bonus ID',
            'to_convert_multiplier' => 'To Convert Multiplier',
            'to_send_from' => 'To Send From',
            'to_send_bank' => 'To Send Bank',
        ];
    }
}

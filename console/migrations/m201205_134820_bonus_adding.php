<?php

use yii\db\Migration;

/**
 * Class m201205_134820_bonus_adding
 */
class m201205_134820_bonus_adding extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //возможность совершать действия с бонусом
        $this->createTable('{{%bonus_actiont%}}',[
            'id' => $this->primaryKey(),
            'bonus_id' => $this->integer()->defaultValue(0)->comment('Ссылка на бонус'),
            'to_bonus_id'=>$this->integer()->defaultValue(0)->comment('Ссылка на бонус в который можно конвертировать, если 0 конвертировать нелья'),
            'to_convert_multiplier'=> $this->decimal(4,2)->defaultValue(1.00)->comment('Множитель при конвертации'),
            'to_send_from' => $this->boolean()->defaultValue(0)->comment('Возможность совершить посылку до пользователя'),
            'to_send_bank' => $this->boolean()->defaultValue(0)->comment('Возможность совершить выплату на счет'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bonus_actiont%}}');
    }

}

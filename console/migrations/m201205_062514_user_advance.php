<?php

use yii\db\Migration;

/**
 * Class m201205_062514_user_advance
 */
class m201205_062514_user_advance extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //расширение таблицы пользователей
        $this->createTable('{{%user_advance%}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->comment('Ссылка на пользователя, таблицу user'),
            'count_ball_loyalty' => $this->integer()->defaultValue(0)->comment('Текущее количество баллов лояльности'),
            'bonus_id' => $this->boolean()->defaultValue(0)->comment('Если = 0 бонус не получен, елси 1 = ссылка на таблицу user_bonus, -1 отказ от бонуса'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_advance%}}');
    }

}

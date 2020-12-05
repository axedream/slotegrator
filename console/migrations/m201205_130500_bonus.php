<?php

use yii\db\Migration;

/**
 * Class m201205_130500_bonus
 */
class m201205_130500_bonus extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //реестр бонусов пользователей
        $this->createTable('{{%user_bonus%}}', [
            'id' => $this->primaryKey(),
            'bonus_id' => $this->integer()->defaultValue(0)->comment('Ссылка на бонус'),
            'bonus_value' => $this->integer()->defaultValue(0)->comment('Количество единиц бонусов'),
        ]);

        //описание бонусов (сущность бонуса)
        $this->createTable('{{%bonus%}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->defaultValue('')->comment('Наименование бонуса'),
            'value_name' => $this->string()->defaultValue('')->comment('Единицы измерения бонусов'),
        ]);

        //лимиты на получения бонусов
        $this->createTable('{{%bonus_limit%}}', [
            'id' => $this->primaryKey(),
            'bonus_id' => $this->integer()->defaultValue(0)->comment('Ссылка на бонус'),
            'range_from' => $this->integer()->defaultValue(0)->comment('Минимальное количество единиц получаемых бонусов'),
            'range_to' => $this->integer()->defaultValue(1)->comment('Максимальное колличество единиц получаемых бонусов'),
            'is_active' => $this->boolean()->defaultValue(0)->comment('=1 Бонус доступен для получения'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_bonus%}}');
        $this->dropTable('{{%bonus%}}');
        $this->dropTable('{{%bonus_limit%}}');
    }

}

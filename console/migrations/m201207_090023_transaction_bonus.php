<?php

use yii\db\Migration;

/**
 * Class m201207_090023_transaction_bonus
 */
class m201207_090023_transaction_bonus extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //забыл добавить поле ссылку на пользователя бонусов :)
        $this->addColumn('{{%user_bonus%}}','user_id',$this->integer()->defaultValue(0)->comment('id пользователя, которому принадлежит бонус'));
        $this->addColumn('{{%user_bonus%}}','type',$this->string()->defaultValue('add')->comment('тип операции add-добавить del-списать'));

        //необходимо добавить общее текущее колличество денег на счете пользователя
        $this->addColumn('{{%user_advance%}}','count_money',$this->integer()->defaultValue(0)->comment('текущее колличество денег на счете'));




        //очередь запросов на вывод (по сути аналог работы очереди)
        $this->createTable('{{%request_output_money%}}',[
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->defaultValue(0)->comment('Ссылка на пользователя'),

            'bonus_id' => $this->integer()->defaultValue(0)->comment('Ссылка на тип бонуса'), //в нашем случае либо деньги
            'bonus_value' => $this->integer()->defaultValue(0)->comment('Количество единиц бонусов'), //в нашем случае либо рублей

            'now'=>$this->boolean()->defaultValue(0)->comment('Запрос исполняется'),
            'wait_now'=>$this->boolean()->defaultValue(0)->comment('Запрос поставлен в ожидание на исполнение'),
            'started'=>$this->boolean()->defaultValue(0)->comment('Запрос начал исполняться'),

            'status' => $this->string()->defaultValue('WAIT')->comment('статус очереди'),

            'bank_status' => $this->string()->defaultValue('')->comment('Статус операции банка'),
            'bank_message' => $this->text()->comment('Сообщение банка'),

            'date_start'=>$this->dateTime()->comment('Дата-время выполнения НАЧАЛО'),
            'date_stop'=>$this->dateTime()->comment('Дата-время выполнения ОКОНЧАНИЕ'),

        ]);
        // по сути у нас есть реест бонусов бользователей в таблице user_bonus и очереди вывода бонусов request_output_money
        // операции по реесту бонусов можно пересчитывать и затем записывать в статическое поле user_advance.count_money (в случае спорны моментов)
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user_bonus%}}','user_id');
        $this->dropColumn('{{%user_bonus%}}','type');
        $this->dropColumn('{{%user_advance%}}','count_money');
        $this->dropTable('{{%request_output_money%}}');
    }

}

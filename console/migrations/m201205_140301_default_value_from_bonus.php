<?php
use yii\db\Migration;
use common\models\Bonus;
use common\models\BonusLimit;
use common\models\BonusActiont;
/**
 * Class m201205_140301_default_value_from_bonus
 */
class m201205_140301_default_value_from_bonus extends Migration
{
    /**
     * Выполняется только в качетсве первичной миграции
     *
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $bonus = ['Деньги'=>'Руб.','Баллы лояльности'=>'б','Кофеварка'=>'шт.','Чайник'=>'шт.','Кружка'=>'шт.'];
        foreach ($bonus as $name => $value) {
            $bonus_model = new Bonus();
            $bonus_model->name = $name;
            $bonus_model->value_name = $value;
            $bonus_model->save();
            unset($bonus_model);
        }


        //деньги
        $model_bonus_action = new BonusActiont();
        $model_bonus_action->bonus_id = 1;
        $model_bonus_action->to_bonus_id = 2;
        $model_bonus_action->to_convert_multiplier = 1.00;
        $model_bonus_action->to_send_from = 0;
        $model_bonus_action->to_send_bank = 1;
        $model_bonus_action->save();
        unset($model_bonus_action);

        //баллы лояльности
        $model_bonus_action = new BonusActiont();
        $model_bonus_action->bonus_id = 2;
        $model_bonus_action->to_bonus_id = 1;
        $model_bonus_action->to_convert_multiplier = 0.50;
        $model_bonus_action->to_send_from = 0;
        $model_bonus_action->to_send_bank = 0;
        $model_bonus_action->save();
        unset($model_bonus_action);

        $model_bonus_action = new BonusActiont();
        $model_bonus_action->bonus_id = 3;
        $model_bonus_action->to_bonus_id = 0;
        $model_bonus_action->to_convert_multiplier = 0.00;
        $model_bonus_action->to_send_from = 1;
        $model_bonus_action->to_send_bank = 0;
        $model_bonus_action->save();
        unset($model_bonus_action);

        $model_bonus_action = new BonusActiont();
        $model_bonus_action->bonus_id = 4;
        $model_bonus_action->to_bonus_id = 0;
        $model_bonus_action->to_convert_multiplier = 0.00;
        $model_bonus_action->to_send_from = 1;
        $model_bonus_action->to_send_bank = 0;
        $model_bonus_action->save();
        unset($model_bonus_action);

        $model_bonus_action = new BonusActiont();
        $model_bonus_action->bonus_id = 5;
        $model_bonus_action->to_bonus_id = 0;
        $model_bonus_action->to_convert_multiplier = 0.00;
        $model_bonus_action->to_send_from = 1;
        $model_bonus_action->to_send_bank = 0;
        $model_bonus_action->save();
        unset($model_bonus_action);


        $bonus_limit = ['1'=>['from'=>1,'to'=>'100'],'2'=>['from'=>100,'to'=>200],'3'=>['from'=>1,'to'=>1],'4'=>['from'=>1,'to'=>1],'5'=>['from'=>1,'to'=>1]];
        foreach ($bonus_limit as $bonus_id => $ragne) {
            $bonus_limit_model = new BonusLimit();
            $bonus_limit_model->bonus_id = $bonus_id;
            $bonus_limit_model->range_from = $ragne['from'];
            $bonus_limit_model->range_to = $ragne['to'];
            $bonus_limit_model->save();
            unset($bonus_limit_model);
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

}

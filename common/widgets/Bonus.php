<?php
namespace common\widgets;

use Yii;

class Bonus extends \yii\bootstrap\Widget
{

    public function init_bonus()
    {
        return ['action'=>'active'];
    }

    public function run()
    {
        return $this->render('bonus',['bonus'=>Yii::$app->user->isGuest ? FALSE : $this->init_bonus()]);
    }
}

<?php
use yii\bootstrap\Html;
/* @var $this yii\web\View */

$this->title = 'Тестовая страница Slotegrator';
?>
<div class="site-index">

    <?php if ($this->context->isBonus) { ?>
    <div class="jumbotron">
        <h1>Поздравляем! За успешную регистрацию предлагаем вам стартовый бонус</h1>

    </div>
    <?php } else { ?>
    <div class="body-content">

        <div class="row">

            <div class="col-lg-12">
                MUST BE WIDGET GAME
            </div>

            <div class="col-lg-12">
                MUST BE WIDGET STATUS BALL
            </div>

        </div>

    </div>

    <?php } ?>

</div>

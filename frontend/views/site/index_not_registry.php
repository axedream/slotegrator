<?php

/* @var $this yii\web\View */

$this->title = 'Тестовая страница Slotegrator (пользователь не зарегистрирован)';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>PAGE FROM GAME</h1>

        <p class="lead">Для получения призового бонуса необходимо пройти регистрацию и авторизацию</p>

        <p>
            <?= yii\helpers\Html::a('Пройти регистрацию',["site/signup", ],['class'=>'btn btn-success'])?>
        </p>
    </div>
</div>
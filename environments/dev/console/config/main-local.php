<?php
return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=;dbname=slotegrator',
            'username' => 'slotegrator',
            'password' => 'slot_test123A',
            'charset' => 'utf8',
        ],
    ],
];

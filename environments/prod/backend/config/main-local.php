<?php
return [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'jfsbkjsbfdskjgfdskjbgfsdhjgfajds',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;port=3306;dbname=subscribetest',
            'username' => "mysql",
            'password' => "mysql",
            'charset' => 'utf8',
        ],
    ],
];

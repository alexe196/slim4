<?php

use app\Http\Controllers\HomeController;
use Psr\Container\ContainerInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Factory\DatabaseManagerFactory;

return function (ContainerInterface $container) {

    $container->set('settings', function () {
        return [
            'displayErrorDetails' => true,
            'logErrorDetails' => true,
            'logErrors' => true,
            'db'=>[
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'slim',
                'username'  => 'root',
                'password'  => 'root',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ],
            'mail' => [
                'host' => 'smtp.example.com', // хост почтового сервера
                'port' => 587, // порт почтового сервера (обычно 587 или 465 для TLS/SSL соответственно)
                'username' => 'your_username@example.com', // ваше имя пользователя
                'password' => 'your_password', // ваш пароль
                'encryption' => 'tls', // метод шифрования (tls или ssl)
                'fromEmail' => 'your_username@example.com', // ваш адрес электронной почты
                'fromName' => 'Your Name', // ваше имя или название
            ]
        ];
    });

};

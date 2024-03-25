<?php

namespace app\Trait;

use app\Models\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

trait Authentification
{

    private static Response $response;

    public static function logauot() {
        unset($_SESSION['user']);
    }

    public static function attempt($email, $password) {

        $user = User::query()->where(['email' => $email])->first();

        if(!$user) {
            return false;
        }

        if(password_verify($password, $user->password)) {
            $_SESSION['user'] = $user->id;
            return true;
        }

        return false;
    }

    public static function isAdmin() {

        if(!empty($_SESSION['user'])) {
            $id = (int) $_SESSION['user'];
            $user = User::query()->where(['id' => $id])->first();
            if(!empty($user->id)) {
                  return true;
            }
        }
        $url = 'login';

        return self::redirect($url);
    }

    public static function isLogin() {


        if(!empty($_SESSION['user'])) {
            $id = (int) $_SESSION['user'];
            $user = User::query()->where(['id' => $id])->first();
            if(!empty($user->id)) {
                $url = 'dashboard/';
                return self::redirect($url);
            }
        }
        return true;
    }

    public static function redirect($url)
    {
        header('HTTP/1.1 302');
        header("Status: 302");
        header('Location: /'.$url);
        exit();
    }


}
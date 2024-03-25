<?php
namespace app\Trait;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

trait Ajax
{
    private static $key = 'T4jEY+q//FOi6Z0p4xRsJquK4ngoWI01poiHpJrVrXIudD';

    public static function returnJson(int $status_code, Array $dataArray, Response $response) {
        $payload = json_encode($dataArray);
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status_code);
    }

    public static function hashJson ($key) {

        if(empty($key) || !password_verify(self::$key, $key))  {
            return false;
        }
        return true;
    }

    public static function getIp() {
        $keys = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'REMOTE_ADDR'
        ];
        foreach ($keys as $key) {
            if (!empty($_SERVER[$key])) {
                if (filter_var($_SERVER[$key], FILTER_VALIDATE_IP)) {
                    return $_SERVER[$key];
                }
            }
        }
    }

    //password_hash($sign_str, PASSWORD_DEFAULT);
}
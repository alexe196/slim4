<?php

namespace app\Http\Controllers\Auth;



use app\Models\User;
use app\Trait\Authentification;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

class AuthController
{
    public RouteCollectorProxy  $routeCollectorProxy;


    public function __construct()
    {
        Authentification::isLogin();
    }


    public function loginForm(Request $request, Response $response) {

        return view($response, 'auth.login', [
            'product' => null,
        ]);
    }

    public function postLogin(Request $request, Response $response) {

        if($request->getMethod() == 'POST') {

            $data = $request->getParsedBody();

            $auth = User::attempt($data['email'], $data['password']);

            if(!$auth) {
                $response = $response->withStatus(302);
                return $response->withHeader('Location', '/login');
            }

            $response = $response->withStatus(302);
            return $response->withHeader('Location', '/dashboard');

        }

        $response = $response->withStatus(302);
        return $response->withHeader('Location', '/login');
    }

    public function logout(Request $request, Response $response) {
        User::logauot();
        $response = $response->withStatus(302);
        return $response->withHeader('Location', '/login');
    }
}
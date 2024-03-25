<?php


namespace app\Http\Controllers;


use app\Repository\Product;
use app\Service\MailerService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class OrderController
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        if (!empty($data)) {


            $mailer =  new MailerService();
            $to = $data['mail'];
            $subject = 'Тестовое сообщение';
            $body = 'Это тестовое сообщение с использованием PHPMailer в Slim 4.';

            if ($mailer->sendEmail($to, $subject, $body)) {
                $response->getBody()->write('Письмо успешно отправлено');
            } else {
                $response->getBody()->write('Ошибка при отправке письма');
            }

            $response = $response->withStatus(302);
            return $response->withHeader('Location', '/dashboard/product');
        }
    }
}
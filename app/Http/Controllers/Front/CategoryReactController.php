<?php


namespace app\Http\Controllers\Front;


use app\Repository\Front\FrontCategory;
use app\Trait\Ajax;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CategoryReactController
{
    public function categoryRctAll(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        $frontCategory = new FrontCategory();
        $result = $frontCategory->getCategoryAll();

        return Ajax::returnJson(201, $result, $response);
    }
}
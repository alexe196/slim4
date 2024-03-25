<?php

namespace app\Http\Controllers\Front;

use app\Models\Product;
use app\Trait\Ajax;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Repository\Front\FrontProduct;

class ProductReactController
{

    private static $key = 'T4jEY+q//FOi6Z0p4xRsJquK4ngoWI01poiHpJrVrXIudD';

    public function productRctOne(Request $request, Response $response)
    {

        $data = $request->getParsedBody();
        $id = !empty($data['id']) ? (int) $data['id'] : null;
        $key = !empty($data['key']) ? $data['key'] : null;

        $key = password_hash('T4jEY+q//FOi6Z0p4xRsJquK4ngoWI01poiHpJrVrXIudD', PASSWORD_DEFAULT);


        if(!Ajax::hashJson($key)) {
            return Ajax::returnJson(201, array('error' => 1), $response);
        }

        $id = (int) $data['id'] = 9;
        $frontProduct = new FrontProduct();

        $result = $frontProduct->getProductOne($id);

        return Ajax::returnJson(201, $result, $response);
    }

    public function productRctAll(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        $frontProduct = new FrontProduct();
        $result = $frontProduct->getProductAll();

        return Ajax::returnJson(201, $result, $response);
    }

    public function productRctCategory(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        $id = (int) $data['id'] = 6;

        $frontProduct = new FrontProduct();
        $result = $frontProduct->getProductCategory($id);

        return Ajax::returnJson(201, $result, $response);
    }
}
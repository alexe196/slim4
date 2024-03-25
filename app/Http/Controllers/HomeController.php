<?php

namespace app\Http\Controllers;

use app\Models\Product;
use app\Trait\Authentification;
use Illuminate\Support\Facades\Auth;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    public function __construct()
    {
        Authentification::isAdmin();
    }

    public function index(Request $request, Response $response)
    {

//        function deletePincodeRecord($data)
//        {
//            PincodeModel::where('pincode', $data['pincode'])
//                ->where('token', $data['token'])
//                ->delete();
//        }

//      $product = Product::query()->get();

//        $product = Product::all();


        //echo"=======>".password_hash('tar[*]get7', PASSWORD_DEFAULT);


        return view($response, 'index', [
            'product' => null,
        ]);

    }

}
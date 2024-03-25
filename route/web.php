<?php


use Slim\App;
use app\Http\Controllers\HomeController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;



return function (App $app) {

    /* Home */
    $app->get('/dashboard/', [\app\Http\Controllers\HomeController::class,  'index']);


    /* Category */
    $app->get('/dashboard/category/form', [\app\Http\Controllers\CategoryController::class,  'index']);
    $app->get('/dashboard/category', [\app\Http\Controllers\CategoryController::class,  'view']);
    $app->post('/dashboard/category/add', [\app\Http\Controllers\CategoryController::class,  'addCategory']);
    $app->get('/dashboard/category/edit/{id}', [\app\Http\Controllers\CategoryController::class,  'edit']);
    $app->get('/dashboard/category/delete/{id}', [\app\Http\Controllers\CategoryController::class,  'delete']);
    $app->post('/dashboard/category/update', [\app\Http\Controllers\CategoryController::class,  'update']);
    $app->post('/dashboard/category/search', [\app\Http\Controllers\CategoryController::class,  'search']);


    /* Product */
    $app->get('/dashboard/product/form', [\app\Http\Controllers\ProductController::class,  'index']);
    $app->get('/dashboard/product', [\app\Http\Controllers\ProductController::class,  'view']);
    $app->post('/dashboard/product/add', [\app\Http\Controllers\ProductController::class,  'addProduct']);
    $app->get('/dashboard/product/edit/{id}', [\app\Http\Controllers\ProductController::class,  'edit']);
    $app->get('/dashboard/product/delete/{id}', [\app\Http\Controllers\ProductController::class,  'delete']);
    $app->post('/dashboard/product/update', [\app\Http\Controllers\ProductController::class,  'update']);
    $app->post('/dashboard/product/search', [\app\Http\Controllers\ProductController::class,  'search']);

    /* Product Upload File */
    $app->get('/dashboard/product-upload/view/{id}', [\app\Http\Controllers\ProductUploadFile::class,  'index']);
    $app->post('/dashboard/product-upload/file', [\app\Http\Controllers\ProductUploadFile::class,  'upload']);
    $app->post('/dashboard/product-upload/edit-images', [\app\Http\Controllers\ProductUploadFile::class,  'editImage']);
    $app->post('/dashboard/product-upload/delete', [\app\Http\Controllers\ProductUploadFile::class,  'delete']);

    /* Media File */
    $app->get('/dashboard/medialibrary/', [\app\Http\Controllers\MedialibraryController::class,  'index']);
    $app->get('/dashboard/medialibrary/delete/{name}', [\app\Http\Controllers\MedialibraryController::class,  'delete']);
    $app->post('/dashboard/medialibrary/upload', [\app\Http\Controllers\MedialibraryController::class,  'upload']);

    /* Product Variant */
    $app->get('/dashboard/product-variant/view/{id}', [\app\Http\Controllers\ProductVariantController::class,  'index']);
    $app->get('/dashboard/product-variant/form/{id}', [\app\Http\Controllers\ProductVariantController::class,  'form']);
    $app->get('/dashboard/product-variant/edit/{id}', [\app\Http\Controllers\ProductVariantController::class,  'edit']);
    $app->post('/dashboard/product-variant/add/', [\app\Http\Controllers\ProductVariantController::class,  'addVariant']);
    $app->post('/dashboard/product-variant/update/', [\app\Http\Controllers\ProductVariantController::class,  'update']);
    $app->post('/dashboard/product-variant/delete/', [\app\Http\Controllers\ProductVariantController::class,  'delete']);

    /* Autorization */
    $app->get('/login', [\app\Http\Controllers\Auth\AuthController::class,  'loginForm']);
    $app->post('/login', [\app\Http\Controllers\Auth\AuthController::class,  'postLogin']);
    $app->get('/logout', [\app\Http\Controllers\Auth\AuthController::class,  'logout']);


    /* Json Request */
    $app->get('/dashboard/json/product-react/one', [\app\Http\Controllers\Front\ProductReactController::class,  'productRctOne']);
    $app->get('/dashboard/json/product-react/all', [\app\Http\Controllers\Front\ProductReactController::class,  'productRctAll']);
    $app->get('/dashboard/json/product-react/cat', [\app\Http\Controllers\Front\ProductReactController::class,  'productRctCategory']);
    $app->get('/dashboard/json/category-react/all', [\app\Http\Controllers\Front\CategoryReactController::class,  'categoryRctAll']);

    /* Order */
    $app->post('/dashboard/order/add', [\app\Http\Controllers\ProductController::class,  'update']);
    $app->post('/dashboard/order/update', [\app\Http\Controllers\ProductController::class,  'update']);
    $app->post('/dashboard/order/search', [\app\Http\Controllers\ProductController::class,  'search']);

};

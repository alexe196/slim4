<?php


namespace app\Http\Controllers;


use app\Repository\Categories;
use app\Repository\Product;
use app\Trait\Authentification;
use app\Service\UploadFile;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Models\ProductImage;
use app\Trait\Ajax;
use Slim\App;

class ProductUploadFile
{

    private Product $product;
    private Categories $categories;

    public function __construct()
    {
        Authentification::isAdmin();
        $this->product = new Product();
        $this->categories = new Categories();
    }

    public function index(Request $request, Response $response)
    {
        $product_id = (int) $request->getAttribute('id');
        if(!empty($product_id)) {
            $product = $this->product->getAllProductsImg($product_id);
        }

        return view($response, 'dashboard/product-apload-file/index', [
            'product' => $product,
            'product_id' => $product_id

        ]);

    }

    public function upload(Request $request, Response $response)
    {
        $uploadedFiles = $request->getUploadedFiles();
        $data = $request->getParsedBody();
        $product_id = (int) $data['product_id'];

        if (!empty($product_id)) {

            $UploadFile = new UploadFile();

            if(!empty($path = $UploadFile->uploadFileImage($uploadedFiles))) {
                $productImage = new ProductImage();
                $productImage->file_name = $path['filename'];
                $productImage->path = $path['path'];
                $productImage->sort = $data['sort'];
                $productImage->product_id = $product_id;
                $productImage->is_viewer = $data['is_viewer'];
                $productImage->save();
            }

        }

        $response = $response->withStatus(302);
        return $response->withHeader('Location', '/dashboard/product-upload/view/'.$product_id);
    }


    public function editImage(Request $request, Response $response)
    {
        if ($data = $request->getParsedBody()) {

            $productImage = ProductImage::query()->where(['id' => $data['id']])->first();
            $productImage->sort = $data['sort'];
            $productImage->is_viewer = $data['is_viewer'];
            $productImage->update();
        }

        return Ajax::returnJson(201, array('id' => $data['id']), $response);
    }

    public function delete(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        $id = (int) $data['id'];
        $product_id = (int) $data['product_id'];

        if(!empty($id)) {
            ProductImage::deleteImageOne($id);
        }

        $response = $response->withStatus(302);
        return $response->withHeader('Location', '/dashboard/product-upload/view/'.$product_id);

    }

}
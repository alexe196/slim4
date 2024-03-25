<?php


namespace app\Http\Controllers;



use app\Trait\Authentification;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Models\ProductVariant;

class ProductVariantController
{

    public function __construct()
    {
        Authentification::isAdmin();
    }

    public function index(Request $request, Response $response)
    {
        $id = (int) $request->getAttribute('id');
        $productVariant = array();

        if (!empty($id)) {
            $productVariant = ProductVariant::query()->where(['product_id' => $id])->get();
        }
        return view($response, 'dashboard/product-variant/index', [
            'productVariant' => $productVariant,
            'product_id' => $id
        ]);

    }

    public function form(Request $request, Response $response)
    {
        $id = (int) $request->getAttribute('id');

        return view($response, 'dashboard/product-variant/formvariant', [
            'product_id' => $id
        ]);

    }

    public function edit(Request $request, Response $response)
    {
        $id = (int) $request->getAttribute('id');
        $productVariant = array();

        if (!empty($id)) {
            $productVariant = ProductVariant::query()->where(['id' => $id])->first();
        }

        return view($response, 'dashboard/product-variant/edit', [
            'id' => $id,
            'product_id' => !empty($productVariant['product_id']) ? $productVariant['product_id'] : null,
            'variant' => $productVariant,
        ]);

    }


    public function addVariant(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        $product_id = (int) $data['product_id'];

        if (!empty($data) && !empty($product_id)) {

            $model = new ProductVariant();
            $model->product_id = $product_id;
            $model->sku = $data['sku'];
            $model->variant_name = $data['variant_name'];
            $model->exception = $data['exception'];
            $model->cpage = $data['cpage'];
            $model->weight = $data['weight'];
            $model->classification = $data['classification'];
            $model->price = $data['price'];
            $model->old_price = $data['old_price'];
            $model->count = $data['count'];
            $model->is_active = !empty($data['is_active']) ? $data['is_active'] : 0;
            $model->save();

            $response = $response->withStatus(302);
            return $response->withHeader('Location', '/dashboard/product-variant/view/'.$product_id);
        }
    }


    public function update(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        $product_id = (int) $data['product_id'];
        $variant_id = (int) $data['id'];


        if (!empty($data) && !empty($variant_id)) {

            $model = ProductVariant::query()->where(['id' => $variant_id])->first();
            $model->sku = $data['sku'];
            $model->variant_name = $data['variant_name'];
            $model->exception = $data['exception'];
            $model->cpage = $data['cpage'];
            $model->weight = $data['weight'];
            $model->classification = $data['classification'];
            $model->price = $data['price'];
            $model->old_price = $data['old_price'];
            $model->count = $data['count'];
            $model->is_active = !empty($data['is_active']) ? $data['is_active'] : 0;
            $model->update();

            $response = $response->withStatus(302);
            return $response->withHeader('Location', '/dashboard/product-variant/view/'.$product_id);
        }
    }


}
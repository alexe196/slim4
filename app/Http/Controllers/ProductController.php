<?php


namespace app\Http\Controllers;

use app\Repository\Categories;
use app\Trait\Authentification;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Repository\Product;

class ProductController
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
        $categories = $this->categories->getAllCategories();

        return view($response, 'dashboard/product/index', [
            'categories' => $categories,
        ]);
    }

    public function view(Request $request, Response $response)
    {
        $categories = $this->categories->getAllCategories();
        $product = $this->product->getAllProducts();
        return view($response, 'dashboard/product/view', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function edit(Request $request, Response $response, $args)
    {

        $categories = $this->categories->getAllCategories();
        $product = $this->product->getOneProduct($request->getAttribute('id'));
        return view($response, 'dashboard/product/edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function delete(Request $request, Response $response, $args)
    {
        $id = $request->getAttribute('id');

        if (!empty($id)) {
            $this->product->deleteProduct($id);
        }
        $response = $response->withStatus(302);
        return $response->withHeader('Location', '/dashboard/product');
    }

    public function update(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        if (!empty($data)) {
            $this->product->updateProduct($data);
            $response = $response->withStatus(302);
            return $response->withHeader('Location', '/dashboard/product');
        }
    }

    public function addProduct(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        if (!empty($data)) {
            $this->product->addProduct($data);
            $response = $response->withStatus(302);
            return $response->withHeader('Location', '/dashboard/product');
        }
    }

    public function search(Request $request, Response $response) {

        $data = $request->getParsedBody();
        $id = (int) $data['id'];
        $name = (string) trim($data['name']);
        if (!empty($data)) {
            $product= $this->product->getSearchProduct($id, $name);
            return view($response, 'dashboard/product/partview', [
                'product' => $product,
            ]);
        }
    }
}
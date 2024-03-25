<?php


namespace app\Http\Controllers;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Repository\Categories;
use app\Trait\Authentification;


class CategoryController
{
    private Categories $categories;

    public function __construct()
    {
        Authentification::isAdmin();
        $this->categories = new Categories();
    }

    public function index(Request $request, Response $response)
    {
        return view($response, 'dashboard/category/index', [
            'category' => 'category',
        ]);
    }

    public function view(Request $request, Response $response)
    {
        $category = $this->categories->getAllCategories();
        return view($response, 'dashboard/category/view', [
            'category' => $category,
        ]);
    }

    public function edit(Request $request, Response $response, $args)
    {

        $category = $this->categories->getOneCategory($request->getAttribute('id'));
        return view($response, 'dashboard/category/edit', [
            'category' => $category,
        ]);
    }

    public function delete(Request $request, Response $response, $args)
    {
        $id = $request->getAttribute('id');

        if (!empty($id)) {
            $this->categories->deleteCategory($id);
        }
        $response = $response->withStatus(302);
        return $response->withHeader('Location', '/dashboard/category');
    }

    public function update(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        if (!empty($data)) {

            $data['parent_id'] = !empty($data['parent_id']) ? $data['parent_id'] : 0;
            $this->categories->updateCategory($data);
            $response = $response->withStatus(302);
            return $response->withHeader('Location', '/dashboard/category');
        }
    }

    public function addCategory(Request $request, Response $response)
    {
         $data = $request->getParsedBody();

         if (!empty($data)) {

             $data['parent_id'] = !empty($data['parent_id']) ? $data['parent_id'] : 0;
             $this->categories->addCategory($data);
             $response = $response->withStatus(302);
             return $response->withHeader('Location', '/dashboard/category');
         }
    }

    public function search(Request $request, Response $response) {

        $data = $request->getParsedBody();
        $id = (int) $data['id'];
        if (!empty($data)) {
            $category = $this->categories->getSearchCategory($id);
            return view($response, 'dashboard/category/partview', [
                'category' => $category,
            ]);
        }
    }

}
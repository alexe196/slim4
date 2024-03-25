<?php

namespace app\Repository;

use PDO;
use app\config\Connect;

class Categories
{

    public CategoryProduct $categoryProduct;
    private PDO $connection;
    private $table = 'categories';

    public function __construct()
    {
        $this->connection = Connect::getInstance();
        $this->categoryProduct = new CategoryProduct();
    }


    public function addCategory($data) {

        $sql = "INSERT INTO $this->table (`name`, `description`, `parent_id`, `slug`) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(array($data["name"], $data["description"], $data["parent_id"], $data["slug"]));

        return $this->connection->lastInsertId();
    }

    public function updateCategory($data) {

        $sql = "UPDATE $this->table SET name=?, description=?, parent_id=?, slug=? WHERE id=?";
        $stmt =  $this->connection->prepare($sql);

        $rowsNumber = $stmt->execute(array($data["name"], $data["description"], $data["parent_id"], $data["slug"], $data["id"]));

        return $data["id"];
    }

    public function getAllCategories() {

        $stmt = $this->connection->query("SELECT * FROM $this->table ORDER BY id ASC");
        $categories = $stmt->fetchAll();

        return $categories;
    }

    public function deleteCategory($id) {

        if(!empty($id)) {
            $stmt = $this->connection->prepare("DELETE FROM $this->table WHERE id=:id");
            $stmt->execute(array(':id' => $id));
        }
    }

    public function getOneCategory($id) {

        $category = null;
        $id = (int) $id;
        if(!empty($id)) {
            $stmt = $this->connection->prepare("SELECT * FROM $this->table WHERE id=:id");
            $stmt->execute(array(':id' => $id));
            $category = $stmt->fetchAll();
        }


        return !empty($category) ? $category[0] : null;
    }

    public function getSearchCategory($id) {

        $category = null;
        $id = (int) $id;
        if(!empty($id)) {
            $stmt = $this->connection->prepare("SELECT * FROM $this->table WHERE id=:id");
            $stmt->execute(array(':id' => $id));
            $category = $stmt->fetchAll();
        } else {
            $category = $this->getAllCategories();
        }


        return !empty($category) ? $category : null;
    }
}
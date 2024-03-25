<?php


namespace app\Repository;

use app\config\Connect;
use PDO;

class CategoryProduct
{
    public PDO $connection;
    private $table = 'category_product';

    public function __construct()
    {
        $this->connection = Connect::getInstance();
    }

    public function addCategoryProduct($data) {

        if(!empty($data)) {
            $sql = "INSERT INTO $this->table (`product_id`, `category_id`) VALUES (?, ?)";
            $stmt = $this->connection->prepare($sql);

            $rowsNumber = $stmt->execute(array($data["product_id"], $data["category_id"]));
        }
        return $rowsNumber;
    }

    public function getOneProducForCategory($id) {

        $id = (int) $id;
        if(!empty($id)) {
            $stmt = $this->connection->prepare("SELECT * FROM $this->table WHERE category_id=:id");
            $stmt->execute(array(':id' => $id));
            $category = $stmt->fetchAll();
        }

        return !empty($category) ? $category[0] : null;
    }

    public function deleteCategoryProducForCategory($id) {

        if(!empty($id)) {
            $stmt = $this->connection->prepare("DELETE FROM $this->table WHERE category_id=:id");
            $stmt->execute(array(':id' => $id));
        }
    }

    public function deleteCategoryProducForProduct($id) {

        if(!empty($id)) {
            $stmt = $this->connection->prepare("DELETE FROM $this->table WHERE product_id=:id");
            $stmt->execute(array(':id' => $id));
        }
    }


    public function updateCategoryProduct($data) {

        if (!empty($data["product_id"]) && !empty($data["category_id"])) {

            if ($this->getOneProducForCategory($data["category_id"])) {
                $sql = "UPDATE $this->table SET category_id=? WHERE product_id=?";
                $stmt = $this->connection->prepare($sql);
                $rowsNumber = $stmt->execute(array($data["category_id"], $data["product_id"]));
            } else {
                $rowsNumber = $this->addCategoryProduct($data);
            }

        }

        return $rowsNumber;
    }
}
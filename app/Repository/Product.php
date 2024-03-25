<?php


namespace app\Repository;


use app\config\Connect;
use app\Models\ProductImage;
use app\Service\UploadFile;
use PDO;

class Product
{
    public PDO $connection;
    public CategoryProduct $categoryProduct;
    private $table = 'product';

    public function __construct()
    {
        $this->connection = Connect::getInstance();
        $this->categoryProduct = new CategoryProduct();
    }


    public function addProduct($data) {

        if(empty($data['is_active'])) {
            $data['is_active'] = 0;
        }

        $sql = "INSERT INTO $this->table (`name`, `slug`, `meta_description`, `description`, `title`, `is_active`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $rowsNumber = $stmt->execute(array($data["name"], $data["slug"], $data["meta_description"], $data["description"], $data["title"], $data['is_active']));
        $data["product_id"] = $this->connection->lastInsertId();

        if(!empty($data["product_id"])) {
            $this->categoryProduct->addCategoryProduct($data);
        }

        return $rowsNumber;
    }

    public function updateProduct($data) {
        if(empty($data['is_active'])) {
            $data['is_active'] = 0;
        }
        $sql = "UPDATE $this->table SET `name`=?, slug=?, meta_description=?, description=?, title=?, is_active=? WHERE id=?";
        $stmt=  $this->connection->prepare($sql);
        $rowsNumber = $stmt->execute(array($data["name"], $data["slug"], $data["meta_description"], $data["description"], $data["title"], $data['is_active'], $data["id"]));
        $data["product_id"] = $data["id"];
        if(!empty($data["category_id"])) {
            $this->categoryProduct->updateCategoryProduct($data);
        }

        return $rowsNumber;
    }

    public function getAllProducts() {

        $stmt = $this->connection->query("SELECT $this->table.*, categories.name as categories_name 
        FROM $this->table 
        LEFT JOIN category_product ON category_product.product_id = product.id
        LEFT JOIN categories ON categories.id = category_product.category_id
        ORDER BY product.id ASC");
        $product = $stmt->fetchAll();

        return $product;
    }

    public function getAllProductsImg($product_id) {

        $stmt = $this->connection->query("SELECT $this->table.name as product_name, categories.name as categories_name, product_image.* 
        FROM $this->table 
        LEFT JOIN category_product ON category_product.product_id = product.id
        LEFT JOIN categories ON categories.id = category_product.category_id
        LEFT JOIN product_image ON product_image.product_id = product.id
        WHERE ".$this->table.".id = ".$product_id."
        ORDER BY product.id ASC");
        $product = $stmt->fetchAll();

        return $product;
    }

    public function deleteProduct($id) {

        if(!empty($id)) {
            $stmt = $this->connection->prepare("DELETE FROM product_variant WHERE product_id=:id");
            $stmt->execute(array(':id' => $id));

            ProductImage::deleteImageAll($id);

            $stmt = $this->connection->prepare("DELETE FROM $this->table WHERE id=:id");
            $stmt->execute(array(':id' => $id));
        }
    }

    public function getOneProduct($id) {

        $product = null;
        $id = (int) $id;
        if(!empty($id)) {
            $stmt = $this->connection->prepare("SELECT $this->table.*, categories.id as categories_id 
                                                        FROM $this->table 
                                                        LEFT JOIN category_product ON category_product.product_id = product.id
                                                        LEFT JOIN categories ON categories.id = category_product.category_id
                                                        WHERE product.id=:id");
            $stmt->execute(array(':id' => $id));
            $product = $stmt->fetchAll();
        }


        return !empty($product) ? $product[0] : null;
    }

    public function getSearchProduct($id, $name){

        $sql = '';
        if(!empty($id) || !empty($name)) {

            if(!empty($id)) {
                $sql.= 'categories.id ='.$id;
            }
            if(!empty($name)) {
                if(!empty($sql)) {
                    $sql.=' AND ';
                }
                $sql.= $this->table.".name like('".$name."')";
            }

            $stmt = $this->connection->query("SELECT $this->table.*, categories.name as categories_name 
                                                       FROM $this->table 
                                                       LEFT JOIN category_product ON category_product.product_id = product.id
                                                       LEFT JOIN categories ON categories.id = category_product.category_id
                                                       WHERE ".$sql);
            $product = $stmt->fetchAll();
        } else {
            $product = $this->getAllProducts();
        }

        return $product;
    }
}
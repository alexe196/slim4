<?php

namespace app\Repository\Front;

use app\Models\Product;
use app\Models\ProductImage;
use app\Models\ProductVariant;
use app\Models\CategoryProduct;

class FrontProduct
{
    private $products = [];


    public function getProductCategory($cat_id) {

        $this->setNullproducts();
        $categoryProduct = CategoryProduct::query()->where(['category_id' => $cat_id])->get();
        if(!empty($categoryProduct)) {

            foreach ($categoryProduct as $cat) {
                $category_product[] = $cat['product_id'];
            }

            $products = Product::query()->whereIn('id', $category_product)->get();
            if (!empty($products[0])) {
                $i = 0;
                foreach ($products as $product) {
                    $this->getProduct($product, $i);
                    $i++;
                }


            }
        }

        return $this->products;
    }

    public function getProductAll() {

        $this->setNullproducts();
        $products = Product::query()->where(['is_active' => 1])->get();
        if(!empty($products[0])) {
            $i = 0;
            foreach ($products as $product) {
                $this->getProduct($product, $i);
                $i++;
            }
        }

        return $this->products;
    }

    public function getProductOne($id) {

        $this->setNullproducts();
        $product = Product::query()->where(['id' => $id, 'is_active' => 1])->first();
        if (!empty($product['id'])) {
            $this->getProduct($product);
        }

        return $this->products;
    }


    public function setNullproducts () {
        $this->products = null;
    }


    public function getProduct($product, $i=0) {

        if (!empty($product)) {

            if (!empty($product['id'])) {
                $this->products['products'][$i]['id'] = $product['id'];
                $this->products['products'][$i]['name'] = $product['name'];
                $this->products['products'][$i]['slug'] = $product['slug'];
                $this->products['products'][$i]['meta_description'] = $product['meta_description'];
                $this->products['products'][$i]['title'] = $product['title'];

                $resultImage = $this->getImageProduct($product['id']);
                $this->products['products'][$i]['images'] = $resultImage['images'];
                $this->products['products'][$i]['images_card'] = $resultImage['images_card'];

                $this->products['products'][$i]['format'] = $this->getProductVariant($product['id']);

            }
        }

    }

    public function getProductVariant($id) {
        $products = [];
        $ProductVariant = ProductVariant::query()->where(['product_id' => $id, 'is_active' => 1])->get();
        if(!empty($ProductVariant)) {
            $i=0;
            foreach ($ProductVariant as $varians) {
                $products[$i]['variant_id'] = $varians['id'];
                $products[$i]['sku'] = $varians['sku'];
                $products[$i]['format'] = $varians['variant_name'];
                $products[$i]['description'] = $varians['description'];
                $products[$i]['exception'] = $varians['exception'];
                $products[$i]['cpage'] = $varians['cpage'];
                $products[$i]['weight'] = $varians['weight'];
                $products[$i]['classification'] = $varians['classification'];
                $products[$i]['price'] = $varians['price'];
                $products[$i]['old_price'] = $varians['old_price'];
                $products[$i]['count'] = $varians['count'];
                $i++;
            }
        } else {
            $products = null;
        }

        return $products;

    }

    public function getImageProduct($id) {

        $products = [];
        $ProductImage = ProductImage::query()->where(['product_id' => $id])->get();
        if(!empty($ProductImage)) {
            $i=0;
            foreach ($ProductImage as $image) {
                $products['images'][$i] = $image['path'];
                if($image['is_viewer'] == 1) {
                    $products['images_card'] = $image['path'];
                }
                $i++;
            }
        } else {
            $products['images'] = null;
        }

        return $products;
    }
}
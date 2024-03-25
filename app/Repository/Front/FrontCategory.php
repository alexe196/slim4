<?php


namespace app\Repository\Front;


use app\Models\Categories;

class FrontCategory
{
    private $category = [];


    public function getCategoryAll() {

        $this->setNullcategory ();
        $categories = Categories::query()->get();

        if(!empty($categories[0])) {
            $i = 0;
            foreach ($categories as $category) {
                $this->getCategory($category, $i);
                $i++;
            }
        }

        return $this->category;
    }

    public function getCategory($category, $i) {

        if (!empty($category)) {

            if (!empty($category['id'])) {
                $this->category['categories'][$i]['id'] = $category['id'];
                $this->category['categories'][$i]['name'] = $category['name'];
                $this->category['categories'][$i]['description'] = $category['description'];
                $this->category['categories'][$i]['slug'] = $category['slug'];
            }
        }
    }


    public function setNullcategory () {
        $this->category = null;
    }

}
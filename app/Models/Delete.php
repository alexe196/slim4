<?php


namespace app\Models;


class Delete
{

    public function __construct($Product)
    {
        $Product->delete();
    }

}
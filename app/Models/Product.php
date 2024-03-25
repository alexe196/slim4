<?php


namespace app\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{

    const DELETED_AT = 'deleted';

    protected $table = 'product';

    protected $fillable = [
        'id', 'name', 'description', 'slug', 'meta_description', 'title', 'is_active'
    ];

    public $timestamps = false;

    protected $dispatchesEvents = [
        'deleting' => Delete::class
    ];

    public static function getProduct($id, $product_id) {
        return Product::query()
            ->leftJoin('product_variant', 'product_variant.product_id', '=', 'product.id')
            ->where(['product.id' => $id, 'product_variant.product_id' => $product_id])
            ->first();
    }

}
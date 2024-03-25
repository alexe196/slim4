<?php


namespace app\Models;


use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    const DELETED_AT = 'deleted';

    protected $table = 'product_variant';

    protected $fillable = [
        'id', 'product_id', 'sku', 'variant_name', 'exception', 'cpage', 'weight', 'classification', 'price', 'oldp_price', 'count', 'is_active'
    ];

    public $timestamps = false;

    protected $dispatchesEvents = [
        'deleting' => Delete::class
    ];
}
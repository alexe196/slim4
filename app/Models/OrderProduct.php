<?php


namespace app\Models;


use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{

    const DELETED_AT = 'deleted';

    protected $table = 'order_product';

    protected $fillable = [
        'id', 'order_id', 'product_id', 'product_variant_id', 'summ', 'count'
    ];

    public $timestamps = false;

    protected $dispatchesEvents = [
        'deleting' => Delete::class
    ];

}
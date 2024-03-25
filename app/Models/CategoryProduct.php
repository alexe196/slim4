<?php


namespace app\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryProduct extends Model
{
    const DELETED_AT = 'deleted';

    protected $table = 'category_product';

    protected $fillable = [
        'product_id', 'category_id'
    ];

    public $timestamps = false;

    protected $dispatchesEvents = [
        'deleting' => Delete::class
    ];

}
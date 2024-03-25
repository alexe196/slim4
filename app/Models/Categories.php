<?php


namespace app\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Categories extends Model
{

    const DELETED_AT = 'deleted';

    protected $table = 'categories';

    protected $fillable = [
        'id', 'name', 'description', 'parent_id', 'slug'
    ];

    public $timestamps = false;

    protected $dispatchesEvents = [
        'deleting' => Delete::class
    ];

}
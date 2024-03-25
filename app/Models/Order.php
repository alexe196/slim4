<?php


namespace app\Models;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const DELETED_AT = 'deleted';
    const STATUS_ORDERED = 1;
    const STATUS_PROCESSING = 2;
    const STATUS_SEND = 3;
    const STATUS_PAID = 4;

    protected $table = 'order';

    protected $fillable = [
        'id', 'ip', 'email', 'phone', 'summ', 'count', 'date', 'status_order'
    ];

    public $timestamps = false;

    protected $dispatchesEvents = [
        'deleting' => Delete::class
    ];
}
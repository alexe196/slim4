<?php


namespace app\Models;


use Illuminate\Database\Eloquent\Model;

class SentMail extends Model
{
    const DELETED_AT = 'deleted';

    protected $table = 'sent_mail';

    protected $fillable = [
        'id', 'order_id', 'email', 'send_message'
    ];

    public $timestamps = false;

    protected $dispatchesEvents = [
        'deleting' => Delete::class
    ];
}
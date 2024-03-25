<?php

namespace app\Models;


use app\Trait\Authentification;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Authentification;

    protected $table = 'users';

    protected $fillable = [
        'id', 'name', 'email', 'password', 'created_at',
    ];

    protected $dispatchesEvents = [
        'deleting' => Delete::class
    ];

}
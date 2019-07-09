<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'create_name', 'create_date', 'lastedit_name', 'lastedit_date', 'position_id', 'delete_status'
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $hidden = [ 'password', 'remember_token', ];

    protected $casts = [ 'email_verified_at' => 'datetime', ];
}

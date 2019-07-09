<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'tb_branch';
    protected $fillable = [
        'branch_name', 'branch_sort', 'branch_create_id', 'branch_create_date', 'branch_lastedit_id', 'branch_lastedit_date', 'branch_delete_status'
    ];
    protected $primaryKey = 'branch_id';
    public $incrementing = false;
    public $timestamps = false;
}


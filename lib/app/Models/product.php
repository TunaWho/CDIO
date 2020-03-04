<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'vp_sanpham';
    protected $primaryKey = 'prod_id';
    protected $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'vp_comment';
    protected $primaryKey = 'com_id';
    protected $guarded = [];
}

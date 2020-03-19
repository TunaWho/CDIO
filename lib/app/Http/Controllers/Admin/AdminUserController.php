<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;

class AdminUserController extends Controller
{
    public function getUser()
    {
        $data['admin'] = users::where('level', 1)->orderBy('id','asc')->get();
        $data['user'] = users::where('level', 0)->orderBy('id','asc')->paginate(6);
        return view('myBackend.admin',$data);
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');        
    }

    public function index()
    {
        $user_id= Auth::id();
        $user = User::findOrFail($user_id);

        $name = explode(' ',$user->name);
        $first_name = array_pop($name);
        $last_name = array_shift($name);
        
        return view('admin.account-setting.account')->with(compact('user','first_name','last_name'));
    }
    
    public function notify()
    {
        return view('admin.account-setting.notify');
    }

    public function connections()
    {
        return view('admin.account-setting.connect');
    }
}

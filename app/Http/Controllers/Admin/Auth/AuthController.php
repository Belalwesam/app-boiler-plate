<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        #todos 
        #implement login using the username or email
        #use the custom guard called admins to authenticate routes 
        #work on roles , permissions and seeders for super admin
        dd($request->all());
    }
}

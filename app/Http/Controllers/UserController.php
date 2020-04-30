<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function signup(Request $formData)
    {

        print_r($formData->input());
        $formData->validate([
            'name' =>['required' , 'max:40'],
            'email' => "required | email",
            'pass' => "required",
            'repass' => "required",
            'address' => "required"
        ]);
        print_r("LODU");
        print_r($errors->all());
    }

    public function admin_page()
    {
        $users = User::all();

        return view('admin.users', ['users' => $users]);
    }
}

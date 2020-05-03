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


    public function login(Request $loginData)
    {
        $loginData -> session() -> put('loginData', $loginData -> input());
        $users = User::all();
        // print_r($users -> input());
        // print_r($loginData->session('loginData'));
        return redirect('admin/projects');
    }

    public function admin_edit(Request $userForm)
    {
        $users = User::all();
        $userForm = $userForm->input();
        return view('admin.users_edit', compact('userForm', 'users'));
    }

    public function admin_update(Request $updateForm)
    {
        if($updateForm->input('type') == 'added')
        {
            // print_r($updateForm->input());
            $user = new User;
            $user->page_id = 9;
            $user->user_name = $updateForm->input('user_name');
            $user->user_email = $updateForm->input('user_email');
            $user->user_password = $updateForm->input('user_password');
            $user->user_role = $updateForm->input('user_role');
            $user->save();

            $users = User::all();
            return view('admin.users', ['users' => $users]);
        }
    }
}

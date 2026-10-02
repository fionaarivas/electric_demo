<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        
        if (session()->get('isLogged') === true) {
            return redirect()->to('/customer-accounts');
        }

        return view('login', [
            'page' => 'login'
        ]);
    }

    public function loginSuccess()
{
    // Make sure the user is logged in
    if (session()->get('isLogged') !== true) {
        return redirect()->to('/login')
            ->with('error', 'Please log in first.');
    }

    return view('login_success', [
        'username' => session()->get('username')
    ]);
}

    public function authenticate()
    {
        $rules = [
            'username' => 'required|max_length[100]',
            'password' => 'required|max_length[255]',
        ];

        
        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please enter your username and password.');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        
        $user = $this->userModel
            ->where('username', $username)
            ->first();

        
        $validPassword = $user !== null
            && (
                password_verify($password, $user['password'])
                || hash_equals(
                    (string) $user['password'],
                    (string) $password
                )
            );

        if (!$validPassword) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid username or password.');
        }

      
        session()->regenerate();

        
        session()->set([
            'isLogged' => true,
            'isLoggedIn' => true,
            'user_id'   => $user['id'],
            'username'  => $user['username'],
        ]);

        
       return redirect()->to('/login-success');
    }

    public function logout()
    {
        
        session()->destroy();

       
        return redirect()->to('/login')
            ->with('success', 'You have been logged out.');
    }
}
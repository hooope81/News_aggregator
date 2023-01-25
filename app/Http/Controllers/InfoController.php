<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class InfoController extends Controller
{
    public function info(): View
    {
        return \view('info');
    }

    public function createUserForm(): View
    {
        return \view('userForm');
    }

    public function createOrderForm(): View
    {
        return \view('orderForm');
    }

    public function storeUserForm(Request $request): false|string
    {
        $data = 'login: ' . $request->input('login') .
            'comment: ' . $request->input('comment');

        file_put_contents('form.txt', $data);

        return file_get_contents('form.txt');
    }

    public function storeOrderForm(Request $request): false|string
    {
        $data = 'name: ' . $request->input('name') .
            'phone: ' . $request->input('phone') .
            'email: ' . $request->input('email') .
            'info: ' . $request->input('info');

        file_put_contents('orderForm.txt', $data);

        return file_get_contents('orderForm.txt');
    }
}

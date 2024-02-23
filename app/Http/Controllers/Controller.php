<?php

namespace App\Http\Controllers;

use App\Lib\ClientHttp;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login(Request $request)
    {
        $post = $request->except('_token');
        $clientHttp = new ClientHttp();
        $postLogin = $clientHttp->postLogin($post);

        if (isset($postLogin['status']) && !$postLogin['status']) {
            $request->session()->put('error', $postLogin['messages']);
            return back()->withInput();
        } else {
            session([
                'access_token' => 'Bearer ' . $postLogin['data']['access_token'],
            ]);
        }

        return redirect('dashboard');
    }
}

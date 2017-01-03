<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $data = $request->only('userName', 'email', 'password');

        User::create([
            'userName' => $data['userName'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        $client = new Client();
        $response = $client->post(env('APP_URL') . '/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 5,
                'client_secret' => 'wFGLhTtGsWsnjYuIpvom9dTI5hCqr0mAnOHiLA2U',
                'username' => $data['email'],
                'password' => $data['password'],
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}

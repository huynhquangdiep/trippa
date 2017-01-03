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
        $client = new Client();
        $response = $client->post('http://morning-brushlands-84820.herokuapp.com/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 5,
                'client_secret' => 'ruGYmGaFrAWItezqlKFJMHk9FYVo6O6uxzdQMLoj',
                'username' => $data['email'],
                'password' => $data['password'],
                'scope' => '',
            ],
        ]);
        $response = json_decode((string) $response->getBody());
        $user = [
            'userName' => $data['userName'],
            'email' => $data['email'],
            'password' => $data['password'],
            'badge' => 1,
            'longitude' => 25,
            'latitude' => 30,
            'api_token' => $response->access_token,
        ];
        User::create($user);

        return $response;
    }
}

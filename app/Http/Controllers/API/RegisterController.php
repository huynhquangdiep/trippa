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

        $currentUser = User::create([
            'userName' => $data['userName'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        $client = new Client();
        $response = $client->post(env('APP_URL') . '/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => (int) env('TRIPPA_CLIENT_ID'),
                'client_secret' => env('TRIPPA_CLIENT_SECRET'),
                'username' => $data['email'],
                'password' => $data['password'],
                'scope' => '',
            ],
        ]);

        $currentUser->api_token = json_decode((string) $response->getBody())->access_token;
        $currentUser->save();

        return json_decode((string) $response->getBody(), true);
    }
}

<?php

namespace App\Http\Controllers\API;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RefreshTokenController extends Controller
{
    public function store(Request $request)
    {
        $client = new Client();

        $response = $client->post(env('APP_URL') . '/oauth/token', [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => $request->refresh_token,
                'client_id' => (int) env('TRIPPA_CLIENT_ID'),
                'client_secret' => env('TRIPPA_CLIENT_SECRET'),
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}

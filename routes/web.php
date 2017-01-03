<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::resource('v1/api/register', 'API\RegisterController');

Route::resource('v1/api/refresh-token', 'API\RefreshTokenController');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/*//use authorization code grant
Route::group(['middleware' => 'auth'], function () {
    Route::get('/redirect', function () {
        $query = http_build_query([
            'client_id' => 5,
            'redirect_uri' => 'http://localhost:8000/callback',
            'response_type' => 'code',
            'scope' => '',
        ]);

        return redirect('http://morning-brushlands-84820.herokuapp.com/oauth/authorize?' . $query);
    });


    //use password grant
    Route::get('/password', function (Request $request) {
        $http = new GuzzleHttp\Client;

        $response = $http->post('http://morning-brushlands-84820.herokuapp.com/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 5,
                'client_secret' => 'ruGYmGaFrAWItezqlKFJMHk9FYVo6O6uxzdQMLoj',
                'username' => 'user@gmail.com',
                'password' => 'password',
                'scope' => '',
            ],
        ]);

        $currentUser = auth()->user();

        //update access_token in users table
        $currentUser->api_token = json_decode((string) $response->getBody())->access_token;
        $currentUser->save();

        return json_decode((string) $response->getBody(), true);
    });

    //use implicit grant
    Route::get('/implicit', function () {
        $query = http_build_query([
            'grant_type' => 'implicit',
            'client_id' => 1,
            'redirect_uri' => 'http://localhost:8000/callback',
            'response_type' => 'token',
            'scope' => '',
        ]);

        return redirect('http://morning-brushlands-84820.herokuapp.com/oauth/authorize?' . $query);
    });

    //use personal access client
    Route::get('personal', function() {
        $user = App\Models\User::find(1);

        // Creating a token without scopes...
        $token = $user->createToken('aaabbbcccddd')->accessToken;
        dd($token);

        // Creating a token with scopes...
        //$token = $user->createToken('My Token', ['place-orders'])->accessToken;
    });

});*/

<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->unique()->firstName,
        'email' => $faker->unique()->safeEmail,
        'introduction' => $faker->sentence,
        'password' => 'password',
        'address' => $faker->address,
        'fullname' => $faker->name,
        'password' => 'password',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Relationship::class, function (Faker\Generator $faker) {
    static $userIds;

    return [
        'following_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'follower_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'type' => config('settings.relationship')[$faker->numberBetween(0, 1)],
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'type' => $faker->numberBetween(0, 2),
    ];
});

$factory->define(App\Models\Location::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->address,
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
    ];
});

$factory->define(App\Models\Card::class, function (Faker\Generator $faker) {
    static $userIds;
    static $categoryIds;
    static $locationIds;

    return [
        'name' => $faker->sentence,
        'content' => $faker->paragraph,
        'icon' => $faker->word,
        'type' => config('settings.card')[$faker->numberBetween(0, 1)],
        'status' => $faker->numberBetween(0, 2),
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'category_id' => $faker->randomElement($categoryIds ?: $categoryIds = App\Models\Category::pluck('id')->toArray()),
        'location_id' => $faker->randomElement($locationIds ?: $locationIds = App\Models\Location::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Media::class, function (Faker\Generator $faker) {
    static $cardIds;

    return [
        'name' => $faker->word,
        'path' => $faker->url,
        'card_id' => $faker->randomElement($cardIds ?: $cardIds = App\Models\Card::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Trip::class, function (Faker\Generator $faker) {
    static $userIds;
    static $categoryIds;
    static $locationIds;

    return [
        'title' => $faker->sentence,
        'description' => $faker->sentence,
        'is_favorite' => $faker->boolean,
        'status' => $faker->numberBetween(0, 2),
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'category_id' => $faker->randomElement($categoryIds ?: $categoryIds = App\Models\Category::pluck('id')->toArray()),
        'start_location_id' => $faker->randomElement($locationIds ?: $locationIds = App\Models\Location::pluck('id')->toArray()),
        'end_location_id' => $faker->randomElement($locationIds ?: $locationIds = App\Models\Location::pluck('id')->toArray()),
        'started_at' => $faker->dateTime(),
        'ended_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\CardTrip::class, function (Faker\Generator $faker) {
    static $cardIds;
    static $tripIds;

    return [
        'card_id' => $faker->randomElement($cardIds ?: $cardIds = App\Models\Card::pluck('id')->toArray()),
        'trip_id' => $faker->randomElement($tripIds ?: $tripIds = App\Models\Trip::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Like::class, function (Faker\Generator $faker) {
    static $userIds;
    static $tripIds;

    return [
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'trip_id' => $faker->randomElement($tripIds ?: $tripIds = App\Models\Trip::pluck('id')->toArray()),
    ];
});

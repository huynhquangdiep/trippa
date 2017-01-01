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
        'userName' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'introduction' => $faker->sentence,
        'badge' => $faker->randomDigitNotNull,
        'password' => 'password',
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Gift::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'point' => $faker->randomFloat($min = 0, $max = 2),
        'total' => $faker->randomFloat($min = 0, $max = 2),
    ];
});

$factory->define(App\Models\UserGiftMapping::class, function (Faker\Generator $faker) {
    static $userIds;
    static $giftIds;

    return [
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'gift_id' => $faker->randomElement($giftIds ?: $giftIds = App\Models\Gift::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Group::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'subscribe' => $faker->boolean,
        'groupType' => $faker->randomDigitNotNull,
    ];
});

$factory->define(App\Models\GroupUserMapping::class, function (Faker\Generator $faker) {
    static $userIds;
    static $groupIds;

    return [
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'group_id' => $faker->randomElement($groupIds ?: $groupIds = App\Models\Group::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Location::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->streetAddress,
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
    ];
});

$factory->define(App\Models\CategoryTrip::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Models\Trip::class, function (Faker\Generator $faker) {
    static $userIds;
    static $categoryTripIds;

    return [
        'name' => $faker->sentence,
        'description' => $faker->paragraph,
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'category_trip_id' => $faker->randomElement($categoryTripIds ?: $categoryTripIds = App\Models\CategoryTrip::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\TripLocationMapping::class, function (Faker\Generator $faker) {
    static $tripIds;
    static $locationIds;

    return [
        'trip_id' => $faker->randomElement($tripIds ?: $tripIds = App\Models\Trip::pluck('id')->toArray()),
        'location_id' => $faker->randomElement($locationIds ?: $locationIds = App\Models\Location::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\CategoryPost::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Models\Media::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'url' => $faker->url,
    ];
});

$factory->define(App\Models\Conversation::class, function (Faker\Generator $faker) {
    static $userIds;
    static $groupIds;

    return [
        'type' =>  $faker->randomDigitNotNull,
        'hasUnreaded' => $faker->boolean,
        'unReadMessageCount' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'group_id' => $faker->randomElement($groupIds ?: $groupIds = App\Models\Group::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    static $categoryPostIds;
    static $tripIds;
    static $locationIds;

    return [
        'name' => $faker->sentence,
        'allow_comment' => $faker->boolean,
        'kind' => $faker->randomDigitNotNull,
        'distance' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100000),
        'category_post_id' => $faker->randomElement($categoryPostIds ?: $categoryPostIds = App\Models\CategoryPost::pluck('id')->toArray()),
        'trip_id' => $faker->randomElement($tripIds ?: $tripIds = App\Models\Trip::pluck('id')->toArray()),
        'location_id' => $faker->randomElement($locationIds ?: $locationIds = App\Models\Location::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\MediaTopicMapping::class, function (Faker\Generator $faker) {
    static $topicIds;
    static $mediaIds;

    return [
        'topic_id' => $faker->randomElement($topicIds ?: $topicIds = App\Models\Post::pluck('id')->toArray()),
        'media_id' => $faker->randomElement($mediaIds ?: $mediaIds = App\Models\Media::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    static $postIds;

    return [
        'name' => $faker->name,
        'body' => $faker->sentence,
        'post_id' => $faker->randomElement($postIds ?: $postIds = App\Models\Post::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Event::class, function (Faker\Generator $faker) {
    static $postIds;

    return [
        'name' => $faker->sentence,
        'duration' => $faker->randomDigitNotNull,
        'topic_id' => $faker->randomElement($postIds ?: $postIds = App\Models\Post::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Schedule::class, function (Faker\Generator $faker) {
    static $eventIds;

    return [
        'name' => $faker->sentence,
        'seconds' => $faker->randomDigitNotNull,
        'type' => $faker->randomDigitNotNull,
        'stopOnError' => $faker->boolean,
        'lastStartUtc' => $faker->dateTime,
        'lastEndUtc' => $faker->dateTime,
        'lastSuccessUtc' => $faker->dateTime,
        'event_id' => $faker->randomElement($eventIds ?: $eventIds = App\Models\Event::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Attachment::class, function (Faker\Generator $faker) {
    static $topicIds;

    return [
        'name' => $faker->word,
        'type' => $faker->randomDigitNotNull,
        'topic_id' => $faker->randomElement($topicIds ?: $topicIds = App\Models\Post::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Message::class, function (Faker\Generator $faker) {
    static $userIds;
    static $attachmentIds;
    static $conversationIds;
    static $groupIds;
    static $locationIds;

    return [
        'textContent' => $faker->sentence,
        'mediaType' => $faker->randomDigitNotNull,
        'sendDate' => $faker->datetime,
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'attachment_id' => $faker->randomElement($attachmentIds ?: $attachmentIds = App\Models\Attachment::pluck('id')->toArray()),
        'conversation_id' => $faker->randomElement($conversationIds ?: $conversationIds = App\Models\Conversation::pluck('id')->toArray()),
        'group_id' => $faker->randomElement($groupIds ?: $groupIds = App\Models\Group::pluck('id')->toArray()),
        'location_id' => $faker->randomElement($locationIds ?: $locationIds = App\Models\Location::pluck('id')->toArray()),
    ];
});

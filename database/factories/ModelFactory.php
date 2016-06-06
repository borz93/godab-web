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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Alert::class, function (Faker\Generator $faker) {
    return [
        'title' =>  $faker->word ,
        'message' =>  $faker->word ,
        'active' =>  $faker->boolean ,
    ];
});

$factory->define(App\Analysis::class, function (Faker\Generator $faker) {
    return [
        'brand' =>  $faker->word ,
        'title' =>  $faker->word ,
        'intro' =>  $faker->word ,
        'body' =>  $faker->text ,
        'vote' =>  $faker->randomNumber() ,
        'tags' =>  $faker->word ,
        'subproduct_id' =>  function () {
             return factory(App\Subproduct::class)->create()->id;
        } ,
        'user_id' =>  function () {
             return factory(App\User::class)->create()->id;
        } ,
        'file_id' =>  function () {
             return factory(App\File::class)->create()->id;
        } ,
        'slug' =>  $faker->word ,
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'title' =>  $faker->word ,
        'body' =>  $faker->text ,
        'intro' =>  $faker->word ,
        'references' =>  $faker->word ,
        'tags' =>  $faker->word ,
        'product_id' =>  function () {
             return factory(App\Product::class)->create()->id;
        } ,
        'user_id' =>  function () {
             return factory(App\User::class)->create()->id;
        } ,
        'file_id' =>  function () {
             return factory(App\File::class)->create()->id;
        } ,
        'slug' =>  $faker->word ,
    ];
});

$factory->define(App\File::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
        'route' =>  $faker->word ,
        'mimetype' =>  $faker->word ,
        'extension' =>  $faker->word ,
        'filesize' =>  $faker->randomNumber() ,
        'height' =>  $faker->word ,
        'width' =>  $faker->word ,
        'download' =>  $faker->randomNumber() ,
    ];
});

$factory->define(App\Message::class, function (Faker\Generator $faker) {
    return [
        'body' =>  $faker->text ,
        'user_id' =>  function () {
             return factory(App\User::class)->create()->id;
        } ,
    ];
});

$factory->define(App\Notification::class, function (Faker\Generator $faker) {
    return [
        'body' =>  $faker->word ,
        'category' =>  $faker->word ,
        'url' =>  $faker->url ,
        'read' =>  $faker->boolean ,
        'from' =>  $faker->randomNumber() ,
        'to' =>  $faker->randomNumber() ,
        'from_id' =>  function () {
             return factory(App\User::class)->create()->id;
        } ,
        'to_id' =>  function () {
             return factory(App\User::class)->create()->id;
        } ,
    ];
});

$factory->define(App\NutritionalInfo::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
        'analysis_id' =>  function () {
             return factory(App\Analysis::class)->create()->id;
        } ,
    ];
});

$factory->define(App\NutritionalInfoData::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
        'quantity_x' =>  $faker->randomNumber() ,
        'quantity_y' =>  $faker->randomNumber() ,
        'nutritional_info_id' =>  function () {
             return factory(App\NutritionalInfo::class)->create()->id;
        } ,
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' =>  $faker->word ,
        'body' =>  $faker->text ,
        'tags' =>  $faker->word ,
        'slug' =>  $faker->word ,
        'user_id' =>  function () {
             return factory(App\User::class)->create()->id;
        } ,
        'file_id' =>  function () {
             return factory(App\File::class)->create()->id;
        } ,
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
        'description' =>  $faker->word ,
        'file_id' =>  function () {
             return factory(App\File::class)->create()->id;
        } ,
        'slug' =>  $faker->word ,
    ];
});

$factory->define(App\Session::class, function (Faker\Generator $faker) {
    return [
        'title' =>  $faker->word ,
        'video' =>  $faker->word ,
        'body' =>  $faker->text ,
        'tags' =>  $faker->word ,
        'session_genre_id' =>  function () {
             return factory(App\SessionGenre::class)->create()->id;
        } ,
        'user_id' =>  function () {
             return factory(App\User::class)->create()->id;
        } ,
        'file_id' =>  function () {
             return factory(App\File::class)->create()->id;
        } ,
        'slug' =>  $faker->word ,
    ];
});

$factory->define(App\SessionGenre::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
        'description' =>  $faker->word ,
        'file_id' =>  function () {
             return factory(App\File::class)->create()->id;
        } ,
        'slug' =>  $faker->word ,
    ];
});

$factory->define(App\SlideImage::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
        'url' =>  $faker->url ,
        'file_id' =>  function () {
             return factory(App\File::class)->create()->id;
        } ,
    ];
});

$factory->define(App\Subproduct::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
        'description' =>  $faker->word ,
        'product_id' =>  function () {
             return factory(App\Product::class)->create()->id;
        } ,
        'file_id' =>  function () {
             return factory(App\File::class)->create()->id;
        } ,
        'slug' =>  $faker->word ,
    ];
});


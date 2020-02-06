<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Goutte\Client;

// Route::get('/', function () {
//     $client = new Client();

//     $crawler = $client->request('GET', 'https://laracasts.com/skills/laravel');
//     $crawler->filter('img')->each(
//         /**
//          * @param $node
//          */
//         function ($node) {

//             $currentData =  carbon::now()->toDateString();
//             $img =  $node->attr('src');
//             $imageName = pathinfo($img, PATHINFO_EXTENSION);
//             $image = $currentData . "-" . uniqid() . "." . $imageName;

//             $file = file_get_contents('https://laracasts.com/skills/laravel');



//             //     $save =file_put_contents( public_path('image/'.$image),$file);
Route::get('/hdtuto', function () {

    $crawler = Goutte::request('GET', 'http://laravel.com');

    // $crawler->filter('.blog-post-item h2 a')->each(function ($node) {

    //     echo  $node;
    // });

    $image = $crawler->selectImage('Laracasts')->image();
    $uri = $image->getUri();
    $body = $crawler->filter('body')->text();

    // $file = $crawler->filter('.header_content')->text();

    return view('welcome', compact('image', 'uri', 'body'));
});

//         }
//     );
//     return view('welcome', compact('file'));
// });

//Route::get('/clear-cache', function() {
//    $exitCode = Artisan::call('config:clear');
//    $exitCode = Artisan::call('cache:clear');
//    $exitCode = Artisan::call('config:cache');
//    return 'DONE'; //Return anything
//});
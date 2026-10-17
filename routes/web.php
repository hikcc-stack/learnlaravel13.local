<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider; /* Глобальные ограничения */
use App\Http\Controllers\PostController; /* Подключение контроллера */



Route::get('/newpost', [PostController::class, 'show']); // Сокращенная запись и обращения к контроллеру
Route::post('/newposts', [PostController::class, 'all']);
Route::get('/longpost', [App\Http\Controllers\Controller::class, '#']); //Удлиненная запись

Route::get('/rarepost/{id}', [PostController::class, 'shows']);
Route::get('/rarepost/{surname}/{name}', [PostController::class, 'newshow']);
Route::get('/rarepost/{id}', [PostController::class, 'oldshow']);

Route::get('/oldpost', [\App\Http\Controllers\TestController::class, 'show']);
Route::get('/oldpost/newpost/1', [\App\Http\Controllers\TestController::class, 'oldshow']);

// 39 Представления в Laravel
Route::get('/views', [\App\Http\Controllers\TestController::class, 'view']);
//Route::get('/newviews', [\App\Http\Controllers\TestController::class, 'newview']);

// 41. Структура представления
Route::get('/example', [\App\Http\Controllers\TestController::class, 'example']);
/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*
 * class AppServiceProvider extends ServiceProvider
 * {
 *      public function boot(): void
 *      {
 *          Route::pattern('id', '[0-9]+')
 *      }
 * }
 */
Route::get('/', function () {
    return "!!!!!!!!!!!!!!!!!";
});

Route::get('/about', function () {
    return "about page";
});
Route::get('/about/{id}', function ($id) {
    return "Номер страницы" . $id;
});
Route::get('/animals/{catId}/{mouseId?}', function ($catId, $mouseId=1) {
    return "Номер страницы" . $catId;
});


//Ограничения парметров маршрута в Laravel
Route::get('/post/{id}', function ($id) {
    return "post" . $id;
})->where('id', '[0-9]+'); // where - условие "где"

//Ограничения на несколько парметров
Route::get('/post/{slug}/{id}', function ($slug,$id) {
    return "slug" . $slug . "id" . $id;
})->where('slug', '[a-z0-9_-]+') //a-z - любые строчные(маленькие) буквы латинского алфавита от а до я
    ->where('id', '[0-9]+'); //a-z - любые строчные(маленькие) буквы латинского алфавита от а до я

//Шаблонные ограничения парметров маршрутов
Route::get('/posts/{id}', function ($id) {
    return "post" . $id;
})->whereNumber('id'); // ограничения только цифрами


//Шаблонные ограничения парметров маршрутов
Route::get('/posts/{id}', function ($id) {
    return "post" . $id;
})->whereAlpha('id'); // ограничения только буквами

//Шаблонные ограничения парметров маршрутов
Route::get('/users/{order}', function ($order) {
    return "sort" . $order;
})->whereIn('order', ['name', 'surname','age']); // ограничения только цифрами и буквами

//Разрешение конфликтов маршрутов
Route::get('/get/{id}', function ($id) {
    return 'id';
})->whereNumber('id');
ROute::get('/get/all', function () {
   return 'all';
});

// Группировка маршрутов в Laravel
// вынесем в общую часть через prefix и group
Route::prefix('blog')->group(function () {
    Route::get('/blog/post/all', function () {
        return 'all';
    });
    Route::get('/blog/post/{id}', function ($id) {
        return $id;
    });
});

// Именованные маршруты в Laravel
Route::get('/newblog/all/{id}', function ($id) {
    return 'blogs' . $id;
})->name('blogs');


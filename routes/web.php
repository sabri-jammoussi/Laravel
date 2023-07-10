<?php

use App\Http\Controllers\ComputerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StaticController;
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
Route::get('/.', [StaticController::class,'index'])->name('home.index');
Route::get('/about', [StaticController::class, 'about'])->name('home.about');
Route::get('/contact', [StaticController::class, 'contact'])->name('home.contact');
Route::get('/portfolio', [StaticController::class, 'portfolio'])->name('home.portfolio');


Route::resource('computers', ComputerController::class);


Route::get('/', function () {
    return view('welcome');
});

// using /category/...
// Route::get('/store/{category?}/{item?}', function ($category= null , $item=null ) {
//     if(isset($category)){
//         if(isset($item)){
//             return '<h1>' . $item . '</h1>';
//         }
//         return '<h1>' . $category . '</h1>';
//     }
//     return 'STORe';
// });

/*
Route::get('/about', function () {
    return view('about');
});
// style using ?style 
Route::get('/store', function () {
    $filter=request('style');

if(isset($filter)){
    return 'this page is viewing <span style="color :red" >' . $filter . '</span>';
}
else
{
    return 'this page is viewing <span style="color :red" >No product selected</span>';
}
});
*/
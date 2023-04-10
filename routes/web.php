<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\Brand\Index;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\dashbordController;
use App\Http\Controllers\FrontEnd\OrderController;
use App\Http\Controllers\admin\AdminOrderController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\FrontEnd\wishlistController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    require __DIR__.'/auth.php';
    Auth::routes();
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
###################################################################################################



//---------------------------- admin-------------------------------------------------
  Route::group(['prefix' => LaravelLocalization::setLocale().'/admin','middleware' => [ 'auth', 'admin' ]],
    function(){ 
        Route::get('dashbord',[dashbordController::class,'index']);
        Route::resource('category',categoryController::class);
        Route::get('/brands',Index::class); 
        Route::resource('product', ProductController::class);
        Route::get('product_image/{product_image_id}/delete',[ ProductController::class,'disroyImage'])->name('remove.product_image');
        Route::resource('color', ColorController::class);
        Route::post('product-color/{product_color_id}', [ProductController::class,'updateProductQty']);
        Route::get('product-color/{product_color_id}/delete', [ProductController::class,'deleteProdColor']);
        Route::resource('slider', SliderController::class);
        Route::resource('order', AdminOrderController::class);
        Route::get('invoice/{id}', [AdminOrderController::class,'showInvoice']);
        Route::get('invoice/{id}/generate', [AdminOrderController::class,'invoiceGenerate']);

    });
    // ----------------------------- Front End-------------------------------------------

Route::group(
    ['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
     function(){ 
        Route::get('/',[FrontEndController::class,'index']);
        Route::get('/collections',[FrontEndController::class,'categories']);
        Route::get('/thank-you',[FrontEndController::class,'thankYou']);
        Route::get('collections/{category_slug}/',[FrontEndController::class,'product']);
        Route::get('collections/{category_slug}/{product_slug}',[FrontEndController::class,'ShowProduct']);
        Route::resource('wishlist', wishlistController::class)->middleware('auth');
        Route::resource('Cart', CartController::class)->middleware('auth');
        Route::resource('checkout', CheckoutController::class)->middleware('auth');
        Route::resource('order', OrderController::class)->middleware('auth');




        







        Route::get('/fonts',function(){
            return view('fonts');
        });
        Route::get('/myslider', function () {
            return view('slider');
         });
        Route::get('/header', function () {
            return view('header');
         });

         
    });
// -----------------------------------------------------------------
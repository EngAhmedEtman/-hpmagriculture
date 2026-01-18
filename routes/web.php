<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontStore\HomeController;
use App\Http\Controllers\FrontStore\ProductController as FrontStoreProductController;
use App\Http\Controllers\FrontStore\MessageController as FrontStoreMessageController;
use App\Http\Controllers\FrontStore\FAQsController;
use App\Http\Controllers\FrontStore\OrderController as confirmOrderController;
use App\Http\Controllers\FrontStore\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\FrontStore\CategoryController as FrontStoreCategoryController;

/*
|--------------------------------------------------------------------------
| Public / Guest Routes
|--------------------------------------------------------------------------
*/

// الصفحة الرئيسية - يمكن تحويلها تلقائيًا للـ dashboard إذا مسجل دخول
Route::get('/', function () {
    return redirect()->route('home');
});

//front store
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/store/products', [FrontStoreProductController::class, 'index'])->name('storeProducts');
Route::get('/store/products/{id}', [FrontStoreProductController::class, 'show'])->name('storeProduct.show');
Route::get('/contact', [FrontStoreMessageController::class, 'index'])->name('contactForm');
Route::post('/contact', [FrontStoreMessageController::class, 'store'])->name('submitContactForm');
Route::get('/aboutUs', function () {
    return view('FrontStore.about');
})->name('aboutUs');
Route::get('/FAQs', [FAQsController::class, 'index'])->name('faqs');
Route::get('/confirmOrder/{totalPrice}', [confirmOrderController::class, 'index'])->name('confirmOrder');
Route::post('/confirmOrder/store', [confirmOrderController::class, 'store'])->name('submitOrder');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/showProductsByCategory/{id}', [FrontStoreCategoryController::class, 'getCategorProducts'])->name('showProductsByCategory');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ملفات auth الخاصة بـ Breeze (login, register, password reset)
require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| Protected Routes (Authenticated Users Only)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard Home
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */
    Route::controller(ProfileController::class)
        ->prefix('profile')
        ->as('profile.')
        ->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::patch('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
        });


    /*
    |--------------------------------------------------------------------------
    | Dashboard Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('dashboard')->group(function () {

        /*
        | Products
        */
        Route::resource('products', ProductController::class);
        Route::patch('products/{product}/toggle-special',
            [ProductController::class, 'toggleSpecial']
        )->name('products.toggle-special');


        /*
        | Categories
        */
        Route::resource('categories', CategoryController::class);


        /*
        | Orders
        */
        Route::resource('orders', OrderController::class);

        Route::patch('orders/{order}/update-status',
            [OrderController::class, 'updateStatus']
        )->name('orders.update-status');

        Route::get('orders-pending', [OrderController::class, 'pending'])->name('orders.pending');
        Route::get('orders-processing', [OrderController::class, 'processing'])->name('orders.processing');
        Route::get('orders-shipped', [OrderController::class, 'shipped'])->name('orders.shipped');
        Route::get('orders-delivered', [OrderController::class, 'delivered'])->name('orders.delivered');
        Route::get('orders-cancelled', [OrderController::class, 'cancelled'])->name('orders.cancelled');


        /*
        | Users
        */
        Route::resource('users', UserController::class);


        /*
        | FAQs
        */
        Route::resource('faqs', FaqController::class);


        /*
        | Messages
        */
        Route::resource('messages', MessageController::class);
        Route::post('messages/{message}/mark-as-read',
            [MessageController::class, 'markAsRead']
        )->name('messages.markAsRead');


        /*
        | Admin Pages (Dynamic)
        */
        Route::get('{page}', [AdminController::class, 'index'])
            ->name('admin.page');

    });
});


/*
|--------------------------------------------------------------------------
| Test Route (Optional)
|--------------------------------------------------------------------------
*/
Route::get('/test', function () {
    return view('adminDashboard.form-advanced');
});

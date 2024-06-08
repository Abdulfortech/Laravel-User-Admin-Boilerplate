<?php

use App\Http\Controllers\admin\AdminOrdersController;
use App\Http\Controllers\admin\AdminsController;
use App\Http\Controllers\admin\ComponentController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SuppliersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
    General Routes
*/
Route::get('/', [GeneralController::class, 'index'])->name('index');

// errors
Route::get('/error-500', function () {
    abort(500, 'Something went wrong!');
});
Route::fallback(function () {
    return view('errors.404');
});


/*********************************************************************
**********************************************************************
                            USER ROUTES
**********************************************************************
*********************************************************************/


// auth
Route::group(['prefix' => 'auth'], function () {
    Route::get('/signin', [AuthController::class, 'showSignin'])->name('auth.login');
    Route::post('/signin', [AuthController::class, 'signin'])->name('auth.signin');
    Route::get('/signup', [AuthController::class, 'showSignup'])->name('auth.register');
    Route::post('/signup', [AuthController::class, 'signup'])->name('auth.signup');
    Route::get('/forget-password', [AuthController::class, 'showForgetPassword'])->name('auth.showForgetPassword');
    Route::post('/forget-password', [AuthController::class, 'forgetPassword'])->name('auth.forgetPassword');
    Route::get('/reset-password', [AuthController::class, 'showResetPassword'])->name('auth.showResetPassword');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('auth.resetPassword');
    Route::get('/signout', [AuthController::class, 'signout'])->name('auth.signout')->middleware(['auth:web']);
});


Route::group(['prefix' => 'user'], function () {
    Route::middleware(['auth:web','checkUserStatus'])->group(function () {
        // user
        Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
        Route::get('/account', [UserController::class, 'myAccount'])->name('user.account');
        Route::get('/orders', [UserController::class, 'myOrders'])->name('user.orders');
        Route::get('/reviews', [UserController::class, 'myReviews'])->name('user.reviews');
        Route::get('/profile', [UserController::class, 'showProfile'])->name('user.showProfile');
        Route::get('/profile-edit', [UserController::class, 'showEditProfile'])->name('user.editProfile');
        Route::post('/profile-update', [UserController::class, 'updateProfile'])->name('user.profile');
        Route::get('/password-edit', [UserController::class, 'showEditPassword'])->name('user.editPassword');
        Route::post('/password', [UserController::class, 'updatePassword'])->name('user.password');
        Route::get('/logs', [UserController::class, 'logs'])->name('user.logs');

    });
});

/*********************************************************************
**********************************************************************
                            ADMIN ROUTES
**********************************************************************
*********************************************************************/

Route::group(['prefix' => 'admin'], function () {
    Route::get('/signin', [AdminController::class, 'showLoginForm'])->name('admin.signin');
    Route::post('/signin', [AdminController::class, 'login'])->name('admin.signin');
    Route::get('/register', [AdminController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'register']);
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        // // admins
        Route::group(['prefix' => 'admins'], function () {
            Route::get('/', [AdminsController::class, 'index'])->name('admins');
            Route::get('/add', [AdminsController::class, 'showAddAdmin'])->name('admin.showAdd');
            Route::get('/view/{admin}', [AdminsController::class, 'showAdmin'])->name('admin.showView');
            Route::get('/edit/{admin}', [AdminsController::class, 'showEditAdmin'])->name('admin.showEdit');
            Route::post('/add', [AdminsController::class, 'addAdmin'])->name('admin.add');
            Route::post('/edit/{admin}', [AdminsController::class, 'editAdmin'])->name('admin.edit');
            Route::get('/delete/{admin}', [AdminsController::class, 'deleteAdmin'])->name('admin.delete');
            Route::get('/deactivate/{admin}', [AdminsController::class, 'deactivateAdmin'])->name('admin.deactivate');
            Route::get('/activate/{admin}', [AdminsController::class, 'activateAdmin'])->name('admin.activate');
        });
        // // users
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [UsersController::class, 'index'])->name('admin.users');
            Route::get('/view/{user}', [UsersController::class, 'showUser'])->name('admin.users.view');
            Route::get('/logs/{user}', [UsersController::class, 'userLogs'])->name('admin.users.log');
            Route::get('/delete/{user}', [UsersController::class, 'deleteUser'])->name('admin.users.delete');
            Route::get('/deactivate/{user}', [UsersController::class, 'deactivateUser'])->name('admin.users.deactivate');
            Route::get('/activate/{user}', [UsersController::class, 'activateUser'])->name('admin.users.activate');
        });
        // products
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.products');
            Route::get('add', [ProductController::class, 'add'])->name('admin.products.add');
            Route::post('/add', [ProductController::class, 'store'])->name('admin.products.store');
            Route::get('/view/{product}', [ProductController::class, 'view'])->name('admin.products.view');
            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.products.edit');
            Route::post('/edit/{product}', [ProductController::class, 'update'])->name('admin.products.update');
            Route::get('/delete/{product}', [ProductController::class, 'delete'])->name('admin.products.delete');
            Route::get('/activate/{product}', [ProductController::class, 'activate'])->name('admin.products.activate');
            Route::get('/deactivate/{product}', [ProductController::class, 'deactivate'])->name('admin.products.deactivate');
            // Route::get('/print/all', [ProductController::class, 'pdfAll'])->name('products.printAll');
            // Route::get('/print/{product}', [ProductController::class, 'pdf'])->name('products.print');
            Route::get('/list', [ProductController::class, 'searchProducts']);
        });
        // // components & others
        Route::get('/components', [ComponentController::class, 'index'])->name('admin.components');
        Route::get('/company-profile', [ComponentController::class, 'companyProfile'])->name('admin.company');
        Route::post('/company-profile', [ComponentController::class, 'updateCompany'])->name('admin.updateCompany');
        Route::get('/company-media', [ComponentController::class, 'companyMedia'])->name('admin.companyMedia');
        Route::post('/company-logo', [ComponentController::class, 'updateLogo'])->name('admin.updateLogo');
        Route::post('/company-banner', [ComponentController::class, 'updateBanner'])->name('admin.updateBanner');
        Route::get('/categories', [ComponentController::class, 'categories'])->name('admin.categories');
        Route::post('/categories', [ComponentController::class, 'addCategory'])->name('admin.addCategory');
        Route::get('/categories/{category}/delete', [ComponentController::class, 'categoryDelete'])->name('admin.categoryDelete');
        Route::get('/subcategories', [ComponentController::class, 'subcategories'])->name('admin.subcategories');
        Route::post('/subcategories', [ComponentController::class, 'addSubcategory'])->name('admin.addSubcategory');
        Route::get('/subcategories/{subcategory}', [ComponentController::class, 'subcategoryDelete'])->name('admin.subcategoryDelete');
        Route::get('/brands', [ComponentController::class, 'brands'])->name('admin.brands');
        Route::post('/brands', [ComponentController::class, 'addBrand'])->name('admin.addBrand');
        Route::get('/brands/{brand}', [ComponentController::class, 'brandDelete'])->name('admin.brandDelete');
        Route::get('/slideshows', [ComponentController::class, 'slideshows'])->name('admin.slideshows');
        Route::post('/slideshows/add', [ComponentController::class, 'addSlideshow'])->name('admin.addSlideshow');
        Route::post('/slideshows/update/{slideshow}', [ComponentController::class, 'updateSlideshow'])->name('admin.updateSlideshow');
        Route::get('/slideshows/view/{slideshow}', [ComponentController::class, 'slideshowView'])->name('admin.slideshowView');
        Route::get('/slideshows/delete/{slideshow}', [ComponentController::class, 'slideshowDelete'])->name('admin.slideshowDelete');

        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
})->middleware('redirect.admin.authenticated');

<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentCotroller;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductimageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Home\AddressController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CategoryController as HomeCategoryController;
use App\Http\Controllers\Home\CommentCotroller as HomeCommentCotroller;
use App\Http\Controllers\Home\CompareController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\IndexCategoryController;
use App\Http\Controllers\Home\PaymentController;
use App\Http\Controllers\Home\ProductController as HomeProductController;
use App\Http\Controllers\Home\UserProfileController;
use App\Http\Controllers\Home\WishlistController;
use App\Models\User;
use App\Notifications\OTPSms;
use Ghasedak\GhasedakApi;
use Illuminate\Support\Facades\Route;
use Ghasedak\Laravel\GhasedakFacade;


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

Route::get('/admin-panel/dashboard', [AdminController::class, 'index'])->middleware('role:admin|products_management|users_management|settings_management|shoping_management|orders_management')->name('dashboard');

Route::prefix('admin-panel/management')->name('admin.')->middleware('role:admin|products_management|users_management|settings_management|shoping_management|orders_management')->group(function () {
    // Products
    Route::resource('brands', BrandController::class)->middleware('role:products_management|admin');
    Route::resource('attributes', AttributeController::class)->middleware('role:products_management|admin');
    Route::resource('categories', CategoryController::class)->middleware('role:products_management|admin');
    Route::resource('tags', TagController::class)->middleware('role:products_management|admin');
    Route::resource('products', ProductController::class)->middleware('role:products_management|admin');
    Route::resource('comments', CommentCotroller::class)->middleware('role:products_management|admin');
    // Orders
    Route::resource('coupons', CouponController::class)->middleware('role:orders_management|admin');
    Route::resource('orders', OrderController::class)->middleware('role:orders_management|admin');
    Route::resource('transactions', TransactionController::class)->middleware('role:orders_management|admin');
    // Users
    Route::resource('users', UserController::class)->middleware('role:users_management|admin');
    Route::resource('permissions', PermissionController::class)->middleware('role:users_management|admin');
    Route::resource('roles', RoleController::class)->middleware('role:users_management|admin');
    // Settings
    Route::resource('banners', BannerController::class)->middleware('role:settings_management|admin');





    // Approve Change
    Route::get('/comments/{comment}/change-approve', [CommentCotroller::class, 'changeApprove'])->name('comments.change-approve')->middleware('role:products_management|admin');

    // Get Category Attribute
    Route::get('/category-attributes/{category}', [CategoryController::class, 'getCategoryAttributes'])->middleware('role:products_management|admin');

    // Edit Product Images
    Route::get('/products/{product}/image-edit', [ProductimageController::class, 'edit'])->name('products.image.edit')->middleware('role:products_management|admin');
    Route::delete('/products/{product}/image-destroy', [ProductimageController::class, 'destroy'])->name('products.image.destroy')->middleware('role:products_management|admin');
    Route::put('/products/{product}/image-set-primary', [ProductimageController::class, 'setPrimary'])->name('products.image.set_primary')->middleware('role:products_management|admin');
    Route::post('/products/{product}/image-add', [ProductimageController::class, 'add'])->name('products.image.add')->middleware('role:products_management|admin');

    // Edit Product Category
    Route::get('/products/{product}/edit-category', [ProductController::class, 'editCategory'])->name('products.edit.category')->middleware('role:products_management|admin');
    Route::put('/products/{product}/update-category', [ProductController::class, 'updateCategory'])->name('products.update.category')->middleware('role:products_management|admin');
});


// Comments
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/categories/{category:slug}', [HomeCategoryController::class, 'show'])->name('home.categories.show');
Route::get('/products/{product:slug}', [HomeProductController::class, 'show'])->name('home.products.show');
Route::post('/comments/{product}', [HomeCommentCotroller::class, 'store'])->name('home.comments.store');

// Wishlist
Route::get('/add-to-wishlist/{product}', [WishlistController::class, 'add'])->name('home.wishlist.add');
Route::get('/remove-from-wishlist/{product}', [WishlistController::class, 'remove'])->name('home.wishlist.remove');

// Compare
Route::get('/compare', [CompareController::class, 'index'])->name('home.compare.index');
Route::get('/add-to-compare/{product}', [CompareController::class, 'add'])->name('home.compare.add');
Route::get('/remove-from-compare/{product}', [CompareController::class, 'remove'])->name('home.compare.remove');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('home.cart.index');
Route::post('/add-to-cart', [CartController::class, 'add'])->name('home.cart.add');
Route::put('/cart', [CartController::class, 'update'])->name('home.cart.update');
Route::get('/remove-from-cart/{rowId}', [CartController::class, 'remove'])->name('home.cart.remove');
Route::get('/cart-clear', [CartController::class, 'clear'])->name('home.cart.clear');
Route::post('/check-coupon', [CartController::class, 'checkCoupon'])->name('home.cart.check_coupon');
Route::post('/forget-coupon', [CartController::class, 'forgetCoupon'])->name('home.forget_coupon');

Route::get('/checkout', [CartController::class, 'checkout'])->name('home.orders.checkout');

Route::post('/payment', [PaymentController::class, 'payment'])->name('home.payment');
Route::get('/payment-verify/{gatewayName}', [PaymentController::class, 'paymentVerify'])->name('home.payment_verify');


// oAuth Authentication
Route::get('/login/{provider}', [AuthController::class, 'redirectToProvider'])->name('provider.login');
Route::get('/login/{provider}/callback', [AuthController::class, 'handleProviderCallback']);

// OTP Authentication
Route::any('/login-cellphone', [OtpController::class, 'login'])->name('login.cellphone');


// Users Profile
Route::prefix('profile')->name('home.')->group(function () {
    Route::get('/', [UserProfileController::class, 'index'])->name('users_profile.index');
    Route::put('/updateProfile/{user}', [UserProfileController::class, 'updateUserProfile'])->name('users_profile.update');
    Route::put('/updateprofilepassword/{user}', [UserProfileController::class, 'updateUserProfilePassword'])->name('users_profile.updatepassword');
    Route::get('/logout', [UserProfileController::class, 'logoutUser'])->name('users_profile.logoutuser');
    Route::get('/comments', [HomeCommentCotroller::class, 'UserProfile'])->name('comments.users_profile');
    Route::get('/wishlist', [WishlistController::class, 'UserProfile'])->name('wishlist.users_profile');
    Route::get('/orders', [CartController::class, 'UserOrders'])->name('orders.users_profile');

    Route::get('/addresses', [AddressController::class, 'index'])->name('user.addresses.index');
    Route::post('/addresses', [AddressController::class, 'store'])->name('user.addresses.store');
    Route::put('/addresses/{address}', [AddressController::class, 'update'])->name('user.addresses.update');
});

// Address
Route::get('/get-province-cities-list', [AddressController::class, 'getProvinceCitiesList']);


Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('home.about_us');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('home.contact_us');
Route::post('/contact-us-form', [HomeController::class, 'contactUsForm'])->name('home.contact_us_form');


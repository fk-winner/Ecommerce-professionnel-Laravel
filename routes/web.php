<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

           //////// Admin section
    //// Cattegories
    Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
    Route::post('admin/store/category', 'Admin\Category\CategoryController@storecategory')->name('store.category');
    Route::get('delete/category/{id}', 'Admin\Category\CategoryController@Deletecategory');
    Route::get('edit/cateory/{id}', 'Admin\Category\CategoryController@Editcategory');
    Route::post('update/category/{id}', 'Admin\Category\CategoryController@Updatecategory');
    //// Brand
    Route::get('admin/brands', 'Admin\Category\BrandController@brand')->name('brands');
    Route::post('admin/store/brand', 'Admin\Category\BrandController@storebrand')->name('store.brand');
    Route::get('delete/brand/{id}', 'Admin\Category\BrandController@Deletebrand');
    Route::get('edit/brand/{id}', 'Admin\Category\BrandController@Editbrand');
    Route::post('update/brand/{id}', 'Admin\Category\BrandController@Updatebrand');

    //// Sub-Categories
    Route::get('admin/sub/categories', 'Admin\Category\SubCategoryController@SubCategory')->name('sub.categories');
    Route::post('admin/store/subcategory', 'Admin\Category\SubCategoryController@Storecategory')->name('store.subcatgory');
    Route::get('delete/sub/category/{id}', 'Admin\Category\SubCategoryController@Deletesubcat');
    Route::get('edit/sub/cateory/{id}', 'Admin\Category\SubCategoryController@Editsubcat');
    Route::post('update/sub/category/{id}', 'Admin\Category\SubCategoryController@Updatesubcat');

    //// Coupons
    Route::get('admin/coupon', 'Admin\Category\CouponController@Coupon')->name('admin.coupon');
    Route::post('admin/store/coupon', 'Admin\Category\CouponController@Storecoupon')->name('store.coupon');
    Route::get('delete/coupon/{id}', 'Admin\Category\CouponController@Deletecoupon');
    Route::get('edit/coupon/{id}', 'Admin\Category\CouponController@Editcoupon');
    Route::post('update/coupon/{id}', 'Admin\Category\CouponController@Updatecoupon');

    //// Newslaters
    Route::get('admin/newslater', 'Admin\Category\CouponController@Newslater')->name('admin.newslater');
    Route::get('delete/sub/{id}', 'Admin\Category\CouponController@Deletesubscriber');


    //// Frontend All Routes
    Route::post('store/newslater', 'FrontendController@StoreNewslater')->name('store.neslaters');





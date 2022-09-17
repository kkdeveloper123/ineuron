<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\BlogsController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\FaqsController;
use App\Http\Controllers\admin\PagesController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SeoController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SubadminController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\TemplatePagesController;
use App\Http\Controllers\admin\UsersAdminController;
use App\Http\Controllers\admin\EmailingController;
use App\Http\Controllers\admin\AjaxController;
use App\Http\Controllers\admin\ExamEventsController;
use App\Http\Controllers\admin\TagsController;

use App\Http\Controllers\admin\SubjectController;
use App\Http\Controllers\admin\TopicController;



// -------------------------------------------WEB-----------------------------------------------

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

// Route::get('/', function () {
//     return view('site.index');
// });

// Route::get('/mailable', function () {
//     $data = ["heading" => "Reset Password",
//         "link" => "asdas",
//         'msg' => "If you've lost password or wish to reset it, use the link below to get started.",
//         'btn_text' => "Reset Your Password",
//         'footer' => 'If you did not request a password reset, you can safely ignore this email. Only a person with access to your email can reset your account password.',
//     ];
//     return new App\Mail\AuthMail($data);
// });

// Route::view('/welcome', 'welcome');

Route::prefix('project-admin-panel')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::view('/login', 'admin/auth/login')->name('admin.login');
        Route::post('/login-verify', [AuthController::class, 'loginAuth'])->name('admin.login-verify');
        Route::view('/forgot-password', 'admin/auth/forgot-password')->name('admin.forgot-password');
        Route::post('/forgot-email-verify', [AuthController::class, 'forgotEmailVerify'])->name('admin.forgotEmailVerify');
        Route::get('/reset-password/{id}', [AuthController::class, 'resetPassword'])->name('admin.reset-password');
        Route::post('/reset-password-verify/{id}', [AuthController::class, 'verifyResetPassword'])->name('admin.reset-password-verify');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

        Route::post('/data-status-change', [AdminController::class, 'changeStatus'])->name('admin.changeStatus');
        Route::get('/delete-data/{id}/{table}', [AdminController::class, 'delete_data'])->name('admin.deleteData');

        //USERS
        Route::get('users', [UsersAdminController::class, 'index'])->name('admin.usersIndex');
        Route::get('edit-users/{id}', [UsersAdminController::class, 'edit_users'])->name('admin.editUsers');
        Route::post('update-users/{id}', [UsersAdminController::class, 'update_users'])->name('admin.updateUsers');

        // PROFILE
        Route::get('/profile', [ProfileController::class, 'index'])->name('admin.getProfile');
        Route::post('/save-profile', [ProfileController::class, 'save_profile'])->name('admin.setProfile');

        // PAGE
        Route::get('privacy-policy', [PagesController::class, 'privacy_policy'])->name('admin.privacyPolicy');
        Route::post('update-privacy-policy', [PagesController::class, 'update_privacy_policy'])->name('admin.updatePrivacyPolicy');

        // CATEGORIES
        // Route::middleware('subadminAccess:category_section')->group(function () {
        Route::get('categories', [CategoriesController::class, 'index'])->name('admin.categoryIndex');
        Route::post('insert-categories', [CategoriesController::class, 'insert_categories'])->name('admin.insertCategories');
        Route::get('edit-category/{slug}', [CategoriesController::class, 'edit_category'])->name('admin.editCategory');
        Route::put('update-category/{slug}', [CategoriesController::class, 'update_category'])->name('admin.updateCategory');
        // });


        //SETTINGS
        Route::get('payment-settings', [SettingController::class, 'index'])->name('admin.settingIndex');
        Route::post('insert-payment-setting/{type}', [SettingController::class, 'insert_payment_setting'])->name('admin.insertPaymentSetting');
        // Route::post('insert-amount', [SettingController::class, 'insert_amount'])->name('admin.insertAmount');

        Route::get('email-settings', [SettingController::class, 'email_config_index'])->name('admin.emailSettingIndex');
        Route::post('email-modify', [SettingController::class, 'email_config_modify'])->name('admin.emailModify');

        Route::get('show-payments', [SettingController::class, 'show_payments'])->name('admin.showPayments');

        // EMAILS 
        Route::get('email-system/{slug}', [EmailingController::class, 'index'])->name('admin.emailIndex');
        Route::get('compose', [EmailingController::class, 'email_compose_page'])->name('admin.emailCompose');
        Route::post('send-emails', [EmailingController::class, 'compose_emails'])->name('admin.emailSend');
    });
});

// -------------------------------------------WEB-----------------------------------------------

Route::name('web.')->group(function () {
});

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

        // BLOGS
        Route::get('/blogs', [BlogsController::class, 'index'])->name('admin.blogs');
        Route::get('/add-blogs', [BlogsController::class, 'add_blogs_page'])->name('admin.blogs-add');
        Route::post('/insert-blogs', [BlogsController::class, 'insert_blogs'])->name('admin.insertBlogs');
        Route::get('/edit-blogs/{id}', [BlogsController::class, 'edit_blog'])->name('admin.editBlogs');
        Route::post('/update-blogs/{id}', [BlogsController::class, 'update_blog'])->name('admin.updateBlogs');
        Route::get('/delete-blogs/{id}', [BlogsController::class, 'delete_blogs'])->name('admin.deleteBlogs');
        Route::post('/blog-status-change', [BlogsController::class, 'blog_status_change'])->name('admin.changeBlogStatus');
        Route::get('/delete-blog-images/{slug}/{key}', [BlogsController::class, 'delete_blog_image'])->name('admin.deleteBlogImages');

        Route::get('/blogs-cate', [BlogsController::class, 'cate_blogs'])->name('admin.blogs-category');
        Route::post('/blogs-cate-insert', [BlogsController::class, 'cate_blogs_insert'])->name('admin.blogs-category-insert');
        Route::get('edit-blogs-cate/{slug}', [BlogsController::class, 'edit_cate_blogs'])->name('admin.edit-blogs-category');
        Route::post('update-blogs-cate/{slug}', [BlogsController::class, 'update_cate_blogs'])->name('admin.update-blogs-category');

        // PROFILE
        Route::get('/profile', [ProfileController::class, 'index'])->name('admin.getProfile');
        Route::post('/save-profile', [ProfileController::class, 'save_profile'])->name('admin.setProfile');

        // TEMPLATE PAGES
        Route::get('template-pages', [TemplatePagesController::class, 'index'])->name('admin.templatePages');
        Route::get('add-template-page', [TemplatePagesController::class, 'add_template_page'])->name('admin.addTemplate');
        // Route::post('insert-template', [TemplatePagesController::class, 'insert_Template'])->name('admin.insertTemplate');
        // Route::get('edit-template/{id}', [TemplatePagesController::class, 'edit_Template'])->name('admin.editTemplate');
        // Route::get('update-template/{id}', [TemplatePagesController::class, 'update_Template'])->name('admin.updateTemplate');

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

        // SUB CATEGORIES
        Route::get('sub-categories', [SubcategoryController::class, 'index'])->name('admin.subcategoryIndex');
        Route::post('insert-subcategories', [SubcategoryController::class, 'insert_subcategories'])->name('admin.insertSubcategories');
        Route::get('edit-subcategory/{slug}', [SubcategoryController::class, 'edit_subcategory'])->name('admin.editSubcategory');
        Route::put('update-subcategory/{slug}', [SubcategoryController::class, 'update_subcategory'])->name('admin.updateSubcategory');
        Route::post('get-subcategory-by-cate', [AjaxController::class, 'get_subcategory_by_cate'])->name('admin.getSubcategoryByCate');


        // SUBJECT
        Route::get('subject', [SubjectController::class, 'index'])->name('admin.subjectIndex');
        Route::post('insert-subject', [SubjectController::class, 'insert_subject'])->name('admin.insertSubject');
        Route::get('edit-subject/{slug}', [SubjectController::class, 'edit_subject'])->name('admin.editSubject');
        Route::put('update-subject/{slug}', [SubjectController::class, 'update_subject'])->name('admin.updateSubject');

        // TOPIC
        Route::get('topic', [TopicController::class, 'index'])->name('admin.topicIndex');
        Route::post('insert-topic', [TopicController::class, 'insert_topic'])->name('admin.insertTopic');
        Route::get('edit-topic/{slug}', [TopicController::class, 'edit_topic'])->name('admin.editTopic');
        Route::put('update-topic/{slug}', [TopicController::class, 'update_topic'])->name('admin.updateTopic');


        //SETTINGS
        Route::get('payment-settings', [SettingController::class, 'index'])->name('admin.settingIndex');
        Route::post('insert-payment-setting/{type}', [SettingController::class, 'insert_payment_setting'])->name('admin.insertPaymentSetting');
        // Route::post('insert-amount', [SettingController::class, 'insert_amount'])->name('admin.insertAmount');

        Route::get('email-settings', [SettingController::class, 'email_config_index'])->name('admin.emailSettingIndex');
        Route::post('email-modify', [SettingController::class, 'email_config_modify'])->name('admin.emailModify');

        Route::get('show-payments', [SettingController::class, 'show_payments'])->name('admin.showPayments');

        //SUBADMIN

        Route::get('subadmin', [SubadminController::class, 'index'])->name('admin.subadminIndex');
        Route::view('/add-subadmin', 'admin/subadmin/add')->name('admin.addSubadmin');
        Route::post('/insert-subadmin', [SubadminController::class, 'insert_admin'])->name('admin.insertSubadmin');
        Route::get('/subadmin-access/{id}', [SubadminController::class, 'subadmin_access'])->name('admin.subadminAccess');
        Route::any('/subadmin-insert-access/{name}', [SubadminController::class, 'insert_subadmin_access'])->name('admin.subadminInsertAccess');

        //ATTRIBUTE
        Route::get('attribute', [AttributeController::class, 'index'])->name('admin.attributeIndex');
        Route::post('insert-attribute', [AttributeController::class, 'insert_attribute'])->name('admin.insertAttribute');
        Route::get('edit-attribute/{slug}', [AttributeController::class, 'index'])->name('admin.attributeEdit');
        Route::post('update-attribute/{slug}', [AttributeController::class, 'insert_attribute'])->name('admin.attributeUpdate');

        //ATTRIBUTE VALUE
        Route::get('attribute-values', [AttributeController::class, 'attr_val_Index'])->name('admin.attrValIndex');
        Route::post('insert-attribute-values', [AttributeController::class, 'insert_attr_val'])->name('admin.insertAttrVal');
        Route::get('edit-attribute-value/{id}', [AttributeController::class, 'edit_attr_val'])->name('admin.editAttrVal');
        Route::post('update-attribute-value/{id}', [AttributeController::class, 'update_attr_val'])->name('admin.updateAttrVal');
        // ATTRIBUTE
        Route::get('edit-attribute/{slug}', [AttributeController::class, 'index'])->name('admin.attributeEdit');
        Route::post('update-attribute/{slug}', [AttributeController::class, 'insert_attribute'])->name('admin.atstributeUpdate');

        // EXAM EVENTS
        Route::get('exam-events', [ExamEventsController::class, 'index'])->name('admin.examEventsIndex');
        Route::post('insert-exam-events', [ExamEventsController::class, 'insert_exam_events'])->name('admin.insertExamEvents');
        Route::get('edit-exam-events/{slug}', [ExamEventsController::class, 'edit_exam_events'])->name('admin.editExamEvents');
        Route::put('update-exam-events/{slug}', [ExamEventsController::class, 'update_exam_events'])->name('admin.updateExamEvents');

        // FAQS

        Route::get('faqs', [FaqsController::class, 'index'])->name('admin.faqIndex');
        Route::get('add-faqs', [FaqsController::class, 'add_faqs_page'])->name('admin.addFaqsPage');
        Route::post('insert-faqs', [FaqsController::class, 'insert_faqs'])->name('admin.insertFaqs');
        Route::get('edit-faqs/{slug}', [FaqsController::class, 'edit_faqs'])->name('admin.editFaqs');
        Route::post('update-faq/{slug}', [FaqsController::class, 'update_faq'])->name('admin.updateFaq');

        Route::get('faq-category', [FaqsController::class, 'faq_cate'])->name('admin.faqCategory');
        Route::get('faq-category/{slug}', [FaqsController::class, 'faq_cate'])->name('admin.editFaqCategory');
        Route::post('insert-faq-category', [FaqsController::class, 'faq_cate_modify'])->name('admin.insertFaqCategory');
        Route::post('update-faq-category/{slug}', [FaqsController::class, 'faq_cate_modify'])->name('admin.updateFaqCategory');

        // TAGS

        Route::get('tags', [TagsController::class, 'index'])->name('admin.tagsIndex');
        Route::get('tags-edit/{slug}', [TagsController::class, 'index'])->name('admin.editTags');
        Route::post('insert-tags', [TagsController::class, 'tags_modify'])->name('admin.insertTags');
        Route::post('update-tags/{slug}', [TagsController::class, 'tags_modify'])->name('admin.updateTags');


        Route::get('seo-pages', [SeoController::class, 'index'])->name('admin.seoPagesIndex');
        Route::get('add-seo-content', [SeoController::class, 'add_seo_content'])->name('admin.addSeoContent');
        Route::post('insert-seo-content', [SeoController::class, 'insert_seo_content'])->name('admin.insertSeoContent');
        Route::get('edit-seo-content/{id}', [SeoController::class, 'edit_seo_content'])->name('admin.editSeoContent');
        Route::post('update-seo-content/{id}', [SeoController::class, 'update_seo_content'])->name('admin.updateSeoContent');


        Route::get('seo-page', [SeoController::class, 'seo_pages'])->name('admin.seoPages');
        Route::get('seo-page/{slug}', [SeoController::class, 'seo_pages'])->name('admin.editSeoPages');
        Route::post('insert-seo-page', [SeoController::class, 'seo_pages_modify'])->name('admin.insertSeoPages');
        Route::post('update-seo-page/{slug}', [SeoController::class, 'seo_pages_modify'])->name('admin.updateSeoPages');

        // EMAILS 
        Route::get('email-system/{slug}', [EmailingController::class, 'index'])->name('admin.emailIndex');
        Route::get('compose', [EmailingController::class, 'email_compose_page'])->name('admin.emailCompose');
        Route::post('send-emails', [EmailingController::class, 'compose_emails'])->name('admin.emailSend');



        // Route::post('add-email', [EmailingController::class, 'add_email'])->name('admin.addEmail');
        // Route::get('email-inbox', [EmailingController::class, 'email_inbox'])->name('admin.emailInbox');
        // Route::get('email-details/{id}', [EmailingController::class, 'email_details'])->name('admin.emailDetails');
        // Route::get('email-delete/{id}', [EmailingController::class, 'email_delete'])->name('admin.emailDelete');
        // Route::get('email-trash', [EmailingController::class, 'email_trash'])->name('admin.emailTrash');
        // Route::post('delete-all', [EmailingController::class, 'email_deleteall'])->name('admin.emailDeleteall');
        // Route::post('trash-delete-all', [EmailingController::class, 'trash_email_deleteall'])->name('admin.emailDeleteallTrash');
    });
});

// -------------------------------------------WEB-----------------------------------------------

Route::name('web.')->group(function () {
});

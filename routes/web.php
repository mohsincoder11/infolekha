<?php

use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\ClassController;
use App\Http\Controllers\Master\CollegeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Master\CourseController;
use App\Http\Controllers\Master\FacultiesController;
use App\Http\Controllers\Master\InstitueController;
use App\Http\Controllers\Master\JobtypeController;
use App\Http\Controllers\Master\SchoolController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\WebsiteformController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Master\state_city;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Master\BrochureController;
use App\Http\Controllers\Master\CouponController;

use App\Http\Controllers\Master\SliderlinkController;
use App\Http\Controllers\school_institute_profile_dashboard;
use App\Http\Controllers\Easebuzzpay;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\CronJobController;
use App\Http\Controllers\Master\BannerImageController;
use App\Http\Controllers\Master\SubscriptionController;
use App\Http\Controllers\UserLikeFeedback;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SchoolProfile;
use App\Http\Controllers\TutorProfileController;
use App\Http\Controllers\UserProfileController;

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


Route::get('array_merge', [WebsiteformController::class, 'array_merge'])->name('array_merge');


Route::get('cron_job_testing', [CronJobController::class, 'cron_job_testing'])->name('cron_job_testing');

Route::get('/', [WebsiteformController::class, 'index'])->name('index');
Route::get('save-city', [WebsiteformController::class, 'save_city'])->name('save-city');
Route::get('get_home_page_data', [WebsiteformController::class, 'get_home_page_data'])->name('get_home_page_data');
Route::get('get_listing_page_data', [WebsiteformController::class, 'get_listing_page_data'])->name('get_listing_page_data');
Route::get('database-backup', [WebsiteformController::class, 'database_backup'])->name('database-backup');
Route::get('blog', [WebsiteformController::class, 'blog'])->name('blog');
Route::get('blog-details/{id}', [WebsiteformController::class, 'blog_details'])->name('blog-details');
Route::get('role', [WebsiteformController::class, 'role'])->name('role');
Route::get('stratigic', [WebsiteformController::class, 'stratigic'])->name('stratigic');
Route::get('choosing', [WebsiteformController::class, 'choosing'])->name('choosing');
Route::get('opportunites', [WebsiteformController::class, 'opportunites'])->name('opportunites');
Route::get('benifite', [WebsiteformController::class, 'benifite'])->name('benifite');

Route::get('admin',function(){
    return redirect()->route('admin.login');
});
Route::view('admin/login', 'admin.login')->name('admin.login');
Route::post('admin/post_login', [AdminLoginController::class, 'login_submit'])->name('admin.post_login');

Route::prefix('admin')->name('admin.')->middleware('AdminAuth')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('delete-user/{id}', [AdminDashboardController::class, 'delete_user'])->name('delete-user');
    Route::post('activation', [AdminDashboardController::class, 'activation'])->name('activation');
    

    Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout');
    Route::get('advertisement', [AdvertisementController::class, 'index'])->name('advertisement');
    Route::post('upload-advertisement', [AdvertisementController::class, 'uploadAdvertisement'])->name('upload-advertisement');
    Route::post('change-advertisement-status', [AdvertisementController::class, 'ChangeAdvertisementStatus'])->name('change-advertisement-status');
    Route::post('add-advertisement', [AdvertisementController::class, 'add_advertisement'])->name('add-advertisement');
    Route::get('delete-advertisement/{id}', [AdvertisementController::class, 'delete_advertisement'])->name('delete-advertisement');
    Route::get('get_advertisement_size', [AdvertisementController::class, 'get_advertisement_size'])->name('get_advertisement_size');
    
    
    
    //................Master...............//

    //class
    Route::get('master/class', [ClassController::class, 'index'])->name('master.class');
    Route::post('master/create_clsss', [ClassController::class, 'create'])->name('master.create_clsss');
    Route::get('master/edit-class/{id}', [ClassController::class, 'edit'])->name('master.edit_clsss');
    Route::post('master/update_clsss', [ClassController::class, 'update'])->name('master.update_clsss');
    Route::get('master/destroy_clsss/{id}', [ClassController::class, 'destroy'])->name('master.destroy_clsss');

    //college
    Route::get('master/college', [CollegeController::class, 'index'])->name('master.college');
    Route::post('master/create_college', [CollegeController::class, 'create'])->name('master.create_college');
    Route::get('master/edit-college/{id}', [CollegeController::class, 'edit'])->name('master.edit_college');
    Route::post('master/update_college', [CollegeController::class, 'update'])->name('master.update_college');
    Route::get('master/destroy_college/{id}', [CollegeController::class, 'destroy'])->name('master.destroy_college');

    //entity
    Route::get('master/entity', [EntityController::class, 'index'])->name('master.entity');
    Route::post('master/create_entity', [EntityController::class, 'create'])->name('master.create_entity');
    Route::get('master/edit-entity/{id}', [EntityController::class, 'edit'])->name('master.edit_entity');
    Route::post('master/update_entity', [EntityController::class, 'update'])->name('master.update_entity');
    Route::get('master/destroy_entity/{id}', [EntityController::class, 'destroy'])->name('master.destroy_entity');

    //cousre
    Route::get('master/course', [CourseController::class, 'index'])->name('master.course');
    Route::post('master/create_course', [CourseController::class, 'create'])->name('master.create_course');
    Route::get('master/edit-course/{id}', [CourseController::class, 'edit'])->name('master.edit_course');
    Route::post('master/update_course', [CourseController::class, 'update'])->name('master.update_course');
    Route::get('master/destroy_course/{id}', [CourseController::class, 'destroy'])->name('master.destroy_course');

    //faculti
    Route::get('master/faculty', [FacultiesController::class, 'index'])->name('master.faculty');
    Route::post('master/create_faculti', [FacultiesController::class, 'create'])->name('master.create_faculti');
    Route::get('master/edit-faculty/{id}', [FacultiesController::class, 'edit'])->name('master.edit_faculti');
    Route::post('master/update_faculti', [FacultiesController::class, 'update'])->name('master.update_faculti');
    Route::get('master/destroy_faculti/{id}', [FacultiesController::class, 'destroy'])->name('master.destroy_faculti');

    //institute
    Route::get('master/institute', [InstitueController::class, 'index'])->name('master.institute');
    Route::post('master/create_insti', [InstitueController::class, 'create'])->name('master.create_insti');
    Route::get('master/edit-institute/{id}', [InstitueController::class, 'edit'])->name('master.edit_insti');
    Route::post('master/update_insti', [InstitueController::class, 'update'])->name('master.update_insti');
    Route::get('master/destroy_insti/{id}', [InstitueController::class, 'destroy'])->name('master.destroy_insti');

    //job
    Route::get('master/job', [JobtypeController::class, 'index'])->name('master.job');
    Route::post('master/createjob', [JobtypeController::class, 'create'])->name('master.create_job');
    Route::get('master/edit-job/{id}', [JobtypeController::class, 'edit'])->name('master.edit_job');
    Route::post('master/update_job', [JobtypeController::class, 'update'])->name('master.update_job');
    Route::get('master/destroy_job/{id}', [JobtypeController::class, 'destroy'])->name('master.destroy_job');

    //school
    Route::get('master/school', [SchoolController::class, 'index'])->name('master.school');
    Route::post('master/create_school', [SchoolController::class, 'create'])->name('master.create_schol');
    Route::get('master/edit-school/{id}', [SchoolController::class, 'edit'])->name('master.edit_schol');
    Route::post('master/update_school', [SchoolController::class, 'update'])->name('master.update_schol');
    Route::get('master/destroy_school/{id}', [SchoolController::class, 'destroy'])->name('master.destroy_schol');

    //.........................end..master...........................//

    //contact
    Route::get('master/contact', [ContactController::class, 'index'])->name('master.contact');
    Route::post('master/create_contact', [ContactController::class, 'create'])->name('master.create_contact');
    Route::get('master/edit-contact/{id}', [ContactController::class, 'edit'])->name('master.edit_contact');
    Route::post('master/update_contact', [ContactController::class, 'update'])->name('master.update_contact');
    Route::get('master/destroy-contact/{id}', [ContactController::class, 'destroy'])->name('master.destroy_contact');

    //announcement
    Route::get('announcement', [AnnouncementController::class, 'index'])->name('announcement');
    Route::post('change-announcement-status', [AnnouncementController::class, 'ChangeAnnouncementStatus'])->name('change-announcement-status');

    Route::post('create_announcement', [AnnouncementController::class, 'create'])->name('create_announcement');
    Route::get('edit-announcement/{id}', [AnnouncementController::class, 'edit'])->name('edit_announcement');
    Route::post('update_announcement', [AnnouncementController::class, 'update'])->name('update_announcement');
    Route::get('destroy_announcement/{id}', [AnnouncementController::class, 'destroy'])->name('destroy_announcement');
    Route::get('destroy_announcement2/{id}', [AnnouncementController::class, 'destroy2'])->name('destroy_announcement2');
    Route::post('add-announcement', [AnnouncementController::class, 'add_announcement'])->name('add-announcement');

    //Banner Images
    Route::get('master/banner-image', [BannerImageController::class, 'index'])->name('master.banner-image');
    Route::post('create-banner-image', [BannerImageController::class, 'create'])->name('master.create-banner-image');
    Route::get('edit-banner-image/{id}', [BannerImageController::class, 'edit'])->name('master.edit-banner-image');
    Route::post('update-banner-image', [BannerImageController::class, 'update'])->name('master.update-banner-image');
    Route::get('destroy-banner-image/{id}', [BannerImageController::class, 'destroy'])->name('master.destroy-banner-image');
    
//default OTP
Route::get('master/default-otp', [WebsiteSettingController::class, 'index'])->name('master.default-otp');
    Route::post('update-default-otp', [WebsiteSettingController::class, 'update'])->name('master.update-default-otp');
   


    //blogs
    Route::get('blog', [BlogController::class, 'index'])->name('blog');
    Route::post('create_blog', [BlogController::class, 'create'])->name('create_blog');
    Route::get('edit-blog/{id}', [BlogController::class, 'edit'])->name('edit_blog');
    Route::post('update_blog', [BlogController::class, 'update'])->name('update_blog');
    Route::get('destroy_blog/{id}', [BlogController::class, 'destroy'])->name('destroy_blog');
    Route::post('change-blog-status', [BlogController::class, 'change_blog_status'])->name('change-blog-status');
    Route::post('add-blog', [BlogController::class, 'add_blog'])->name('add-blog');
    
    Route::get('get-blog', [BlogController::class, 'get_blog'])->name('get-blog');


    //slider
    Route::get('master/slider', [SliderlinkController::class, 'index'])->name('master.slider');
    Route::post('master/create_slider', [SliderlinkController::class, 'create'])->name('master.create_slider');
    Route::get('master/edit-silder/{id}', [SliderlinkController::class, 'edit'])->name('master.edit_silder');
    Route::post('master/update_slider', [SliderlinkController::class, 'update'])->name('master.update_slider');
    Route::get('master/destroy_slider/{id}', [SliderlinkController::class, 'destroy'])->name('master.destroy_slider');

    //brochure
    Route::get('master/brochure', [BrochureController::class, 'index'])->name('master.brochure');
    Route::post('master/create_brochure', [BrochureController::class, 'create'])->name('master.create_brochure');
    Route::get('master/edit-brochure/{id}', [BrochureController::class, 'edit'])->name('master.edit_brochure');
    Route::post('master/update_brochure', [BrochureController::class, 'update'])->name('master.update_brochure');
    Route::get('master/destroy_brochure/{id}', [BrochureController::class, 'destroy'])->name('master.destroy_brochure');

     //Coupon
     Route::get('master/coupon', [CouponController::class, 'index'])->name('master.coupon');
     Route::post('master/create_coupon', [CouponController::class, 'create'])->name('master.create_coupon');
     Route::get('master/edit-coupon/{id}', [CouponController::class, 'edit'])->name('master.edit_coupon');
     Route::post('master/update_coupon', [CouponController::class, 'update'])->name('master.update_coupon');
     Route::get('master/destroy_coupon/{id}', [CouponController::class, 'destroy'])->name('master.destroy_coupon');

       //Coupon
       Route::get('master/subscription', [SubscriptionController::class, 'index'])->name('master.subscription');
       Route::post('master/create_subscription', [SubscriptionController::class, 'create'])->name('master.create_subscription');
       Route::get('master/edit-subscription/{id}', [SubscriptionController::class, 'edit'])->name('master.edit_subscription');
       Route::post('master/update_subscription', [SubscriptionController::class, 'update'])->name('master.update_subscription');
       Route::get('master/destroy_subscription/{id}', [SubscriptionController::class, 'destroy'])->name('master.destroy_subscription');

        //Advertisement
        Route::get('master/advertisement', [AdvertisementController::class, 'advertisement_list'])->name('master.advertisement');
        Route::post('master/create_advertisement', [AdvertisementController::class, 'create'])->name('master.create_advertisement');
        Route::get('master/edit-advertisement/{id}', [AdvertisementController::class, 'edit'])->name('master.edit_advertisement');
        Route::post('master/update_advertisement', [AdvertisementController::class, 'update'])->name('master.update_advertisement');
        Route::get('master/destroy_advertisement/{id}', [AdvertisementController::class, 'destroy'])->name('master.destroy_advertisement');

        //Announcement
        Route::get('master/announcement', [AnnouncementController::class, 'announcement_list'])->name('master.announcement');
        Route::post('master/create_announcement', [AnnouncementController::class, 'create'])->name('master.create_announcement');
        Route::get('master/edit-announcement/{id}', [AnnouncementController::class, 'edit'])->name('master.edit_announcement');
        Route::post('master/update_announcement', [AnnouncementController::class, 'update'])->name('master.update_announcement');
        Route::get('master/destroy_announcement/{id}', [AnnouncementController::class, 'destroy'])->name('master.destroy_announcement');

       Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');
       Route::get('transaction-due', [TransactionController::class, 'transaction_due'])->name('transaction-due');

      //Register User
       Route::get('registration/college', [RegistrationController::class, 'college'])->name('registration.college');
       Route::get('registration/school', [RegistrationController::class, 'school'])->name('registration.school');
       Route::get('registration/institute', [RegistrationController::class, 'institute'])->name('registration.institute');
       Route::get('registration/student', [RegistrationController::class, 'student'])->name('registration.student');
       Route::get('registration/tutor', [RegistrationController::class, 'tutor'])->name('registration.tutor');

        //admin login to user acoount

       
       //Mail
       Route::get('subscription_mail/{id}', [MailController::class, 'subscription_mail'])->name('subscription_mail');
       Route::get('tutor_subscription_mail/{id}', [MailController::class, 'tutor_subscription_mail'])->name('tutor_subscription_mail');
       Route::get('announcement_due_mail/{id}', [MailController::class, 'announcement_due_mail'])->name('announcement_due_mail');
       
       Route::get('buy-subscription-email/{id}', [MailController::class, 'buy_subscription_email'])->name('buy-subscription-email');

       Route::get('users', [UserController::class, 'index'])->name('users');
       Route::post('create_user', [UserController::class, 'create_user'])->name('create_user');
       Route::get('delete_user/{id}', [UserController::class, 'delete_user'])->name('delete_user');
       Route::get('edit_user/{id}', [UserController::class, 'edit_user'])->name('edit_user');
       Route::post('update_user', [UserController::class, 'update_user'])->name('update_user');



});
Route::get('admin-login-to-user/{id}', [RegistrationController::class, 'admin_login_to_user'])->name('admin-login-to-user');

Route::get('renew-subscription/{transaction_id}/{email}', [WebsiteformController    ::class, 'renew_subscription'])->name('renew-subscription');
Route::get('buy-subscription/{email}', [WebsiteformController    ::class, 'buy_subscription'])->name('buy-subscription');
Route::get('login-using-email/{email}', [WebsiteformController    ::class, 'login_using_email'])->name('login-using-email');

Route::get('web-contacts', [WebsiteformController::class, 'index_contact'])->name('web_contacts');
Route::post('create_contacts', [WebsiteformController::class, 'create_contact'])->name('create_contacts');

//....................panelcontact...................//
Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('destroy_contact/{id}', [ContactController::class, 'destroy'])->name('destroy_contact');




///////////////////////////////////////// website form controller route//////////////////////////////////////////////////////////

// -------------------------------------------student parent form routes------------------------------------------------------//

Route::get('student-register-form', [SignUpController::class, 'student_register_form'])->name('student_register_form');
Route::post('student_register_user_create', [SignUpController::class, 'student_register_user_create'])->name('student_register_user_create');
Route::post('student_detail_create/{data}', [SignUpController::class, 'student_detail_create'])->name('student_detail_create');
Route::post('student_detail_update', [SignUpController::class, 'student_detail_update'])->name('student_detail_update');

// --------------------------------------------------------end student form ----------------------------------------------------//
// 
// 
// 
// 
// 
// 
// 
// 
// -------------------------------------------school institutude college form routes------------------------------------------------------//

Route::get('school-institute-register-form', [SignUpController::class, 'school_institute_register_form'])->name('school_institute_register_form');
Route::post('school_institute_register_user_create', [SignUpController::class, 'school_institute_register_user_create'])->name('school_institute_register_user_create');
Route::post('school_institute_detail_create', [SignUpController::class, 'school_institute_detail_create'])->name('school_institute_detail_create');

// --------------------------------------------------------end school institutude college ----------------------------------------------------//
// 
// 
// 
// 
// 
// 
// 
// 
// ------------------------------------------------------tutor college form routes-----------------------------------------------------------//

Route::get('tutor-register-form', [SignUpController::class, 'tutor_register_form'])->name('tutor_register_form');
Route::post('tutor_register_user_create', [SignUpController::class, 'tutor_register_user_create'])->name('tutor_register_user_create');
Route::post('tutor_detail_create/{data}', [SignUpController::class, 'tutor_detail_create'])->name('tutor_detail_create');
// --------------------------------------------------------end school institutude college ----------------------------------------------------//


Route::get('login', [LoginController::class, 'login'])->name('login');
Route::get('forget-password', [LoginController::class, 'forget_password'])->name('forget-password');

Route::get('tutor_subscription', [LoginController::class, 'tutor_subscription'])->name('tutor_subscription');

Route::post('login_submit', [LoginController::class, 'login_submit'])->name('login_submit');




Route::get('state', [state_city::class, 'state'])->name('state');
Route::post('state_create', [state_city::class, 'state_create'])->name('state_create');
Route::get('city', [state_city::class, 'city'])->name('city');
Route::post('city_create', [state_city::class, 'city_create'])->name('city_create');
Route::get('check_login_msg/{msg}', [WebsiteformController::class, 'check_login_msg'])->name('check_login_msg');

Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('payment-form', [WebsiteformController::class, 'payment_form'])->name('payment_form');
    Route::get('apply_subscription_amount', [WebsiteformController::class, 'apply_subscription_amount'])->name('apply_subscription_amount');
    
    Route::get('school-institute-detail-form/{data}', [SignUpController::class, 'school_institute_detail_form'])->name('school_institute_detail_form');
    Route::get('student_detail_form/{data}', [SignUpController::class, 'student_detail_form'])->name('student_detail_form');
    Route::get('tutor-detail-form/{data}', [SignUpController::class, 'tutor_detail_form'])->name('tutor_detail_form');

    Route::post('like_unlike', [UserLikeFeedback::class, 'like_unlike'])->name('like_unlike');
    Route::post('insert_feedback', [UserLikeFeedback::class, 'insert_feedback'])->name('insert_feedback');
    
    Route::post('like_unlike_blog', [WebsiteformController::class, 'like_unlike_blog'])->name('like_unlike_blog');
    Route::post('blog_comment', [WebsiteformController::class, 'blog_comment'])->name('blog_comment');
    Route::post('blog_share', [WebsiteformController::class, 'blog_share'])->name('blog_share');
    
    Route::post('post_enquiry', [UserLikeFeedback::class, 'post_enquiry'])->name('post_enquiry');
    Route::get('listing-details/{id}', [WebsiteformController::class, 'listing_details'])->name('listing-details');
    Route::get('remove-wishlist/{id}', [WebsiteformController::class, 'remove_wishlist'])->name('remove-wishlist');

    //school only route
    Route::group(['middleware' => ['role:1']], function () {
        Route::get('download-profile', [SchoolProfile::class, 'download_profile'])->name('school_profile.download_profile');
        Route::get('profile', [SchoolProfile::class, 'home'])->name('school_profile.home');
        Route::get('school_profile/update-profile', [SchoolProfile::class, 'update_profile'])->name('school_profile.update_profile');
        Route::post('school_profile/post_update_profile',[SchoolProfile::class,'post_update_profile'])->name('school_profile.post_update_profile');
        Route::post('school_profile/insert_post_result',[SchoolProfile::class,'insert_post_result'])->name('school_profile.insert_post_result');
        Route::get('school_profile/destroy_post_result/{id}',[SchoolProfile::class,'destroy_post_result'])->name('school_profile.destroy_post_result');
        
        
        Route::post('school_profile/delete-image',[SchoolProfile::class,'delete_image'])->name('school_profile.delete-image');
        Route::post('school_profile/delete-video',[SchoolProfile::class,'delete_video'])->name('school_profile.delete-video');

        

        Route::get('school_profile/create_job_vacancy', [SchoolProfile::class, 'create_job_vacancy'])->name('school_profile.create_job_vacancy');
        Route::get('school_profile/view-applied-job/{job_id}', [SchoolProfile::class, 'view_applied_job'])->name('school_profile.view-applied-job');

        Route::post('school_profile/insert_create_job_vacancy',[SchoolProfile::class,'insert_create_job_vacancy'])->name('school_profile.insert_create_job_vacancy');
       
        Route::get('delete_job_vacancy/{id}', [SchoolProfile::class, 'delete_job_vacancy'])->name('delete_job_vacancy');


        Route::get('school_profile/post_result', [SchoolProfile::class, 'post_result'])->name('school_profile.post_result');
        Route::get('school_profile/pramote_bussiness', [SchoolProfile::class, 'pramote_bussiness'])->name('school_profile.pramote_bussiness');
        Route::get('school_profile/change-password', [SchoolProfile::class, 'change_password'])->name('school_profile.change_password');
        Route::get('school-profile/post-announcement', [SchoolProfile::class, 'post_announcement'])->name('school_profile.post_announcement');
        Route::post('insert-announcement', [SchoolProfile::class, 'insert_announcement'])->name('insert-announcement');
        Route::get('school-profile/announcement-package/{id}', [SchoolProfile::class, 'announcement_package'])->name('school_profile.announcement-package');
        Route::post('pay-for-announcement', [SchoolProfile::class, 'pay_for_announcement'])->name('school_profile.pay-for-announcement');

        Route::post('school-profile/payment-success', [SchoolProfile::class, 'payment_success'])->name('school_profile.payment-success');
        Route::post('school-profile/payment-fail', [SchoolProfile::class, 'payment_fail'])->name('school_profile.payment-fail');

        Route::get('school-profile/post-advertisement', [SchoolProfile::class, 'post_advertisement'])->name('school_profile.post_advertisement');
        Route::post('school_profile/insert-advertisement', [SchoolProfile::class, 'insert_advertisement'])->name('school_profile.insert-advertisement');
        Route::get('school_profile/delete-advertisement/{id}', [SchoolProfile::class, 'delete_advertisement'])->name('school_profile.delete-advertisement');

        Route::get('school-profile/blog', [SchoolProfile::class, 'blog_index'])->name('school_profile.blog');
        Route::get('school-profile/write-blog', [SchoolProfile::class, 'write_blog'])->name('school_profile.write-blog');
        Route::post('school-profile/insert-blog', [SchoolProfile::class, 'insert_blog'])->name('school_profile.insert-blog');
        Route::get('school-profile/edit-blog/{id}', [SchoolProfile::class, 'edit_blog'])->name('school_profile.edit-blog');
        Route::post('school-profile/update-blog', [SchoolProfile::class, 'update_blog'])->name('school_profile.update-blog');
        Route::get('school-profile/delete-blog/{id}', [SchoolProfile::class, 'delete_blog'])->name('school_profile.delete-blog');
       
        Route::get('school-profile/enquiries', [SchoolProfile::class, 'enquiries'])->name('school_profile.enquiries');

    });

    Route::get('activate-profile',[SchoolProfile::class,'activate_profile'])->name('activate_profile');


    Route::get('school-profile/get_advertisement_size', [SchoolProfile::class, 'get_advertisement_size'])->name('school_profile.get_advertisement_size');
    Route::get('school-profile/get_advertisement_cards', [SchoolProfile::class, 'get_advertisement_cards'])->name('school_profile.get_advertisement_cards');
    Route::get('school-profile/get_coupon_val', [SchoolProfile::class, 'get_coupon_val'])->name('school_profile.get_coupon_val');



    //school only route
    Route::group(['middleware' => ['role:3']], function () {
        Route::get('user-profile', [UserProfileController::class, 'home'])->name('user_profile.home');
        Route::get('user-update-profile', [UserProfileController::class, 'update_profile'])->name('user_profile.update_profile');
        Route::post('user-post-update-profile', [UserProfileController::class, 'post_update_profile'])->name('user_profile.post_update_profile');
        Route::get('user-wishlist', [UserProfileController::class, 'user_wishlist'])->name('user_profile.user_wishlist');
        Route::get('user-change-password', [UserProfileController::class, 'change_password'])->name('user_profile.user_change_password');
    });

    //tutor only route
    Route::group(['middleware' => ['role:2']], function () {
        Route::get('tutor-profile', [TutorProfileController::class, 'home'])->name('tutor_profile.home');
        Route::get('tutor-update-profile', [TutorProfileController::class, 'update_profile'])->name('tutor_profile.update_profile');
        Route::post('tutor-post-update-profile', [TutorProfileController::class, 'post_update_profile'])->name('tutor_profile.post_update_profile');
        Route::get('tutor-wishlist', [TutorProfileController::class, 'user_wishlist'])->name('tutor_profile.user_wishlist');
        Route::get('tutor-change-password', [TutorProfileController::class, 'change_password'])->name('tutor_profile.user_change_password');
        Route::get('job-applied', [TutorProfileController::class, 'job_applied'])->name('tutor_profile.job_applied');
        Route::get('remove-job/{id}', [TutorProfileController::class, 'job_remove'])->name('tutor_profile.job_remove');
       
        Route::get('tutor-profile/blog', [TutorProfileController::class, 'blog_index'])->name('tutor_profile.blog');
        Route::get('tutor-profile/write-blog', [TutorProfileController::class, 'write_blog'])->name('tutor_profile.write-blog');
        Route::post('tutor-profile/insert-blog', [TutorProfileController::class, 'insert_blog'])->name('tutor_profile.insert-blog');
        Route::get('tutor-profile/edit-blog/{id}', [TutorProfileController::class, 'edit_blog'])->name('tutor_profile.edit-blog');
        Route::post('tutor-profile/update-blog', [TutorProfileController::class, 'update_blog'])->name('tutor_profile.update-blog');
        Route::get('tutor-profile/delete-blog/{id}', [TutorProfileController::class, 'delete_blog'])->name('tutor_profile.delete-blog');
  
        
    });


    Route::get('post-user-change-password', [UserProfileController::class, 'post_change_password'])->name('user_profile.post_user_change_password');
    Route::post('payfail', [WebsiteformController::class, 'payfail'])->name('payfail');
Route::view('payfail-complete', 'Website.payfail')->name('payfail-complete');
Route::post('success', [WebsiteformController::class, 'success'])->name('success');
Route::view('success-complete', 'Website.success')->name('success-complete');



   
});

Route::post('apply-for-job', [WebsiteformController::class, 'apply_for_job'])->name('apply-for-job');


Route::get('like-login-redirect', [UserLikeFeedback::class, 'like_login_redirect'])->name('like-login-redirect');
Route::get('enquiry-login-redirect/{type}', [UserLikeFeedback::class, 'enquiry_login_redirect'])->name('enquiry-login-redirect');

Route::get('event', [WebsiteformController::class, 'event'])->name('event');
Route::get('coming-soon', [WebsiteformController::class, 'coming_soon'])->name('coming_soon');
Route::get('anouncement/{city}', [WebsiteformController::class, 'anouncement'])->name('anouncement');

Route::get('announcementweb/{id}', [WebsiteformController::class, 'announwebs'])->name('announweb');

Route::get('college-listing/{type?}', [WebsiteformController::class, 'college_listing'])->name('college_listing');
Route::get('send_mobile_verify_otp/{mob}', [WebsiteformController::class, 'send_mobile_verify_otp'])->name('send_mobile_verify_otp');
Route::get('send_forget_otp/{mob}', [WebsiteformController::class, 'send_forget_otp'])->name('send_forget_otp');

Route::post('update_password_using_mobile', [WebsiteformController::class, 'update_password_using_mobile'])->name('update_password_using_mobile');



Route::get('about_us', [WebsiteformController::class, 'about_us'])->name('about_us');
Route::get('privacy_policy', [WebsiteformController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('refund', [WebsiteformController::class, 'refund'])->name('refund');
Route::get('term', [WebsiteformController::class, 'term'])->name('term');





Route::post('initiatePaymentAPI', [Easebuzzpay::class, 'initiatePaymentAPI'])->name('initiatePaymentAPI');

// Route::post('payfail', [WebsiteformController::class, 'payfail'])->name('payfail');
// Route::view('payfail-complete', 'Website.payfail')->name('payfail-complete');
// Route::post('success', [WebsiteformController::class, 'success'])->name('success');
// Route::view('success-complete', 'Website.success')->name('success-complete');


Route::post('mail', [ContactController::class, 'mail'])->name('mail');
Route::get('test-mail', [MailController::class, 'test_email'])->name('test-maill');


Route::get('val_form', [WebsiteformController::class, 'val_form'])->name('val_form');
Route::get('check_email_exist', [WebsiteformController::class, 'check_email_exist'])->name('check_email_exist');



//college_listing mobile no script
Route::get('get_mobile_number', [WebsiteformController::class, 'get_mobile_number'])->name('get_mobile_number');
//send enquiry
Route::get('logout', [WebsiteformController::class, 'log_out'])->name('logout');
// Route::get('get_mobile_number',[WebsiteformController::class,'get_mobile_number'])->name('get_mobile_number');


//------------------------------------------------school and institute profile dashboard




Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return redirect()->back();
    //return "All cache cleared!";
});

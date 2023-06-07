<?php

use App\Http\Controllers\AdminDashboardController;
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
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\Master\state_city;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Master\BrochureController;
use App\Http\Controllers\Master\SliderlinkController;
use App\Http\Controllers\school_institute_profile_dashboard;
use App\Http\Controllers\Easebuzzpay;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\UserLikeFeedback;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SchoolProfile;
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

Route::get('/2', function () {
    return view('Website.login');
});








Route::get('role',[WebsiteformController::class,'role'])->name('role');
Route::get('stratigic',[WebsiteformController::class,'stratigic'])->name('stratigic');
Route::get('choosing',[WebsiteformController::class,'choosing'])->name('choosing');
Route::get('opportunites',[WebsiteformController::class,'opportunites'])->name('opportunites');
Route::get('benifite',[WebsiteformController::class,'benifite'])->name('benifite');

Route::view('admin/login','admin.login')->name('admin.login');
Route::post('admin/post_login',[AdminLoginController::class,'login_submit'])->name('admin.post_login');

Route::prefix('admin')->name('admin.')->middleware('AdminAuth')->group(function () {
    Route::get('dashboard',[AdminDashboardController::class,'dashboard'])->name('dashboard');
    Route::post('activation',[AdminDashboardController::class,'activation'])->name('activation');

    Route::get('logout',[AdminLoginController::class,'logout'])->name('logout');

//................Master...............//

//class
Route::get('master/class',[ClassController::class,'index'])->name('master.class');
Route::post('master/create_clsss',[ClassController::class,'create'])->name('master.create_clsss');
Route::get('master/edit-class/{id}',[ClassController::class,'edit'])->name('master.edit_clsss');
Route::post('master/update_clsss',[ClassController::class,'update'])->name('master.update_clsss');
Route::get('master/destroy_clsss/{id}',[ClassController::class,'destroy'])->name('master.destroy_clsss');

//college
Route::get('master/college',[CollegeController::class,'index'])->name('master.college');
Route::post('master/create_college',[CollegeController::class,'create'])->name('master.create_college');
Route::get('master/edit-college/{id}',[CollegeController::class,'edit'])->name('master.edit_college');
Route::post('master/update_college',[CollegeController::class,'update'])->name('master.update_college');
Route::get('master/destroy_college/{id}',[CollegeController::class,'destroy'])->name('master.destroy_college');

//entity
Route::get('master/entity',[EntityController::class,'index'])->name('master.entity');
Route::post('master/create_entity',[EntityController::class,'create'])->name('master.create_entity');
Route::get('master/edit-entity/{id}',[EntityController::class,'edit'])->name('master.edit_entity');
Route::post('master/update_entity',[EntityController::class,'update'])->name('master.update_entity');
Route::get('master/destroy_entity/{id}',[EntityController::class,'destroy'])->name('master.destroy_entity');

//cousre
Route::get('master/course',[CourseController::class,'index'])->name('master.course');
Route::post('master/create_course',[CourseController::class,'create'])->name('master.create_course');
Route::get('master/edit-course/{id}',[CourseController::class,'edit'])->name('master.edit_course');
Route::post('master/update_course',[CourseController::class,'update'])->name('master.update_course');
Route::get('master/destroy_course/{id}',[CourseController::class,'destroy'])->name('master.destroy_course');

//faculti
Route::get('master/faculty',[FacultiesController::class,'index'])->name('master.faculty');
Route::post('master/create_faculti',[FacultiesController::class,'create'])->name('master.create_faculti');
Route::get('master/edit-faculty/{id}',[FacultiesController::class,'edit'])->name('master.edit_faculti');
Route::post('master/update_faculti',[FacultiesController::class,'update'])->name('master.update_faculti');
Route::get('master/destroy_faculti/{id}',[FacultiesController::class,'destroy'])->name('master.destroy_faculti');

//institute
Route::get('master/institute',[InstitueController::class,'index'])->name('master.institute');
Route::post('master/create_insti',[InstitueController::class,'create'])->name('master.create_insti');
Route::get('master/edit-institute/{id}',[InstitueController::class,'edit'])->name('master.edit_insti');
Route::post('master/update_insti',[InstitueController::class,'update'])->name('master.update_insti');
Route::get('master/destroy_insti/{id}',[InstitueController::class,'destroy'])->name('master.destroy_insti');

//job
Route::get('master/job',[JobtypeController::class,'index'])->name('master.job');
Route::post('master/createjob',[JobtypeController::class,'create'])->name('master.create_job');
Route::get('master/edit-job/{id}',[JobtypeController::class,'edit'])->name('master.edit_job');
Route::post('master/update_job',[JobtypeController::class,'update'])->name('master.update_job');
Route::get('master/destroy_job/{id}',[JobtypeController::class,'destroy'])->name('master.destroy_job');

//school
Route::get('master/school',[SchoolController::class,'index'])->name('master.school');
Route::post('master/create_school',[SchoolController::class,'create'])->name('master.create_schol');
Route::get('master/edit-school/{id}',[SchoolController::class,'edit'])->name('master.edit_schol');
Route::post('master/update_school',[SchoolController::class,'update'])->name('master.update_schol');
Route::get('master/destroy_school/{id}',[SchoolController::class,'destroy'])->name('master.destroy_schol');

//.........................end..master...........................//

//contact
Route::get('master/contact',[ContactController::class,'index'])->name('master.contact');
Route::post('master/create_contact',[ContactController::class,'create'])->name('master.create_contact');
Route::get('master/edit-contact/{id}',[ContactController::class,'edit'])->name('master.edit_contact');
Route::post('master/update_contact',[ContactController::class,'update'])->name('master.update_contact');
Route::get('master/destroy-contact/{id}',[ContactController::class,'destroy'])->name('master.destroy_contact');

//announcement
Route::get('announcement',[AnnouncementController::class,'index'])->name('announcement');
Route::post('create_announcement',[AnnouncementController::class,'create'])->name('create_announcement');
Route::get('edit-announcement/{id}',[AnnouncementController::class,'edit'])->name('edit_announcement');
Route::post('update_announcement',[AnnouncementController::class,'update'])->name('update_announcement');
Route::get('destroy_announcement/{id}',[AnnouncementController::class,'destroy'])->name('destroy_announcement');


//blogs
Route::get('blog',[BlogController::class,'index'])->name('blog');
Route::post('create_blog',[BlogController::class,'create'])->name('create_blog');
Route::get('edit-blog/{id}',[BlogController::class,'edit'])->name('edit_blog');
Route::post('update_blog',[BlogController::class,'update'])->name('update_blog');
Route::get('destroy_blog/{id}',[BlogController::class,'destroy'])->name('destroy_blog');


//slider
Route::get('master/slider',[SliderlinkController::class,'index'])->name('master.slider');
Route::post('master/create_slider',[SliderlinkController::class,'create'])->name('master.create_slider');
Route::get('master/edit-silder/{id}',[SliderlinkController::class,'edit'])->name('master.edit_silder');
Route::post('master/update_slider',[SliderlinkController::class,'update'])->name('master.update_slider');
Route::get('master/destroy_slider/{id}',[SliderlinkController::class,'destroy'])->name('master.destroy_slider');

//brochure
Route::get('master/brochure',[BrochureController::class,'index'])->name('master.brochure');
Route::post('master/create_brochure',[BrochureController::class,'create'])->name('master.create_brochure');
Route::get('master/edit-brochure/{id}',[BrochureController::class,'edit'])->name('master.edit_brochure');
Route::post('master/update_brochure',[BrochureController::class,'update'])->name('master.update_brochure');
Route::get('master/destroy_brochure/{id}',[BrochureController::class,'destroy'])->name('master.destroy_brochure');


});


Route::get('web_contacts',[WebsiteformController::class,'index_contact'])->name('web_contacts');
Route::post('create_contacts',[WebsiteformController::class,'create_contact'])->name('create_contacts');

//....................panelcontact...................//
Route::get('contacts',[ContactController::class,'index'])->name('contacts');
Route::get('destroy_contact/{id}',[ContactController::class,'destroy'])->name('destroy_contact');




///////////////////////////////////////// website form controller route//////////////////////////////////////////////////////////

// -------------------------------------------student parent form routes------------------------------------------------------//

Route::get('student_register_form',[SignUpController::class,'student_register_form'])->name('student_register_form');
Route::post('student_register_user_create',[SignUpController::class,'student_register_user_create'])->name('student_register_user_create');
Route::post('student_detail_create/{data}',[SignUpController::class,'student_detail_create'])->name('student_detail_create');
Route::post('student_detail_update',[SignUpController::class,'student_detail_update'])->name('student_detail_update');

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

Route::get('school_institute_register_form',[SignUpController::class,'school_institute_register_form'])->name('school_institute_register_form');
Route::post('school_institute_register_user_create',[SignUpController::class,'school_institute_register_user_create'])->name('school_institute_register_user_create');
Route::post('school_institute_detail_create/{data}',[SignUpController::class,'school_institute_detail_create'])->name('school_institute_detail_create');

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

Route::get('tutor_register_form',[SignUpController::class,'tutor_register_form'])->name('tutor_register_form');
Route::post('tutor_register_user_create',[SignUpController::class,'tutor_register_user_create'])->name('tutor_register_user_create');
Route::post('tutor_detail_create/{data}',[SignUpController::class,'tutor_detail_create'])->name('tutor_detail_create');
// --------------------------------------------------------end school institutude college ----------------------------------------------------//


Route::get('login',[logincontroller::class,'login'])->name('login');
Route::post('login_submit',[logincontroller::class,'login_submit'])->name('login_submit');




Route::get('state',[state_city::class,'state'])->name('state');
Route::post('state_create',[state_city::class,'state_create'])->name('state_create');
Route::get('city',[state_city::class,'city'])->name('city');
Route::post('city_create',[state_city::class,'city_create'])->name('city_create');

Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('payment_form',[WebsiteformController::class,'payment_form'])->name('payment_form');
    Route::get('school_institute_detail_form/{data}',[SignUpController::class,'school_institute_detail_form'])->name('school_institute_detail_form');
    Route::get('student_detail_form/{data}',[SignUpController::class,'student_detail_form'])->name('student_detail_form');
    Route::get('tutor_detail_form/{data}',[SignUpController::class,'tutor_detail_form'])->name('tutor_detail_form');

    Route::post('like_unlike',[UserLikeFeedback::class,'like_unlike'])->name('like_unlike');
    Route::post('insert_feedback',[UserLikeFeedback::class,'insert_feedback'])->name('insert_feedback');
    
    Route::post('post_enquiry',[UserLikeFeedback::class,'post_enquiry'])->name('post_enquiry');

Route::group(['middleware' => ['role:1']], function () {
        Route::get('profile',[SchoolProfile::class,'home'])->name('school_profile.home');
    Route::get('school_profile/update_profile',[SchoolProfile::class,'update_profile'])->name('school_profile.update_profile');
Route::get('school_profile/create_job_vacancy',[SchoolProfile::class,'create_job_vacancy'])->name('school_profile.create_job_vacancy');
Route::get('school_profile/post_result',[SchoolProfile::class,'post_result'])->name('school_profile.post_result');
Route::get('school_profile/pramote_bussiness',[SchoolProfile::class,'pramote_bussiness'])->name('school_profile.pramote_bussiness');
Route::get('school_profile/change_password',[SchoolProfile::class,'change_password'])->name('school_profile.change_password');
Route::get('school_profile/update_photo_video',[SchoolProfile::class,'update_photo_video'])->name('school_profile.update_photo_video');


});
});


Route::get('like-login-redirect',[UserLikeFeedback::class,'like_login_redirect'])->name('like-login-redirect');

Route::get('/',[WebsiteformController::class,'index'])->name('index');
Route::get('event',[WebsiteformController::class,'event'])->name('event');
Route::get('coming_soon',[WebsiteformController::class,'coming_soon'])->name('coming_soon');
Route::get('anouncement/{city}',[WebsiteformController::class,'anouncement'])->name('anouncement');

Route::get('announcementweb/{id}',[WebsiteformController::class,'announwebs'])->name('announweb');

Route::get('college_listing/{type?}',[WebsiteformController::class,'college_listing'])->name('college_listing');
Route::get('send_mobile_verify_otp/{mob}',[WebsiteformController::class,'send_mobile_verify_otp'])->name('send_mobile_verify_otp');
Route::get('about_us',[WebsiteformController::class,'about_us'])->name('about_us');
Route::get('blog',[WebsiteformController::class,'blog'])->name('blog');
Route::get('privacy_policy',[WebsiteformController::class,'privacy_policy'])->name('privacy_policy');
Route::get('refund',[WebsiteformController::class,'refund'])->name('refund');
Route::get('term',[WebsiteformController::class,'term'])->name('term');





Route::post('initiatePaymentAPI', [Easebuzzpay::class, 'initiatePaymentAPI'])->name('initiatePaymentAPI');

Route::post('payfail',[WebsiteformController::class,'payfail'])->name('payfail');
Route::view('payfail-complete','Website.payfail')->name('payfail-complete');
Route::post('success',[WebsiteformController::class,'success'])->name('success');
Route::view('success-complete','Website.success')->name('success-complete');


Route::post('mail',[ContactController::class,'mail'])->name('mail');


Route::get('val_form',[WebsiteformController::class,'val_form'])->name('val_form');
Route::get('check_email_exist',[WebsiteformController::class,'check_email_exist'])->name('check_email_exist');



//college_listing mobile no script
Route::get('get_mobile_number',[WebsiteformController::class,'get_mobile_number'])->name('get_mobile_number');
//send enquiry
Route::get('logout',[WebsiteformController::class,'log_out'])->name('logout');
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
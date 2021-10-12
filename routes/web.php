 <?php
use App\Country;
use Illuminate\Http\Request;
use App\Notifications\WelcomeUser;

// Route::get('/', function () {return redirect(app()->getLocale());});



// Route::group(['prefix' => 'admins'], function(){
//     Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//     Route::post('login/submit', 'Auth\AdminLoginController@adminLogin')->name('admin.login.submit');
//     Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

//    // Password reset routes
//   Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
//   Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
//   Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
//   Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

// });
// Route::group(['middleware' => 'setlocale'],
// function() {

     Route::get('/','Browse\BrowseController@home_page')->name('home');
     Auth::routes(['verify' => true]);
     Route::get('users/logout', 'Auth\LoginController@userLogout')->name('users.logout');
     Route::post('users/register/submit', 'Auth\RegisterController@create')->name('users.register.submit');
     Route::get('my_cv','Dashboard\User\UserController@myCv')->name('web.mycv');
     Route::get('apply/{id}/notfy','Dashboard\User\UserController@apply')->name('apply.notfy');
     Route::resource('users', 'Dashboard\User\UserController');

     Route::get('owners/login', 'Auth\OwnerLoginController@showloginForm')->name('owner.login');
     Route::post('owners/login/submit', 'Auth\OwnerLoginController@ownerLogin')->name('owner.login.submit');
     Route::post('owners/register/submit', 'Auth\OwnerRegisterController@create')->name('owners.register.submit');
     Route::get('owners/register', 'Auth\OwnerRegisterController@showRegistrationForm')->name('owner.register');
     Route::get('owners/logout', 'Auth\OwnerLoginController@ownerLogout')->name('owners.logout');
     Route::get('job/owner','Dashboard\Owner\OwnerController@jobOwner')->name('job.owner');
     Route::resource('owners', 'Dashboard\Owner\OwnerController');

     Route::get('/','Browse\BrowseController@home_page')->name('home');
     Route::get('contact','Browse\BrowseController@contact')->name('web.contact');
     Route::get('company/about','Browse\BrowseController@about')->name('company.about');
     Route::get('single/{id}/job','Browse\BrowseController@jobsingle')->name('single.job');
     Route::get('expert/{id}/edit','Dashboard\User\UserController@exp_edit')->name('expert.edit');
     Route::get('lang/{id}/edit','Dashboard\User\UserController@lang_edit')->name('lang.edit');
     Route::get('search/job','Browse\BrowseController@search')->name('search.job');
     Route::get('search/cv','Dashboard\Owner\OwnerController@cvSearch')->name('search.cv');
     Route::get('noty/exp/{id}','Dashboard\Owner\OwnerController@notify')->name('nofy.cv');
     Route::get('job/{id}/setting','Dashboard\Owner\OwnerController@setting')->name('job.setting');
     Route::get('delete/owner_cv/{id}','Dashboard\Owner\OwnerController@endCv')->name('delete.owner_cv');
     Route::get('pdf/download/{id}','Dashboard\User\UserController@pdf')->name('pdf.download');
     Route::get('category/index','Browse\BrowseController@category')->name('category.index');
     Route::get('job/full','Browse\BrowseController@byFull')->name('job.full');
     Route::get('job/part','Browse\BrowseController@byPart')->name('job.part');
     Route::get('all/jobs','Browse\BrowseController@allJob')->name('all.job');
     Route::get('attch/{id}/edit','Dashboard\User\UserController@attch_edit')->name('attch.edit');
     Route::get('ref/{id}/edit','Dashboard\User\UserController@ref_edit')->name('ref.edit');
     Route::get('user/guid','Dashboard\User\UserController@guid')->name('user.guid');
     Route::get('about/footer','Browse\BrowseController@showAbout')->name('about.footer');
     Route::post('contact/send','Browse\BrowseController@contactSend')->name('contact.send');
     Route::get('search/role/{id}','Browse\BrowseController@by_role')->name('search.role');

     Route::get('owner/verification','Auth\VerificationController@show')->name('owner.verification.notice'); //owner.verification.resend
     Route::get('owner/verification/resend','Auth\VerificationController@resend')->name('owner.verification.resend');

      //  owners.password.request
     Route::post('/owner/password/email', 'Auth\OwnerForgotPasswordController@sendResetLinkEmail')->name('owner.password.email');
     Route::get('/owner/password/reset', 'Auth\OwnerForgotPasswordController@showLinkRequestForm')->name('owner.password.request');
     Route::post('/owner/password/reset', 'Auth\OwnerResetPasswordController@reset');
     Route::get('/owner/password/reset/{token}', 'Auth\OwnerResetPasswordController@showResetForm')->name('owner.password.reset');


// });


//Auth Download file

Route::post('/download/{id}', 'Browse\BrowseController@download' )->name('download')->middleware('auth:owner,admin,web');


Route::get('/clear-cache', function() {
       \Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/cache', function() {
       \Artisan::call('cache:clear');
    return 'DONE'; //Return anything
});

Route::get('/migrate', function() {
       \Artisan::call('migrate');
    return 'DONE'; //Return anything
});

Route::get('/test',function() {
    $user = App\User::find(43);
    $user->notify(new WelcomeUser());
    return 'Email send';

});

Route::get('/locale/{locale}', 'LocaleController@index')->name('lang');

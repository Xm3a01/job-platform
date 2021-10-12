<?php

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

// use Illuminate\Routing\Route;

// Route::get('test' , function(){
//     return view('admin::test');
// });


Route::group(['prefix' => 'dashboard' , 'middleware' => 'auth:admin'] , function(){
    //about browes
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('admins', 'AdminController@admin_index')->name('admins.index');
    Route::get('abouts/company','AboutController@index')->name('about.company');
    Route::get('abouts/contactus','AboutController@createContact')->name('about.contactus');
    Route::get('abouts/partner','AboutController@indexpartner')->name('about.partner');
    Route::get('abouts/team','AboutController@createTeam')->name('about.team');
    //
     Route::get('admin/pdf/{id}','BrowseController@pdf')->name('admin.pdf');
    //
     Route::get('price/index','AdvController@price_index')->name('price.index');
     Route::get('price/edit/{id}','AdvController@price_edit')->name('price.edit');
    //
     Route::get('partner/{id}/edit','AboutController@edit_partner')->name('partner.edit');
     Route::get('team/{id}/edit','AboutController@edit_team')->name('team.edit');
    //about store
    Route::resource('abouts','AboutController')->except('create');
    //Guid
    Route::resource('guids','GuidController')->only(['index','edit','update']);
    //Notifications Process
    // Route::get('notfy','NotfyController@notfyShow')->name('');

    Route::resource('admins','AdminController')->except(['delete','create','index']);
    Route::resource('companies','OwnerController');
    Route::resource('jobs','JobController')->except('create');
    Route::resource('locations','LocationController');
    Route::resource('roles','RoleController');
    Route::resource('specials','SpecializationController');
    Route::resource('subspecials','SubSpecialController');
    Route::resource('experiences','ExperienceController')->except('create');
    Route::get('experiences/create/{id}','ExperienceController@create')->name('exp.create');
    Route::resource('levels','LevelController');
    Route::resource('user/cv','UserController')->except('create');
    //cv
    Route::get('user/education/{id}','UserController@createEdu')->name('user.edu');
    Route::get('user/language/{id}','UserController@create')->name('user.lang');
    Route::get('user/ref/{id}' , 'UserController@createRef')->name('user.ref');
    Route::get('user/attch/{id}' , 'UserController@createAttch')->name('user.attch');
    //
    Route::get('refs/{id}/edit' , 'UserController@ref_edit')->name('refs.edit');
    Route::get('ref/index' , 'UserController@index_ref')->name('ref.index');
     Route::get('attchs/{id}/edit' , 'UserController@attch_edit')->name('attchs.edit');
    Route::get('attch/index' , 'UserController@index_attch')->name('attch.index');
    //
    Route::get('jobs/create/{id}','JobController@create')->name('jobs.create');
    Route::get('cities','LocationController@cityIndex')->name('cities.index');
    Route::get('cities/{id}/edit','LocationController@cityEdit')->name('cities.edit');
    Route::get('cities/create','LocationController@cityCreate')->name('cities.create');
    Route::get('delete_city/{id}','LocationController@cityDestroy')->name('delete_city');
    Route::get('educations/index','UserController@index_edu')->name('education.index');
    Route::get('languages/index','UserController@index_lang')->name('language.index');
    Route::get('languages/{id}/edit','UserController@lang_edit')->name('language.edit');
    Route::get('educations/{id}/edit','UserController@edu_edit')->name('education.edit');
    Route::get('request/noty/{id}/{sender_id}/{notfy}/{job_id}','BrowseController@noty')->name('request.noty');
    Route::get('notfy/delete/{notfy}','BrowseController@delete')->name('notfy.delete');
    Route::get('notfy/index','BrowseController@index')->name('notfy.index');
    Route::get('all/notfy','BrowseController@notfyAll')->name('all.notfy');
    Route::get('show/notfy/{id}','BrowseController@notfyShow')->name('show.notfy');
    Route::resource('advs','AdvController')->except('create');
    Route::resource('news','NewsController')->except(['create' , 'show']);



});

Route::prefix('admins')->group(function() {
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login/submit', 'Auth\AdminLoginController@adminLogin')->name('admin.login.submit');
    Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

   // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});

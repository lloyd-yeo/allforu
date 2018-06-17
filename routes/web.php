<?php
//Route::get('/', function () { return redirect('/admin/home'); });
Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/', function(){ return view('auth.social-login'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');
Route::post('/user/social/register', 'SocialLoginController@login')->name('social.login');
Route::get('/registration', 'HomeController@onboarding');
Route::post('/registration', 'SocialLoginController@registration');
Route::get('/register-profile', function(){ return view('auth.register'); });
Route::post('/register-profile', 'SocialLoginController@registerUser');
Route::get('/club/show', 'ClubController@showProfile');
Route::get('/club-wall/{club_id}', 'ClubController@showWall');
Route::get('/event-wall/{event_id}', 'EventController@showWall');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'Admin\UserActionsController');
    Route::resource('clubs', 'Admin\ClubsController');
    Route::post('clubs_mass_destroy', ['uses' => 'Admin\ClubsController@massDestroy', 'as' => 'clubs.mass_destroy']);
    Route::post('clubs_restore/{id}', ['uses' => 'Admin\ClubsController@restore', 'as' => 'clubs.restore']);
    Route::delete('clubs_perma_del/{id}', ['uses' => 'Admin\ClubsController@perma_del', 'as' => 'clubs.perma_del']);
    Route::resource('schools', 'Admin\SchoolsController');
    Route::post('schools_mass_destroy', ['uses' => 'Admin\SchoolsController@massDestroy', 'as' => 'schools.mass_destroy']);
    Route::post('schools_restore/{id}', ['uses' => 'Admin\SchoolsController@restore', 'as' => 'schools.restore']);
    Route::delete('schools_perma_del/{id}', ['uses' => 'Admin\SchoolsController@perma_del', 'as' => 'schools.perma_del']);
    Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
    Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');
    Route::resource('events', 'Admin\EventsController');
    Route::post('events_mass_destroy', ['uses' => 'Admin\EventsController@massDestroy', 'as' => 'events.mass_destroy']);
    Route::post('events_restore/{id}', ['uses' => 'Admin\EventsController@restore', 'as' => 'events.restore']);
    Route::delete('events_perma_del/{id}', ['uses' => 'Admin\EventsController@perma_del', 'as' => 'events.perma_del']);
});

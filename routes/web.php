<?php

use App\Package;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Payment;
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
//access_location

Route::middleware('userAuth')->group(function () {

    Route::get('counter/{id}', 'SubscriberController@counter')->name('counter');
    Route::get('logout', 'SubscriberController@Logout')->name('logout');
});

Route::middleware('ForNotLogin')->group(function () {

    Route::get('login','SubscriberController@Login')->name('login');
    Route::post('login','SubscriberController@doLogin')->name('doLogin_auth');

});
Route::get('/', function () {
    $packages=Package::all();
    return view('home',[
        'packages'=>$packages,
    ]);
})->name('home');
//Route::resource('Package','PackageController');
Route::resource('Message','MessageController');
Route::resource('Ticket','TicketController');
//Route::resource('Subscriber','SubscriberController');
Route::post('/Subscriber/','SubscriberController@store')->name('Subscriber.store');

Route::get('/Packages','PackageController@index')->name('Package.index');
Route::get('/Package/{id}','PackageController@show')->name('Package.show');

Route::get('/Tickets','TicketController@index')->name('Ticket.index');
Route::get('/Ticket/{id}','TicketController@show')->name('Ticket.show');
Route::post('/Ticket/','TicketController@store')->name('Ticket.store');

Route::middleware('IsAdmin')->prefix('/Admin')->group(function (){
    Route::get('/Ticket/','AdminController@ticket_index')->name('admin.ticket.index');
    Route::get('/Ticket/edit/{id}','TicketController@edit')->name('Ticket.edit');
    Route::post('/Ticket/edit/{id}','TicketController@update')->name('Ticket.update');
    Route::delete('/Ticket/{id}','TicketController@destroy')->name('Ticket.delete');

    Route::get('/Package/','AdminController@package_index')->name('admin.package.index');
    Route::post('/Package/','PackageController@store')->name('Package.store');
    Route::get('/Package/edit/{id}','PackageController@edit')->name('Package.edit');
    Route::post('/Package/edit/{id}','PackageController@update')->name('Package.update');
    Route::delete('/Package/{id}','PackageController@destroy')->name('Package.delete');

    Route::get('/Subscriber/edit/{id}','SubscriberController@edit')->name('Subscriber.edit');
    Route::post('/Subscriber/edit/{id}','SubscriberController@update')->name('Subscriber.update');
    Route::delete('/Subscriber/{id}','SubscriberController@destroy')->name('Subscriber.delete');
    Route::get('/Subscriber','SubscriberController@index')->name('Subscriber.index');
    Route::post('/Subscriber/{id}','SubscriberController@show')->name('Subscriber.show');

    Route::get('/do-Logout/','AdminController@logout')->name('Admin.logout');
    Route::get('/Panel',"AdminController@index")->name('admin_index');
    Route::post('/un-active/{id}','AdminController@un_active')->name('un_active');

});
Route::middleware('ifAdminNotAuth')->group(function (){
    Route::get('/Admin/login/','AdminController@login_admin')->name('Admin.Login');
    Route::post('/Admin/login/','AdminController@do_login')->name('Admin.do.login');

});
Route::get('/Append/','SubscriberController@Append')->name('Append');




<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


//{{url('/logout')}}

Route::get('/', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);

Route::auth();

Route::get('/dashboard', 'HomeController@index');

//SUPER ADMIN MANAGEMENT

//COOPERATIVE MANAGEMENT ROUTES
Route::get('/cooperatives', 'CooperativeController@index');
/*Cooporative Creation*/
Route::get('/cooperative/create', 'CooperativeController@create');
Route::post('/cooperative/create', 'CooperativeController@doCreate');
/*View Cooporative*/
Route::get('/cooperative/{cooporative_id}', 'CooperativeController@viewCooporative');


//MEMBERS MANAGEMENT ROUTES
Route::get('/members', 'MemberController@index');
/*Member Creation*/
Route::get('/member/create', 'MemberController@create');
Route::post('/member/create', 'MemberController@doCreate');
/*View Member*/
Route::get('/member/{member_id}', 'MemberController@viewMember');
/*View all memners of a given cooporative*/
//Route::get('/{cooporative_name}/members', 'MemberController@viewMembers');
Route::get('/members/cooperative/{cooporative_id}', 'MemberController@viewMembers');

/*Make Contribution or Loan Repayment*/
Route::get('/member/payment/{member_id}', 'MemberController@payment');
Route::post('/member/payment', 'MemberController@doPayment');

/*Edit Member Details*/
Route::get('/member/edit/{member_id}', 'MemberController@edit');
Route::post('/member/edit', 'MemberController@doEdit');



//USER MANAGEMENT ROUTES
Route::get('/users', 'UserController@index');
/*User Creation*/
Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@doCreate');



//USER ROUTES
Route::get('/user/payments', 'UserController@payments');

Route::get('/user/loans', 'UserController@loans');

/*Loan Application*/
Route::get('/user/loan', 'UserController@loan');
Route::post('/user/loan', 'UserController@doLoan');


//LOAN MANAGEMENT
Route::get('/loans/approve', 'MemberController@loans');
Route::get('/loans/treated', 'MemberController@loanTreated');


//LOAN APPROVAL
Route::get('/loan/view/{approval_id}', 'MemberController@approveLoan');
Route::post('/loan/comment', 'MemberController@loanComment');
Route::get('/loan/approve/{loan_id}/{stage_id}', 'MemberController@approveStageLoan');
Route::get('/loan/deny/{loan_id}/{stage_id}', 'MemberController@denyStageLoan');
Route::get('/loan/disbursement/{loan_id}/{stage_id}', 'MemberController@disbursement');
Route::post('/loan/disbursement', 'MemberController@doDisbursement');

//LOAN REPAYMENT
Route::get('/loan/repayment/{loan_id}', 'MemberController@loanRepayment');
Route::post('/loan/payment', 'MemberController@doRepayment');

//CHANGE PASSWORD
Route::get('/user/changepassword', 'MemberController@changePassword');
Route::post('/user/changepassword', 'MemberController@doChangePassword');




// Authentication Routes...
/*Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'App\Http\Controllers\Auth\AuthController@login');
Route::get('logout', 'App\Http\Controllers\Auth\AuthController@logout');
*/


/*
Route::auth();

Route::get('/home', 'HomeController@index');
*/

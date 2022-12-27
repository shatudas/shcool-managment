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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', 'Frontend\FrontendController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'],function(){

//-------user---------//
Route::prefix('user')->group(function()
{
Route::get('/view','Backend\UserController@view')->name('user.view');
Route::get('/add','Backend\UserController@add')->name('user.add');
Route::post('/store','Backend\UserController@store')->name('user.store');
Route::get('/edit/{id}','Backend\UserController@edit')->name('user.edit');
Route::post('/update/{id}','Backend\UserController@update')->name('user.update');
Route::get('/delete/{id}','Backend\UserController@delete')->name('user.delete');
});

//-------profile-------//
Route::prefix('profiles')->group(function()
{
Route::get('/view','Backend\ProfilesController@view')->name('profiles.view');
Route::get('/edit','Backend\ProfilesController@edit')->name('profiles.edit');
Route::post('/store','Backend\ProfilesController@update')->name('profiles.update');
Route::get('/password/view','Backend\ProfilesController@passwordview')->name('profiles.password.view');
Route::post('/password/update','Backend\ProfilesController@passwordupdate')->name('profiles.password.update');
});


//------setup function--------//
Route::prefix('setups')->group(function()
{
//------student class-------//
Route::get('/student/class/view','Backend\Setup\StudentClassController@view')->name('setups.student.class.view');
Route::get('/student/class/add','Backend\Setup\StudentClassController@add')->name('setups.student.class.add');
Route::post('/student/class/store','Backend\Setup\StudentClassController@store')->name('setups.student.class.store');
Route::get('/student/class/edit/{id}','Backend\Setup\StudentClassController@edit')->name('setups.student.class.edit');
Route::post('/student/class/update/{id}','Backend\Setup\StudentClassController@update')->name('setups.student.class.update');
Route::post('/sabbir','Backend\Setup\StudentClassController@delete')->name('hello.bangladesh');

//---------student year------//
Route::get('/student/year/view','Backend\Setup\StudentYearController@view')->name('setups.student.year.view');
Route::get('/student/year/add','Backend\Setup\StudentYearController@add')->name('setups.student.year.add');
Route::post('/student/year/store','Backend\Setup\StudentYearController@store')->name('setups.student.year.store');
Route::get('/student/year/edit/{id}','Backend\Setup\StudentYearController@edit')->name('setups.student.year.edit');
Route::post('/student/year/update/{id}','Backend\Setup\StudentYearController@update')->name('setups.student.year.update');
Route::post('/student/year/delete','Backend\Setup\StudentYearController@delete')->name('setups.student.year.delete');

//------Student Group-------//
Route::get('/student/group/view','Backend\Setup\StudentGroupController@view')->name('setups.student.group.view');
Route::get('/student/group/add','Backend\Setup\StudentGroupController@add')->name('setups.student.group.add');
Route::post('/student/group/store','Backend\Setup\StudentGroupController@store')->name('setups.student.group.store');
Route::get('/student/group/edit/{id}','Backend\Setup\StudentGroupController@edit')->name('setups.student.group.edit');
Route::post('/student/group/update/{id}','Backend\Setup\StudentGroupController@update')->name('setups.student.group.update');
Route::post('/student/group/delete','Backend\Setup\StudentGroupController@delete')->name('setups.student.group.delete');


//------Student Shift-------//
Route::get('/student/shift/view','Backend\Setup\StudentshiftController@view')->name('setups.student.shift.view');
Route::get('/student/shift/add','Backend\Setup\StudentshiftController@add')->name('setups.student.shift.add');
Route::post('/student/shift/store','Backend\Setup\StudentshiftController@store')->name('setups.student.shift.store');
Route::get('/student/shift/edit/{id}','Backend\Setup\StudentshiftController@edit')->name('setups.student.shift.edit');
Route::post('/student/shift/update/{id}','Backend\Setup\StudentshiftController@update')->name('setups.student.shift.update');
Route::post('/student/shift/delete','Backend\Setup\StudentshiftController@delete')->name('setups.student.shift.delete');


//------Student Fee Category-------//
Route::get('/fee/category/view','Backend\Setup\FeeCategoryController@view')->name('fee.category.view');
Route::get('/fee/category/add','Backend\Setup\FeeCategoryController@add')->name('fee.category.add');
Route::post('/fee/category/store','Backend\Setup\FeeCategoryController@store')->name('fee.category.store');
Route::get('/fee/category/edit/{id}','Backend\Setup\FeeCategoryController@edit')->name('fee.category.edit');
Route::post('/fee/category/update/{id}','Backend\Setup\FeeCategoryController@update')->name('fee.category.update');
Route::post('/fee/category/delete','Backend\Setup\FeeCategoryController@delete')->name('fee.category.delete');


//------Student Fee Category Amount-------//
Route::get('/fee/amount/view','Backend\Setup\FeeAmountController@view')->name('fee.amount.view');
Route::get('/fee/amount/add','Backend\Setup\FeeAmountController@add')->name('fee.amount.add');
Route::post('/fee/amount/store','Backend\Setup\FeeAmountController@store')->name('fee.amount.store');
Route::get('/fee/amount/edit/{fee_category_id}','Backend\Setup\FeeAmountController@edit')->name('fee.amount.edit');
Route::post('/fee/amount/update/{fee_category_id}','Backend\Setup\FeeAmountController@update')->name('fee.amount.update');
Route::post('/fee/amount/delete','Backend\Setup\FeeAmountController@delete')->name('fee.amount.delete');
Route::get('/fee/amount/detalis/{fee_category_id}','Backend\Setup\FeeAmountController@detalis')->name('fee.amount.detalis');


//------exam type-------//
Route::get('/exam/type/view','Backend\Setup\ExamTypeController@view')->name('setups.exam.type.view');
Route::get('/exam/type/add','Backend\Setup\ExamTypeController@add')->name('setups.exam.type.add');
Route::post('/exam/type/store','Backend\Setup\ExamTypeController@store')->name('setups.exam.type.store');
Route::get('/exam/type/edit/{id}','Backend\Setup\ExamTypeController@edit')->name('setups.exam.type.edit');
Route::post('/exam/type/update/{id}','Backend\Setup\ExamTypeController@update')->name('setups.exam.type.update');
Route::post('/exam/type/delete','Backend\Setup\ExamTypeController@delete')->name('setups.exam.type.delete');


});





});





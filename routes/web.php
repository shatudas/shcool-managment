<?php


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

//------subject-------//
Route::get('/subject/view','Backend\Setup\SubjecCtontroller@view')->name('setups.subject.view');
Route::get('/subject/add','Backend\Setup\SubjecCtontroller@add')->name('setups.subject.add');
Route::post('/subject/store','Backend\Setup\SubjecCtontroller@store')->name('setups.subject.store');
Route::get('/subject/edit/{id}','Backend\Setup\SubjecCtontroller@edit')->name('setups.subject.edit');
Route::post('/subject/update/{id}','Backend\Setup\SubjecCtontroller@update')->name('setups.subject.update');
Route::post('/subject/delete','Backend\Setup\SubjecCtontroller@delete')->name('setups.subject.delete');


//-----assingsubject-------//
Route::get('/assing/subject/view','Backend\Setup\AssingSubjecCtontroller@view')->name('setups.assing.subject.view');
Route::get('/assing/subject/add','Backend\Setup\AssingSubjecCtontroller@add')->name('setups.assing.subject.add');
Route::post('/assing/subject/store','Backend\Setup\AssingSubjecCtontroller@store')->name('setups.assing.subject.store');
Route::get('/assing/subject/edit/{class_id}','Backend\Setup\AssingSubjecCtontroller@edit')->name('setups.assing.subject.edit');
Route::post('/assing/subject/update/{class_id}','Backend\Setup\AssingSubjecCtontroller@update')->name('setups.assing.subject.update');
Route::post('/assing/subject/delete','Backend\Setup\AssingSubjecCtontroller@delete')->name('setups.assing.subject.delete');
Route::get('/assing/subject/detalis/{class_id}','Backend\Setup\AssingSubjecCtontroller@detalis')->name('setups.assing.subject.detalis');
});


//------subject-------//
Route::get('/designation/view','Backend\Setup\DesignationCtontroller@view')->name('setups.designation.view');
Route::get('/designation/add','Backend\Setup\DesignationCtontroller@add')->name('setups.designation.add');
Route::post('/designation/store','Backend\Setup\DesignationCtontroller@store')->name('setups.designation.store');
Route::get('/designation/edit/{id}','Backend\Setup\DesignationCtontroller@edit')->name('setups.designation.edit');
Route::post('/designation/update/{id}','Backend\Setup\DesignationCtontroller@update')->name('setups.designation.update');
Route::post('/designation/delete','Backend\Setup\DesignationCtontroller@delete')->name('setups.designation.delete');
});

//-------profile-------//
Route::prefix('student')->group(function()
{

	//-----stduent genarate-----//
Route::get('/reg/view','Backend\Student\StudentRegController@view')->name('student.registration.view');
Route::get('/reg/add','Backend\Student\StudentRegController@add')->name('student.registration.add');
Route::post('/reg/store','Backend\Student\StudentRegController@store')->name('student.registration.store');
Route::get('/reg/edit/{student_id}','Backend\Student\StudentRegController@edit')->name('student.registration.edit');
Route::post('/reg/update/{student_id}','Backend\Student\StudentRegController@update')->name('student.registration.update');
Route::post('/reg/delete','Backend\Student\StudentRegController@delete')->name('student.registration.delete');
Route::get('/year-class-wias','Backend\Student\StudentRegController@yearclasswias')->name('student.year.class');

Route::get('/reg/promotion/{student_id}','Backend\Student\StudentRegController@promotion')->name('student.registration.promotion');
Route::post('/reg/promotion/{student_id}','Backend\Student\StudentRegController@promotionstore')->name('student.registration.promotion.store');
Route::get('/reg/detallis/{student_id}','Backend\Student\StudentRegController@detallis')->name('student.registration.detallis');


//-----roll ganarate------//
Route::get('/roll/view','Backend\Student\StudentRollController@view')->name('student.roll.view');
 Route::get('/roll/get-student','Backend\Student\StudentRollController@get_student')->name('student.roll.get-student');
Route::post('/roll/store','Backend\Student\StudentRollController@store')->name('student.roll.store');


//------student Registration fee---------//
Route::get('/reg/fee/view','Backend\Student\RegistrationFeeController@view')->name('student.reg.fee.view');
Route::get('/reg/fee/get-student','Backend\Student\RegistrationFeeController@getStudent')->name('student.reg.fee.get-student');
Route::get('/reg/fee/payslif','Backend\Student\RegistrationFeeController@payslif')->name('student.reg.fee.payslif');


//------student Registration fee---------//
Route::get('/reg/monthly/view','Backend\Student\MonthlyFeeController@view')->name('student.monthly.fee.view');
Route::get('/reg/monthly/get-student','Backend\Student\MonthlyFeeController@getStudent')->name('student.monthly.fee.get-student');
Route::get('/reg/monthly/payslif','Backend\Student\MonthlyFeeController@payslif')->name('student.monthly.fee.payslif');



//------student Registration fee---------//
Route::get('/reg/exam/view','Backend\Student\ExamFeeController@view')->name('student.exam.fee.view');
Route::get('/reg/exam/get-student','Backend\Student\ExamFeeController@getStudent')->name('student.exam.fee.get-student');
Route::get('/reg/exam/payslif','Backend\Student\ExamFeeController@payslif')->name('student.exam.fee.payslif');

});


Route::prefix('employees')->group(function()
{
//-----employee reg----//
Route::get('/reg/view','Backend\Employee\EmpoyeeRegController@view')->name('employees.reg.view');
Route::get('/reg/add','Backend\Employee\EmpoyeeRegController@add')->name('employees.reg.add');
Route::post('/reg/store','Backend\Employee\EmpoyeeRegController@store')->name('employees.reg.store');
Route::get('/reg/edit/{id}','Backend\Employee\EmpoyeeRegController@edit')->name('employees.reg.edit');
Route::post('/reg/update/{id}','Backend\Employee\EmpoyeeRegController@update')->name('employees.reg.update');
Route::get('/reg/delete/{id}','Backend\Employee\EmpoyeeRegController@delete')->name('employees.reg.delete');
Route::get('/reg/detalis/{id}','Backend\Employee\EmpoyeeRegController@detalis')->name('employees.reg.detalis');

//------employee salary------//
Route::get('/salary/view','Backend\Employee\EmpoyeeSalaryController@view')->name('employees.salary.view');
Route::get('/salary/increment/{id}','Backend\Employee\EmpoyeeSalaryController@increment')->name('employees.salary.increment');
Route::post('/salary/store/{id}','Backend\Employee\EmpoyeeSalaryController@store')->name('employees.salary.store');
Route::get('/salary/delete/{id}','Backend\Employee\EmpoyeeSalaryController@delete')->name('employees.salary.delete');
Route::get('/salary/detalis/{id}','Backend\Employee\EmpoyeeSalaryController@detalis')->name('employees.salary.detalis');

//------employee leave------//
Route::get('/leave/view','Backend\Employee\EmpoyeeLeaveController@view')->name('employees.leave.view');
Route::get('/leave/add','Backend\Employee\EmpoyeeLeaveController@add')->name('employees.leave.add');
Route::post('/leave/store','Backend\Employee\EmpoyeeLeaveController@store')->name('employees.leave.store');
Route::get('/leave/edit/{id}','Backend\Employee\EmpoyeeLeaveController@edit')->name('employees.leave.edit');
Route::post('/leave/update/{id}','Backend\Employee\EmpoyeeLeaveController@update')->name('employees.leave.update');
Route::get('/leave/delete/{id}','Backend\Employee\EmpoyeeLeaveController@delete')->name('employees.leave.delete');
Route::get('/leave/detalis/{id}','Backend\Employee\EmpoyeeLeaveController@detalis')->name('employees.leave.detalis');

//------employee attendance------//
Route::get('attendance/view','Backend\Employee\EmpoyeeAttendanceController@view')->name('employees.attendance.view');
Route::get('attendance/add','Backend\Employee\EmpoyeeAttendanceController@add')->name('employees.attendance.add');
Route::post('attendance/store','Backend\Employee\EmpoyeeAttendanceController@store')->name('employees.attendance.store');
Route::get('attendance/edit/{date}','Backend\Employee\EmpoyeeAttendanceController@edit')->name('employees.attendance.edit');
Route::post('attendance/update/{id}','Backend\Employee\EmpoyeeAttendanceController@update')->name('employees.attendance.update');
Route::get('attendance/delete/{id}','Backend\Employee\EmpoyeeAttendanceController@delete')->name('employees.attendance.delete');
Route::get('attendance/detalis/{date}','Backend\Employee\EmpoyeeAttendanceController@detalis')->name('employees.attendance.detalis');

//------employee monthly------//
Route::get('monthly/monthly/view','Backend\Employee\MonthlySaratyController@view')->name('employees.monthly.salary.view');
Route::get('monthly/salary/get','Backend\Employee\MonthlySaratyController@getsalary')->name('employees.monthly.salary.get');
Route::get('monthly/salary/payslip{employee_id}','Backend\Employee\MonthlySaratyController@payslip')->name('employees.monthly.salary.payslip');

});


Route::prefix('marks')->group(function()
{
//-----employee reg----//
Route::get('/marks/add','Backend\Marks\MarksController@add')->name('marks.add');
Route::post('/marks/store','Backend\Marks\MarksController@store')->name('marks.store');



});

Route::get('/get-student','Backend\defaultController@getstudent')->name('get-student');
Route::get('/get-subject','Backend\defaultController@getsubject')->name('get-subject');





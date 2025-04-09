<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountControllere;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\SubjectController;

use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;

use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;

use App\Http\Controllers\Backend\Marks\MarksController;
use App\Http\Controllers\Backend\Marks\GradeController;

use App\Http\Controllers\Backend\DefaultController;

use App\Http\Controllers\Backend\Account\StudentFeeController;

use App\Http\Controllers\Backend\Report\MarkSheetController;
use App\Http\Controllers\Backend\Report\AttenReportController;
use App\Http\Controllers\Backend\Report\ResultReportController;



Route::group(['middleware' => 'prevent-back-history'],function(){
   
   


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
 
 
Route::group(['middleware' => 'auth'],function(){



Route::prefix('users')->group(function(){

Route::get('/view', [UserController::class, 'UserView'])->name('user.view');

Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');

Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');

Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');

Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');

}); 

Route::prefix('profile')->group(function(){

Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');

Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');

Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');

Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');

Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');

}); 



Route::prefix('setups')->group(function(){

Route::get('student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');

Route::get('student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');

Route::post('student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('store.student.class');

Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');

Route::post('student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');

Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');


Route::get('student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');

Route::get('student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student.year.add');

Route::post('student/year/store', [StudentYearController::class, 'StudentYearStore'])->name('store.student.year');

Route::get('student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');

Route::post('student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('update.student.year');

Route::get('student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');



Route::get('student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');

Route::get('student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])->name('student.group.add');

Route::post('student/group/store', [StudentGroupController::class, 'StudentGroupStore'])->name('store.student.group');

Route::get('student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');

Route::post('student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('update.student.group');

Route::get('student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');


Route::get('student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');

Route::get('student/shift/add', [StudentShiftController::class, 'StudentShiftAdd'])->name('student.shift.add');

Route::post('student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])->name('store.student.shift');

Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');

Route::post('student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('update.student.shift');

Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');



Route::get('fee/category/view', [FeeCategoryController::class, 'ViewFeeCat'])->name('fee.category.view');

Route::get('fee/category/add', [FeeCategoryController::class, 'FeeCatAdd'])->name('fee.category.add');

Route::post('fee/category/store', [FeeCategoryController::class, 'FeeCatStore'])->name('store.fee.category');

Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCatEdit'])->name('fee.category.edit');

Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'FeeCategoryUpdate'])->name('update.fee.category');

Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete'])->name('fee.category.delete');


Route::get('fee/amount/view', [FeeAmountControllere::class, 'ViewFeeAmount'])->name('fee.amount.view');

Route::get('fee/amount/add', [FeeAmountControllere::class, 'AddFeeAmount'])->name('fee.amount.add');

Route::post('fee/amount/store', [FeeAmountControllere::class, 'StoreFeeAmount'])->name('store.fee.amount');

Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountControllere::class, 'EditFeeAmount'])->name('fee.amount.edit');

Route::post('fee/amount/update/{fee_category_id}', [FeeAmountControllere::class, 'UpdateFeeAmount'])->name('update.fee.amount');

Route::get('fee/amount/details/{fee_category_id}', [FeeAmountControllere::class, 'DetailsFeeAmount'])->name('fee.amount.details');



Route::get('exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');

Route::get('exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])->name('exam.type.add');

Route::post('exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('store.exam.type');

Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');

Route::post('exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('update.exam.type');

Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');




Route::get('subject/view', [SubjectController::class, 'ViewSubject'])->name('subject.view');

Route::get('subject/add', [SubjectController::class, 'SubjectAdd'])->name('subject.add');

Route::post('subject/store', [SubjectController::class, 'SubjectStore'])->name('store.subject');

Route::get('subject/edit/{id}', [SubjectController::class, 'SubjectEdit'])->name('subject.edit');

Route::post('subject/update/{id}', [SubjectController::class, 'SubjectUpdate'])->name('update.subject');

Route::get('subject/delete/{id}', [SubjectController::class, 'SubjectDelete'])->name('subject.delete');



Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');

Route::get('assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');

Route::post('assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');

Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');

Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');

Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');



Route::get('designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');

Route::get('designation/add', [DesignationController::class, 'DesignationAdd'])->name('designation.add');

Route::post('designation/store', [DesignationController::class, 'DesignationStore'])->name('store.designation');

Route::get('designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');

Route::post('designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('update.designation');

Route::get('designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');


}); 


Route::prefix('students')->group(function(){

Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');

Route::get('/reg/Add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');

Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');
 
Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');

Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');

Route::post('/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');

Route::get('/reg/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');

Route::post('/reg/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdatePromotion'])->name('promotion.student.registration');

Route::get('/reg/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');
Route::get('/delete/{id}', [StudentRegController::class, 'StudentDelete'])->name('student.registration.delete');
Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');

Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');

Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');

Route::get('/reg/fee/view', [RegistrationFeeController::class, 'RegFeeView'])->name('registration.fee.view');

Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class, 'RegFeeClassData'])->name('student.registration.fee.classwise.get');

Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');


}); 



Route::prefix('employees')->group(function(){

Route::get('reg/employee/view', [EmployeeRegController::class, 'EmployeeView'])->name('employee.registration.view');

Route::get('reg/employee/add', [EmployeeRegController::class, 'EmployeeAdd'])->name('employee.registration.add');

Route::post('reg/employee/store', [EmployeeRegController::class, 'EmployeeStore'])->name('store.employee.registration');
 
Route::get('reg/employee/edit/{id}', [EmployeeRegController::class, 'EmployeeEdit'])->name('employee.registration.edit');

Route::post('reg/employee/update/{id}', [EmployeeRegController::class, 'EmployeeUpdate'])->name('update.employee.registration');

Route::get('reg/employee/details/{id}', [EmployeeRegController::class, 'EmployeeDetails'])->name('employee.registration.details');

Route::get('/delete/{id}', [EmployeeRegController::class, 'EmployeeDelete'])->name('employee.registration.delete');



Route::get('leave/employee/view', [EmployeeLeaveController::class, 'LeaveView'])->name('employee.leave.view');

Route::get('leave/employee/add', [EmployeeLeaveController::class, 'LeaveAdd'])->name('employee.leave.add');

Route::post('leave/employee/store', [EmployeeLeaveController::class, 'LeaveStore'])->name('store.employee.leave');

Route::get('leave/employee/edit/{id}', [EmployeeLeaveController::class, 'LeaveEdit'])->name('employee.leave.edit');

Route::post('leave/employee/update/{id}', [EmployeeLeaveController::class, 'LeaveUpdate'])->name('update.employee.leave');

Route::get('leave/employee/delete/{id}', [EmployeeLeaveController::class, 'LeaveDelete'])->name('employee.leave.delete');


Route::get('attendance/employee/view', [EmployeeAttendanceController::class, 'AttendanceView'])->name('employee.attendance.view');

Route::get('attendance/employee/add', [EmployeeAttendanceController::class, 'AttendanceAdd'])->name('employee.attendance.add');

Route::post('attendance/employee/store', [EmployeeAttendanceController::class, 'AttendanceStore'])->name('store.employee.attendance');

Route::get('attendance/employee/edit/{date}', [EmployeeAttendanceController::class, 'AttendanceEdit'])->name('employee.attendance.edit');

Route::get('attendance/employee/details/{date}', [EmployeeAttendanceController::class, 'AttendanceDetails'])->name('employee.attendance.details');


}); 


Route::prefix('marks')->group(function(){

Route::get('marks/entry/add', [MarksController::class, 'MarksAdd'])->name('marks.entry.add');

Route::post('marks/entry/store', [MarksController::class, 'MarksStore'])->name('marks.entry.store'); 

Route::get('marks/entry/edit', [MarksController::class, 'MarksEdit'])->name('marks.entry.edit'); 

Route::get('marks/getstudents/edit', [MarksController::class, 'MarksEditGetStudents'])->name('student.edit.getstudents');

Route::post('marks/entry/update', [MarksController::class, 'MarksUpdate'])->name('marks.entry.update');  


Route::get('marks/grade/view', [GradeController::class, 'MarksGradeView'])->name('marks.entry.grade');

Route::get('marks/grade/add', [GradeController::class, 'MarksGradeAdd'])->name('marks.grade.add');

Route::post('marks/grade/store', [GradeController::class, 'MarksGradeStore'])->name('store.marks.grade');

Route::get('marks/grade/edit/{id}', [GradeController::class, 'MarksGradeEdit'])->name('marks.grade.edit');

Route::post('marks/grade/update/{id}', [GradeController::class, 'MarksGradeUpdate'])->name('update.marks.grade');

Route::get('marks/grade/delete/{id}', [GradeController::class, 'MarksGradeDelete'])->name('marks.grade.delete');

}); 
 
Route::get('marks/getsubject', [DefaultController::class, 'GetSubject'])->name('marks.getsubject');

Route::get('student/marks/getstudents', [DefaultController::class, 'GetStudents'])->name('student.marks.getstudents');





Route::prefix('accounts')->group(function(){

Route::get('student/fee/view', [StudentFeeController::class, 'StudentFeeView'])->name('student.fee.view');

Route::get('student/fee/add', [StudentFeeController::class, 'StudentFeeAdd'])->name('student.fee.add');

Route::get('student/fee/getstudent', [StudentFeeController::class, 'StudentFeeGetStudent'])->name('account.fee.getstudent'); 

Route::post('student/fee/store', [StudentFeeController::class, 'StudentFeeStore'])->name('account.fee.store'); 

 
}); 




Route::prefix('reports')->group(function(){

Route::get('marksheet/generate/view', [MarkSheetController::class, 'MarkSheetView'])->name('marksheet.generate.view');

Route::get('marksheet/generate/get', [MarkSheetController::class, 'MarkSheetGet'])->name('report.marksheet.get');


Route::get('attendance/report/view', [AttenReportController::class, 'AttenReportView'])->name('attendance.report.view');

Route::get('report/attendance/get', [AttenReportController::class, 'AttenReportGet'])->name('report.attendance.get');

Route::get('student/result/view', [ResultReportController::class, 'ResultView'])->name('student.result.view');

Route::get('student/result/get', [ResultReportController::class, 'ResultGet'])->name('report.student.result.get');

Route::get('student/idcard/view', [ResultReportController::class, 'IdcardView'])->name('student.idcard.view');

Route::get('student/idcard/get', [ResultReportController::class, 'IdcardGet'])->name('report.student.idcard.get');

}); 


 

});  

});  
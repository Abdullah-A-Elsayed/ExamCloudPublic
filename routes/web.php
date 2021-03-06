<?php

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');
// Route::post('register', 'FrontController@register');
// Route::get("emailcheck2", "FrontController@emailcheck");
Route::post('register', 'registerController@store');

// reset-password
//--------------------------------------------------
/**************************
 * admins
  * *************************/
Route::view('/profile', 'common/profile');
Route::get('/', 'ViewController@view');

Route::resource('Users', 'UsersController');
Route::get('category', 'QuestionController@category');
Route::put('Correct/{id}', 'QuestionController@Correct');
Route::post('ExecuteCode', 'QuestionController@ExecuteCode');
Route::resource('Question', 'QuestionController');
Route::resource('Answer', 'QuestionController@answer');
Route::resource('Authority', 'AuthorityController');
Route::resource('Track', 'TrackController');
Route::get('Track_ordered', 'TrackController@tracks_ordered'); //json
Route::get('emailcheck', 'UsersController@emailcheck');
Route::get('trackOptions','TrackController@travesre_for_options');
Route::get('categoryOptions','CategoryController@travesre_for_options');
Route::get('AuthcategoryOptions','AuthProfileController@travesre_for_options');
Route::get('AuthtrackOptions','AuthProfileController@travesre_for_options1');
Route::resource('Exams','ExamController');
Route::get('Exam_publish_unpublish/{id}','ExamController@publish_unpublish');
Route::post('Exam/add_existing_question','ExamController@add_existing_question');
Route::resource('MyExams','MyExamsController');
Route::resource('ExamDashboard','ExamDashboardController');
Route::get('ExamQuestionReports/{exam_id}/{question_id}','ExamDashboardController@get_exam_question_reports');
Route::get('accept_report/{exam_id}/{question_id}','ExamDashboardController@accept_report');
Route::get('reject_report/{exam_id}/{question_id}','ExamDashboardController@reject_report');
Route::post('AuthProfile','AuthProfileController@addTrack');
Route::resource('Tracks','TracksController1');
Route::get('TrackParents/{id}','TracksController1@TrackParents');
Route::resource('Home','HomeController');
Route::resource('Category','CategoryController');
Route::get('CategoryParents/{id}','CategoryController@CategoryParents');
Route::get('/profile', 'UsersController@showProfile');
Route::get('/profile/update', 'UsersController@proUpdate');
Route::post('/profile/edit', 'UsersController@update');
Route::get('/activity', 'UsersController@activity');
Route::resource('/ExamSolve', 'ExamSolveController');
Route::GET('/UserProceededExams', 'UserProceededExamsController@UserProceededExams');
Route::GET('/SubmittedExams', 'UserProceededExamsController@SubmittedExams');
Route::GET('/ViewAnswers', 'UserProceededExamsController@ViewAnswers');
Route::GET('/ViewAnswersByUserID', 'UserProceededExamsController@ViewAnswersByUserID');
Route::post('/proceed', 'ExamSolveController@proceed');
// Route::get('/Category/{id?}','CategoryController@show');
// Route::get('/?view=Category&id={id?}','CategoryController@index');

Route::GET('/report', 'UserProceededExamsController@report');


Route::GET('/getExamReport/{exam_id}/{question_id}', 'UserProceededExamsController@getExamReport');
Route::GET('/suspendQuestion/{question_id}', 'UserProceededExamsController@suspendQuestion');

Route::GET('/charts', 'ExamDashboardController@charts');
Route::GET('/UsersExamined', 'ExamDashboardController@UsersExamined');
Route::GET('/UserMarks', 'ExamDashboardController@UserMarks');



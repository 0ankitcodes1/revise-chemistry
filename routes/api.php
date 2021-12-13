<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\MetaDataController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentReportController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AnotherQuizController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\VideoController;

use App\Http\Middleware\PassUserIdMiddleware;
use App\Http\Middleware\CheckUserMiddleware;
use App\Http\Middleware\CheckIfItIsAdmin;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(["prefix" => "v1"], function() {
    /* ===================================================== */
    /* For VideoController */
    Route::get("video", [VideoController::class, "index"]);
    Route::get("video/{id}", [VideoController::class, "show"]);
    /* ===================================================== */

    /* ===================================================== */
    /* For BlogController */
    Route::get("blog", [BlogController::class, "index"]);
    Route::get("blog/{id}", [BlogController::class, "show"]);
    Route::post("blog", [BlogController::class, "create"])->middleware(CheckIfItIsAdmin::class);
    Route::post("blog/{id}", [BlogController::class, "update"])->middleware(CheckIfItIsAdmin::class);
    Route::delete("blog/{id}", [BlogController::class, "destroy"])->middleware(CheckIfItIsAdmin::class);

    Route::post("blog/search/title", [BlogController::class, "search"]);
    Route::post("blog/filter/post", [BlogController::class, "filter"]);
    /* ===================================================== */


    /* ===================================================== */
    /* For MetaDataController */
    Route::get("meta-data", [MetaDataController::class, "index"]);
    Route::get("meta-data/{id}", [MetaDataController::class, "show"]);
    Route::post("meta-data", [MetaDataController::class, "create"])->middleware(CheckIfItIsAdmin::class);
    Route::put("meta-data/{id}", [MetaDataController::class, "update"])->middleware(CheckIfItIsAdmin::class);
    Route::delete("meta-data/{id}", [MetaDataController::class, "destroy"])->middleware(CheckIfItIsAdmin::class);
    /* ===================================================== */


    /* ===================================================== */
    /* For ForumController */
    Route::get("forum", [ForumController::class, "index"]);
    Route::get("forum/{id}", [ForumController::class, "show"]);
    Route::post("forum", [ForumController::class, "create"])->middleware(PassUserIdMiddleware::class);
    Route::put("forum/{id}", [ForumController::class, "update"])->middleware(PassUserIdMiddleware::class);
    Route::delete("forum/{id}", [ForumController::class, "destroy"])->middleware(PassUserIdMiddleware::class);

    Route::post("forum/search/question", [ForumController::class, "search"]);
    /* ===================================================== */


    /* ===================================================== */
    /* For StudentController */
    Route::get("student", [StudentController::class, "index"]);
    Route::get("student/{id}", [StudentController::class, "show"]);
    Route::post("student", [StudentController::class, "create"]);
    Route::put("student", [StudentController::class, "update"])->middleware(PassUserIdMiddleware::class);
    Route::delete("student", [StudentController::class, "destroy"])->middleware(PassUserIdMiddleware::class);

    Route::post("student/login", [StudentController::class, "login"]);
    Route::post("student/logout", [StudentController::class, "logout"]);
    Route::post("student/forgot-password", [StudentController::class, "forgotPassword"]);
    Route::post("student/new-password", [StudentController::class, "updatePassword"])->middleware(PassUserIdMiddleware::class);
    /* ===================================================== */

    /* ===================================================== */
    /* For AdminController */
    // Route::get("admin", [AdminController::class, "index"]);
    // Route::get("admin/{id}", [AdminController::class, "show"]);
    // Route::post("admin", [AdminController::class, "create"]);
    Route::put("admin", [AdminController::class, "update"])->middleware(CheckIfItIsAdmin::class);
    // Route::delete("admin", [AdminController::class, "destroy"])->middleware(CheckIfItIsAdmin::class);

    Route::post("admin/login", [AdminController::class, "login"]);
    Route::post("admin/logout", [AdminController::class, "logout"])->middleware(CheckIfItIsAdmin::class);
    Route::post("admin/forgot-password", [AdminController::class, "forgotPassword"]);
    Route::post("admin/new-password", [AdminController::class, "updatePassword"])->middleware(CheckIfItIsAdmin::class);
    /* ===================================================== */

    /* ===================================================== */
    /* For StudentReportController */
    Route::get("student-report", [StudentReportController::class, "index"]);
    Route::get("student-report/{id}", [StudentReportController::class, "show"]);
    Route::post("student-report", [StudentReportController::class, "create"])->middleware(PassUserIdMiddleware::class);
    // Route::put("student-report", [AdminController::class, "update"])->middleware(PassUserIdMiddleware::class);
    Route::delete("student-report/{id}", [StudentReportController::class, "destroy"])->middleware(CheckIfItIsAdmin::class);

    Route::post("student-report/student", [StudentReportController::class, "showStudent"])->middleware(PassUserIdMiddleware::class);
    /* ===================================================== */

    /* ===================================================== */
    /* For QuizController */
    Route::post("quiz/category", [QuizController::class, "showQuizCategory"]);
    Route::post("quiz/category/chapter", [QuizController::class, "showQuizChapter"]);
    Route::post("quiz/check/quiz-answer", [QuizController::class, "checkQuizAnswer"]);
    Route::get("quiz", [QuizController::class, "index"]);
    Route::get("quiz/{id}", [QuizController::class, "show"]);
    Route::post("quiz", [QuizController::class, "create"]);
    Route::post("quiz/{id}", [QuizController::class, "update"])->middleware(CheckIfItIsAdmin::class);
    Route::delete("quiz/{id}", [QuizController::class, "destroy"])->middleware(CheckIfItIsAdmin::class);
    /* ===================================================== */


    /* ===================================================== */
    /* For QuizController */
    Route::post("new/quiz/category", [AnotherQuizController::class, "showQuizCategory"]);
    Route::post("new/quiz/category/chapter", [AnotherQuizController::class, "showQuizChapter"]);
    Route::post("new/quiz/check/quiz-answer", [AnotherQuizController::class, "checkQuizAnswer"]);
    Route::get("new/quiz", [AnotherQuizController::class, "index"]);
    Route::get("new/quiz/{id}", [AnotherQuizController::class, "show"]);
    Route::post("new/quiz", [AnotherQuizController::class, "create"]);
    Route::post("new/quiz/{id}", [AnotherQuizController::class, "update"])->middleware(CheckIfItIsAdmin::class);
    Route::delete("new/quiz/{id}", [AnotherQuizController::class, "destroy"])->middleware(CheckIfItIsAdmin::class);

    /* ===================================================== */


    /* ===================================================== */
    /* For NoteController */
    Route::get("note", [NoteController::class, "index"]);
    Route::get("note/{id}", [NoteController::class, "show"]);
    Route::post("note", [NoteController::class, "create"]);
    Route::post("note/{id}", [NoteController::class, "update"])->middleware(CheckIfItIsAdmin::class);
    Route::delete("note/{id}", [NoteController::class, "destroy"])->middleware(CheckIfItIsAdmin::class);

    Route::post("note/category", [NoteController::class, "showNoteCategory"]);
    Route::post("note/category/chapter", [NoteController::class, "showNoteChapter"]);
    Route::get("note/upload/image", [NoteController::class, "upload"]);
    Route::post("note/search/chapter", [NoteController::class, "search"]);
    /* ===================================================== */
});

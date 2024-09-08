<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/projects', [HomeController::class, 'projects'])->name('projects.index');
Route::get('/blogs/{id}/{title}', [HomeController::class, 'showBlog'])->name('blogs.show');


Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendContactForm'])->name('contact.send');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('password/forgot', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/team', [TeamController::class, 'index'])->name('team');
    Route::post('/add-team-member', [TeamController::class, 'store'])->name('team.store');
    Route::put('/update-team-member/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('delete-team-member/{id}', [TeamController::class, 'destroy'])->name('team.destroy');

    Route::get('/profile', [TeamController::class,'profile'])->name('profile');
    Route::put('/update-profile/{id}', [TeamController::class, 'updateProfile'])->name('profile.update');

    Route::get('/our-services',[ServiceController::class,'index'])->name('services.index');
    Route::post('/add-service', [ServiceController::class, 'addService'])->name('service.store');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('delete-service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

    Route::get('/our-projects', [ProjectController::class, 'index'])->name('projects');
    Route::post('/add-project', [ProjectController::class, 'store'])->name('project.store');
    Route::put('/update-project/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('delete-project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

    Route::get('/our-blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::post('/add-blog', [BlogController::class, 'store'])->name('blogs.store');
    Route::put('/update-blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('delete-blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    Route::delete('delete-message/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

    Route::get('/change-password',[ChangePasswordController::class, 'index'])->name('password.change');
    Route::post('/password/update', [ChangePasswordController::class, 'updatePassword'])->name('password.changer');


});


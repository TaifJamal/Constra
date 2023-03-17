<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\FactController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ClinetController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\projectDetaileController;

//dashbord routes

 //admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::get('users',[AdminController::class,'users'])->name('users');
    Route::delete('users/destroy/{id}', [AdminController::class, 'destroy'])->name('users.destroy');

    //clients routes
    Route::get('clients/trash', [ClinetController::class, 'trash'])->name('clients.trash');
    Route::get('clients/{id}/restore', [ClinetController::class, 'restore'])->name('clients.restore');
    Route::delete('clients/{id}/forcedelete', [ClinetController::class, 'forcedelete'])->name('clients.forcedelete');
    Route::resource('clients',ClinetController::class);

    //facts
    Route::get('facts/trash', [FactController::class, 'trash'])->name('facts.trash');
    Route::get('facts/{id}/restore', [FactController::class, 'restore'])->name('facts.restore');
    Route::delete('facts/{id}/forcedelete', [FactController::class, 'forcedelete'])->name('facts.forcedelete');
    Route::resource('facts',FactController::class);

    //image
    Route::resource('images',ImageController::class);

    //menus
    Route::get('menus/trash', [MenuController::class, 'trash'])->name('menus.trash');
    Route::get('menus/{id}/restore', [MenuController::class, 'restore'])->name('menus.restore');
    Route::delete('menus/{id}/forcedelete', [MenuController::class, 'forcedelete'])->name('menus.forcedelete');
    Route::resource('menus',MenuController::class);

    //posts
    Route::get('posts/trash', [PostController::class, 'trash'])->name('posts.trash');
    Route::get('posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
    Route::delete('posts/{id}/forcedelete', [PostController::class, 'forcedelete'])->name('posts.forcedelete');
    Route::resource('posts',PostController::class);

    //pricings
    Route::get('pricings/trash', [PricingController::class, 'trash'])->name('pricings.trash');
    Route::get('pricings/{id}/restore', [PricingController::class, 'restore'])->name('pricings.restore');
    Route::delete('pricings/{id}/forcedelete', [PricingController::class, 'forcedelete'])->name('pricings.forcedelete');
    Route::resource('pricings',PricingController::class);

    //projects Project
    Route::get('projects/trash', [ProjectController::class, 'trash'])->name('projects.trash');
    Route::get('projects/{id}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
    Route::delete('projects/{id}/forcedelete', [ProjectController::class, 'forcedelete'])->name('projects.forcedelete');
    Route::resource('projects',ProjectController::class);

    //projects Project
    Route::get('projects/trash', [ProjectController::class, 'trash'])->name('projects.trash');
    Route::get('projects/{id}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
    Route::delete('projects/{id}/forcedelete', [ProjectController::class, 'forcedelete'])->name('projects.forcedelete');
    Route::resource('projects',ProjectController::class);

    //project_detailes projectDetaile
    Route::get('project_detailes/trash', [projectDetaileController::class, 'trash'])->name('project_detailes.trash');
    Route::get('project_detailes/{id}/restore', [projectDetaileController::class, 'restore'])->name('project_detailes.restore');
    Route::delete('project_detailes/{id}/forcedelete', [projectDetaileController::class, 'forcedelete'])->name('project_detailes.forcedelete');
    Route::resource('project_detailes',projectDetaileController::class);

    //questions Question
    Route::get('questions/trash', [QuestionController::class, 'trash'])->name('questions.trash');
    Route::get('questions/{id}/restore', [QuestionController::class, 'restore'])->name('questions.restore');
    Route::delete('questions/{id}/forcedelete', [QuestionController::class, 'forcedelete'])->name('questions.forcedelete');
    Route::resource('questions',QuestionController::class);

    //sliders Slider
    Route::get('sliders/trash', [SliderController::class, 'trash'])->name('sliders.trash');
    Route::get('sliders/{id}/restore', [SliderController::class, 'restore'])->name('sliders.restore');
    Route::delete('sliders/{id}/forcedelete', [SliderController::class, 'forcedelete'])->name('sliders.forcedelete');
    Route::resource('sliders',SliderController::class);

    //services Team
    Route::get('teams/trash', [TeamController::class, 'trash'])->name('teams.trash');
    Route::get('teams/{id}/restore', [TeamController::class, 'restore'])->name('teams.restore');
    Route::delete('teams/{id}/forcedelete', [TeamController::class, 'forcedelete'])->name('teams.forcedelete');
    Route::resource('teams',TeamController::class);

    //teams Team
    Route::get('teams/trash', [TeamController::class, 'trash'])->name('teams.trash');
    Route::get('teams/{id}/restore', [TeamController::class, 'restore'])->name('teams.restore');
    Route::delete('teams/{id}/forcedelete', [TeamController::class, 'forcedelete'])->name('teams.forcedelete');
    Route::resource('teams',TeamController::class);

    //services Service
    Route::get('services/trash', [ServiceController::class, 'trash'])->name('services.trash');
    Route::get('services/{id}/restore', [ServiceController::class, 'restore'])->name('services.restore');
    Route::delete('services/{id}/forcedelete', [ServiceController::class, 'forcedelete'])->name('services.forcedelete');
    Route::resource('services',ServiceController::class);

    //testimonials Testimonial
    Route::get('testimonials/trash', [TestimonialController::class, 'trash'])->name('testimonials.trash');
    Route::get('testimonials/{id}/restore', [TestimonialController::class, 'restore'])->name('testimonials.restore');
    Route::delete('testimonials/{id}/forcedelete', [TestimonialController::class, 'forcedelete'])->name('testimonials.forcedelete');
    Route::resource('testimonials',TestimonialController::class);
});

//Site routes
Route::get('/',[SiteController::class,'index'])->name('site.index');
Route::get('/services',[SiteController::class,'services'])->name('site.services');
Route::get('/about',[SiteController::class,'about'])->name('site.about');
Route::get('/contact',[SiteController::class,'contact'])->name('site.contact');
Route::get('/service-single/{id}',[SiteController::class,'service_single'])->name('site.service-single');
Route::get('/project-single/{id}',[SiteController::class,'project_single'])->name('site.project-single');
Route::get('/projects',[SiteController::class,'projects'])->name('site.projects');
Route::get('/news-single/{id}',[SiteController::class,'news_single'])->name('site.news-single');
Route::get('/news',[SiteController::class,'news'])->name('site.news');
Route::get('/teams',[SiteController::class,'teams'])->name('site.teams');
Route::get('/testimonials',[SiteController::class,'testimonials'])->name('site.testimonials');
Route::get('/faqs',[SiteController::class,'faqs'])->name('site.faqs');
Route::get('/prices',[SiteController::class,'prices'])->name('site.prices');


// Route::view('not','not_allawd');
//->middleware('auth','check_user')

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

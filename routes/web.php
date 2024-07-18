<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\administration\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\administration\ProjectController;
use App\Http\Controllers\administration\EventController;
use App\Http\Controllers\administration\SliderController;
use App\Http\Controllers\administration\GoalController;
use App\Http\Controllers\administration\StudentController;
use App\Http\Controllers\FrontEnd\SocialMediaController;
use App\Models\t_socialmedia;

Route::get('/dashboard', function () {
    $socialMediaLinks = t_socialmedia::all();
    return view('dashboard',compact('socialMediaLinks'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/staff_profile',[StaffController::class,'viewStaffPage'])->name('admin.staff_profile');
    Route::post('/add_staff_profile',[StaffController::class,'add_staff'])->name('add_staff_profile');
    Route::post('/update-staff-profile', [StaffController::class, 'update'])->name('update_staff_profile');
    Route::delete('/staff/{id}', [StaffController::class, 'destroy']);
    Route::get('/project_research',[ProjectController::class,'viewStaffResearch'])->name('admin.staff_research');
    Route::post('/projects/save', [ProjectController::class, 'save'])->name('save_project');

    // Route for handling project updates
    Route::post('/projects/update', [ProjectController::class, 'update'])->name('update_project');

    // Route for handling project deletion
    Route::delete('/projects/{id}', [ProjectController::class, 'delete']);

    Route::get('/event_dashboard',[EventController::class,'viewEventPage'])->name('admin.manage_event');
    Route::get('/events', [EventController::class, 'viewEventPage'])->name('event_dashboard');
    Route::post('/events/save', [EventController::class, 'saveEvent'])->name('save_event');
    Route::post('/events/update', [EventController::class, 'updateEvent'])->name('update_event');
    Route::delete('/events/{id}', [EventController::class, 'deleteEvent'])->name('delete_event');
   
    // View slider dashboard
    Route::get('/sliders', [SliderController::class, 'viewSliderPage'])->name('view_slider');
    // Save slider
    Route::post('/sliders/save', [SliderController::class, 'saveSlider'])->name('save_slider');
    // Update slider
    Route::post('/sliders/update', [SliderController::class, 'updateSlider'])->name('update_slider');
    // Delete slider
    Route::delete('/sliders/{id}', [SliderController::class, 'deleteSlider'])->name('delete_slider');
    Route::get('/edit_goals',[GoalController::class,'viewGoalPage'])->name('admin.edit_goals');
    Route::post('/save-vision', [GoalController::class, 'saveVision'])->name('save_vision');
    Route::post('/update-vision', [GoalController::class, 'updateVision'])->name('update_vision');
    Route::post('/delete-vision', [GoalController::class, 'deleteVision'])->name('delete_vision');

    Route::post('/save-mission', [GoalController::class, 'saveMission'])->name('save_mission');
    Route::post('/update-mission', [GoalController::class, 'updateMission'])->name('update_mission');
    Route::post('/delete-mission', [GoalController::class, 'deleteMission'])->name('delete_mission');
    
    Route::get('/csn_projects',[StudentController::class,'viewCSNPage'])->name('admin.csn_project');
    Route::get('/projects', [StudentController::class, 'index'])->name('projects');
    Route::post('/save', [StudentController::class, 'saveProject'])->name('save_project');
    Route::post('/update', [StudentController::class, 'updateProject'])->name('update_project');
    Route::post('/delete', [StudentController::class, 'deleteProject'])->name('delete_project');

    Route::post('/social_media', [SocialMediaController::class, 'save'])->name('save_social_media');
    Route::post('/social_media/update', [SocialMediaController::class, 'update'])->name('update_social_media');
    Route::delete('/social_media/{id}', [SocialMediaController::class, 'delete'])->name('delete_social_media');

    
    
});

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class,'index'])->name('welcome');

Route::get('/aboutus', [HomeController::class,'aboutUs'])->name('aboutus');

Route::get('/blog_details/{id}', [HomeController::class, 'show'])->name('events.show');

Route::get('/faculty/about_faculty', [HomeController::class, 'viewFaculty'])->name('faculty.profile');
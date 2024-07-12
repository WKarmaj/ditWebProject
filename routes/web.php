<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\administration\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\administration\ProjectController;
use App\Http\Controllers\administration\EventController;
use App\Http\Controllers\administration\SliderController;

Route::get('/dashboard', function () {
    return view('dashboard');
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

    
});

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class,'index'])->name('welcome');

Route::get('/aboutus', [HomeController::class,'aboutUs'])->name('aboutus');
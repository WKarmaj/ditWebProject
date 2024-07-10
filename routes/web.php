<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\administration\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\administration\ProjectController;


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
});

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class,'index'])->name('welcome');
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
use App\Http\Controllers\administration\CsnController;
use App\Http\Controllers\administration\AboutusController;
use App\Http\Controllers\administration\DmaController;
use App\Models\t_socialmedia;
use App\Models\t_csn_descript;
use App\Models\t_dit_pro;
use App\Models\t_about_us;

Route::get('/dashboard', function () {
    $socialMediaLinks = t_socialmedia::all();
    $programmes = t_dit_pro::all();
    $aboutUs = t_about_us::all();
   
    return view('dashboard',compact('socialMediaLinks','programmes','aboutUs'));
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
    Route::post('/projects', [ProjectController::class, 'save'])->name('save_staffproject');
    Route::post('/projects/update', [ProjectController::class, 'update'])->name('update_project');
    Route::delete('/projects/{id}', [ProjectController::class, 'delete']);

    Route::get('/event_dashboard',[EventController::class,'viewEventPage'])->name('admin.manage_event');
    Route::get('/events', [EventController::class, 'viewEventPage'])->name('event_dashboard');
    Route::post('/events/save', [EventController::class, 'saveEvent'])->name('save_event');
    Route::post('/events/update', [EventController::class, 'updateEvent'])->name('update_event');
    Route::delete('/events/{id}', [EventController::class, 'deleteEvent'])->name('delete_event');
    
    Route::get('/sliders', [SliderController::class, 'viewSliderPage'])->name('view_slider');
    Route::post('/sliders/save', [SliderController::class, 'saveSlider'])->name('save_slider');
    Route::post('/sliders/update', [SliderController::class, 'updateSlider'])->name('update_slider');
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
    Route::post('/delete-csn', [StudentController::class, 'deleteProject'])->name('delete_project');

    Route::post('/social_media', [SocialMediaController::class, 'save'])->name('save_social_media');
    Route::post('/social_media/update', [SocialMediaController::class, 'update'])->name('update_social_media');
    Route::delete('/social_media/{id}', [SocialMediaController::class, 'delete'])->name('delete_social_media');
    Route::post('/add_pros_dit', [SocialMediaController::class, 'storeProgramme'])->name('programmes.store');
    Route::post('/update-programme', [SocialMediaController::class, 'updateProgramme'])->name('update_programme');
    Route::delete('/programmes/{id}', [SocialMediaController::class, 'destroyProgramme']);
    
    Route::get('/programmes', [ProgrammeController::class, 'index'])->name('programmes.index');
    
    Route::get('/csn_programme', [CsnController::class, 'viewCSNPro'])->name('admin.csn_programme');

    Route::post('/add-programme', [CsnController::class, 'addProgramme'])->name('add_programme');
    Route::post('/edit-programme', [CsnController::class, 'editProgramme'])->name('edit_programme');
    Route::delete('/delete-programme/{id}', [CsnController::class, 'deleteProgramme'])->name('delete_programme');

    Route::post('/add-focus-area', [CsnController::class, 'addFocusArea'])->name('add_focus_area');
    Route::post('/edit-focus-area', [CsnController::class, 'editFocusArea'])->name('edit_focus_area');
    Route::delete('/delete-focusarea/{id}', [CsnController::class, 'deleteFocusArea'])->name('delete_focus_area');

    Route::get('/about-us', [AboutusController::class, 'viewAboutus'])->name('admin.edit_aboutus');
    Route::post('/about_us', [AboutusController::class, 'store'])->name('add_about_us');
    Route::post('/about-us', [AboutusController::class, 'update'])->name('update_about_us');
    Route::delete('/delete-focusarea/{id}', [CsnController::class, 'deleteFocusArea'])->name('delete_focus_area');

    Route::get('/dma-programme', [DmaController::class, 'viewDMA'])->name('admin.viewDMA');
    Route::post('/add-dmaprogramme', [DmaController::class, 'addDMAProgramme'])->name('add_dmaprogramme');
    Route::post('/edit-dmaprogramme', [DmaController::class, 'editDMAProgramme'])->name('edit_dmaprogramme');
    Route::delete('/delete-dmaprogramme/{id}', [DmaController::class, 'deleteDMAProgramme'])->name('delete_dmaprogramme');

    


});

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class,'index'])->name('welcome');

Route::get('/aboutus', [HomeController::class,'aboutUs'])->name('aboutus');

Route::get('/blog_details/{id}', [HomeController::class, 'show'])->name('events.show');

Route::get('/faculty/about_faculty', [HomeController::class, 'viewFaculty'])->name('faculty.profile');

Route::get('/event_grid', [HomeController::class, 'getEvent'])->name('get.events');

Route::get('/faculty/project_research', [HomeController::class, 'viewProjectStaff'])->name('faculty.project');

Route::get('/dcsn/csn', [HomeController::class, 'viewCSN'])->name('dcsn.page');

Route::get('/DMA/dma', [HomeController::class, 'viewDMA'])->name('DMA.page');

Route::get('/dcsn/csn-project', [HomeController::class, 'viewProjectCSN'])->name('csn.project');


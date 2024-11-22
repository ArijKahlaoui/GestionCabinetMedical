<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\UserController;

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


Route::get('/', function () {
    return view('accueil');
});




Route::get('/login', [AuthManager::class, 'login'])-> name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])-> name('login.post');
Route::get('/inscrit', [AuthManager::class, 'inscription'])-> name('inscription');
Route::post('/inscrit', [AuthManager::class, 'inscriptionPost'])-> name('inscription.post');

Route::get('/logout', [AuthManager::class, 'logout'])-> name('logout');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

Route::get('/dashboard', [AuthManager::class, 'showDashboard'])-> name('dashboard');
Route::resource('users',UserController::class);

//Route::post('/appointment', [App\Http\Controllers\DoctorController::class, 'appointment'])->name('appointment');
Route::get('/appointment', [App\Http\Controllers\DoctorController::class, 'show'])->name('appointment');
Route::get('/approve/{id}',[App\Http\Controllers\DoctorController::class, 'approved'])->name('approve');
Route::get('/disapprove/{id}',[App\Http\Controllers\DoctorController::class, 'diapproved'])->name('disapprove');
Route::get('/calendar', [App\Http\Controllers\DoctorController::class, 'build_calendar'])-> name('calendar');
Route::get('/patients', [App\Http\Controllers\DoctorController::class, 'patients']);
// routes/web.php

Route::get('/rendezvous/{rendezvous}/modifier',[App\Http\Controllers\DoctorController::class, 'edit'])->name('rendezvous.edit');
Route::put('/rendezvous/{rendezvous}/modifier', [App\Http\Controllers\DoctorController::class, 'update'])->name('rendezvous.update');



Route::post('/ajouter-appointment', [App\Http\Controllers\PatientController::class, 'appointmentPost'])->name('ajouter-appointment');
Route::get('/appointmentform', [App\Http\Controllers\PatientController::class, 'appointment'])->name('appointmentform');
Route::get('/appointments', [App\Http\Controllers\PatientController::class, 'show'])->name('appointments');
Route::get('/detailAppointment/{id}', [App\Http\Controllers\PatientController::class, 'showAppointment'])->name('detailAppointment');
Route::get('/delete/{id}', [App\Http\Controllers\PatientController::class, 'deleteAppointment'])->name('delete');
Route::get('/doctors', [App\Http\Controllers\PatientController::class, 'listDoctors'])->name('listDoctors');
Route::get('/calendar/{id}', [App\Http\Controllers\PatientController::class, 'index'])-> name('calendar');


Route::get('/search', [App\Http\Controllers\DoctorController::class, 'search'])->name('searchDoctor');



Route::get('/calendar', [App\Http\Controllers\CalendarController::class, 'index'])-> name('calendar');
Route::post('calendar/create', [App\Http\Controllers\CalendarController::class, 'create']);

Route::get('/reclamations/create',[App\Http\Controllers\ReclamationController::class, 'create'])->name('reclamations.create');
Route::post('/reclamations', [App\Http\Controllers\ReclamationController::class, 'store'])->name('reclamations.store');

Route::get('/reclamations/liste', [App\Http\Controllers\ReclamationController::class, 'index'])->name('reclamations.index');

Route::get('/reclamations/admin', [App\Http\Controllers\ReclamationController::class, 'allReclamations'])->name('reclamations.admin.liste');
Route::post('/reclamations/repondre',[App\Http\Controllers\ReclamationController::class,'repondre'])->name('reclamations.repondre');

Route::get('/markAsRead/{id}', [App\Http\Controllers\NotificationController::class,'markAsRead'])->name('notification.markAsRead');
Route::get('/markAllMessagesAsRead', [App\Http\Controllers\NotificationController::class,'markAllMessagesAsRead'])->name('markAllMessagesAsRead');


Route::get('/consultation/ajouter/{patient}',[App\Http\Controllers\ConsultationController::class, 'create'])->name('consultations.ajouter');
Route::post('/consultation/ajouterPost',[App\Http\Controllers\ConsultationController::class, 'ajouterConsultation'])->name('ajouter-consultation');
Route::get('/consultations/patient/{patientId}',[App\Http\Controllers\ConsultationController::class, 'listeConsultationsPatient'])->name('consultations.liste-consultation');
Route::get('/consultations/patient/{patientId}/{medecinId}',[App\Http\Controllers\ConsultationController::class, 'listeConsultationsMedecin'])->name('consultations.liste-consultation.medecin');

Route::get('/contact/{med}', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact');
Route::post('/envoyer-message', [App\Http\Controllers\ContactController::class, 'store'])->name('envoyer.message');
Route::get('/discussion/{destinataireId}', [App\Http\Controllers\ContactController::class, 'showDiscussion'])->name('discussion');
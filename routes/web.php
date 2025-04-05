<?php

use App\Http\Controllers\ConfigWebController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CropTypeController;
use App\Http\Controllers\DronController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestServiceController;
use App\Http\Controllers\ServiceTypeController;
use App\Models\Dron;
use App\Models\RequestService;
use App\Models\ServiceType;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/servicios', function () {
    $services = ServiceType::all();
    return view('services',compact('services'));
})->name('services');
Route::get('/drones', function () {
    $drones = Dron::all();
    return view('drones',compact('drones'));
})->name('drones');

Route::get('/solicitar_servicio', [RequestServiceController::class, 'create'])->name('request.service');
Route::post( '/solicitar-servicio/}', action: [RequestServiceController::class, 'store'])->name('request.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/enviar-contacto', [ContactController::class, 'sendContact'])->name('enviar_contacto');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/cultivos', [CropTypeController::class, 'index'])->name('crop.index');
    Route::get('/nuevo-cultivo', [CropTypeController::class, 'create'])->name('crop.create');
    Route::get('/cultivos/{CropType}', [CropTypeController::class, 'edit'])->name('crop.edit');
    Route::post('/cultivos', [CropTypeController::class, 'store'])->name('crop.store');
    Route::post('/cultivos/{CropType}', [CropTypeController::class, 'update'])->name('crop.update');
    Route::post('/eliminar-cultivo/{CropType}', action: [CropTypeController::class, 'destroy'])->name('crop.destroy');

    Route::get('/contactos', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/eliminar-contacto/{Contact}', action: [ContactController::class, 'destroy'])->name('contact.destroy');

    Route::get('/configuracion', [ConfigWebController::class, 'index'])->name('config.index');
    Route::post('/configuracion/{ConfigWeb}',  [ConfigWebController::class, 'update'])->name('config.update');

    Route::get('/servicios-admin', [ServiceTypeController::class, 'index'])->name('services.index');
    Route::get('/nuevo-servicio', [ServiceTypeController::class, 'create'])->name('services.create');
    Route::get('/servicios-admin/{ServiceType}', [ServiceTypeController::class, 'edit'])->name('services.edit');
    Route::post('/servicios-admin', [ServiceTypeController::class, 'store'])->name('services.store');
    Route::post('/servicios-admin/{ServiceType}', [ServiceTypeController::class, 'update'])->name('services.update');
    Route::post('/eliminar-servicio/{ServiceType}', action: [ServiceTypeController::class, 'destroy'])->name('services.destroy');

    Route::get('/drones-admin', [DronController::class, 'index'])->name('drones.index');
    Route::get('/nuevo-dron', [DronController::class, 'create'])->name('drones.create');
    Route::get('/drones-admin/{Dron}', [DronController::class, 'edit'])->name('drones.edit');
    Route::post('/drones-admin', [DronController::class, 'store'])->name('drones.store');
    Route::post('/drones-admin/{Dron}', [DronController::class, 'update'])->name('drones.update');
    Route::post(uri: '/eliminar-dron/{Dron}', action: [DronController::class, 'destroy'])->name('drones.destroy');

    Route::get('/peticiones-servicio', [RequestServiceController::class, 'index'])->name('request.index');


});

require __DIR__.'/auth.php';

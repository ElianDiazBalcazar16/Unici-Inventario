<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\SATController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\SourvenirsController;
use App\Http\Controllers\PapeleriaInsumosController;
use App\Http\Controllers\InventarioActivosController;
use App\Http\Controllers\ConfigurationsController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\InventarioPController;
use Illuminate\Support\Facades\Route;

// Ruta para el dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rutas para departamentos
Route::prefix('General')->group(function () {
    Route::get('/', [GeneralController::class, 'index'])->name('General.index'); // Mostrar Generals
    Route::post('/', [GeneralController::class, 'store'])->name('General.store'); // Crear un nuevo General
    Route::delete('/{id}', [GeneralController::class, 'destroy'])->name('General.destroy'); // Eliminar un General
});
Route::prefix('Campus')->group(function () {
    Route::get('/', [ConfigurationsController::class, 'indexCampus'])->name('Campus.index'); // Mostrar Generals
    Route::put('/añadirDato',[ConfigurationsController::class, 'createCampus'])->name('createCampus');
    Route::put('/eliminarDato/{id}',[ConfigurationsController::class, 'deliteCampus'])->name('eliminarCampus');
    Route::get('/actualizarDato/{id}',[ConfigurationsController::class, 'V_EditCampus'])->name('EditCampus');
    Route::put('/actualizarDato/{id}',[ConfigurationsController::class, 'editUPCampus'])->name('EditCampus.up');
});
Route::prefix('Areas')->group(function () {
    Route::get('/', [ConfigurationsController::class, 'indexAreas'])->name('Areas.index'); // Mostrar Generals
    Route::put('/añadirDato',[ConfigurationsController::class, 'createAreas'])->name('createAreas');
    Route::put('/eliminarDato/{id}',[ConfigurationsController::class, 'deliteAreas'])->name('eliminarAreas');
    Route::get('/actualizarDato/{id}',[ConfigurationsController::class, 'V_EditAreas'])->name('EditAreas');
    Route::put('/actualizarDato/{id}',[ConfigurationsController::class, 'editUPAreas'])->name('EditAreas.up');
});
Route::prefix('Bien')->group(function () {
    Route::get('/', [ConfigurationsController::class, 'indexBien'])->name('Bien.index'); // Mostrar Generals
    Route::put('/añadirDato',[ConfigurationsController::class, 'createBien'])->name('createBien');
    Route::put('/eliminarDato/{id}',[ConfigurationsController::class, 'deliteBien'])->name('eliminarBien');
    Route::get('/actualizarDato/{id}',[ConfigurationsController::class, 'V_EditBien'])->name('EditBien');
    Route::put('/actualizarDato/{id}',[ConfigurationsController::class, 'editUPBien'])->name('EditBien.up');
});
Route::prefix('Inventario')->group(function () {
    Route::get('/', [InventarioPController::class, 'index'])->name('Inv.index'); // Mostrar Generals
    Route::get('/entradas', [InventarioPController::class, 'entradas'])->name('Inv.entradas'); // Mostrar Generals
    Route::put('/añadirDatoEntradas',[InventarioPController::class, 'createE'])->name('createEntrada');
    Route::put('/añadirDatoSalida',[InventarioPController::class, 'createS'])->name('createSalida');
    Route::get('/salidas', [InventarioPController::class, 'salidas'])->name('Inv.salidas'); // Mostrar Generals
    Route::put('/añadirDato',[InventarioPController::class, 'createInv'])->name('createInv');
    Route::put('/eliminarDato/{id}',[InventarioPController::class, 'deliteInv'])->name('eliminarInv');
    Route::get('/actualizarDato/{id}',[InventarioPController::class, 'V_EditInv'])->name('EditInv');
    Route::put('/actualizarDato/{id}',[InventarioPController::class, 'editUPInv'])->name('EditInv.up');
});

// Rutas para otras secciones
Route::put('/añadirDato',[GeneralController::class, 'create'])->name('createN');
Route::get('/actualizarDato/{id}',[GeneralController::class, 'edit'])->name('editN');
Route::put('/actualizarDato/{id}',[GeneralController::class, 'editUP'])->name('editN.up');
Route::put('/eliminarDato/{id}',[GeneralController::class, 'delite'])->name('eliminarN');
Route::get('/descarga/{filename}',[GeneralController::class, 'Descarga'])->name('Descarga');

Route::get('/SAT', [SATController::class, 'index'])->name('responsable');
// Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario');
Route::get('/reportes', [ReportesController::class, 'index'])->name('reportes');
Route::get('/sourvenirs', [SourvenirsController::class, 'index'])->name('sourvenirs');
Route::get('/papeleriainsumos', [PapeleriaInsumosController::class, 'index'])->name('papeleriainsumos');
Route::get('/inventarioactivos', [InventarioActivosController::class, 'index'])->name('inventarioactivos');

Route::get('/Detallado/{id}', [GeneralController::class, 'Detallado'])->name('inventarioDetallado');

Route::get('/Gestion', [GestionController::class, 'index'])->name('Gestion');

// Ruta adicional del dashboard (solo para usuarios autenticados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas con middleware de autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Archivo de rutas de autenticación
require __DIR__.'/auth.php';

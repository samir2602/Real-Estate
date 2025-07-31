<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\AmenitiesController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\DeveloperController;
use App\Http\Controllers\Backend\QuoteController;

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
Route::fallback(function() {
    return redirect('/');
});

Route::get('/', [HomeController::class, 'Home']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/// Admin group middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [Admincontroller::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
}); // End of Admin middleware

Route::get('/admin/login', [AdminController::class, 'Adminlogin'])->name('admin.login');

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('all/type', 'AllType')->name('all.type');
        Route::get('add/type', 'AddType')->name('add.type');
        Route::post('store/type', 'StoreType')->name('store.type');
        Route::get('edit/type/{id}', 'EditType')->name('edit.type');
        Route::post('update/type', 'UpdateType')->name('update.type');
        Route::get('delete/type/{id}', 'DeleteType')->name('delete.type');
    });

    Route::controller(AmenitiesController::class)->group(function(){
        Route::get('all/amenities', 'AllAmenities')->name('all.amenities');
        Route::get('add/amenities', 'AddAmenities')->name('add.amenities');
        Route::post('store/amenities', 'StoreAmenites')->name('store.amenities');
        Route::get('edit/amenities/{id}', 'EditAmenities')->name('edit.amenities');
        Route::post('update/amenities', 'UpdateAmenities')->name('update.amenities');
        Route::get('delete/amenitest/{id}', 'DeleteAmenities')->name('delete.amenities');
    });

    Route::controller(PropertyController::class)->group(function(){
        Route::get('all/properties', 'AllProperties')->name('all.properties');
        Route::get('add/properties', 'AddProperties')->name('add.properties');
        Route::post('store/properties', 'StoreProperties')->name('store.properties');
        Route::get('edit/properties/{id}', 'EditProperties')->name('edit.properties');
        Route::post('update/properties', 'UpdateProperties')->name('update.properties');
        Route::get('delete/properties/{id}', 'DeleteProperties')->name('delete.properties');
        Route::get('add_bulk_property', 'BulkProperty')->name('bulk.property');
    });
    
    Route::controller(CityController::class)->group(function(){
        Route::get('all/cities', 'AllCities')->name('all.cities');
        Route::get('add/cities', 'AddCities')->name('add.cities');
        Route::post('store/cities', 'StoreCities')->name('store.cities');
        Route::get('edit/cities/{id}', 'EditCities')->name('edit.cities');
        Route::post('update/cities', 'UpdateCities')->name('update.cities');
        Route::get('delete/cities/{id}', 'DeleteCities')->name('delete.cities');
    });
    
    Route::controller(StateController::class)->group(function(){
        Route::get('all/state', 'AllState')->name('all.state');
        Route::get('add/state', 'AddState')->name('add.state');
        Route::post('store/state', 'StoreState')->name('store.state');
        Route::get('edit/state/{id}', 'EditState')->name('edit.state');
        Route::post('update/state', 'UpdateState')->name('update.state');
        Route::get('delete/state/{id}', 'DeleteState')->name('delete.state');
    });

    Route::controller(DeveloperController::class)->group(function(){
        Route::get('all/developer', 'AllDeveloper')->name('all.developer');
        Route::get('add/developer', 'AddDeveloper')->name('add.developer');
        Route::post('store/developer', 'StoreDeveloper')->name('store.developer');
        Route::get('edit/developer/{id}', 'EditDeveloper')->name('edit.developer');
        Route::post('update/developer', 'UpdateDeveloper')->name('update.developer');
        Route::get('delete/developer/{id}', 'DeleteDeveloper')->name('delete.developer');
    });

    Route::controller(QuoteController::class)->group(function(){
        Route::get('all/qoute', 'AllQuote')->name('all.quote');
        Route::get('add/quote', 'AddQuote')->name('add.quote');
        Route::post('add/store', 'StoreQuote')->name('store.quote');
        Route::get('edit/quote/{id}', 'EditQuote')->name('edit.quote');
        Route::post('update/quote', 'UpdateQuote')->name('update.quote');
        Route::get('delete/quote/{id}', 'DeleteQuote')->name('delete.quote');
        Route::get('add_bulk_quote', 'BulkQuote')->name('bulk.quote');
    });
});

Route::get('property/{slug}', [PropertyController::class, 'ShowProperty'])->name('show.property');
Route::get('quote/{slug}', [QuoteController::class, 'ShowQuote'])->name('show.quote');
Route::get('/quote', [QuoteController::class, 'Quote'])->name('quote');
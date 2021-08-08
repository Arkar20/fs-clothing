<?php

use App\Models\Supplier;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Color\ColorSection;
use App\Http\Livewire\Brands\BrandSection;
use App\Http\Livewire\Deliver\DeliverySection;
use App\Http\Livewire\Category\CategorySection;
use App\Http\Livewire\Supplier\SupplierSection;
use App\Http\Livewire\Department\DepartmentSection;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.app');
});

Route::get('/brand', BrandSection::class);
Route::get('/category', CategorySection::class);
Route::get('/color', ColorSection::class);
Route::get('/supplier', SupplierSection::class);
Route::get('/delivery', DeliverySection::class);
Route::get('/department', DepartmentSection::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__ . '/auth.php';

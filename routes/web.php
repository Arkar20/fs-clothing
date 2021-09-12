<?php

use App\Models\Item;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\ItemDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Item\SizeSection;
use App\Http\Livewire\Color\ColorSection;
use App\Http\Livewire\Brands\BrandSection;
use App\Http\Livewire\Item\Registerproduct;
use App\Http\Livewire\Deliver\DeliverySection;
use App\Http\Livewire\Category\CategorySection;
use App\Http\Livewire\Supplier\SupplierSection;

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
// Route::model('itemdetail', ItemDetail::class);

Route::get('/', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/brand', BrandSection::class);
Route::get('/category', CategorySection::class);
Route::get('/color', ColorSection::class);
Route::get('/supplier', SupplierSection::class);
Route::get('/delivery', DeliverySection::class);
Route::get('/size', SizeSection::class);
Route::get('/items/register', Registerproduct::class)->name('item.register');

Route::get('/items', function () {
    return view('admin.items.index');
})->name('item.showroom');

Route::get('/items/{item:name}', function (Item $item) {
    return view('admin.items.edit', [
        'item' => $item->load('itemdetails'),
    ]);
})->name('items.edit');

Route::get('/purchase', function () {
    // return 'hello'
    return view('admin.items.purchase');
})->name('items.purchase');


Route::get('/purchase/manage', function() {
    return view('admin.items.purchase-table');
})->name('purchase.table');
//fake id for item details


Route::get('/purchase/{purchase}', function(Purchase $purchase) {
    return view('admin.items.purchase-detail',['purchase'=>$purchase->load('purchase_items')]);
})->name('purchase.detail');

require __DIR__ . '/auth.php';

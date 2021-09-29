<?php

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\ItemDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Item\SizeSection;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Color\ColorSection;
use App\Http\Livewire\Brands\BrandSection;
use App\Http\Livewire\Item\Registerproduct;
use App\Http\Controllers\CustomerController;
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

Route::middleware('auth:customer')->get('/',function(){
    return view('customer.home');
});
Route::get('/',[HomeController::class,'index']);
Route::get('/shop',[HomeController::class,'shop'])->name('home.shop');
Route::get('/shop/{name}',[HomeController::class,'show'])->name('shop.detail');
Route::get('/login',[CustomerController::class,'create'])->name('customer.create');
Route::post('/login',[CustomerController::class,'store'])->name('customer.store');
Route::post('/logout',[CustomerController::class,'logout'])->name('customer.logout');


Route::get('/checkout',function(){
    return view('customer.checkout');
})->name('customer.checkout');


Route::prefix('admin')->middleware('auth:web')->group(function(){

Route::get('/dashboard', [ItemController::class,'showdashboard'])->name('admin.dashboard');

Route::get('/brand', BrandSection::class)->name('admin.brand');
Route::get('/category', CategorySection::class)->name('admin.category');
Route::get('/color', ColorSection::class)->name('admin.color');
Route::get('/supplier', SupplierSection::class)->name('admin.supplier');
Route::get('/delivery', DeliverySection::class)->name('admin.delivery');
Route::get('/size', SizeSection::class)->name('admin.size');
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


Route::get('/profile/{user}',function(User $user){
    $user=$user?:auth()->user();
    return view('admin.profile',compact('user'));
})->name('admin.profile');


Route::get('/staffs/manage',[UserController::class,'manageStaff'])->name('staffs.manage');



});



require __DIR__ . '/auth.php';




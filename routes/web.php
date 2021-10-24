<?php

use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\ItemDetail;
use App\Models\PurchaseItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Item\SizeSection;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Color\ColorSection;
use App\Http\Livewire\Brands\BrandSection;
use App\Http\Controllers\PaymentController;
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
Route::get('/shop/{item}',[HomeController::class,'show'])->name('shop.detail');

Route::get('/register',[HomeController::class,'register'])->name('customer.register');
Route::post('/register',[CustomerController::class,'store'])->name('customer.store');


Route::get('/login',[CustomerController::class,'viewlogin'])->name('customer.viewlogin');
Route::post('/login',[CustomerController::class,'login'])->name('customer.login');
Route::post('/logout',[CustomerController::class,'logout'])->name('customer.logout');


Route::get('/profile/orderlists',[CustomerController::class,'orderlists'])->name('customer.orderlist')->middleware('auth:customer');
Route::get('/profile/orderlists/{order}',[CustomerController::class,'orderdetail'])->name('customer.orderdetail')->middleware('auth:customer');
Route::get('/profile/{customer}',[CustomerController::class,'show'])->name('customer.profile')->middleware('auth:customer');

Route::get('/checkout',function(){
    return view('customer.checkout');
})->name('customer.checkout');


Route::post('/payment/create',[PaymentController::class,'store'])->name('payment.store');
Route::get('/payment/{order}',[PaymentController::class,'show'])->name('customer.payment');


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
Route::get('/order/manage',function(){
    return view('admin.items.order-table');
})->name('order.table');

Route::get('/purchase/{purchase}', function(Purchase $purchase) {


    return view('admin.items.purchase-detail',
    [
        'purchase'=> $purchase,
        'purchase_records'=>$purchase->purchase_records()->with('item_detail')->get(),
]);
})->name('purchase.detail');


Route::get('/order/{order}',function(Order $order){
  return view('admin.items.order-detail',
    [
        'order'=> $order,
        'order_records'=>$order->order_records()->with('item_detail')->get(),
]);  
})->name('order.detail');


Route::get('/profile/{user}',function(User $user){
    $user=$user?:auth()->user();
    return view('admin.profile',compact('user'));
})->name('admin.profile');


Route::get('/staffs/manage',[UserController::class,'manageStaff'])->name('staffs.manage');



});
Route::get('/check',function(){
    $customers=  Customer::leftJoin('orders', 'customers.id', '=', 'orders.customer_id')
                ->select('customers.*',DB::raw('sum(orders.total_amount) as total_orders','orders.created_at') )
                ->groupBy('customers.id')
                
                ->orderBy('total_orders','desc')->get()->take(10);

        return $customers;
});


require __DIR__ . '/auth.php';




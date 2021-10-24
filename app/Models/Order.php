<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use App\Models\OrderItemDetail;
use App\Http\Traits\FilterFieldTrait;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
use Propaganistas\LaravelFakeId\RoutesWithFakeIds;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory,RoutesWithFakeIds,FilterFieldTrait;

    protected $with=['customer'];

    protected $guarded = [];

    
     public static function boot()
    {
        parent::boot();
        static::saved(function ($model) {
            Cart::content()->each(function ($cart) use ($model) {
                $model->saveOrderDetails($cart);
                $model->updateQty($cart);
            });
            Cart::destroy();
        });
    }
    public function updateQty($cart)
        {
            $this->findItemDetail($cart->id)->update([
                'quantity' =>
                    $this->findItemDetail($cart->id)->quantity - $cart->qty,
            ]);

            return $this->findItemDetail($cart->id)
                ->item()
                ->update([
                    'total_qty' =>
                        $this->findItemDetail($cart->id)->item->total_qty -
                        $cart->qty,
                    'order_count'=>$this->findItemDetail($cart->id)->item->order_count +  $cart->qty,
                ]);
        }
         public function findItemDetail($itemidincart)
    {
        return $this->order_itemdetails()->find($itemidincart);
    }
    public function order_itemdetails()
    {
        return $this->belongsToMany(ItemDetail::class, 'order_item_detail')->using(
            OrderItemDetail::class
        );
    }
      public function saveOrderDetails($cart)
    {
        // dd($cart);
        return $this->order_itemdetails()->attach($this, [
            'item_detail_id' => $cart->id,
            'price' => $cart->price,
            'quantity' => $cart->qty,
        ]);
    }
    public function getOrderStatusClass()
    {
     return $this->order_status?'badge-info':'badge-error';   
    }
    public function getOrderStatusText()
    {
     return $this->order_status?'Confirmed':'Pending';   
    }
    public function getPaymentStatusClass()
    {
     return $this->payment_status?'badge-info':'badge-error';   
    }
    public function getPaymentStatusText()
    {
     return $this->payment_status?'Paid':'Pending';   
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    
    }
        public function order_records()
    {
        return $this->hasMany(OrderItemDetail::class);
    }
    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
   public function payment(Type $var = null)
   {
       return $this->hasOne(Payment::class);
   }
}

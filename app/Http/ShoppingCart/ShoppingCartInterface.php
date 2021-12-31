<!-- 
    // <?php

// namespace App\Http\ShoppingCart;

// use App\Models\ItemDetail;
// use Exception;
// use Gloudemans\Shoppingcart\Facades\Cart;



// // class SetShoppingCart {

// //     protected $key,$itemdetail,$cuttentQtyInCart;

// //     public function __construct($key)
// //     {
// //         $cart=Cart::get($key);

// //         $this->cuttentQtyInCart=$cart->qty;
// //         $this->key=$key;
// //         $this->itemdetail = ItemDetail::find($cart->id);
// //     }
// //     public function increaseByOne()
// //     {
// //         Cart::update($this->key, $this->cuttentQtyInCart + 1);
// //     }
// //     public function decresaseByOne()
// //     {
// //         Cart::update($this->key, $this->cuttentQtyInCart - 1);
// //     }
   
// // }
// // class ConfigurePrice {

// //     public $price;

// //     private $key,$itemdetail,$cuttentQtyInCart;

// //     public function __construct($key)
// //     {
// //         $cart=Cart::get($key);
// //         $this->cuttentQtyInCart=$cart->qty;


// //         $this->itemdetail = ItemDetail::find($cart->id);
        
// //     }

// //     public function setExpectedQty($qty)
// //     {
// //         return $expectedQty= $this->cuttentQtyInCart+$qty;   
// //     }
// //     public function setPrice($qty)
// //     {
// //         // if($this->itemdetail->qty < $this->setExpectedQty($qty)){
// //         //     throw new Exception("Throw Error Invalid Quantity");
// //         // }
// //         if($this->setExpectedQty($qty) >= $this->itemdetail->item->retail_qty){
// //                 return $this->itemdetail->item->retail_price;
// //         }
        
// //         return $this->itemdetail->item->price;



// //     }
// // }
// class CheckQtyValidatitly {

//  protected $key,$itemdetail,$cuttentQtyInCart;

//     public function __construct($key,$qty)
//     {
//         $cart=Cart::get($key);
//         $this->cuttentQtyInCart=$cart->qty;


//         $this->itemdetail = ItemDetail::find($cart->id);
        
//     }
//       public function setExpectedQty($qty)
//     {
//         return $expectedQty= $this->cuttentQtyInCart+$qty;   
//     }
//     public function checkQty($qty)
//     {
//         if($this->itemdetail->qty < $this->setExpectedQty($qty)){
//             throw new Exception("Throw Error Invalid Quantity");
//         }
    
//     }
// }


// class ShoppingCart{

//     private $cart;
    
//     public function __consturct()
//     {
//       $cart=new CheckQtyValidatitly();
//     }

//     public function addToCart()
//     {
//         //check the validity of the qty in the db

//         //if ok, then put it in the cart
        
//     }
// }



//* facade pattern

//! in order to complete  add to cart process 
// todo: check the validitilty of the stock
//todo: check the qty if it is exceed the limited supplier qty
//todo: complete

// $cart->addToCart($item,$qty);
// $cart->increase($key,$qty);
// $cart->decrease($key,$qty);


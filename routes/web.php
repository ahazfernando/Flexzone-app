<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


//*The Route Codes*/
Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//***Home Controller Routes***
Route::get('/redirect',[HomeController::class,'redirect']);
//Add Product Category
Route::get('/add_category',[AdminController::class,'add_category']);
//Store Product Category
Route::post('/store_category',[AdminController::class,'store_category']);
//Delete Product Category
Route::get('/category_delbtn/{id}',[AdminController::class,'category_delbtn']);
//View Add Product Page
Route::get('/add_product',[AdminController::class,'add_product']);
//Add Product
Route::post('/addproduct',[AdminController::class,'addproduct']);
//View Product Stocks
Route::get('/product_inventory',[AdminController::class,'product_inventory']);
//Delete Product Stocks
Route::get('/del_product/{id}',[AdminController::class,'del_product']);
//This is to edit the product details
Route::get('/edit_product/{id}',[AdminController::class,'edit_product']);
//This to update the products and remain in the same page
Route::post('/update_product/{id}', [AdminController::class, 'update_product']);
//This is for the pagination and to redirect to the same page once clicked
Route::get('/customer_order', [AdminController::class, 'customer_order']);
//This is to display the suctomer order status
Route::get('/order_status/{id}', [AdminController::class, 'purchase_status']);



//***Admin Controller Routes***
//Product Master Card Route 
Route::get('/product_mastercard/{id}',[HomeController::class,'product_mastercard']);
//Product being passed into the cart
Route::get('/add_to_cart/{id}',[HomeController::class,'add_to_cart']);
//Product Moving on to the cart
Route::get('/customer_cart',[HomeController::class,'customer_cart']);
// Remove item from cart
Route::get('/remove_cart_item/{id}', [HomeController::class, 'remove_cart_item']);
//URL to Shop now page
Route::get('/shopnow', [HomeController::class, 'shopnow']);
//URL to About Us page
Route::get('/aboutus', [HomeController::class, 'aboutUs']);
//For the checkout button
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
//The Route for the Cash on Delivery Button
route::get('/payment_cod',[HomeController::class,'payment_cod']);
//The Route for the Pay in Cash and also displays the total bill the customer purchased
Route::get('/payment_cash/{net_total}', [HomeController::class, 'payment_cash']);
//This is for the Payment Gateway
Route::post('/stripepayment/{net_total}', [HomeController::class, 'stripePost'])->name('stripe.post');
//This is the route display all the Customer Data
Route::get('/customer_orders', [HomeController::class, 'display_orders']);
//Order Cancellation button Users end
Route::get('/cancel/{id}', [HomeController::class, 'cancel_btn']);

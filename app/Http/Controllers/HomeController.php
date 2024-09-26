<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;

use Session;
use Stripe;

class HomeController extends Controller
{
    //The Inital function when an user or admin logs into the system
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        
        if($usertype == '1')
        {
            $totproduct = Item::all()->count();
            $totorder = Order::all()->count();
            $totuser = User::all()->count();

            $purchase = Order::all();
            $income = 0;
            foreach($purchase as $item)
            {
                $income += $item->pro_price;
            }
            $deliveredorder = Order::where('package_status', '=','Successfully Delivered')->get()->count();
            $transitorder = Order::where('package_status', '=','On Transit')->get()->count();
            return view('livewire.admin.index',compact('totproduct','totorder','totuser','income','deliveredorder','transitorder'));
        }
        else {
            $product = Item::paginate(3);
            return view('livewire.home-component',compact('product'));
        }
    }
//What's to be displayed beforeloggin in 
    public function index()
    {
        $product = Item::paginate(3);
        return view('livewire.home-component',compact('product'));
    }
    //Details of the products are displayed here
    public function product_mastercard($id)
    {
        $product = Item::find($id);
        return view('livewire.home.mastercard',compact('product'));
    }
    //The Add to add cart function with connection to the sql database
    public function add_to_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $customer = Auth::User();
            $product = Item::find($id);
            $purchase = new Cart;

            $purchase->cus_name = $customer->name;
            $purchase->cus_email = $customer->email;
            $purchase->cus_phone = $customer->phone;
            $purchase->cus_address = $customer->address;

            $purchase->customer_id = $customer->id;

            $purchase->pro_name = $product->product_name;
            if($product->product_discount!=null)
            {
                $purchase->pro_price = $product->product_discount;
            }
            else{
                $purchase->pro_price = $product->product_price;
            }
            $purchase->pro_image = $product->product_image;

            $purchase->product_id = $product->id;

            $purchase->save();

            return redirect()->back()->with('success', 'Product added to Cart successfully!');
        }
        else{
            return redirect('login');
        }
    }
    public function customer_cart()
    {
        if (Auth::id()) {
            // This line retrives all the products the customer has saved in the cart
            $carting = Cart::where('customer_id', Auth::id())->get();
        
            //Once the button is clicked the it redirect back to cart
            return view('livewire.home.cart', compact('carting'));
        } 
        else 
        {
        return redirect('login');
        }
    }

    public function remove_cart_item($id)
    {
        Cart::find($id)->delete();
        return redirect()->back()->with('success', 'Item removed from cart!');
    }

    public function shopnow()
    {
        // This Retireves the Item data from the database
        $product = Item::paginate(6); //Pagination has also been inlcuded here to display 6 products in each line
        return view('livewire.shop.shopnow', compact('product'));
    }
    
    //The checkout function but this is not used in the project
    public function checkout()
    {
        return view('livewire.shop.checkout');
    }

    //The Chas oh delivery payemnt buttton
    public function payment_cod()
    {
        $customer = Auth::User();
        $customer_id = $customer->id;

        $alpha = Cart::where('customer_id', $customer_id)->get();

        foreach($alpha as $item)
        {
        $order = new Order;
        $order->cus_name = $item->cus_name;
        $order->cus_email = $item->cus_email;
        $order->cus_phone = $item->cus_phone;
        $order->cus_address = $item->cus_address;

        $order->customer_id = $item->customer_id;

        $order->pro_name = $item->pro_name;
        $order->pro_price = $item->pro_price;
        $order->pro_image = $item->pro_image;

        $order->product_id = $item->product_id;

        $order->payment_status = 'Payment Method: Cash on Delivery';
        $order->package_status = 'On Transit';
        $order->save();

        $order_no = $item->id;
        $cart = Cart::find($order_no);
        $cart->delete();
        }
        return redirect()->back()->with('success', 'Order placed successfully!');
    }

    //Retrects the user to be on the same page
    public function payment_cash($net_total)
    {
        return view('livewire.home.stripepayment', compact('net_total'));
    }
    
    //the stripe payment gateway api
    public function stripePost(Request $request,$net_total)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
        "amount" => $net_total * 100,
        "currency" => "LKR",
        "source" => $request->stripeToken,
        "description" => "Test payment from itsolutionstuff.com." ]);

        $customer = Auth::User();
        $customer_id = $customer->id;

        $alpha = Cart::where('customer_id', $customer_id)->get();

        foreach($alpha as $item)
        {
        $order = new Order;
        $order->cus_name = $item->cus_name;
        $order->cus_email = $item->cus_email;
        $order->cus_phone = $item->cus_phone;
        $order->cus_address = $item->cus_address;

        $order->customer_id = $item->customer_id;

        $order->pro_name = $item->pro_name;
        $order->pro_price = $item->pro_price;
        $order->pro_image = $item->pro_image;

        $order->product_id = $item->product_id;

        $order->payment_status = 'Payment Success';
        $order->package_status = 'On Transit';
        $order->save();

        $order_no = $item->id;
        $cart = Cart::find($order_no);
        $cart->delete();
        }

    Session::flash('success', 'Payment successful!');
    
    return back();
    }

    //Displayes the orders to the loggedin Customers
    public function display_orders()
    {
        if (Auth::id()) {
            $customer = Auth::user();
            $customerid = $customer->id;
            $purchase = Order::where('customer_id', $customerid)->paginate(8);
            return view('livewire.orderpage.customerorders', compact('purchase'));
         } else {
            return redirect('login');
        }
    }

    //Cancel button of the order table in the users view
    public function cancel_btn($id)
    {
        $order = Order::find($id);
        $order->package_status='You Cancelled the Order';
        $order->save();
        return redirect()->back();
    }

    //The about us page in the user view to redirect to page
    public function aboutUs() {
        return view('livewire.about.aboutus');
    }
    

}

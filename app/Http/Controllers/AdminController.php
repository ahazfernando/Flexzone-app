<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Item;
use App\Models\Order;

class AdminController extends Controller
{
    //The Controller action for the add category table in the admin dashboard
    public function add_category()
    {
        $category = Category::all();

        return view('livewire.admin.category',compact('category'));
    }
    //This stores the category in the my sql database
    public function store_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category_name;

        $category->save();

        //The Toaster Message once the product has been saved in the my sql database
        session()->flash('success', 'The Product Category has been successfully added.');

        return redirect()->back();
    }

    //This button is to delete the category within the table
    public function category_delbtn($id)
    {
        $category_del = Category::find($id);

        $category_del->delete();

        session()->flash('success', 'The Product Category has been successfully deleted');

        return redirect()->back();
    }

    //This the Controller routings for the Products to be added by the admin and get saved in the database
    public function add_product()
    {
        $product_category = Category::all();

        return view('livewire.admin.addproduct',compact('product_category'));
    }
    public function addproduct(Request $request)
    {
    $product = new Item;
    $product->product_name = $request->product_name;
    $product->product_price = $request->product_price;
    $product->product_description = $request->product_description;
    $product->product_category = $request->product_category;
    $product->product_discount = $request->product_discount;
    $product->product_quantity = $request->product_quantity;
    
    if ($request->hasFile('product_image')) {
        $pro_img = $request->file('product_image');
        $pro_imgup = time().'.'.$pro_img->getClientOriginalExtension();
        $pro_img->move('products', $pro_imgup);
        $product->product_image = $pro_imgup;
    }
    
    $product->save();
    session()->flash('success', 'The Product Category has been successfully added');
    return redirect()->back();
    }

    //This displays all the products which has been saved into the database
    public function product_inventory()
    {
        $product = Item::all();
        return view('livewire.admin.inventory',compact('product'));
    }
    
    //These the functionaal keys for the deleting of pa product
        public function del_product($id)
        {
            $product = Item::find($id);
            $product->delete();
            return redirect()->back();
        }
    //These the functionaal keys for the editing of pa product
        public function edit_product($id)
        {
            $product = Item::find($id);
            $category = Category::all();
            return view('livewire.admin.edit_view',compact('product','category'));
        }
    
        public function update_product(Request $request, $id)
        {
            $product = Item::find($id);

            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_description = $request->product_description;
            $product->product_category = $request->product_category;
            $product->product_discount = $request->product_discount;
            $product->product_quantity = $request->product_quantity;

            $image = $request->file('product_image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);//Tis moves the product image to 
            $product->product_image = $imagename;//Image assignment

            $product->save();
    
            session()->flash('success', 'The Product has been successfully updated');
            return redirect()->back();
        }

    //For the Cusomer Order table to be viewed by the admin
    public function customer_order()
    {
        $order = Order::paginate(5);///This Pagainates 5 rows of order details
        return view('livewire.admin.customer_order', compact('order'));
    }

    //The admin can edit the order details verifying the payment status
    public function purchase_status($id)
    {
        $status = Order::find($id);
        $status->package_status="Successfully Delivered";
        $status->save();
        return redirect()->back();
    }

}

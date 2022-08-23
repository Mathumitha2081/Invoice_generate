<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //product list

    public function index()
    {
        $data['products'] = Product::orderBy('id', 'asc')->paginate(5);

        return view('admin_dashboard', $data);
    }
    //create redirect view
    public function create()
    {
        return view('add_product');
    }

    //insert product function
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'available_stocks' => 'required|int',
            'price' => 'required',
            'tax_percentage' => 'required|',
            'product_status' => 'required',

        ]);
        $product_details = new Product;
        $product_details->name = $request->name;
        $product_details->available_stocks = $request->available_stocks;
        $product_details->tax_percentage = $request->tax_percentage;
        $product_details->price = $request->price;
        $product_details->product_status = $request->product_status;
        $product_details->save();
        return redirect()->route('admin_dashboard')
            ->with('success', 'product has been created successfully.');
    }
    //list  product in admin dashboard
    public function show()
    {
        return view('admin_dashboard', compact('product'));
    }
 

    //edit particular product
    public function edit($id)
    {
        $product_details = Product::find($id);

        return view('edit_product', compact('product_details'));
    }
    //update particular product
    public function update(Request $request, $id)
    {

        $product_details = Product::find($id);
        $product_details->name = $request->name;
        $product_details->available_stocks = $request->available_stocks;
        $product_details->tax_percentage = $request->tax_percentage;
        $product_details->price = $request->price;
        $product_details->product_status = $request->product_status;
        $product_details->save();
        return redirect()->route('admin_dashboard')
            ->with('success', 'Product has Been updated successfully');
    }
    //delete particular product
    public function destroy($id)
    {
        $product_details = Product::find($id);

        $product_details->delete();
        return redirect()->route('admin_dashboard')
            ->with('success', 'Product has been deleted successfully');
    }
  
    //list product in customers_dashboard


    public function admin_dashboard()
    {
        $products = Product::orderBy('id', 'asc')->paginate(10);

        return view('admin_dashboard', compact('products'));
    }
}

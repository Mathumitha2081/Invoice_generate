<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    // admin login validation
    function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:15'
        ]);

        $user = Admin::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('LoggedUser', $user->id);

                $products = Product::orderBy('id', 'asc')->paginate(10);
                $customers = Customer::orderBy('id', 'asc')->paginate(10);

                return view('admin_dashboard', compact('products', 'customers'));
                // redirect to profile page
            } else {
                return back()->with('fail', "Invalid pass");
            }
        } else {
            return back()->with('fail', "NO Account Found");
        }
    }

         //customer login validation
    function customer_check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:15'
        ]);

        $user = Customer::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('LoggedUser', $user->id);

                $products = Product::orderBy('id', 'asc')->paginate(10);


                return view('customer_dashboard', compact('products'));
            } else {
                return back()->with('fail', "Invalid pass");
            }
        } else {
            return back()->with('fail', "NO Account Found");
        }
    }

    //generate report for product
    public function product_report()
    {
        $products = Product::all();

        $pdf = PDF::loadView('product_report', compact('products'));
        return $pdf->download('products.pdf');
    }
    //generate report for customer
    public function customer_report()
    {
        $customers = Customer::all();

        $pdf = PDF::loadView('customer_report', compact('customers'));
        return $pdf->download('customers.pdf');
    }
    //admin  logout
    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }

}

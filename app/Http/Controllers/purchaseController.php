<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\Product;
use App\Models\Purchase;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class purchaseController extends Controller
{
    public function add_purchase(Request $request)
    {

        $request->validate([
            'customer_email' => 'required|email',
            'product_id' => 'required',
            'quantity' => 'required',

        ]);
        $email=$request->customer_email;
        $product_id=$request->product_id;

        $res_price = [];
        foreach ($product_id as $res) {
            $prices = Product::where('id', $res)->pluck('price');
            $results=$prices[0];

            array_push($res_price, $results);

        }
        $res_tax = [];
        foreach ($product_id as $res) {
            $taxes = Product::where('id', $res)->pluck('tax_percentage');
            $results=$taxes[0];

            array_push($res_tax, $results);

        }
        
        $products = [];
        foreach ($product_id as $id) {
            $price = Product::where('id', $id)->get();
            array_push($products, $price);

        }
        $res_qty = [];

        foreach ($request->quantity as  $qty) {
            array_push($res_qty, $qty);

        }
        $count = count($res_price);

        $res_amount = [];
        $totalprices = [];
        $totalprices_without_tax = [];
        $tax_payable = [];
        for ($i = 0; $i < $count; $i++) {
            $total_amount = ($res_price[$i] )*( $res_qty[$i]);
            $tax_for_product=($res_tax[$i]* $total_amount)/100;
            $total_price=$total_amount+$tax_for_product;
            $invoice_data=[
                'product_id'=>$product_id[$i],
                'unit_price'=>$res_price[$i],
                'quantity'=>$res_qty[$i],
                'purchase_price'=>$total_amount,
                'tax_percentage'=>  $res_tax[$i],
                'tax'=>  $tax_for_product,
                'total_price'=> $total_price,
            ];
            array_push($res_amount, $total_price);
            array_push($totalprices, $invoice_data);
            array_push($tax_payable, $tax_for_product);
            array_push($totalprices_without_tax, $total_amount);
        }
        $sum_amount= 0;
        foreach ($res_amount as $key => $value) {
            $sum_amount += $value;
        }
        $sum__prices= 0;
        foreach ($totalprices_without_tax as $key => $value) {
            $sum__prices += $value;
        }
        $customer_paid_amount=$request->amount;
        $balance_amount=$customer_paid_amount-$sum_amount;

        $rounded_price= round($sum_amount,2);
        $invoice_summary=[
            'price_without_tax'=>$sum__prices,
            'tax_payable'=>$tax_payable,
            'net_price'=>$res_amount,
            'rounded_price'=>$rounded_price,
            'balance_payable'=>  $balance_amount,

        ];
        $data=[
            'five_hundred'=>isset($request->five_hundred)?$request->five_hundred:0,
            'hundred'=>isset($request->hundred)?$request->hundred:0,
            'fifty'=>isset($request->twenty)?$request->twenty:0,
            'ten'=>isset($request->ten)?$request->ten:0,
            'five'=>isset($request->five)?$request->five:0,
            'two'=>isset($request->two)?$request->two:0,
            'one'=>isset($request->one)?$request->one:0,
        ];

        $purchase=  new Purchase();
        $purchase->product_id=$product_id;
        $purchase->customer_email=$email;
        $purchase->qty=$res_qty;
        $purchase->total_amount=$res_amount;
        $purchase->payment_status="PAID";
        $purchase->save();

        $purchase_data=Purchase::all();

        $message="Here Your Bill Thank you For Comming !!";

        // $pdf = PDF::loadView('emails.InvoiceMail', compact('totalprices','invoice_summary','products','purchase_data','email','sum_amount', 'count' ,'data','res_tax'));

        // dispatch(new SendEmail( $email,$message,$pdf ,$totalprices,$count,$invoice_summary));

     return view('emails.InvoiceMail',compact('totalprices','invoice_summary','products','purchase_data','email','sum_amount', 'count' ,'data','res_tax'));

    }





}
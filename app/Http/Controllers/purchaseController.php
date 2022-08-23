<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Product;
use App\Models\Purchase;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class purchaseController extends Controller
{
    public function add_purchase(Request $request)
    {

        $request->validate([
            'customer_email' => 'required|email',
            'product_id' => 'required',
            'quantity' => 'required',

        ]);
        $email = $request->customer_email;
        $product_id = $request->product_id;

        $res_price = [];
        foreach ($product_id as $res) {
            $prices = Product::where('id', $res)->pluck('price');
            $results = $prices[0];

            array_push($res_price, $results);

        }

        $res_tax = [];
        foreach ($product_id as $res) {
            $taxes = Product::where('id', $res)->pluck('tax_percentage');
            $results = $taxes[0];

            array_push($res_tax, $results);

        }

        $products = [];
        foreach ($product_id as $id) {
            $price = Product::where('id', $id)->get();
            array_push($products, $price);

        }
        $res_qty = [];

        foreach ($request->quantity as $qty) {
            array_push($res_qty, $qty);

        }
        $count = count($res_price);

        $res_amount = [];
        $totalprices = [];
        $totalprices_without_tax = [];
        $tax_payable = [];
        for ($i = 0; $i < $count; $i++) {
            $total_amount = ($res_price[$i]) * ($res_qty[$i]);
            $tax_for_product = ($res_tax[$i] * $total_amount) / 100;
            $total_price = $total_amount + $tax_for_product;

            $invoice_data = [
                'product_id' => $product_id[$i],
                'unit_price' => $res_price[$i],
                'quantity' => $res_qty[$i],
                'purchase_price' => $total_amount,
                'tax_percentage' => $res_tax[$i],
                'tax' => $tax_for_product,
                'total_price' => $total_price,
            ];

            $purchase = new Purchase();
            $purchase->product_id = $product_id[$i];
            $purchase->customer_email = $email;
            $purchase->qty = $res_qty[$i];
            $purchase->total_amount = $total_price;
            $purchase->payment_status = "PAID";
            $purchase->save();

            array_push($res_amount, $total_price);
            array_push($totalprices, $invoice_data);
            array_push($tax_payable, $tax_for_product);
            array_push($totalprices_without_tax, $total_amount);
        }

        $sum_amount = 0;
        foreach ($res_amount as $key => $value) {
            $sum_amount += $value;
        }
        $sum__prices = 0;
        foreach ($totalprices_without_tax as $key => $value) {
            $sum__prices += $value;
        }
        $customer_paid_amount = $request->amount;
        $balance_amount = $customer_paid_amount - $sum_amount;

        $rounded= (int)$sum_amount;

        $rounded_price=number_format((float) $rounded,2,'.','');

        $invoice_summary = [
            'price_without_tax' => $sum__prices,
            'tax_payable' => $tax_payable[0],
            'net_price' => $res_amount[0],
            'rounded_price' => $rounded_price,
            'balance_payable' => $balance_amount,

        ];

        $data = [
            'five_hundred' => isset($request->five_hundred) ? $request->five_hundred : 0,
            'hundred' => isset($request->hundred) ? $request->hundred : 0,
            'fifty' => isset($request->fifty) ? $request->fifty : 0,
            'twenty' => isset($request->twenty) ? $request->twenty : 0,
            'ten' => isset($request->ten) ? $request->ten : 0,
            'five' => isset($request->five) ? $request->five : 0,
            'two' => isset($request->two) ? $request->two : 0,
            'one' => isset($request->one) ? $request->one : 0,
        ];


        $purchase_data = Purchase::all();

        $message = "Here Your Bill Thank you  !!";

        dispatch(new SendEmailJob($email, $totalprices, $invoice_summary, $count, $data));

        $mailpdf =  PDF::loadView('emails.InvoiceBill', compact('totalprices', 'invoice_summary',   'email',  'count', 'data'));

        return $mailpdf->download('invoice.pdf');


    }


public function list_customerEmail(Request $request)
{
    $customer_email=Purchase::pluck('customer_email');

    $email = $customer_email->toArray();

        $unique = array_unique($email);

        $response = collect($unique);

        $response_email = $response->values()->all();

    $count=count($response_email);

    return view('customers', compact('response_email','count'));

}
   public function purchase( $response_email)
   {
    $purchases=Purchase::where('customer_email',$response_email)->get();
    $purchase_data = [];

        foreach ($purchases as $purchase) {

            $data=[
                'product_id'=>$purchase->product_id,
                'customer_email'=>$purchase->customer_email,
                'total_amount'=>$purchase->total_amount,
                'payment_status'=>$purchase->payment_status,
            ];

            array_push($purchase_data, $data);

        }

// return $purchases;
    return view('list_product', compact('purchase_data'));

   }
}

<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 90%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 45px;
        height: 45px;
        padding-top: 30px;
    }

    .logo span {
        margin-left: 8px;
        top: 19px;
        position: absolute;
        font-weight: bold;
        font-size: 25px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }

    .container {
        padding: 10%;
    }
</style>

<body>
    <div class="container">

        <div class="head-title">
            <h1 class="text-center m-0 p-0">Invoice</h1>
        </div>

        <div class="table-section bill-tbl w-100 mt-10">
            <table class="table w-100 mt-10">
                <tr>
                    <th class="w-15">Product ID</th>
                    <th class="w-15">Unit Price </th>
                    <th class="w-15">Qty</th>
                    <th class="w-15">Purchase Price</th>
                    <th class="w-15">Tax % for item</th>
                    <th class="w-15">Tax Amount</th>
                    <th class="w-15"> Total Price</th>
                </tr>
                @for ($i = 0; $i < $count; $i++)
                    <tr>
                        <td>{{ $totalprices[$i]['product_id'] }}</td>
                        <td>{{ $totalprices[$i]['unit_price'] }}</td>
                        <td>{{ $totalprices[$i]['quantity'] }}</td>
                        <td>{{ $totalprices[$i]['purchase_price'] }}</td>
                        <td>{{ $totalprices[$i]['tax_percentage'] }}</td>
                        <td>{{ $totalprices[$i]['tax'] }}</td>
                        <td>{{ $totalprices[$i]['total_price'] }}</td>

                    </tr>
                @endfor

                <tr>
                    <td colspan="7">
                        <div class="total-part">
                            <div class="total-left w-85 float-left">
                                <p> Total price without tax:</p>
                                <p> Total tax payable</p>
                                <p>Net price of the purchased item</p>
                                <p>Rounded down value of the purchased item net price</p>
                                <p>Balance Payable to the customer</p>
                            </div>
                            <div class="total-right w-15 float-left text-bold">
                                <p>{{ $invoice_summary['price_without_tax'] }}</p>
                                
                                <p>{{ $invoice_summary['tax_payable'] }}</p>

                                <p>{{ $invoice_summary['net_price'] }}</p>

                                <p>{{ $invoice_summary['rounded_price'] }}</p>

                                <p>{{ $invoice_summary['balance_amount'] }}</p>

                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <h5>Balance Denominations</h5>
    <h5> 500 :</h5><span>{{ $data->five_hundred }}</span>
    <h5> 100 :</h5><span>{{ $data->hundred }}</span>
    <h5> 50 :</h5><span>{{ $data->fifty }}</span>
    <h5> 20 :</h5><span>{{ $data->twenty }}</span>
    <h5> 10 :</h5><span>{{ $data->ten }}</span>
    <h5> 5 :</h5><span>{{ $data->five }}</span>
    <h5> 2 :</h5><span>{{ $data->two }}</span>
    <h5> 1 :</h5><span>{{ $data->one }}</span>




</html>

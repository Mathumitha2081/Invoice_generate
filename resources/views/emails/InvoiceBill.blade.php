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
        width: 95%;
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

    p {
        font-size: 12px;
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
        font-size: 13px;
    }

    table tr td {
        font-size: 12px;
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
    <?php
    $foo = 0.0;
    ?>
    <div class="container">
        <div class="head-title">
            <h1 class="text-center m-0 p-0">Here Your Bill Thank you !!</h1>
        </div>
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
                @php
                    print_r($invoice_summary);
                @endphp
                @for ($i = 0; $i < $count; $i++)
                    <tr>
                        <td>{{ isset($totalprices[$i]['product_id']) ? $totalprices[$i]['product_id'] : 0 }}</td>
                        <td>{{ isset($totalprices[$i]['unit_price']) ? $totalprices[$i]['unit_price'] : 0 }}</td>
                        <td>{{ isset($totalprices[$i]['quantity']) ? $totalprices[$i]['quantity'] : 0 }}</td>
                        <td>{{ isset($totalprices[$i]['purchase_price']) ? $totalprices[$i]['purchase_price'] : 0 }}
                        </td>
                        <td>{{ isset($totalprices[$i]['tax_percentage']) ? $totalprices[$i]['tax_percentage'] : 0 }}
                        </td>
                        <td>{{ isset($totalprices[$i]['tax']) ? $totalprices[$i]['tax'] : 0 }}</td>
                        <td>{{ isset($totalprices[$i]['total_price']) ? $totalprices[$i]['total_price'] : 0 }}</td>
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
                                <p>{{ isset($invoice_summary['price_without_tax']) ? $invoice_summary['price_without_tax'] : 0 }}
                                </p>
                                <p>{{ isset($invoice_summary['tax_payable']) ? $invoice_summary['tax_payable'] : 0 }}
                                </p>
                                <p>{{ isset($invoice_summary['net_price']) ? number_format($invoice_summary['net_price'], 2, '.', '') : 0 }}
                                </p>
                                <p>{{ isset($invoice_summary['rounded_price']) ? $invoice_summary['rounded_price'] : 0 }}
                                </p>
                                <p>{{ isset($invoice_summary['balance_payable']) ? $invoice_summary['balance_payable'] : 0 }}
                                </p>


                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <h5>Balance Denominations</h5>
        <h5> 500 :<span>{{ isset($data['five_hundred']) ? $data['five_hundred'] : 0 }}</span></h5>
        <h5> 100 :<span>{{ isset($data['hundred']) ? $data['hundred'] : 0 }}</span></h5>
        <h5> 50 :<span>{{ isset($data['fifty']) ? $data['fifty'] : 0 }}</span></h5>
        <h5> 20 :<span>{{ isset($data['twenty']) ? $data['twenty'] : 0 }}</span></h5>
        <h5> 10 :<span>{{ isset($data['ten']) ? $data['ten'] : 0 }}</span></h5>
        <h5> 5 :<span>{{ isset($data['five']) ? $data['five'] : 0 }}</span></h5>
        <h5> 2 :<span>{{ isset($data['two']) ? $data['two'] : 0 }}</span></h5>
        <h5> 1 :<span>{{ isset($data['one']) ? $data['one'] : 0 }}</span></h5>
    </div>


</body>


</html>

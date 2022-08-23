<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 90%;
    }
    .w-50{
        width:50%;
    }
    .w-85{
        width:85%;
    }
    .w-15{
        width:15%;
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
    .container{
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
        <tr align="center">
            <td>$656</td>
            <td>Mobile</td>
            <td>$204.2</td>
            <td>3</td>
            <td>$500</td>
            <td>$50</td>
            <td>$100.60</td>
        </tr>
        <tr align="center">
            <td>$656</td>
            <td>Mobile</td>
            <td>$254.2</td>
            <td>2</td>
            <td>$500</td>
            <td>$50</td>
            <td>$120.00</td>
        </tr>
        <tr align="center">
            <td>$656</td>
            <td>Mobile</td>
            <td>$554.2</td>
            <td>5</td>
            <td>$500</td>
            <td>$50</td>
            <td>$100.00</td>
        </tr>
        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p> Total price without tax:</p>
                        <p> Total tax payable</p>
                        <p>Net price of the purchased item</p>
                        <p>Rounded down value of the purchased item  net price</p>
                        <p>Balance  Payable to the customer</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        <p>$20</p>
                        <p>$20</p>
                        <p>$20</p>
                        <p>$20</p>
                        <p>$330.00</p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
    </table>
</div>
</div>
</html>

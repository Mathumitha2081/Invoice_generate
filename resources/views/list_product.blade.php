<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="/doodlebule-logo.png">
    <title>Product List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Purchase List</h4>
                </div>
            
            </div>
        </div>
      
        <table class="table table-bordered">
            <tr>
                <th> ID</th>
                <th>Product ID</th>
                <th>Customer Email</th>
                <th>QTY</th>
                <th>Total Amount </th>
                <th>Payment Status</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($purchase_data as $product_details)
                <tr>
                    <td>{{ $product_details->id }}</td>

                    <td>{{ $product_details->product_id }}</td>
                    <td>{{ $product_details->customer_email }}</td>
                    <td>{{ $product_details->qty }}</td>
                    <td>{{ $product_details->total_amount }}</td>
                    <td>{{ $product_details->payment_status }}</td>
                    <td>
                            <a class="btn btn-primary" href="">Preview</a>
                           
                    </td>
                 

                </tr>
            @endforeach
        </table>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('admin_dashboard') }}" enctype="multipart/form-data"> Back</a>
        </div>
</body>

</html>

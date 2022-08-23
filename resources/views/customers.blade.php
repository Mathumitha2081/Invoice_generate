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
                <th> Purchase ID</th>
                <th>Customer Email</th>
                <th width="280px">Action</th>
            </tr>
            @for ($i = 0; $i < $count; $i++)
            @php
            $j=1;
                $j=$i+$j;
            @endphp
            <tr>
                    <td>{{ $j}}</td>
                    <td>{{ $response_email[$i]}}</td>

                    <td>   <a class="btn btn-info" href="{{ route('purchase', $response_email[$i]) }}">Preview</a>
                    </td>


                </tr>
                @endfor
        </table>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('admin_dashboard') }}" enctype="multipart/form-data"> Back</a>
        </div>
</body>

</html>

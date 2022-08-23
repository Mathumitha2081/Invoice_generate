<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>Dashboard</title>
</head>

<body>
    <div class="row justify-content-center mt-5">
        <div class="container">
            <div class="pull-right p-2 ">

                <a class="btn btn-success" onclick="alert('Are you really want to logout!')"
                    href="{{ url('logout') }}">Logout</a>
            </div>
            <h4><strong>Admin Dashboard</strong></h4>
                    <div class="row justify-content-center mt-4">
                        <div class="container p-4">
                            <div class="container mt-2">
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            <h4><strong> Product List</strong></h4>

                                        </div>
                                        <div class="pull-right mb-2">
                                            <a class="btn btn-success" href="{{ route('products.create') }}"> Create
                                                Product</a>

                                            <a class="btn btn-success" href="{{ url('billing') }}"> Billing Page
                                                </a>
                                                <a class="btn btn-success" href="{{ route('list_email') }}"> Purchase
                                                    Details</a>
                                        </div>
                                    </div>
                                </div>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>available Stocks</th>
                                        <th>Tax Percentage</th>
                                        <th>price </th>
                                        <th>product_status</th>

                                    </tr>
                                    @foreach ($products as $product_details)
                                        <tr>
                                            <td>{{ $product_details->id }}</td>
                                            <td>{{ $product_details->name }}</td>

                                            <td>{{ $product_details->available_stocks }}</td>
                                            <td>{{ $product_details->tax_percentage }}</td>

                                            <td>{{ $product_details->price }}</td>
                                            <td>{{ $product_details->product_status }}</td>
                                            <td>
                                                <form action="{{ route('products.destroy', $product_details->id) }}"
                                                    method="Post">
                                                    <a class="btn btn-primary"
                                                        href="{{ route('products.edit', $product_details->id) }}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


</body>

</html>

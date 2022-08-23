<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="">
    <title>Add product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2 p-4">
                    <h3>Add product</h3>
                </div>

            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Product Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Enter the Product name">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group ">
                        <strong>Available Stocks :</strong>
                        <input type="text" name="available_stocks"  placeholder="Enter the Stock" class="form-control" >
                        @error('available_stocks')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Tax Percentage :</strong>
                        <input type="text" name="tax_percentage" class="form-control" placeholder="Enter the tax ">
                        @error('tax_percentage')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong> Price :</strong>
                        <input type="text" name="price" class="form-control" placeholder="Enter the price ">
                        @error('price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div></div>

            <div class="row">

                <div class="col-xs-6 col-sm-6 col-md-6 p-2">
                    <div class="form-group">
                        <form>
                            <strong>Product Status :</strong>

                            <input type="text" name="product_status" class="form-control"
                                placeholder="Enter the product status ">

                        </form>
                        @error('product_status')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary ml-3 mb-2">Submit</button>

                </div>

            </div>
            <div class="pull-right mt-5">
                <a class="btn btn-primary ml-3" href="{{ url('admin_dashboard') }}"> Back</a>
            </div>
        </form>
</body>

</html>

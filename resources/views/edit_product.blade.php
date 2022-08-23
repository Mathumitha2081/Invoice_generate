<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="">
    <title>Edit product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2 " >
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left p-4">
                    <h3>Edit product</h3>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('products.update', $product_details->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Product Name:</strong>
                        <input type="text" name="name" value="{{ $product_details->name }}"
                            class="form-control" placeholder="name ">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Available Stocks :</strong>
                        <input type="text" name="available_stocks" value="{{ $product_details->available_stocks }}"
                            class="form-control" placeholder="Enter the available stocks ">
                        @error('available_stocks')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div> <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Price :</strong>
                        <input type="text" name="price" value="{{ $product_details->price }}"
                            class="form-control" placeholder="price ">
                        @error('price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Tax Percentage :</strong>
                        <input type="text" name="tax_percentage" value="{{ $product_details->tax_percentage }}" class="form-control"
                            placeholder="Enter the tax_percentage ">
                        @error('tax_percentage')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>product_status :</strong>
                        <input type="text" name="product_status" value="{{ $product_details->product_status }}"
                            class="form-control" placeholder="product_details Address">
                        @error('product_status')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>

                </div>

            </div>
        </form>
        <div class="pull-right  ml-3 mt-3">
            <a class="btn btn-primary" href="{{ route('admin_dashboard') }}" enctype="multipart/form-data">
                Back</a>
        </div>
    </div>
</body>

</html>

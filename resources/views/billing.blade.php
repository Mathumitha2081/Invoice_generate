<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="">
    <title>Billing Page</title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
</head>
<style>
    .p-3 {
        height: 33px;
        background: #fff;
        color: #000;
        border-radius: 5px;
        -webkit-box-shadow: none;
        box-shadow: none;
        border: 1px solid rgba(0, 0, 0, 0.1);
    }
</style>

<body>
    <div class="row justify-content-center mt-5">
        <div class="container">
            <div class="row">
                <div class="pull-left ">
                    <h4><strong> Billing Page </strong></h4>
                </div><br>
            </div>

            <form action="{{ url('add_purchase') }}" method="post">
                @csrf

                <div>
                    <div class="row">

                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label>Customer Email :</label>
                                <input type="email" name="customer_email" class="form-control" placeholder="email ">
                                @error('customer_email')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 pull-right mb-2">
                        <button type="button" name="add" id="add" class="btn btn-success">Add</button>
                    </div>
                    <label> Billing Section:</label>

                    <div class="row p-4 " id="dynamic_field">

                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <input id="product_id" type="text" name="product_id[]" class="form-control p-4"
                                        placeholder="product_id" required>
                                    @error('product_id')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">

                                    <input id="quantity" type="text" name="quantity[]" class="form-control p-4"
                                        placeholder="quantity " required>
                                    @error('quantity')
                                        <div class="alert alert-danger mt-1 mb-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="id1"></div>
                </div><br>


        </div>
    </div>
    <div class="container mt-2">

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="pull-left mb-2 p-4">
                    <h3>Denominations</h3>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
            <strong>500:</strong>
            <input type="text" name="five_hundred" class="p-3 " placeholder="Enter the count">

        </div>


        <div class="form-group ">
            <strong>100 :</strong>
            <input type="text" name="hundred" placeholder="Enter the count" class="p-3">


        </div>
        <div class="form-group">
            <strong>50 :</strong>
            <input type="text" name="fifty" class="p-3" placeholder="Enter the count">

        </div>
        <div class="form-group">
            <strong>20 :</strong>
            <input type="text" name="twenty" class="p-3" placeholder="Enter the count">

        </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">

        <div class="form-group">
            <strong> 10 :</strong>
            <input type="text" name="ten" class="p-3"placeholder="Enter the count ">


        </div>

        <div class="form-group">
            <strong> 5 :</strong>
            <input type="text" name="five" class="p-3" placeholder="Enter the count">


        </div>

        <div class="form-group">
            <strong> 2 :</strong>
            <input type="text" name="two" class="p-3" placeholder="Enter the count">

        </div>

        <div class="form-group">
            <strong> 1 :</strong>
            <input type="text" name="one" class="p-3" placeholder="Enter the count">

        </div>

    </div>
</div>

        <div class="form-group">
            <strong>Cash Paid By Customer:</strong>

            <input type="text" name="amount" class="p-3" placeholder="Enter the Amount " required>

            @error('amount')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <a class="btn btn-danger" href="{{ url('admin_dashboard') }}"> Cancel</a>

        <input type="submit" name="submit" class="btn btn-info p-4" value="Generate Bill " />
    </div>
    </form>
    <script>
        $(document).ready(function() {
            var i = 1;
            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i +
                    '"><br><td><input type="text" name="product_id[]" placeholder="Enter product_id" class="form-control" name_list" /></td>  <td><input type="text" name="quantity[]" placeholder="Enter your quantity" class="form-control mt-4 name_list" /></td><td><button type="button" name="remove" id="' +
                    i + '" class="btn btn-danger btn_remove">X</button></td></tr><br>');
            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            jQuery('button#verifyDoc').on('click', function() {
                swal({
                    title: "Good job!",
                    text: "You clicked the button!...",
                    type: "success",
                    showCancelButton: true,
                    buttonsStyling: true,
                    confirmButtonText: "ok",
                    cancelButtonText: "cancel",
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        jQuery("#verifyDocForm").submit();
                    }
                });
            });
        });
    </script>
</body>

</html>

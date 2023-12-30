@extends('backEnd.master')
@section('title')
    Purchase New Product
@endsection
@section('content')
    <div class="main--content">
        <div class="overview" style="margin-top: 20px; " > </div>
        <div class="overview">
            <div class="recent--tables reccent_tables">
                <div class="title tadd">
                    <h4>@yield('title')</h4>
                    <a class="add" href="{{route('purchase.list')}}"><i class="ri-arrow-down-circle-fill"></i>Purchase List</a>
                </div>
                <hr>
                <div class="container">
                    <form action="{{route('purchase.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="card">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="alert_qty">Purchase Title  <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="supplier_id">Supplier <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <select name="supplier_id" class="form-control form-select">
                                                <option value="">Select Supplier</option>
                                                @foreach($suppliers as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="alert_qty">Purchase Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="purchase_date" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="item_image">Status <small class="text-danger">  *  </small></label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1">Received</option>
                                            <option value="2">Pending</option>
                                            <option value="0">Ordered</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="alert_qty">Reference Number </label>
                                        <input type="text" class="form-control" name="reference" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-md-2"></div>
                            <div class="form-group col-md-8">
                                <label for="custom_barcode">Search Product</label>
                                <input type="text" class="form-control" id="custom_barcode" placeholder="Product Name / Barcode" value="">
                                <ul class="list-group" style="display: block; position: relative; z-index: 1" id="search-results">

                                </ul>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="row">
                                <div class="container">
                                    <div class="col-md-12">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                            <tr class="bg-success text-white">
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

{{--     this dynamic table content coming from javascript --}}

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h2 class="text-success" id="total-price">Total Price: </h2>
                            </div>

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="">
                                                <label for="amount">Amount <small class="text-danger">  *  </small> </label>
                                                <input type="number" class="form-control" id="total-price-main" name="total_amount" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="">
                                                <label for="payment_type">Payment Type <small class="text-danger">  *  </small></label>
                                                <select name="payment_type" id="" class="form-control">
                                                    <option value="1">Cash</option>
                                                    <option value="2">Check</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="">
                                                <label for="payment_note">Description <small class="text-primary">( Optional )</small></label>
                                                <textarea type="text" class="form-control" id="payment_note" name="description" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="m-2 text-center">
                                <button type="submit" class="btn btn-primary" >Submit</button>
                            </div>
                            </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Maintain a list of product IDs in the table
        var addedProductIds = [];

        function updateOverallTotalPrice() {
            var overallTotalPrice = 0;
            $("tbody tr").each(function () {
                var totalPrice = parseFloat($(this).find('.total-price').text());
                overallTotalPrice += isNaN(totalPrice) ? 0 : totalPrice;
            });
            $("#total-price").text("Total Price: " + overallTotalPrice.toFixed(2));
            document.getElementById('total-price-main').value =  overallTotalPrice.toFixed(2);
        }

        $("#custom_barcode").on('keyup', function () {
            var value = $(this).val();

            // Check if the search input is empty
            if (value.trim() === '') {
                // Clear the results or display a message
                $("#search-results").empty();
                return;
            }

            $.ajax({
                url: '{{ route('search.product') }}',
                type: 'GET',
                data: { 'query': value },
                success: function (data) {
                    var results = $("#search-results");
                    results.empty();

                    if (data.length > 0) {
                        // Filter out products that are already in the table
                        var filteredData = data.filter(function (product) {
                            return addedProductIds.indexOf(product.id) === -1;
                        });

                        // Loop through the filtered products and append result items to the results
                        $.each(filteredData, function (index, product) {
                            results.append('<li class="result-item list-group-item cursor-pointer" data-id="' + product.id + '" ' +
                                'data-price="' + product.price + '" ' +
                                'data-image="' + product.image + '">' + product.name + '</li>');
                        });

                        // Handle click event on list items
                        $(".result-item").click(function () {
                            var rowNumber = $("tbody tr").length + 1;
                            var productId = $(this).data('id');
                            var productName = $(this).text();
                            var productPrice = $(this).data('price');
                            var productImage = $(this).data('image');

                            // Add the product ID to the list of added products
                            addedProductIds.push(productId);

                            // Create input fields for quantity and price within the result item
                            var qtyInput = '<input type="number" name="total_quantity[]" value="1" step="1" class="form-control qty-input">';
                            var prId = '<input type="hidden" name="product_id[]" value="'+productId+'" class="form-control">';
                            var priceInput = '<input type="number" name="price[]" value="' + productPrice + '" step="1" class="form-control price-input">';

                            var newRow = '<tr>' +
                                '<th scope="row">' + (rowNumber++) + '</th>' +
                                '<td><img src="' + '{{asset('/')}}' + productImage + '" alt="" class="img-fluid w-25"></td>' +
                                '<td>' + productName + '</td>' +
                                '<td style="display:none;">' + prId + '</td>' +
                                '<td>' + priceInput +  '</td>' +
                                '<td>' + qtyInput +    '</td>' +
                                '<td class="total-price">'+ productPrice + '<input type="text" name="total_price[]" value="'+productPrice+'" class="form-control total-price">' + '</td>' +
                                '<td><a class="btn btn-sm btn-danger remove-row"> X </a></td>' +
                                '</tr>';

                            var $newRow = $(newRow);
                            $("tbody").append($newRow);

                            // Handle input event on the price input field
                            $newRow.find('.price-input').on('input', function () {
                                updateTotalPrice($newRow);
                                updateOverallTotalPrice();
                            });

                            // Handle input event on the quantity input field
                            $newRow.find('.qty-input').on('input', function () {
                                updateTotalPrice($newRow);
                                updateOverallTotalPrice();
                            });

                            // Trigger initial update for the new row
                            updateTotalPrice($newRow);
                            updateOverallTotalPrice();

                            results.empty();
                        });
                    } else {
                        // No results found
                        results.append('<li class="list-group-item cursor-default">No Product Found</li>');
                    }
                }
            });
        });

        // Handle click event to remove table row
        $("tbody").on("click", ".remove-row", function () {
            var removedProductId = $(this).closest("tr").data('id');
            // Remove the product ID from the list of added products
            addedProductIds = addedProductIds.filter(function (id) {
                return id !== removedProductId;
            });

            $(this).closest("tr").remove();

            updateOverallTotalPrice();
        });

        // Move updateTotalPrice function outside the AJAX success callback
        function updateTotalPrice($row) {
            var qty = $row.find('.qty-input').val();
            var price = $row.find('.price-input').val();

            // Validate inputs and set default values if needed
            qty = (!isNaN(qty) && parseInt(qty) > 0) ? parseInt(qty) : 1;
            price = (!isNaN(price) && parseFloat(price) > 0) ? parseFloat(price) : 0;

            var totalPrice = qty * price;
            $row.find('.total-price').text(totalPrice);

            // Add debug statements
            console.log('Updated price:', price);

            // Update the value of the price input field
            $row.find('.price-input').val(price);
            console.log('Input field value:', $row.find('.price-input').val());
        }

    });
</script>

{{--  Main and Successfull Code --}}
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        // Maintain a list of product IDs in the table--}}
{{--        var addedProductIds = [];--}}

{{--        function updateOverallTotalPrice() {--}}
{{--            var overallTotalPrice = 0;--}}
{{--            $("tbody tr").each(function () {--}}
{{--                var totalPrice = parseFloat($(this).find('.total-price').text());--}}
{{--                overallTotalPrice += isNaN(totalPrice) ? 0 : totalPrice;--}}
{{--            });--}}
{{--            $("#total-price").text("Total Price: " + overallTotalPrice.toFixed(2));--}}
{{--            document.getElementById('total-price-main').value =  overallTotalPrice.toFixed(2);--}}
{{--        }--}}

{{--        $("#custom_barcode").on('keyup', function () {--}}
{{--            var value = $(this).val();--}}

{{--            // Check if the search input is empty--}}
{{--            if (value.trim() === '') {--}}
{{--                // Clear the results or display a message--}}
{{--                $("#search-results").empty();--}}
{{--                return;--}}
{{--            }--}}

{{--            $.ajax({--}}
{{--                url: '{{ route('search.product') }}',--}}
{{--                type: 'GET',--}}
{{--                data: { 'query': value },--}}
{{--                success: function (data) {--}}
{{--                    var results = $("#search-results");--}}
{{--                    results.empty();--}}

{{--                    if (data.length > 0) {--}}
{{--                        // Filter out products that are already in the table--}}
{{--                        var filteredData = data.filter(function (product) {--}}
{{--                            return addedProductIds.indexOf(product.id) === -1;--}}
{{--                        });--}}

{{--                        // Loop through the filtered products and append result items to the results--}}
{{--                        $.each(filteredData, function (index, product) {--}}
{{--                            results.append('<li class="result-item list-group-item cursor-pointer" data-id="' + product.id + '" ' +--}}
{{--                                'data-price="' + product.price + '" ' +--}}
{{--                                'data-image="' + product.image + '">' + product.name + '</li>');--}}
{{--                        });--}}

{{--                        // Handle click event on list items--}}
{{--                        $(".result-item").click(function () {--}}
{{--                            var rowNumber = $("tbody tr").length + 1;--}}
{{--                            var productId = $(this).data('id');--}}
{{--                            var productName = $(this).text();--}}
{{--                            var productPrice = $(this).data('price');--}}
{{--                            var productImage = $(this).data('image');--}}

{{--                            // Add the product ID to the list of added products--}}
{{--                            addedProductIds.push(productId);--}}

{{--                            // Create input fields for quantity and price within the result item--}}
{{--                            var qtyInput = '<input type="number" name="total_quantity" value="1" step="1" class="form-control qty-input">';--}}
{{--                            var prId = '<input type="hidden" name="product_id" value="'+productId+'" class="form-control">';--}}
{{--                            var priceInput = '<input type="number" name="price" value="' + productPrice + '" step="1" class="form-control price-input">';--}}



{{--                            var newRow = '<tr>' +--}}
{{--                                '<th scope="row">' + (rowNumber++) + '</th>' +--}}
{{--                                '<td><img src="' + '{{asset('/')}}' + productImage + '" alt="" class="img-fluid w-25"></td>' +--}}
{{--                                '<td>' + productName + '</td>' +--}}
{{--                                '<td style="display:none;">' + prId + '</td>' +--}}
{{--                                '<td>' + priceInput +  '</td>' +--}}
{{--                                '<td>' + qtyInput +    '</td>' +--}}
{{--                                '<td>' +productPrice+ '<input type="text" name="total_price" value="'+productPrice+'" class="form-control total-price">' + '</td>' +--}}

{{--                                '<td><a class="btn btn-sm btn-danger remove-row"> X </a></td>' +--}}
{{--                                '</tr>';--}}

{{--                            var $newRow = $(newRow);--}}
{{--                            $("tbody").append($newRow);--}}

{{--                            // Handle input event on the price input field--}}
{{--                            $newRow.find('.price-input').on('input', function () {--}}
{{--                                updateTotalPrice($newRow);--}}
{{--                                updateOverallTotalPrice();--}}
{{--                            });--}}

{{--                            // Handle input event on the quantity input field--}}
{{--                            $newRow.find('.qty-input').on('input', function () {--}}
{{--                                updateTotalPrice($newRow);--}}
{{--                                updateOverallTotalPrice();--}}
{{--                            });--}}

{{--                            // Trigger initial update for the new row--}}
{{--                            updateTotalPrice($newRow);--}}
{{--                            updateOverallTotalPrice();--}}

{{--                            results.empty();--}}
{{--                        });--}}
{{--                    } else {--}}
{{--                        // No results found--}}
{{--                        results.append('<li class="list-group-item cursor-default">No Product Found</li>');--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--        // Handle click event to remove table row--}}
{{--        $("tbody").on("click", ".remove-row", function () {--}}
{{--            var removedProductId = $(this).closest("tr").data('id');--}}
{{--            // Remove the product ID from the list of added products--}}
{{--            addedProductIds = addedProductIds.filter(function (id) {--}}
{{--                return id !== removedProductId;--}}
{{--            });--}}

{{--            $(this).closest("tr").remove();--}}

{{--            updateOverallTotalPrice();--}}
{{--        });--}}

{{--        // Move updateTotalPrice function outside the AJAX success callback--}}
{{--        function updateTotalPrice($row) {--}}
{{--            var qty = $row.find('.qty-input').val();--}}
{{--            var price = $row.find('.price-input').val();--}}

{{--            // Validate inputs and set default values if needed--}}
{{--            qty = (!isNaN(qty) && parseInt(qty) > 0) ? parseInt(qty) : 1;--}}
{{--            price = (!isNaN(price) && parseFloat(price) > 0) ? parseFloat(price) : 0;--}}

{{--            var totalPrice = qty * price;--}}
{{--            $row.find('.total-price').text(totalPrice);--}}
{{--        }--}}

{{--    });--}}

{{--</script>--}}

@endsection

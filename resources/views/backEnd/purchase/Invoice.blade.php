<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$purchases->title}}</title>

    <!-- Web Fonts
    ======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>
    <!-- Stylesheet ======================= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{asset('invoice')}}/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('invoice')}}/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('invoice')}}/css/stylesheet.css"/>
</head>
<body>
<!-- Container -->
<div class="container-fluid invoice-container">
    <!-- Header -->
    <header>
        <div class="row align-items-center gy-3">
            <div class="col-sm-7 text-center text-sm-start">
                <img id="logo" src="{{asset('/')}}logo.png" title="Koice" alt="Koice" />
            </div>
            <div class="col-sm-5 text-center text-sm-end">
                <h4 class="text-7 mb-0">Invoice</h4>
            </div>
        </div>
        <hr>
    </header>

    <!-- Main Content -->
    <main>
        <div class="row">
            <div class="col-sm-6"><strong>Date:</strong> {{ \Illuminate\Support\Carbon::now()->parse($purchases->purchase_date) }}</div>
            <div class="col-sm-6 text-sm-end"> <strong>Invoice No:</strong> {{$purchases->id}}</div>

        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 text-sm-end order-sm-1"> <strong>Pay To:</strong>
                <address>
                    Koice Inc<br />
                    2705 N. Enterprise St<br />
                    Orange, CA 92865<br />
                    contact@koiceinc.com
                </address>
            </div>
            <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
                <address>
                    {{$purchases->suppliers->name}}<br />
                    {{$purchases->suppliers->company_name}}<br />
                    {{$purchases->suppliers->email}}<br />
                    {{$purchases->suppliers->mobile}}<br />
                    {{$purchases->suppliers->address}}
                </address>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table border mb-0">
                <thead>
                <tr class="bg-light">
                    <td class="col-3"><strong>#</strong></td>
                    <td class="col-4"><strong>Product</strong></td>
                    <td class="col-2 text-center"><strong>Price</strong></td>
                    <td class="col-1 text-center"><strong>Quantity</strong></td>
                    <td class="col-2 text-end"><strong>Total</strong></td>
                </tr>
                </thead>
                <tbody>
                @foreach($purchaseOrder as $row)
                <tr>
                    <td class="col-3">{{$loop->iteration}}</td>
                    <td class="col-4 text-1">{{$row->products->name}}</td>
                    <td class="col-2 text-center">{{$row->price}}</td>
                    <td class="col-1 text-center">{{$row->total_quantity}}</td>
                    <td class="col-2 text-end">{{$row->total_quantity * $row->price}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table border border-top-0 mb-0">
                <tr class="bg-light">
                    <td class="text-end"><strong>Sub Total:</strong></td>
                    <td class="col-sm-2 text-end">{{$purchases->total_amount}}</td>
                </tr>
{{--                <tr class="bg-light">--}}
{{--                    <td class="text-end"><strong>Tax:</strong></td>--}}
{{--                    <td class="col-sm-2 text-end">$215.00</td>--}}
{{--                </tr>--}}
{{--                <tr class="bg-light">--}}
{{--                    <td class="text-end"><strong>Total:</strong></td>--}}
{{--                    <td class="col-sm-2 text-end">$2365.00</td>--}}
{{--                </tr>--}}
            </table>
        </div>
    </main>
    <!-- Footer -->
    <footer class="text-center mt-4">
        <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
        <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-success border text-white shadow-none"><i class="fa fa-print"></i> Print & Download</a> </div>
        <div class="btn-group btn-group-sm d-print-none"> <a href="{{route('purchase.list')}}" class="btn btn-danger border text-white shadow-none"> Exit</a> </div>
    </footer>
</div>
</body>
</html>

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
                    <a class="add" href="{{route('product.list')}}"><i class="ri-arrow-down-circle-fill"></i>Purchase List</a>
                </div>
                <hr>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Product List</h2>
                            <table id="dataTable" class="table table-striped table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10%;"># </th>
                                    <th style="width: 50%;">Name </th>
                                    <th style="width: 20%;">Photo </th>
                                    <th>Price </th>
                                    <th  style="width: 10%;">Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $row)
                                    <tr>
                                        <form action="" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <input type="hidden" name="name" value="{{$row->name}}">
                                            <input type="hidden" name="price" value="{{$row->price}}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="" value="{{$row->id}}">
                                            <input type="hidden" name="" value="{{$row->id}}">
                                        </form>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->name}}</td>
                                        <td><img src="{{asset($row->image)}}" alt="" class="img-fluid" ></td>
                                        <td>{{$row->price}}</td>
                                        <td>
                                            <button type="submit" class="btn btn-success"><i class="ri-add-box-fill"></i></button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h2>Selected Items</h2>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="bg-success text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td><input type="number" style="width: 50px" min="0" value="1"></td>
                                        <td><button class="btn btn-danger">X</button></td>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td><input type="number" style="width: 50px" min="0" value="1"></td>
                                        <td><button class="btn btn-danger">X</button></td>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td><input type="number" style="width: 50px" min="0" value="1"></td>
                                        <td><button class="btn btn-danger">X</button></td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td></td>
                                        <td>Total : 100</td>
                                        <td>Quantity : 100</td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="container">

                    <form action="{{route('product.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
{{--                        <div class="row">--}}
{{--                            <div class="form-group col-md-6">--}}
{{--                                <label for="category_id">Supplier <span class="text-danger">*</span></label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <select name="category_id" class="form-control form-select">--}}
{{--                                        <option value="">Select Supplier</option>--}}
{{--                                        @foreach($suppliers as $row)--}}
{{--                                            <option value="{{$row->id}}">{{$row->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-6">--}}
{{--                                <label for="alert_qty">Purchase Date <span class="text-danger">*</span></label>--}}
{{--                                <input type="date" class="form-control" name="price" >--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-6">--}}
{{--                                <label for="item_image">Status</label>--}}
{{--                                <select name="status" id="" class="form-control">--}}
{{--                                    <option value="1">Received</option>--}}
{{--                                    <option value="2">Pending</option>--}}
{{--                                    <option value="2">Ordered</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-6">--}}
{{--                                <label for="alert_qty">Reference Number </label>--}}
{{--                                <input type="text" class="form-control" name="stock_quantity" placeholder="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <hr>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{asset('backend')}}/js/datatables.js"></script>
    <script src="{{asset('backend')}}/js/jquery.dataTables.js"></script>
    <script src="{{asset('backend')}}/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend')}}/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('backend')}}/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('backend')}}/js/responsive.bootstrap.min.js"></script>
    <script>
        /*================================
       datatable active
       ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({

            });
        }

    </script>
@endsection

@extends('backEnd.master')
@section('title')
    Create New Product
@endsection
@section('content')
    <div class="main--content">
        <div class="overview" style="margin-top: 20px; " > </div>
        <div class="overview">
            <div class="recent--tables reccent_tables">
                <div class="title tadd">
                    <h4>@yield('title')</h4>
                    <a class="add" href="{{route('product.list')}}"><i class="ri-arrow-down-circle-fill"></i>Products List</a>
                </div>
                <hr>
                <div class="container">
                    <form action="{{route('product.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="item_name">Item Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="item_name" name="name" placeholder="Iphone 15" value="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="category_id">Category <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select name="category_id" class="form-control form-select">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="alert_qty">Price <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="price" placeholder="" min="0" step="0.01">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="alert_qty">Quantity<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="stock_quantity" placeholder="" min="0" value="0">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="expire_date">Expire Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="ri-calendar-2-fill"></i>
                                    </div>
                                    <input type="date" class="form-control pull-right datepicker" id="expire_date" name="expire_date" value="">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="custom_barcode">Barcode</label>
                                <input type="number" class="form-control" id="custom_barcode" name="barcode" placeholder="121215451" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="custom_barcode">Weight (500 GM/ 1 KG)</label>
                                <input type="number" class="form-control" id="custom_barcode" name="weight" placeholder="500GM" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="custom_barcode">Location</label>
                                <input type="text" class="form-control" id="custom_barcode" name="location" placeholder="Store 01">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="item_image">Select Image</label>
                                <input type="file" name="image" class="form-control item_image">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="item_image">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="custom_barcode">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description" placeholder=""></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn-primary">Submit</button>
                            </div>
                        </div>




                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

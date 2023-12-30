@extends('backEnd.master')
@section('title')
    Create New Customer
@endsection
@section('content')
    <div class="main--content">
        <div class="overview" style="margin-top: 20px; " > </div>
        <div class="overview">
            <div class="recent--tables reccent_tables">
                <div class="title tadd">
                    <h4>@yield('title')</h4>
                    <a class="add" href="{{route('customer.list')}}"><i class="ri-arrow-down-circle-fill"></i>Customers List</a>
                </div>
                <hr>
                <div class="container">
                    <form action="{{route('customer.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Customer Name</label><br>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Customer Name" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label><br>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="rony@example.com" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="mobile">Mobile Number</label><br>
                                    <input class="form-control" id="mobile" name="mobile" type="tel" placeholder="011xxxxxx10" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="address">Address</label><br>
                                    <input class="form-control" id="address" name="address" type="text" placeholder="Address" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="address">Image</label><br>
                                    <input class="form-control-file" id="address" name="image" type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-form-name">Status</label><br>
                                    <select name="status" id="" class="form-control">
                                        <option>Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>



                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

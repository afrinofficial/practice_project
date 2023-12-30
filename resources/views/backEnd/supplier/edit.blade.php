@extends('backEnd.master')
@section('title')
    Update Supplier
@endsection
@section('content')
    <div class="main--content">
        <div class="overview" style="margin-top: 20px; " > </div>
        <div class="overview">
            <div class="recent--tables reccent_tables">
                <div class="title tadd">
                    <h4>@yield('title')</h4>
                    <a class="add" href="{{route('supplier.list')}}"><i class="ri-arrow-down-circle-fill"></i>Supplier List</a>
                </div>
                <hr>
                <div class="container">
                    <form action="{{route('update.supplier',$supplier->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-form-name">Supplier Name</label><br>
                                    <input class="form-control" id="basic-form-name" name="name" type="text" placeholder="Supplier Name" value="{{$supplier->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-form-name">Email</label><br>
                                    <input class="form-control" id="basic-form-name" name="email" type="email" placeholder="rony@example.com" value="{{$supplier->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-form-name">Mobile Number</label><br>
                                    <input class="form-control" id="basic-form-name" name="mobile" type="tel" placeholder="011xxxxxx10" value="{{$supplier->mobile}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="company_name">Company Name</label><br>
                                    <input class="form-control" id="company_name" name="company_name" type="text" placeholder="Company Name" value="{{$supplier->company_name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="address">Address</label><br>
                                    <input class="form-control" id="address" name="address" type="text" placeholder="Address" value="{{$supplier->address}}">
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
                                    <label class="form-label" for="address">Existing Image</label><br>
                                    <img src="{{asset($supplier->image)}}" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-form-name">Status</label><br>
                                    <select name="status" id="" class="form-control">
                                        <option>Select</option>
                                        <option value="1" @if($supplier->status == 1) selected @endif>Active</option>
                                        <option value="2" @if($supplier->status == 2) selected @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <br>
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

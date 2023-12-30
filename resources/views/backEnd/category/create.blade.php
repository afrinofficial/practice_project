@extends('backEnd.master')
@section('title')
    Create New Category
@endsection
@section('content')
    <div class="main--content">
        <div class="overview" style="margin-top: 20px; " > </div>
        <div class="overview">
            <div class="recent--tables reccent_tables">
                <div class="title tadd">
                    <h4>@yield('title')</h4>
                    <a class="add" href="{{route('category.index')}}"><i class="ri-arrow-down-circle-fill"></i>Category List</a>
                </div>
                <hr>
                <div class="container">
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-form-name">Category Name</label><br>
                                    <input class="form-control" id="basic-form-name" name="name" type="text" placeholder="Category Name" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-form-name">Status</label><br>
                                    <select name="status" id="" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="basic-form-name">Description</label><br>
                                <textarea  name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
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

@extends('backEnd.master')
@section('title')
    Customer List
@endsection
@section('content')
    <div class="main--content">
        <div class="overview" style="margin-top: 20px; " > </div>
        <div class="overview">
            <div class="recent--tables reccent_tables">
                <div class="title tadd">
                    <h4>@yield('title')</h4>
                    <a class="add" href="{{route('customer.create')}}"><i class="ri-add-line"></i>Add Customer</a>
                </div>
                <hr>

                <div class="table tadd data-tables">
                    <table id="dataTable2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customer as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->name}}</td>
                                <td>
                                    <img src="{{asset($row->image)}}" class="img-fluid" alt="" width="25%">
                                </td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->mobile}}</td>
                                <td>{{$row->address}}</td>
                                <td>
                                    @if($row->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @elseif($row->status == 0)
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif

                                </td>
                                <td class="acts">
                                <span> <a href="{{route('edit.customer', $row)}}"> <i class="ri-edit-line edit"></i></a>
                                    <a href="{{ route('delete.customer', ['id' => $row->id]) }}" onclick="return confirm('Are you sure you want to delete this customer?');">
                                        <i class="ri-delete-bin-line delete"></i>
                                    </a>
                                </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('backend')}}/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{asset('backend')}}/css//dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('backend')}}/css//responsive.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('backend')}}/css//responsive.jqueryui.min.css">
@endsection

@section('script')
    <script src="{{asset('backend')}}/js//jquery.dataTables.js"></script>
    <script src="{{asset('backend')}}/js//jquery.dataTables.min.js"></script>
    <script src="{{asset('backend')}}/js//dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('backend')}}/js//dataTables.responsive.min.js"></script>
    <script src="{{asset('backend')}}/js//responsive.bootstrap.min.js"></script>
    <script>
        /*================================
       datatable active
       ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
        if ($('#dataTable2').length) {
            $('#dataTable2').DataTable({
                responsive: true
            });
        }
        if ($('#dataTable3').length) {
            $('#dataTable3').DataTable({
                responsive: true
            });
        }
    </script>
@endsection

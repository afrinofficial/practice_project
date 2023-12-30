@extends('backEnd.master')
@section('title')
   Purchase List
@endsection
@section('content')
    <div class="main--content">

        <div class="overview">
            <div class="recent--tables reccent_tables">
                <div class="title tadd">
                    <h4>@yield('title')</h4>
                    <a class="add" href="{{route('purchase.create')}}"><i class="ri-add-line"></i>New Purchase</a>
                </div>
                <div class="table">
                    <table id="" class="table  table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="width: 10%;">#</th>
                            <th>Title</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($purchases as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->title}}</td>
                                <td>{{$row->total_amount}}</td>
                                <td>
                                    @if($row->status == 1)
                                        <span class="badge badge-primary">Received</span>
                                    @elseif($row->status == 2)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($row->status == 0)
                                        <span class="badge badge-success">Ordered</span>
                                    @endif
                                </td>
                                <td class="acts">
                                <span>
                                    <a href="{{route('edit.purchase', $row)}}"> <i class="ri-edit-line edit"></i></a>
                                    <a href="{{route('purchase.invoice', $row)}}"> <i class="ri-eye-line text-success"></i></a>
                                    <a href="{{ route('delete.purchase', ['id' => $row->id]) }}" onclick="return confirm('Are you sure you want to delete this Purchase?');">
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

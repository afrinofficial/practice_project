@extends('backEnd.master')
@section('title')
    Purchase Report
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
                    <div class="col-md-12">
                        <div class="card">
                            <form action="{{route('purchase.report')}}" method="get">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <label for="amount">From <small class="text-danger">  *  </small> </label>
                                            <input type="date" class="form-control" name="fromdate">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <label for="amount">To <small class="text-danger">  *  </small> </label>
                                            <input type="date" class="form-control" name="todate" >
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-primary" value="Search">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table table-hover table-bordered mt-4" id="purchaseTable">
                        <table id="">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Supplier</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Reference</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $totalAmount = 0;
                            @endphp

                            @forelse($purchaseReports as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->suppliers->name}}</td>
                                    <td>{{$row->purchase_date}}</td>
                                    <td>{{$row->total_amount}}</td>
                                    <td>{{$row->reference}}</td>
                                    <td>
                                        @if($row->status == 1)
                                            <span class="badge badge-primary" style="border-radius: 15px; padding: 2px 8px;">Ordered </span>
                                        @elseif($row->status == 2)
                                            <span class="badge badge-warning" style="border-radius: 15px; padding: 2px 8px;">Pending </span>
                                        @elseif($row->status == 0)
                                            <span class="badge badge-success" style="border-radius: 15px; padding: 2px 8px;">Received </span>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $totalAmount += $row->total_amount;
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No data found</td>
                                </tr>
                            @endforelse

                            @if($totalAmount > 0)
                                <tr>
                                    <td colspan="3"></td>
                                    <td><strong>Total Amount:</strong></td>
                                    <td>{{$totalAmount}}</td>
                                    <td colspan="2"></td>
                                </tr>
                            @endif
                            </tbody>

                        </table>
                        <div class="text-center mb-3">
                            @if(count($purchaseReports) > 0)
                                <button class="btn btn-secondary d-print-none" onclick="printTable()">Print</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css">
@endsection
@section('script')
    <script src="{{asset('backend')}}/js/datatables.js"></script>
    <script src="{{asset('backend')}}/js/jquery.dataTables.js"></script>
    <script src="{{asset('backend')}}/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend')}}/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('backend')}}/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('backend')}}/js/responsive.bootstrap.min.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

    <script>
        /*================================
       datatable active
       ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({

            });
        }
    </script>
{{--    <script>--}}
{{--        function printTable() {--}}
{{--            var printContents = document.getElementById("purchaseTable").innerHTML;--}}
{{--            var originalContents = document.body.innerHTML;--}}

{{--            document.body.innerHTML = printContents;--}}

{{--            window.print();--}}

{{--            document.body.innerHTML = originalContents;--}}
{{--        }--}}
{{--    </script>--}}
    <script>
        function printTable() {
            printJS({
                printable: 'purchaseTable', // ID, class, or DOM element
                type: 'html',
                header: 'Purchase Reports',
                style: `
                table {
                    border-collapse: collapse;
                    width: 100%;
                    margin-bottom: 20px;
                }
                th, td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }
                th {
                    background-color: #f2f2f2;
                }
                .badge {
                    border-radius: 15px;
                    padding: 5px 10px;
                    margin-right: 5px;
                }
            `,
            });
        }
    </script>

@endsection





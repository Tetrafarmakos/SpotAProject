@extends('layouts.uplon')
@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page" style="margin-left:0%!important">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">LAST CLIENT PAYMENTS</h4>
                            <div class="clearfix"></div>
                        </div>

                            <label>DATE FILTER</label>

                                <form action="{{ route('reports.user.payments.index') }}" method="get" id="dates">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 col-md-3">
                                            <div class="form-group clearfix">
                                                <label>FROM</label>
                                                <input name="from" type="text" class="form-control"
                                                value="{{ $start_date }}" placeholder="dd/mm/yyyy" id="datepicker-autoclose">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 col-md-3">
                                            <div class="form-group clearfix">
                                                <label>TO</label>
                                                <input name="to" type="text" class="form-control"
                                                value="{{ $end_date }}" placeholder="dd/mm/yyyy" id="datepicker-autoclose2">
                                            </div>
                                        </div>

                                    </div>

                                        <div class="col-xs-12 col-sm-12">
                                            <button onclick="loader()" class="btn btn-success pull-left" type="submit">FILTER</button>
                                        </div>
                                </form>
                        </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-box table-responsive">
                            @if (count($report_of_payments) == 0)
                                    No data
                            @else
                            <div class="table-rep-plugin">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead class="thead-default">
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>SURNAME</th>
                                            <th>AMOUNT</th>
                                            <th>DATE</th>
                                        </thead>
                                        <tbody>
                                            @foreach($report_of_payments as $report_of_payment)
                                            <tr>
                                                <td>{{ $report_of_payment['id'] }}</td>
                                                <td>{{ $report_of_payment['name'] }}</td>
                                                <td>{{ $report_of_payment['surname'] }}</td>
                                                <td>{{ $report_of_payment['amount'] }}</td>
                                                <td>{{ $report_of_payment['date'] }}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                </div>
                                @endif
                            </div>
                    </div>
                    </div>
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    <!-- End content-page -->
@endsection
@section('page_scripts')
    <script type="text/javascript">
        initializeDatePickerValues = function() {
            var start_date = "{{ $start_date }}";
            $("#datepicker-autoclose").val(start_date);
            var end_date = "{{ $end_date }}";
            $("#datepicker-autoclose2").val(end_date);
        }

        $(document).ready(function() {
            initializeDatePickerValues();
        } );

    </script>

@endsection

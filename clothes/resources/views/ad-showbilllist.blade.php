<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('assets_admin/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('assets_admin/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_admin/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

    @include('layouts.ad-left-panel')

    <!-- Left Panel -->

    <!-- Right Panel -->


    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('layouts.ad-header')
        <!-- Header-->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('/ad-index')}}">Dashboard</a></li>
                                    <li>Bills Management</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Bills Table &emsp;</strong>
                                @if(!empty(Session::get('message')))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                            </div>
                            <div class="alert" id="message" style="display: none"></div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialog1">Statistic</button> &emsp;&emsp;&emsp;&emsp;Total income: {{number_format($sum_bill)}}

                                <div>-</div>
                                    <thead>
                                        <tr>
                                            <th>Bill ID</th>
                                            <th>Date</th>
                                            <th>User ID</th>
                                            <th>Total</th>
                                            <th>Options</th>
                                            <th>Checked</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($bill_list))
                                        @foreach($bill_list as $bill)
                                            <tr>
                                                <td>{{$bill->billId}}</td>
                                                <td>{{$bill->date}}</td>
                                                <td>{{$bill->userId}}</td>
                                                <td class="total">{{$bill->total}} VNĐ</td>
                                                <td>
                                                    <div>
                                                        <a href="{{asset('/detailbill/'.$bill->billId)}}" class="btn btn-success" style="width: 2cm">Detail</a>
                                                    </div>
                                                </td>
                                                @if(!strcmp($bill->checked, 'checked'))
                                                <td>
                                                    <div class="checkbox disabled">
                                                        <label><input type="checkbox" value="" checked disabled=""></label>
                                                    </div>
                                                </td>
                                                @else
                                                <td>
                                                    <div class="checkbox">
                                                        <label id="{{$bill->billId}}"><input class="check" type="checkbox" value="{{$bill->billId}}"></label>
                                                    </div>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <div class="modal fade" id="dialog1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
            <div class="modal-header">
                <h5 class="modal-title">Thống kê</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="{{url('/billlist/thong_ke')}}" method="GET">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                    <label for="example-date-input" class="col-2 col-form-label">From</label>
                        <div class="col-10">
                            <input class="form-control date-from" type="date" value="2018-08-19" name="date-from">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">To</label>
                        <div class="col-10">
                            <input class="form-control date-from" type="date" value="2018-08-19" name="date-to">
                        </div>
                    </div>
                    <button id="click-statistic" type="submit" class="btn btn-primary">Submit</button>
                </form>              
            </div>
            
        </div>
    </div>
</div>


    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{asset('assets_admin/js/main.js')}}"></script>


    <script src="{{asset('assets_admin/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('assets_admin/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets_admin/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets_admin/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets_admin/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('assets_admin/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets_admin/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets_admin/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets_admin/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets_admin/js/init/datatables-init.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function(){
         $('.check').change(function(e){
            val = $(this).val();
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }

              });
            id = val;
            $.ajax({
                type: 'GET',
                url: 'billlist/update_checked?id='+id,    
                  success: function(data){
                    $(this).remove();
                    $('#'+val).html('<input type="checkbox" value="" checked disabled="">')
                     alert(data);
                  }});
               });
            });

        </script>

</body>
</html>
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
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

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
                                    <li>{{$product_list[0]->category->group}}</li>
                                    <li class="active">{{$product_list[0]->category->name}}</li>
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
                                <strong class="card-title">{{$product_list[0]->category->name}} Table &emsp;</strong>
                                <strong class="card-title"><a type="button" href="{{url('/ad-addproduct')}}" class="btn btn-info btn-lg">Add Item</a></strong>
                                @if(!empty(Session::get('message')))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                            </div>
                            <div class="alert" id="message" style="display: none"></div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Color</th>
                                            <th>Category</th>
                                            <th>Firm</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($product_list))
                                        @foreach($product_list as $product)
                                            @if($product->quantity > -1)
                                            <tr>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->color}}</td>
                                                <td>{{$product->category->name}}</td>
                                                <td>{{$product->firm->name}}</td>
                                                <td>{{$product->price}}</td>
                                                <td><img src="{{asset($product->image[0]->link)}}" style="height: 100px; width: 100px"></td>
                                                <td>
                                                    <div>
                                                        <a href="{{asset('/detailproduct/'.$product->productId)}}" class="btn btn-success" style="width: 2cm">Detail</a>
                                                    </div>
                                                    <div>
                                                        <a href="{{asset('/productupdate/'.$product->productId)}}" class="btn btn-secondary" style="width: 2cm">Update</a>
                                                    </div>
                                                    <div>
                                                        <a href="{{url('/deleteproduct/'.$product->productId)}}" class="btn btn-danger" style="width: 2cm">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
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


    <!-- Scripts -->
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


</body>
</html>
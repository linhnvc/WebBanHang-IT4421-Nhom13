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

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
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
                                    <li class="active">Detail Bill</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">

                <div class="ui-typography">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title" v-if="headerText">Bill Detail &emsp; </strong>
                                    @if(!empty(Session::get('message')))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                </div>
                                <?php
                                    $end = Session::get('num_of_products_in_billdetail');
                                    $len = Session::get('len_of_billdetail');
                                    echo "<script>console.log( 'Debug Objects: " . $len . "' );</script>";
                                    echo "<script>console.log( 'Debug Objects: " . $end . "' );</script>";
                                 ?>
                                <div class="card-body">
                                  <div class="vue-lists">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="card-header">
                                            <strong class="card-title">Bill Information</strong>
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-info">
                                                <b>UserID</b> : {{$bill_info[$len - 6]}}
                                            </li>
                                            <li class="list-group-item">
                                                <b>UserName</b> : {{$bill_info[$len - 7]}}
                                            </li>
                                            <li class="list-group-item">
                                                <b>Email</b> : {{$bill_info[$len - 3]}}
                                            </li>
                                            <li class="list-group-item">
                                                <b>BillID</b> : {{$bill_info[$len - 5]}}
                                            </li>
                                            <li class="list-group-item">
                                                <b>Date</b> :{{$bill_info[$len - 4]}}
                                            </li>
                                          </ul>
                                  </ul>
                              </div>
                        <div class="col-md-6 text-left">
                                <div class="example">
                                    <div class="container">
                                        <div class="row">
                                            <div class="card-header">
                                            <strong class="card-title">Product Information</strong>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Num</th>
                                                        <th>Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price Unit</th>
                                                    </tr>
                                                    <?php
                                                    $st = 0;
                                                    for($i = 0; $i < $end * 3; $i = $i+3){
                                                        $st++;
                                                        echo 
                                                        '<tr>
                                                            <th>'.$st.'</th>
                                                            <th>'.$bill_info[$i].'</th>
                                                            <th>'.$bill_info[$i + 1].'</th>
                                                            <th>'.$bill_info[$i + 2].'</th>
                                                        </tr>';
                                                    }
                                                    
                                                    ?>
                                                    
                                                </thead>
                                                <tbody>
                                                                                             
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>        
                                </div>
                        </div>    
                    </div>
                </div>
            </div>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    
                    <div class="card">
                        <div></div>
                            
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->
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

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{asset('assets_admin/js/main.js')}}"></script>


</body>
</html>

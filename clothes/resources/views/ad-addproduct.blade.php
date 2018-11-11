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
                                <h1>
                                @if(!empty($message))
                                    {{$message}}
                                @endif
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('/ad-index')}}">Dashboard</a></li>
                                     <li class="active">Add Item</li>
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
                                    <strong class="card-title" v-if="headerText">Add Product &emsp; </strong>
                                    @if(!empty(Session::get('message')))
                                    <div class="alert alert-danger role="alert">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                </div>

                                <div class="card-body">
                                  <div class="vue-lists">
                                    <div class="row">
                                      <div class="col-md-11">
                                        <div class="card-header">
                                            <strong class="card-title">Product Information</strong>
                                        </div>
										<form action="{{url('/addproduct')}}" method="POST" enctype="multipart/form-data">
											{{ csrf_field() }}
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-3 col-form-label"><b>Name </b>:</label>
										    <div class="col-sm-9">
										      <input type="text" name="product_name" class="form-control" required>
										    </div>
										  </div>
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-3 col-form-label"><b>Size </b>:</label>
										    <div class="col-sm-9">
										      <select class="form-control" name="product_size">
										          <option selected>9</option>
                                                  <option selected>10</option>
                                                  <option selected>11</option>
                                                  <option selected>12</option>
                                                  <option selected>13</option>
                                                  <option selected>14</option>
										    </select>
										    </div>
										  </div>
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-3 col-form-label"><b>Color </b>:</label>
										    <div class="col-sm-9">
										      <input type="text" name="product_color" class="form-control" required>
										    </div>
										  </div>
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-3 col-form-label"><b>Quantity </b>:</label>
										    <div class="col-sm-9">
										      <input type="number" name="product_quantity" class="form-control" required>
										    </div>
										  </div>
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-4 col-form-label"><b>Description </b>:</label>
										    <div class="col-sm-8">
										      <textarea type="text" name="product_description" class="form-control" required></textarea>
										    </div>
										  </div>
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-3 col-form-label"><b>Price </b>:</label>
										    <div class="col-sm-9">
										      <input type="number" name="product_price" class="form-control" required>
										    </div>
										  </div>
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-3 col-form-label"><b>Category </b>:</label>
										    <div class="col-sm-9">
										      <select class="form-control" name="category_name">
										      @foreach($categories as $category)
                                                <option>{{$category->name}}</option>
                                              @endforeach
										      </select>
										    </div>
										  </div>
										  <div class="form-group row">
										    <label for="staticEmail" class="col-sm-3 col-form-label"><b>Firm </b>:</label>
										    <div class="col-sm-9">
										     <select class="form-control" name="firm_name">
										      @foreach($firms as $firm)
                                                <option>{{$firm->name}}</option>
                                              @endforeach
										      </select>
										    </div>
										  </div>
                                          <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label"><b>Images </b>:</label>
                                            <div class="col-sm-9">
                                              <input type="file" name="image1" class="form-control" required>
                                              <input type="file" name="image2" class="form-control" required>
                                              <input type="file" name="image3" class="form-control" required>
                                              <input type="file" name="image4" class="form-control" required>
                                            </div>
                                          </div>
										  <input class="btn btn-secondary" type="submit" id="submit" value="Add">
										</form>
                              		</div>
                                </div>
                            </div>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{asset('assets_admin/js/main.js')}}"></script>


</body>
</html>


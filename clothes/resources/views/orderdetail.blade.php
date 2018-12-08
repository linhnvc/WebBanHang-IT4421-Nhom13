@extends('layouts.app')
<!-- header -->
@section('header')
  @include("layouts.login")
	@include('layouts.header')
@endsection
@section('content')

<div class="container">
        <div id="right-panel" class="right-panel">

        <!-- Header-->

        
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">
                <div class="ui-typography">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
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
                                <div class="example">
                                    <div class="container">
                                        <div class="row">
                                            <div class="card-header">
                                            <strong class="card-title">Detail Information</strong>
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
</div><!-- /#right-panel -->
</div>


@endsection
@section('footer')
    @include('layouts.footer')
@endsection
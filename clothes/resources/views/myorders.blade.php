@extends('layouts.app')
<!-- header -->
@section('header')
  @include("layouts.login")
	@include('layouts.header')
@endsection
@section('content')

       <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"></strong>
                                @if(!empty(Session::get('message')))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                            </div>
                            <div class="alert" id="message" style="display: none"></div>
                            <div> -</div>
                            <div class="card-body">
                                <div class="container">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered table-hover table-sm">
                                    <thead>
                                        <tr class="d-flex">
                                            <th>Bill ID</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Options</th>
                                            <th>Checked</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($bill_list))
                                        @foreach($bill_list as $bill)
                                            <tr class="d-flex">
                                                <td>{{$bill->billId}}</td>
                                                <td>{{$bill->date}}</td>
                                                <td>{{$bill->total}} VNĐ</td>
                                                <td>
                                                    <div>
                                                        <a href="{{asset('/orderdetail/'.$bill->billId)}}" class="btn btn-success" style="width: 2cm">Detail</a>
                                                    </div>
                                                </td>
                                                @if(!strcmp($bill->checked, 'checked'))
                                                <td>Đã xác nhận</td>
                                                @else
                                                <td>Chưa xác nhận</td>
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
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        
    </div>
</div>

@endsection
@section('footer')
	@include('layouts.footer')
@endsection
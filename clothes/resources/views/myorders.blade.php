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
                                <strong class="card-title">Bills Table &emsp;</strong>
                                @if(!empty(Session::get('message')))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                            </div>
                            <div class="alert" id="message" style="display: none"></div>
                            <div class="card-body">
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
                                                        <button type="button" class="btn btn-primary detail" data-toggle="modal" data-target="#myModal" value="{{$bill->billId}}">Detail</button>
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
            </div><!-- .animated -->
        </div><!-- .content -->
        
    </div>
</div>

<div class="modal" id="myModal"
   data-backdrop="static"
   data-keyboard="false"
   tabindex="-1"
   aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Modal Title</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            Modal body..
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

@endsection
@section('footer')
	@include('layouts.footer')
@endsection
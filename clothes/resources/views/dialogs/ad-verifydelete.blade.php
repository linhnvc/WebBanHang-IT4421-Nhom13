<!-- Modal -->
  <div class="modal fade" id="myModal-delete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Please verify !</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure to delete this product ? It means that all information of the product will be totally destroyed.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No. Just Kidding ! :))</button>
          <a href="{{url('/deleteproduct/'.$product->productId)}}" class="btn btn-danger">Sure v l ! :v</a>
        </div>
      </div>
      
    </div>
  </div>
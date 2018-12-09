$(document).ready(function(){
    $(".item_add").click(function(){
        var id = $(this).attr("id");
        console.log(id);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            /* the route pointing to the post function */
            url: '/addCart',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN, id:id},
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                
                console.log(data.msg);
                if(data.msg == "true"){
                    // console.log(data.msg);
                    // $("#myModal_infor").show();
                    alert(data.msg+data.count);
                    // alert($("#quantity_cart").text());
                    $("#quantity_cart").text('('+data.count+')');

                }else{
                    // $("#myModal_infor").show();
                    alert(data.msg); 
                }
            }
        }); 
    });
});
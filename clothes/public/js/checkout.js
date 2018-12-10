$(document).ready(function(){
   $(".adjust").click(function(){
       var $tr = $(this).closest("tr");
       var $id =$tr.attr('id');
       var $quantity = $tr.find("div .value").text();
    //    alert($quantity);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            /* the route pointing to the post function */
            url: '/updateCart',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN, id:$id, quantity: $quantity},
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                
                console.log(data.msg);
                // alert(data.msg);`
            }
        });
        
        var $prices = parseInt($tr.find(".price_unit").text()) * parseInt($quantity);
        // console.log($tr.find("price_unit").text());
        // console.log(parseInt($quantity));
        $tr.find(".prices").text($prices);
        // var $no = parseInt($tr.find('.no').text());
        // console.log($no);
        //  $("#yours_cart").find('span[no='+$no+']')[0].innerHTML=$prices;
        // console.log($("#yours_cart").find('span[no='+$no+']')[0].innerHTML);
        var $total_prices = 0;
        $(".rem1").each(function(){
               $total_prices = $total_prices + parseInt($(this).find(".prices").text());
        });
        $("#totalPrices").text($total_prices + 30000);
   });




   $(".close1").click(function(){
    var $tr = $(this).closest("tr");
    var $id =$tr.attr('id');
    // alert($id);
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        /* the route pointing to the post function */
        url: '/deleteProductCart',
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {_token: CSRF_TOKEN, id:$id},
        dataType: 'JSON',
        /* remind that 'data' is the response of the AjaxController */
        success: function (data) { 
            
            console.log(data.msg);
            $("#total_products_cart").text(data.count);
            $("#quantity_cart").text('('+data.count+')');
            // alert(data.msg);
        }
    });
    var $no = parseInt($tr.find('.no').text());
    $tr.remove();
    var $total_prices = 0;
    $(".rem1").each(function(){
            $total_prices = $total_prices + parseInt($(this).find(".prices").text());
    });
    $("#totalPrices").text($total_prices + 30000);
    // var $pro =$("#yours_cart").find('span[no='+$no+']')[0]; 
    // $pro.closest('li').hide();
    
   });
});
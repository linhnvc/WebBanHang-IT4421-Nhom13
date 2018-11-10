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
                // alert(data.msg);
            }
        });
        var $prices = parseInt($tr.find(".price_unit").text()) * parseInt($quantity);
        // console.log($prices);
        $tr.find(".prices").text($prices);
        var $no = parseInt($tr.find('.no').text()) - 1;
        // console.log($no);
         $("#yours_cart").find('span')[$no].innerHTML=$prices;
        // console.log($spands.innerHTML);
        var $total_prices = 0;
        $(".rem1").each(function(){
               $total_prices = $total_prices + parseInt($(this).find(".prices").text());
        });
        $("#totalPrices").text($total_prices + 30000);


   });
});
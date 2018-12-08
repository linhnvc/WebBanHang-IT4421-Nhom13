$(document).ready(function(){
    $('select').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        
        var $wrapper = $('.wrapper');
        var $products = $('.product');
        
        // console.log(valueSelected);
        // console.log($products.find("i").attr('price'));
        // $products[0].find("#price").val()
        // if(valueSelected == "Sort by price: low to high"){
        //     alert(valueSelected);
        // }
        $products.sort(function(a, b) {
            if(valueSelected == "Sort by price: low to high"){
                return +$(a).find("i").attr('price') - +$(b).find("i").attr('price');
            }
            else{
                return +$(b).find("i").attr('price') - +$(a).find("i").attr('price');
            }
        })
        $products.each(function() {
            $wrapper.append(this);
        });
    });
    $("#select_size li a").click(function(){
     var value = $(this).attr('id');
     alert(value);

    });


    $("#select_color li a").click(function(){
        alert("heeloo1234");
    });
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
                    console.log(data.msg);
                    // $("#myModal88").addClass("in");
                    // $("#myModal_infor").attr("aria-hidden", 'false');
                    // $("#myModal_infor").show();
                    alert(data.msg+data.count);
                    // alert($("#quantity_cart").text());
                    $("#quantity_cart").text('('+data.count+')');

                }else{
                    // $("#myModal_infor").show();
                    alert(data.msg+data.count); 
                }
            }
        }); 
    });

});
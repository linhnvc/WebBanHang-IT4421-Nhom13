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

});
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
    //    $(this).append('<li><a href="javascript:void(0)" id = "Medium">Medium</a></li>');
    alert("heeloo12234");
    });


    $("#select_color li a").click(function(){
        // $(this).append('<li><a href="javascript:void(0)" id="Red"><i></i>Red(5)</a></li>');
        alert("heeloo1234");
    });

});
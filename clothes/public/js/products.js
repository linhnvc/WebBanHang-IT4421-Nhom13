$(document).ready(function(){
    $('select').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        alert(valueSelected);
        var $wrapper = $('.wrapper');
        var $products = $('.product');
        [].sort.call($products, function(a,b) {
            
            return +$(a).attr('data-weight') - +$(b).attr('data-weight');
        });	
        $products.each(function(){
            $wrapper.append($this);

        });
    });

});
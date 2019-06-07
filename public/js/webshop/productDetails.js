$(document).ready(function(){
    var quantity = 1

    $('.quantity-right-plus').click(function(e) {
        e.preventDefault()
        var quantity = parseInt($('#quantity').val())
        $('#quantity').val(quantity + 1)
    });

    $('.quantity-left-minus').click(function(e) {
        e.preventDefault();
        var quantity = parseInt($('#quantity').val())
        if(quantity > 1){
            $('#quantity').val(quantity - 1)
        }
    });

    $('#region_id').change(function(e) {
        $.ajax({
            url: APP_URL + "/webshop/regions/" + this.value + "/locations", 
            success: function(result) {
                var locationSelect = $("#location_id")
                locationSelect.empty()
                var locationOptions = result
                locationOptions.forEach(function(locationOption) {
                    var option = $('<option></option>').attr("value", locationOption.value).text(locationOption.label)
                    locationSelect.append(option)
                })
            }
        });
    })

    var productDetailsSectionHeight = $('#product_details_section').outerHeight()
    var productImageSectionHeight = $('#product_image_section').outerHeight()
    if (productImageSectionHeight > productDetailsSectionHeight)
        $('#product_details_section').height($('#product_image_section').outerHeight())
    else
        $('#product_image_section').height($('#product_details_section').outerHeight())
    
    var userInfosSection = $('#user_infos_section')
    if (userInfosSection)
        $('#buy_product_section').height(userInfosSection.outerHeight())
});
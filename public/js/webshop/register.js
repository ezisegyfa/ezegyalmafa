$(document).ready(function(){
    $('#region').change(function(e) {
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
})
$(document).ready(function() {
    var currentRegionValue = $('#region').val()
    if (currentRegionValue)
        setLocationSelectOptions()
    $('#region').change(function(e) {
        setLocationSelectOptions()
    })
})

function setLocationSelectOptions() {
    $.ajax({
        url: APP_URL + "/webshop/regions/" + $('#region').val() + "/locations", 
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
}
$(document).ready(function () {
	$('#category_id_collapse_input').val($('#category_id').val())
	$('#product_speciality_collapse_input').val($('#product_speciality').val())
	$('#brand_collapse_input').val($('#brand').val())

	$('#category_id_collapse_input').change(function() {
		$('#category_id').val($('#category_id_collapse_input').val())
	})
	$('#product_speciality_collapse_input').change(function() {
		$('#product_speciality').val($('#product_speciality_collapse_input').val())
	})
	$('#brand_collapse_input').change(function() {
		$('#brand').val($('#brand_collapse_input').val())
	})
})
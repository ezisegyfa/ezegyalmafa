$('#carousel-example-generic').on('slid.bs.carousel', function () {
   $('#slidenum').val($('.carousel-inner .active').index());
})

$('#slidenum').on('change',function(){
   //$('#carousel-example-generic').carousel($('#slidenum').val()); 
  var sn = parseInt($('#slidenum').val());
  $('#carousel-example-generic').carousel(sn);
})
$(function(){
  $("#sidebar-toggle").on("click", function(e){
    e.preventDefault();
    $("#sidebar").toggleClass("active");

    if($("#main").hasClass("col-md-10")){
      $('.sidebar-text').hide();
      $("#main").switchClass("col-md-10", "col-md-11", 700);
    }else {

      if($("#main").switchClass("col-md-11", "col-md-10", 300)){
      $('.sidebar-text').show(700);
      }
    }
  });
});

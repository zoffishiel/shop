$(function(){
  $("#sidebar-toggle").on("click", function(){
    $("#sidebar").toggleClass("active");
    $('.sidebar-text').toggle(500);
    if($("#main").hasClass("col-md-10")){
      $("#main").switchClass("col-md-10", "col-md-11", 500);
    }else {
      $("#main").switchClass("col-md-11", "col-md-10", 500);
    }
  });
});

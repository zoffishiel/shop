$(function(){
  $("#sidebar-toggle").on("click", function(){
    $("#sidebar").toggleClass("active");
    $('.sidebar-text').toggle(500);

  });
});

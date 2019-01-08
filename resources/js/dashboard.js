$(function(){
  $("#sidebar-toggle").on("click", function(){
    $("#sidebar").toggleClass("active");
    $('.sidebar-text').toggleClass("d-none");
  });
});

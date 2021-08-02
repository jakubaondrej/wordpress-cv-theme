var $ = jQuery;
var lastScrollTop = 0;
window.addEventListener("scroll", function(){
   var st = window.pageYOffset || document.documentElement.scrollTop; 
   if (st < lastScrollTop){
     $( "#toTopBtn" ).fadeIn(500);
   }else{
    $( "#toTopBtn" ).fadeOut(500);
   }
   lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
}, false);

$(document).ready(function(){
  $('a[data-bs-toggle="collapse"]').mouseup(function(){
    var expanded = $(this).attr('aria-expanded');
    if(expanded=="true"){
      setTimeout(() => {
        hide_collapse(this);
      }, 100);
    }
  })
  function hide_collapse(element){
    var aria_control = $(element).attr('aria-controls');
    $("#"+aria_control).removeClass("show");
    $(element).attr('aria-expanded',"false");
  }
});
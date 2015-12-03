
//dropdown

var $top = $('.sub-menu').parent();
var $sub = $('.sub-menu');

$top.on('mouseenter', function(){
    $(this).find($sub).stop().slideDown(100);    
});

$top.on('mouseleave', function(){
    $(this).find($sub).stop().slideUp(100);    
});

var $hamburger = $('.hamburger');
var $cross = $('.cross');
var $menu = $("#menu-primary");
var width = 647;

//mobile dropdown

$(window).resize(function() {
  // This will execute whenever the window is resized
    var $windowWidth = $(window).width();
    if  ($windowWidth <= width){
        $menu.hide();
        $hamburger.show();    
    }
    else{
        $menu.show();
        $hamburger.hide();
        $cross.hide();  
    }
});

$hamburger.click(function () {
    $sub.hide();
    $menu.slideToggle("fast", function () {
        $hamburger.hide();
        $cross.show();
    });
});

$cross.click(function () {
  $menu.slideToggle("fast", function () {
    $cross.hide();
    $hamburger.show();
  });
});



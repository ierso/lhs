var $top = $('.sub-menu').parent();
var $sub = $('.sub-menu');

var $nav = $("#main-nav");
var $hamburger = $(".hamburger");
var $cross = $(".cross");

var $break = 647;
//Slide Menu

$top.hover(
  function() {
    $sub.slideDown(100);
  },
  function() {
    $sub.slideUp(100);
  }
);

$cross.hide();
$hamburger.click(function(){
	 $nav.slideToggle(400, function(){
	 	$hamburger.hide();
    	$cross.show();
	 });
})

$cross.click(function() {
	$nav.slideToggle(400, function() {
    	$cross.hide();
    	$hamburger.show();
  });
});

$(window).resize(function() {
  if ($(window).width() < $break) {
    $hamburger.show();
    $nav.hide();
  }
 else {
    $nav.show();
    $hamburger.hide();
    $cross.hide();
 }
});





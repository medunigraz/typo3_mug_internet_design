var $ = jQuery.noConflict();
$(window).resize(function(){
//vars
  var docheight = $(document).height();
  var windowWidth = $(window).width();
  var windowHeight = $(window).height();
  var contentWidth = $('.header-line').width();
  var sliderimgHeight = $('.ce-homesliderelement:first .slider-img').height();
  $('.ce-header-slider, .ce-homeslider').css({"max-height": sliderimgHeight -2 +"px"}); $('.ce-header-slider,.ce-homeslider').css({"min-height": sliderimgHeight -2  +"px"});

  //section lines
  $(".section-name").each(function(){
    var sectionH = $(this).closest('.content-block').height();
    $(this).find('.section-line-bottom').css({"height": sectionH -130 +"px"});
  });




  //newsbar collision

  if ($('.newsteaser-sidebar .news-item').length){
    $('.newsteaser-sidebar').next('.content-block').addClass('lowspace lowspace1');

    var newsteaserHeight = $('.newsteaser-sidebar .news-box-inner').height() - 400;
    var lowspace1 = $('.lowspace1 .content-part').height();

    if (newsteaserHeight > lowspace1) {
      $('.newsteaser-sidebar').next('.content-block').next('.content-block').addClass('lowspace lowspace2');
    } else {
      $('.newsteaser-sidebar').next('.content-block').next('.content-block').removeClass('lowspace lowspace2');
    }
  } else {

  }

  //sidebar collision
  var sidebardefaultHeight = $('.sidebar-default .infobox-inner').height() ;
  var quicklinksboxHeight = $('.sidebar-default .quicklinks-box').height() ;
  var standardleadinHeight = $('.standard-leadin').height();
  if (sidebardefaultHeight > standardleadinHeight) {
    $('.standard-leadin').next('.content-block').addClass('lowspace lowspace2 ');
  }
  if (quicklinksboxHeight > standardleadinHeight) {
    $('.standard-leadin').next('.content-block').addClass('lowspace lowspace2 lowspacenewsbar');
  }



  if ($(window).width() > 1024) {
//Heromenu
    $(".dropdown-wrap-level0").each(function(){
      //$(this).find('.quicklinks').appendTo($(this).find('.nav-item-level-1'));
    });
    $(".hero-menu .nav-item-level-1").mouseenter(function(){
      $(".hero-menu .nav-item-level-1").removeClass("nav-item-ON");
      $(this).addClass("nav-item-ON");

 });
    $(".hero-menu .nav-item-level-0").mouseenter(function(){
     /*
      //layer height
      var layerheight =  $(this).find('.dropdown-wrap-level0').height();
      var sublistheight =  $(this).find('ul.dropdown-wrap-level1').height();
      if (sublistheight > layerheight) {
        $(this).find('.dropdown-wrap-level0').css({"height": sublistheight +60 +"px"});
      } else {
        $(this).find('.dropdown-wrap-level0').css({"height": ""});
      }
      */
      $(".hero-menu .nav-item-level-0").removeClass("nav-item-ON");
      $(".hero-menu .nav-item-level-1").removeClass("nav-item-ON");
      $(this).addClass("nav-item-ON");
      if($(this).find('.dropdown-wrap-level0 .nav-item-level-1.active').length !== 0) {
        $(this).find('.nav-item-level-1.active').addClass('nav-item-ON');
      } else {
        $(this).find('.nav-item-level-1:first-child').addClass('nav-item-ON');
      }
    });
    $(".hero-menu .dropdown-wrap-level0").mouseleave(function(){
      $(".hero-menu .nav-item-level-0").removeClass("nav-item-ON");
      $(".hero-menu .nav-item-level-1").removeClass("nav-item-ON")
    });
    $(".hero-menu-closeframe").mouseleave(function(){
      $(".hero-menu .nav-item-level-0").removeClass("nav-item-ON");
      $(".hero-menu .nav-item-level-1").removeClass("nav-item-ON")
    });
  } else {
    $('.hero-menu-closeframe, .dropdown-wrap-level0, .nav-item-level-0,.nav-item-level-1').unbind('mouseenter').unbind('mouseleave')
  }





});
$(window).trigger('resize');


//last textblockrow
$('div.row-headline-left:last').addClass('row-headline-left-last');



//headlineslider
$('.ce-header-slider-element .headline h2').each(function(){
  var text = $.trim($(this).text()),
      word = text.split(' '),
      str = "";
//alert(word[1]);
  $.each( word, function( key, value ) {
    if(key != 0) { str += " "; }
    str += "<span class='sliderword'>" + value + "</span>";
  });
  $(this).html(str);
});
$(".info-box").mouseenter(function(){
  $(".cycle-slideshow").cycle("pause");
});
$(".info-box").mouseleave(function(){
  $(".cycle-slideshow").cycle("resume");
});

$(".ce-header-slider .quicklinks-box").click(function(){
  $(this).toggleClass("quicklinks-boxOn");
});

$(".ce-header-slider .quicklinks-box").mouseleave(function(){
//  $(this).removeClass("quicklinks-boxOn");
});


//accordion
$(".accordion-title").click(function(){
  $('.accordion-item').removeClass("accordion-item-On");
  $('.accordion-text ').fadeOut(0);
  $(this).closest('.accordion-item').addClass("accordion-item-On");
  $(this).closest('.accordion-item').find('.accordion-text ').fadeIn(600);
});

//Burger Button
$(".burgerBTNOpen").click(function(){
  $("html").addClass("mobnavOn");
});
$(".burgerBTNClose").click(function(){
  $("html").removeClass("mobnavOn");
});
//set quicklinks last
$(".nav-item-level-0").each(function(){
 // $(this).find('.quicklinks').insertAfter($(this).find('li.nav-item-level-1').last());
});

//heromobnav
$('.btn-toggle-0').click(function(){
  $(this).closest('.nav-item-level-0 ').toggleClass("open0");
  return false;
});

$('.btn-toggle-1').click(function(){
  $(this).closest('.nav-item-level-1 ').toggleClass("open1");
  return false;
});

$('.btn-toggle-quicklink').click(function(){
  $(this).closest('.quicklinks-wrap ').toggleClass("openQuick");
  return false;
});

//subnavbox
$('.subnavopenBTN').click(function(){
  if($(this).closest('.nav-item-level-0').find('.nav-item-level-1').length !== 0) {
  $(this).closest('.nav-item-level-0 ').toggleClass("activeLi");
  return false;
  }
});

$('.submenburgerBTN').click(function(){
  $("html").addClass("subnavboxOn");
});
$('.submenburgerBTN-x').click(function(){
  $("html").removeClass("subnavboxOn");
});





//iam menu
var windowWidth = $(window).width();
var contentWidth = $('.header-line').width();
$('.iamlinkbox').css({"right": - ((windowWidth - contentWidth)*0.5) +"px"});
$('.iam-btn').click(function(){
  $('html').addClass("iam-nav-On");
  var windowWidth = $(window).width();
  var contentWidth = $('.header-line').width();
  $('.iamlinkbox').css({"right": - ((windowWidth - contentWidth)*0.5) +"px"});
  return false;
});
$('.iambgbtn-close').click(function(){
  $('html').removeClass("iam-nav-On");
  return false;
});
//ways
$(function () {
  $('.trans').each(function(){
    var min = 100, max = 500;
    var delay = Math.floor(Math.random() * (max - min) + min);
    var _this = this;
    var inview = new Waypoint({
      element: _this,
      handler: function (direction) {
        if (direction === 'down') {
          $(this.element).delay(delay).animate({"opacity": "1"}, { duration: 800,easing: "linear" });
        } else  {
          //$(this.element).animate({"opacity": "0"}, { duration: 100,easing: "linear" })
        }
      },
      offset: '105%'
    });
  });
});


//newsboxen
$(".greenbox-news" ).appendTo( ".sidebar-default" );
if($(".submenu-box").length > 0) {
  $(".linktoall" ).appendTo( ".greenbox-news" );
}
if($(".greybox-news").length < 1) {
  $(".linktoall" ).addClass( "nogreybox" );
}






//fallbacks
$(window).on("load", function() {
  $(window).trigger('resize');
  var sliderimgHeight = $('.ce-homesliderelement:first .slider-img').height();
  $('.ce-header-slider').css({"max-height": sliderimgHeight -2 +"px"}); $('.ce-header-slider').css({"min-height": sliderimgHeight -2  +"px"});
});


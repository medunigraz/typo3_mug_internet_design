var $ = jQuery.noConflict();
$(window).resize(function(){
//vars
  var docheight = $(document).height();
  var windowWidth = $(window).width();
  var windowHeight = $(window).height();
  var contentWidth = $('.header-line').width();
  var contentInnerWidth = $('.content-block .container').width();
  var sliderimgHeight = $('.ce-homesliderelement:first .slider-img').height();
  $('.ce-header-slider, .ce-homeslider').css({"max-height": sliderimgHeight -2 +"px"}); $('.ce-header-slider,.ce-homeslider').css({"min-height": sliderimgHeight -2  +"px"});

  $('.ce-homesliderelement .box-sliderbgbalken').css({"height": sliderimgHeight +"px"});
  $('.content-header-default .box-sliderbgbalken').css({"height": sliderimgHeight +1 +"px"});

//socialbar

  $('.socialsidebar').css({"right":  -((windowWidth-contentInnerWidth)*0.5)+1  +"px"});
  $('.spotlightslider .spotlightsliderInner-after').css({"width":  (windowWidth-contentInnerWidth)*0.5  +"px"});
  //section lines
  $(".section-name").each(function(){
    var sectionH = $(this).closest('.content-part').height();
    $(this).find('.section-line-bottom').css({"height": sectionH -30 +"px"});
  });
//count standard CE
  $(".row.content-block").addClass(function(i) { return 'standardCE' + (i + 1) });
//newsbar collision
  if ($('.sidebar-default .news-item').length){
    $('.content-block-2, .content-block-3').addClass('C-Low');
    var sidebarheight = $('.sidebar-default .quicklinks-box').height() +50;
    var C2H = $('.content-block-2 .container').height();
    var C3H = $('.content-block-3 .container').height();
    var C4H = $('.content-block-4 .container').height();
    if (sidebarheight > (C2H + C3H)) {
      $('.content-block-4').addClass('C-Low');
    } else {
      $('.content-block-4').removeClass('C-Low');
    }
  }
//submenubar collision
  if ($('.submenu-box .nav-item').length){
    $('.content-block-2, .content-block-3').addClass('C-Low');

    setInterval(function(){
    var sidebarheight = $('.quicklinks-box').height() -60;
    var C2H = $('.content-block-2 .container').height();
    var C3H = $('.content-block-3 .container').height();
    var C4H = $('.content-block-4 .container').height();
    if (sidebarheight > (C2H + C3H)) {
      $('.content-block-4').addClass('C-Low');
    } else {
      $('.content-block-4').removeClass('C-Low');
    }
      if (sidebarheight > (C2H + C3H + C4H)) {
        $('.content-block-5').addClass('C-Low');
      } else {
        $('.content-block-5').removeClass('C-Low');
      }

    }, 500);

  }
$('footer').removeClass('C-Low');
//newspages
  if ($('.sidebar-default.sidebar-filterbox').length){
    $('body').addClass('page-news');
  }
  if ($('.newsteaserpart .greenbox-news').length){
    $('body').addClass('page-news');
  }
  if ($('.eventmeta-row').length){
    $('body').addClass('page-event');
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
//gallery
  var $grid = $('.grid').imagesLoaded( function() {
    $grid.masonry({
      itemSelector: '.grid-item',
      percentPosition: true,
      columnWidth: '.grid-sizer'


    });
  });
//spotlightslider
  $('.spotslider-pager').each(function() {
    var $this = $(this);
    if ($this.find('span').length < 2) {
      $this.addClass("hidepager");
    } else {
      $this.removeClass("hidepager");
    }
  });
  $(".spotlightslider").each(function() {
    var maxHeight = 0;
    $(this).find('.spolightslider-img').each(function(){
      var thisH = $(this).height();
      if (thisH > maxHeight) { maxHeight = thisH; }
    });
    $(this).css({"height": maxHeight + 50 +"px"});
    $(this).find('.spolightItem-inner').css({"height": maxHeight -60 +"px"});
  });
});
$(window).trigger('resize');

//barrier-free
var fontstatus = localStorage.getItem('fontsize-bigger');
if (fontstatus === "1") {
  $("body").addClass("fontsize-bigger");
  $(".fontsizeBTN-standard").removeClass("fontsizeBTN-on");
  $(".fontsizeBTN-bigger").addClass("fontsizeBTN-on");
} else {
  $("body").removeClass("fontsize-bigger");
  $(".fontsizeBTN-standard").addClass("fontsizeBTN-on");
  $(".fontsizeBTN-bigger").removeClass("fontsizeBTN-on");
}
$(".fontsizeBTN").click(function(){
  $(".fontsizeBTN").removeClass("fontsizeBTN-on");
  $(this).addClass("fontsizeBTN-on");
});
$(".fontsizeBTN-bigger").click(function(){
  localStorage.setItem('fontsize-bigger', "1");
  $("body").addClass("fontsize-bigger");
});
$(".fontsizeBTN-standard").click(function(){
  localStorage.setItem('fontsize-bigger', "0");
  $("body").removeClass("fontsize-bigger");
});

var contraststatus = localStorage.getItem('contrast-greenblack');
if (contraststatus === "1") {
  $("body").addClass("contrast-greenblack");
  $(".icon-contrast-standard").removeClass("contrast-on");
  $(".icon-contrast-greenblack").addClass("contrast-on");
} else {
  $("body").removeClass("contrast-greenblack");
  $(".icon-contrast-standard").addClass("contrast-on");
  $(".icon-contrast-greenblack").removeClass("contrast-on");
}
$(".icon-contrast-standard").click(function(){
  localStorage.setItem('contrast-greenblack', "1");
  $("body").addClass("contrast-greenblack");
  $('.icon-contrast-greenblack').addClass("contrast-on");
  $(".icon-contrast-standard").removeClass("contrast-on");
});
$(".icon-contrast-greenblack").click(function(){
  localStorage.setItem('contrast-greenblack', "0");
  $("body").removeClass("contrast-greenblack");
  $('.icon-contrast-greenblack').removeClass("contrast-on");
  $(".icon-contrast-standard").addClass("contrast-on");
});

//contentspace fallback
$('.hero-menu .nav-item-level-0').each(function(index){
  $(this).addClass('navpos-'+ index);
});

$('.content-block').each(function(index){
  $(this).addClass('content-block-'+ index);
});

if ($(".content-block-3 .content-part").hasClass("ctype-mugce_text")) {
  $('.content-block-2').addClass('content-part-nobottomspace');
}

$('.content-part').each(function() {
if ($(this).find('.bgbox').length > 0) {
  $(this).addClass('content-part-morespace');
}
});
$('.link-list-box').each(function() {
  $(this).find('.ce-link:gt(-3)').addClass('nobottomspace');
});

//home stuff
$('.home .content-block:eq(2) .headline h2').addClass('h1');

//last textblockrow
$('div.row-headline-left:last').addClass('row-headline-left-last');

//headlineslider
/*
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
 */
  $('.ce-homeslider .cycle-slideshow').on( 'cycle-after', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
    $('.ce-homeslider .ce-homesliderelement').removeClass("ce-homesliderelementinfobox");
    if ($(".ce-homeslider .cycle-slide-active").find(".bg-green-dark").length > 0){
      $('.ce-homeslider .cycle-slide-active').addClass("ce-homesliderelementinfobox");
    }
});

$('.ce-homesliderelement').first().addClass('ce-homesliderelement-first');

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
  $('.accordion-text ').fadeOut(0);
  if ( $(this).closest('.accordion-item').is( ".accordion-item-On" ) ) {
    $('.accordion-item').removeClass("accordion-item-On");
  } else {
    $('.accordion-item').removeClass("accordion-item-On");
    $(this).closest('.accordion-item').addClass("accordion-item-On");
    $(this).closest('.accordion-item').find('.accordion-text ').fadeIn(600);
  }

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
function isEmpty( el ){
  return !$.trim(el.html())
}
if (isEmpty($('#subMenu'))) {
  $('.submenu-box').hide();
} else {
  $("body").addClass("submenuOnpage");
}
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
$('.iam-btn').mouseenter(function(){
  $('html').addClass("iam-nav-On");
  var windowWidth = $(window).width();
  var contentWidth = $('.header-line').width();
  $('.iamlinkbox').css({"right": - ((windowWidth - contentWidth)*0.5) +"px"});
  return false;
});

$('.iamlinkbox').mouseleave(function(){
  $('html').removeClass("iam-nav-On");
  return false;

});
$('.iambgbtn-close').click(function(){
  $('html').removeClass("iam-nav-On");
  return false;
});
//quicksearch
$('.QuicksearchOpen').click(function(){
  $('html').addClass("box-quicksearch-on");
  $('.tx-indexedsearch-form input').focus();
  return false;
});
$('.quicksearchclose').click(function(){
  $('html').removeClass("box-quicksearch-on");
  return false;
});

//langmobileswitch
$(".langdown").click(function(){
  $("body").toggleClass("langswitch-open");
});
$(".barrierdown").click(function(){
  $("body").toggleClass("barrier-open");
});
$(".fontsizeBTN").click(function(){
  $("body").toggleClass("barrier-open");
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
$(".news" ).closest('.frame').addClass('newsteaserpart');
$(".greenbox-news" ).appendTo( ".sidebar-default" );
if($(".submenu-box").length > 0) {
  $(".linktoall" ).appendTo( ".greenbox-news" );
}
if($(".greybox-news").length < 1) {
  $(".linktoall" ).addClass( "nogreybox" );
}

//newsheader
var newsheaderSRC = $('.newsheaderSRC').attr('src');
$('.newsheader-img').attr('src',newsheaderSRC);
$('.newsheaderSRC').remove();



//spotnews
$(".news-overview-list .article-news:first-child" ).addClass( "spotnewsbox" );
$(".news-overview-list .article-news:nth-child(2)").after("<div class='clear'></div>");

$('.content-part-newsevents').each(function(){
  if($(this).find(".article-news").length < 2) {
  $(this).addClass( "onenews" );
  }
  if($(this).find(".article-news").length < 1) {
    $(this).addClass( "nonews" );
    $(this).find('.news-list-view').addClass( "sliderbottom" );
    $(this).find('.events-list-view').addClass( "sliderbottom" );
    var eventsboxH =  $(this).find('.events-list-view').height();
    $(this).find('.spotlightslider').css({"margin-top": eventsboxH +80 +"px"});
  } else {
    //events height
    var eventsboxH =  $(this).find('.events-list-view').height();
    var newsitemH =  $(this).find('.articletype-0').height();
    if (eventsboxH > newsitemH ) {
      $(this).find('.article-news').css({"margin-bottom": (eventsboxH-newsitemH) +80 +"px"});
    }

  }




});





//video
$('.spolightItem video').attr('controls',true);


setTimeout(function(){
  $('.spolightItem .videoplayBtn, .spolightItem video').click(function() {
    $(this).find('video').get(0).play();
    $(this).closest('.spolightItem').addClass("videoPlay");
    $(this).closest('.spolightItem').removeClass("videoPause");
  });

  $('.spotslider-pager span').click(function() {
    $('video').get(0).pause();
    $('.spolightItem').addClass("videoPause");
    $('.spolightItem.cycle-slide-active').removeClass("videoPlay");
  });
}, 3000);

//evenodds
$('.ce-offers .elements').each(function(){
  $(this).find(".ce-offer").each( function (index) {
    index += 1;
    if(index % 2 == 0) {
      $(this).addClass("even");
    } else {
      $(this).addClass("odd");
    }
  });
});




//fallbacks
$(window).on("load", function() {
  var $grid = $('.grid').imagesLoaded( function() {
    $grid.masonry({
      itemSelector: '.grid-item',
      percentPosition: true,
      columnWidth: '.grid-sizer',
      gutter: 0
    });
  });
  $('.gallerybox').removeClass("galleryboxloading");


  $(window).trigger('resize');
  var sliderimgHeight = $('.ce-homesliderelement:first .slider-img').height();
  $('.ce-header-slider').css({"max-height": sliderimgHeight -2 +"px"}); $('.ce-header-slider').css({"min-height": sliderimgHeight -2  +"px"});
});
//datepicker
var dateClass='.datechk';
$(document).ready(function ()
{

    var oCSS = document.createElement('link');
    oCSS.type='text/css'; oCSS.rel='stylesheet';
    oCSS.href='/typo3conf/ext/mug_ce/Resources/Public/css/jquery-ui.css';
    oCSS.onload=function()
    {
      var oJS = document.createElement('script');
      oJS.type='text/javascript';
      oJS.src='/typo3conf/ext/mug_ce/Resources/Public/js/jquery-ui.min.js';
      oJS.onload=function()
      {
        $(dateClass).datepicker();
      }
      document.body.appendChild(oJS);
    }
    document.body.appendChild(oCSS);

});
$("#eventday").change( function() {
  var eventdayurl = $(this).val();
  var eventbaseurl = $('.eventfilterbox').attr('data-baseurl');
  window.location.href = eventbaseurl+'/'+eventdayurl;

});




setTimeout(function(){ $(window).trigger('resize'); }, 2000);



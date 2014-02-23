///////////////////////////////////////////
//// classie helper functions from bonzo https://github.com/ded/bonzo
///////////////////////////////////////////
'use strict';

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

window.classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};


///////////////////////////////////////////
//// KONAMI
///////////////////////////////////////////
$.fn.konami = function( options ) {

  var opts, masterKey, controllerCode, code;
  opts = $.extend({}, $.fn.konami.defaults, options);

  return this.each(function() {

    controllerCode = [];

    $( window ).keyup(function( evt ) {
      code = evt.keyCode || evt.which;

      if ( opts.code.length > controllerCode.push( code ) ) {
        return;
      } // end if

      if ( opts.code.length < controllerCode.length ) {
        controllerCode.shift();
      } // end if

      if ( opts.code.toString() !== controllerCode.toString() ) {
        return;
      } // end for

      opts.cheat();

    }); // end keyup

  }); // end each

}; // end opts

$.fn.konami.defaults = {
  code : [38,38,40,40,37,39,37,39,66,65],
  cheat: null
};

///////////////////////////////////////////   
//// Custom off-canvas javascript
///////////////////////////////////////////
// Grab IDs
var menuLeft = document.getElementById( 'spmenu-s1' ),
showLeftPush = document.getElementById( 'showLeftPush' ),
hideLeftPush = document.getElementById( 'hideLeftPush' ),
rightPush = document.getElementById( 'right-push' ),
otherClose = document.getElementById( 'other-close' ),
menuIcon = document.getElementById( 'menu-icon' ),
// Social dropdown
Dropd = document.getElementById( 'dd' ),
body = document.body;

$( "#showLeftPush, #hideLeftPush" ).click(function() {
    // Pushes any content stuck to the right if it exists
    if (!!$('.right-description').offset() && $('#right-text').isOnScreen()) {
      classie.toggle( rightPush, 'right-open' );
    }
    // Push the page & menu
    classie.toggle( this, 'active' );
    classie.toggle( body, 'spmenu-push-toright' );
    classie.toggle( menuLeft, 'spmenu-open' );

    // Push the tab bar
    classie.toggle( showLeftPush, 'tab-bar-open' );

    //Change the menu icon
    classie.toggle( menuIcon, 'icon-list');
    classie.toggle( menuIcon, 'icon-x');
});

///////////////////////////////////////////
//// Dropdowns
///////////////////////////////////////////

/*$( Dropd ).click(function() {
  if (!!$(Dropd).offset()) {
    classie.toggle( Dropd, 'share-active');
  }
});*/

/*$("#testClick").click( function() {
  var $t = $(this);
  var $menu = $t.next(".sub-menu");
  $menu.slideToggle('fast');
  $menu.toggleClass('openmenu');
});*/

///////////////////////////////////////////
//// Scrolling rightbar check
///////////////////////////////////////////

$.fn.isOnScreen = function(){
    
    var win = $(window);
    
    var viewport = {
      top : win.scrollTop(),
    };

    viewport.bottom = viewport.top + win.height();
    var bounds = this.offset();
    bounds.bottom = bounds.top + this.outerHeight();
    
    return (!(viewport.bottom < bounds.bottom || viewport.top > bounds.bottom));
};

// Determine if post sidebar fixed/!fixed
function rightCheck() {
  if (!!$('#right-text').offset()) {
    if($('#right-text').isOnScreen()) {
      classie.remove( rightPush, 'right-scrollable' );
      classie.add( rightPush, 'right-fixed' );
    } else {
      classie.add( rightPush, 'right-scrollable' );
      classie.remove( rightPush, 'right-fixed' );
    }
  }
}
///////////////////////////////////////////
//// Parallax
///////////////////////////////////////////

var iOS = false,
parallaxHero = document.getElementById( 'hero1' );

if (navigator.userAgent.match(/(iPod|iPhone|iPad)/i)) {
  iOS = true;
}

if (!!$('.parallax-trigger').offset() && iOS == true) { 
    classie.remove( parallaxHero, 'parallax-trigger' );
}
  var parallaxScroll,
    _this = this;

  parallaxScroll = function() {

    var currentScrollPosition;
    currentScrollPosition = $(_this).scrollTop();

    $('#hero-text').css({
      //'top': (currentScrollPosition / 3) + "px",
      'opacity': 1 - (currentScrollPosition / 410)
    });
  };


///////////////////////////////////////////
//// Contact form
///////////////////////////////////////////

$("#contactForm").on("valid invalid submit", function(e){
e.stopPropagation();
e.preventDefault();
if (e.type === "valid"){

    // Send button 
    sendButton = document.getElementById( 'sendButton' );
    if( typeof sendButton.getAttribute( 'data-loading' ) !== 'string' ) {
      sendButton.setAttribute( 'data-loading', '' );
    }

  // Define input values
  var name = $("input#name").val(); 
  var email = $("input#email").val();
  var message = $("textarea#message").val();

  // Create stringfrom grabbed values
  var dataString = 'name='+ name + '&email=' + email + '&message=' + message;

  //alert (dataString);return false;  

  $.ajax({  
    type: "POST",  
    url: "/wp-admin/admin-ajax.php",  
    data: 'action=ajax_contact&' + dataString,
    success: function(data, textStatus, XMLHttpRequest){  
      // message sent actions here
      $('#contactForm').html("<div id='message'></div>");  
      $('#message').html("<h2><strong>Yeah! Message sent</strong></h2>")  
      .append("<p>I'll get back to you soon.</p>")  
      .hide()  
      .fadeIn(1500, function() {  
        $('#message').append();  
      });  
    },  
    error: function(MLHttpRequest, textStatus, errorThrown){  
      alert(errorThrown + dataString);  
    } 
  });  
  return false;  
}
});

///////////////////////////////////////////
//// Init functions
///////////////////////////////////////////

$( document ).ready(function() {
  //Fade items on load - sexiness incresed by 120%
  var theImages = $(".wrapper img");
  
  theImages.hide().one("load",function(){
    $(this).fadeIn(500);
  }).each(function(){
    if(this.complete) $(this).trigger("load");
  });

  // Parallax
    $(window).scroll(function() {
      parallaxScroll();
    });
  // Right-bar stickiness
  rightCheck();
  //Konami code
  $( window ).konami({  
    cheat: function() {
        /*alert( 'Cheat code activated!' );*/
       // url with custom callbacks
      $('#konami').foundation('reveal', 'open', {
        url: 'http://www.hamishw.com/wp-content/themes/Portfolio_2014/img/library/konami.html',
      });
    }
  });

});

$(window).on('resize',function(){
  rightCheck();
});

$(window).load(function() {

   $(".wrapper .custom-flex-video-class").show();
  // Prevent caption FOUC
  setTimeout(
  function() 
  {
     $(".figure-text").removeClass("hide");
  }, 300);
  
});

///////////////////////////////////////////
//// PNG fallback for SVGs
///////////////////////////////////////////

// Check if browser can handle SVG
if(!Modernizr.svg){
    // Get all img tag of the document and create variables
    var i=document.getElementsByTagName("img"),j,y;

    // For each img tag
    for(j = i.length ; j-- ; ){
        y = i[j].src
        // If filenames ends with SVG
        if( y.match(/svg$/) ){
            // Replace "svg" by "png"
            i[j].src = y.slice(0,-3) + 'png'
        }
    }
}

// Media query js conditionals 
/*$(window).on('resize',function(){
    if(Modernizr.mq('(min-width: 64.063em)')) $(".tab-bar").removeClass("tab-bar-active");
    if(Modernizr.mq('(min-width: 40.063em)')) $(".sticky-sidebar").removeClass("sticky-active");
    if(Modernizr.mq('(min-width: 64.063em)')) $(".sticky-sidebar").addClass("sticky-active");
    if(Modernizr.mq('(max-height: 35em)')) $(".tab-bar").addClass("tab-bar-active");
});*/

  //Custom dropdowns

/*  function DropDown(el) {
      Dropd = el;
      this.initEvents();
  }
  DropDown.prototype = {
    initEvents : function() {

      Dropd.on('click', function(event){
        Dropd.toggleClass('share-active');
        event.stopPropagation();
      }); 
    }
  }

if (!!$('#dd').offset()) {
  //Custom dropdowns
  var Dropd = document.getElementById( 'dd' );
  var dd = new DropDown( $('#dd') );
}
*/
/*$(function(){ // document ready

  // Sticky sidebar   
  if (!!$('.sticky-active').offset()) { // make sure ".sticky-active" element exists
    
    var stickyTop = $('.sticky-active').offset().top; // returns number
 
    $(window).scroll(function(){ // scroll event
 
      var windowTop = $(window).scrollTop(); // returns number
 
      if (stickyTop < windowTop){
        $('.sticky-active').css({ position: 'fixed', top: 0 });
      }
      else {
        $('.sticky-active').css('position','static');
      }
 
    });
 
  }
 
});*/

// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs

$(document).foundation({
  orbit: {
      slide_number: false,
      timer: false, // Does the slider have a timer visible?
  }
});


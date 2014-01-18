// class helper functions from bonzo https://github.com/ded/bonzo

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


// Custom off-canvas javascript

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
    /*classie.add( showLeftPush, 'tab-bar-active' );*/

    //Change the menu icon
    classie.toggle( menuIcon, 'icon-list');
    classie.toggle( menuIcon, 'icon-x');

    
    /*$("body").addClass("dummyClass").removeClass("dummyClass");*/
    /*disableOther( 'showLeftPush' );*/
});

$( Dropd ).click(function() {
  if (!!$(Dropd).offset()) {
    classie.toggle( Dropd, 'share-active');
  }
});

$.fn.isOnScreen = function(){
    
    var win = $(window);
    
    var viewport = {
        top : win.scrollTop(),
        /*left : win.scrollLeft()*/
    };
    /*viewport.right = viewport.left + win.width();*/
    viewport.bottom = viewport.top + win.height();
    
    var bounds = this.offset();
    /*bounds.right = bounds.left + this.outerWidth();*/
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
};

// Parallax
var parallaxScroll,
  _this = this;

parallaxScroll = function() {
  var currentScrollPosition;
  currentScrollPosition = $(_this).scrollTop();

  $('#hero-text').css({
    /*'top': (currentScrollPosition / 3) + "px",*/
    'opacity': 1 - (currentScrollPosition / 410)
  });
};

$("#contactForm").on("valid invalid submit", function(e){
e.stopPropagation();
e.preventDefault();
if (e.type === "valid"){

  // sending animation here

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
      $('#message').html("<h2>Contact Form Submitted!</h2>")  
      .append("<p>We will be in touch soon.</p>")  
      .hide()  
      .fadeIn(1500, function() {  
        $('#message').append("<img id='checkmark' src='img/profile.png' />");  
      });  
    },  
    error: function(MLHttpRequest, textStatus, errorThrown){  
      alert(errorThrown + dataString);  
    } 
  });  
  return false;  
}
});

// Init functions
$( document ).ready(function() {
  $(window).scroll(function() {
    parallaxScroll();
  });
  rightCheck();
});

$(window).on('resize',function(){
  rightCheck();
});


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

$(document).foundation();


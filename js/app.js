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
    if (!!$('.right-description').offset()) {
      classie.toggle( rightPush, 'right-open' );
    }
    // Push the page & menu
    classie.toggle( this, 'active' );
    classie.toggle( body, 'spmenu-push-toright' );
    classie.toggle( menuLeft, 'spmenu-open' );

    // Push the tab bar
    classie.toggle( showLeftPush, 'tab-bar-open' );
    classie.add( showLeftPush, 'tab-bar-active' );

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


/*( function( window ) {
})(window);*/

// Media query js conditionals 
$(window).on('resize',function(){
    if(Modernizr.mq('(min-width: 64.063em)')) $(".tab-bar").removeClass("tab-bar-active");
    if(Modernizr.mq('(min-width: 40.063em)')) $(".sticky-sidebar").removeClass("sticky-active");
    if(Modernizr.mq('(min-width: 64.063em)')) $(".sticky-sidebar").addClass("sticky-active");
    if(Modernizr.mq('(max-height: 35em)')) $(".tab-bar").addClass("tab-bar-active");
});

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




$(window).load(function(){
		$(function(){
			$('img.protect').each(function(){
				var wP= $(this).parent().actual("width");				
				var hP= $(this).actual("height");
				var is_explorer6 = navigator.userAgent.indexOf('MSIE 6') > -1;
				var is_explorer7 = navigator.userAgent.indexOf('MSIE 7') > -1;
				if(is_explorer6 || is_explorer7)
				{

				$(this).parent().wrapInner("<span class='protectimage'></span>");
	$(this).parent("span.protectimage").css({"position":"relative","display":"inline","width":""+wP+"","height":""+hP+""});			
				}
				else
				{

				$(this).parent().wrapInner("<span class='protectimage'></span>");
	$(this).parent("span.protectimage").css({"position":"relative","display":"block","width":""+wP+"","height":""+hP+""});			
				}
				
			});	
		});
		
		$(function(){		
			$('span.protectimage').each(function(){
				var wP= $(this).find('img').actual("width");
				var hP= $(this).find('img').actual("height");				
				$(this).append("<img class='guard' src='/common/images/blank.gif' alt='' />");
				$(this).children("img.guard").css({"position":"absolute","left":"0","top":"0","display":"block","width":""+wP+"","height":""+hP+""});

			});
		});

	});
   


// prevent copy text 
function disableselect(e){
return false
}
 
function reEnable(){
return true
}
 
//if IE4+
document.onselectstart=new Function ("return false")
 
//if NS6
if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}

//if Opera
if ($.browser.opera == true) {
document.onmousedown=disableselect
document.onclick=reEnable
document.oncontextmenu="return false"
}



/*! Copyright 2012, Ben Lin (http://dreamerslab.com/)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Version: 1.0.13
 *
 * Requires: jQuery 1.2.3 ~ 1.8.2
 */
;( function ( $ ){
  $.fn.extend({
    actual : function ( method, options ){
      // check if the jQuery method exist
      if( !this[ method ]){
        throw '$.actual => The jQuery method "' + method + '" you called does not exist';
      }

      var defaults = {
        absolute      : false,
        clone         : false,
        includeMargin : false
      };

      var configs = $.extend( defaults, options );

      var $target = this.eq( 0 );
      var fix, restore;

      if( configs.clone === true ){
        fix = function (){
          var style = 'position: absolute !important; top: -1000 !important; ';

          // this is useful with css3pie
          $target = $target.
            clone().
            attr( 'style', style ).
            appendTo( 'body' );
        };

        restore = function (){
          // remove DOM element after getting the width
          $target.remove();
        };
      }else{
        var tmp   = [];
        var style = '';
        var $hidden;

        fix = function (){
          // get all hidden parents
          $hidden = $target.
            parents().
            andSelf().
            filter( ':hidden' );

          style += 'visibility: hidden !important; display: block !important; ';

          if( configs.absolute === true ) style += 'position: absolute !important; ';

          // save the origin style props
          // set the hidden el css to be got the actual value later
          $hidden.each( function (){
            var $this = $( this );

            // Save original style. If no style was set, attr() returns undefined
            tmp.push( $this.attr( 'style' ));
            $this.attr( 'style', style );
          });
        };

        restore = function (){
          // restore origin style values
          $hidden.each( function ( i ){
            var $this = $( this );
            var _tmp  = tmp[ i ];

            if( _tmp === undefined ){
              $this.removeAttr( 'style' );
            }else{
              $this.attr( 'style', _tmp );
            }
          });
        };
      }

      fix();
      // get the actual value with user specific methed
      // it can be 'width', 'height', 'outerWidth', 'innerWidth'... etc
      // configs.includeMargin only works for 'outerWidth' and 'outerHeight'
      var actual = /(outer)/g.test( method ) ?
        $target[ method ]( configs.includeMargin ) :
        $target[ method ]();

      restore();
      // IMPORTANT, this plugin only return the value of the first element
      return actual;
    }
  });
})( jQuery );

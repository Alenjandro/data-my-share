(function($){var o=$.scrollTo=function(a,b,c){o.window().scrollTo(a,b,c)};o.defaults={axis:'y',duration:1};o.window=function(){return $($.browser.safari?'body':'html')};$.fn.scrollTo=function(l,m,n){if(typeof m=='object'){n=m;m=0}n=$.extend({},o.defaults,n);m=m||n.speed||n.duration;n.queue=n.queue&&n.axis.length>1;if(n.queue)m/=2;n.offset=j(n.offset);n.over=j(n.over);return this.each(function(){var a=this,b=$(a),t=l,c,d={},w=b.is('html,body');switch(typeof t){case'number':case'string':if(/^([+-]=)?\d+(px)?$/.test(t)){t=j(t);break}t=$(t,this);case'object':if(t.is||t.style)c=(t=$(t)).offset()}$.each(n.axis.split(''),function(i,f){var P=f=='x'?'Left':'Top',p=P.toLowerCase(),k='scroll'+P,e=a[k],D=f=='x'?'Width':'Height';if(c){d[k]=c[p]+(w?0:e-b.offset()[p]);if(n.margin){d[k]-=parseInt(t.css('margin'+P))||0;d[k]-=parseInt(t.css('border'+P+'Width'))||0}d[k]+=n.offset[p]||0;if(n.over[p])d[k]+=t[D.toLowerCase()]()*n.over[p]}else d[k]=t[p];if(/^\d+$/.test(d[k]))d[k]=d[k]<=0?0:Math.min(d[k],h(D));if(!i&&n.queue){if(e!=d[k])g(n.onAfterFirst);delete d[k]}});g(n.onAfter);function g(a){b.animate(d,m,n.easing,a&&function(){a.call(this,l)})};function h(D){var b=w?$.browser.opera?document.body:document.documentElement:a;return b['scroll'+D]-b['client'+D]}})};function j(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);

$(function(){
	// rollover
	$('.imgover').each(function(){
		this.osrc = $(this).attr('src');
		this.rollover = new Image();
		this.rollover.src = this.osrc.replace(/(\.gif|\.jpg|\.png)/, "_o$1");
	}).hover(function(){
		$(this).attr('src',this.rollover.src);
	},function(){
		$(this).attr('src',this.osrc);
	});
	// scroll
	$('a[@href^=#]').click(function() {
		var $t = $(this.hash);
		if (this.hash.length > 1 && $t.size()) {
			$.scrollTo($t, 400);
			return false;
		}
	});
	
});

(function($){
	var config = function () {
		var L2=$(".gallery ul li").length;
		for (var i=0; i<L2; i++){
			switch (i%3){
				case 2:
				
				var a2=(i-2)/3;
				$(".gallery ul li:eq("+(i)+")").addClass('bg' + a2);
				break;
				case 1:
				var b2=(i-1)/3;
				$(".gallery ul li:eq("+(i)+")").addClass('bg' + b2);
				break;
				
				case 0:
				var c2=i/3;
				$(".gallery ul li:eq("+(i)+")").addClass('bg' + c2);
				break;
			}
		}
		
		for (var j=0; j<L2; j++){
				$('.bg' + j).wrapAll('<ul class="subCol clearfix" />');
			}
		$('.subCol').wrap('<li class="bgCol3B clearfix"/>');
		
		
		//  ------------ start voice ----------------------
		var length_voice=$(".voiceContent li").length;
		var rows=0;
		var n=0;
		var m=0;
		var k=0;
		var le = length_voice%3;
		
		var n=1;
		for (i=0; i<length_voice; i++) {
			if (n==3) {
				$(".voiceContent li:eq(" + i + ")").addClass('last');
				n=0;
			}
			n++;
		}
		
		if (le==0) {
			rows = parseInt(length_voice/3);
		}
		else {
			rows = parseInt(length_voice/3) +1;
		}
		
		for (i=1;i<=rows;i++) {
			for (j=k;j<3+m;j++) {
				$("ul.voiceContent li:eq("+j+")").addClass('rows' + i);
				k++;
			}
			m = m + 3;
		}
		
		for (j=1; j<=rows; j++){
				$('.rows' + j).wrapAll('<ul class="tbRow clearfix" />');
		}
		
		$('.tbRow').wrap('<li class="tbGroup"/>');
		// -------------- end voice --------------------------
		
		
		$('.faqTitle span').wrap('<table><tr><td></td></tr></table>');
		$('.calendar .day').wrap('<table><tr><td></td></tr></table>');
		
		$('.memo div').wrap('<table><tr><td></td></tr></table>');
	}
	

	$(function() {
		config();
	});

})(jQuery);
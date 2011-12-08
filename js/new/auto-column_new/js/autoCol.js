// JavaScript Document
(function($){  
	var config = function () {
	var n = $(".section").length;
    var column = 4;
	for ( var k=1; k <= n; k++)			
	{
		var L2 = $("ul.sectionList li.sideBlock").length;
		for (var i=0; i<L2; i++){
            FColumn(i%column,column,k,i);			
		}
		
		for (var j=0; j<L2; j++){
			$('.bg'+k + j).wrapAll('<ul class="subCol0'+k+' clearfix" />');
		}
		$('.subCol0'+k).wrap('<li class="bgItem clearfix"/>');			
				
        //FColumnBg(L2%column,L2,column,k)			
	}//end for
				
    function FColumn(n,column,k,i)
    {        
    	var a2=(i-n)/column;
		$("ul.sectionList li.sideBlock:eq("+(i)+")").addClass('bg'+k + a2);
    }

    function FColumnBg(n,L2,column,k)
    {        
    	var subColLenght = L2/column;
        var j = n+1;
		$("ul.sectionList li.bgItem:eq("+(subColLenght)+")").css("background-image","url(common/images/bg_col_bottom0"+j+".gif)");
		$("ul.sectionList li.bgItem:eq("+(subColLenght)+")").css("background-position","0 bottom");
    }
}

$(function() {
	config();
});

})(jQuery);
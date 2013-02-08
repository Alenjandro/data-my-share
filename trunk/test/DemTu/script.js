$(function() {
	var maxCount = 5000;
    var count = {};
    $('.inputText textarea').each(function(){
		wCount($(this));
		$(this).keyup(function(){
			wCount($(this));
		})
    });

    function wCount(field){
        var number = 0;
        var fMatch = $(field).val().match(/\b/g);
        if(fMatch){
            number = fMatch.length / 2;
        }
        count[field] = number;
        var fCount = 0;
        $.each(count, function(k, v){
            fCount += v;
        });
		if(fCount<maxCount){
        	$('.result').html(fCount);
		}else{
			alert('Bạn chỉ được nhập tối đa 5000 từ, xin vui lòng nhập lại.');
		}
    }
});
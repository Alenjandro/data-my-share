jQuery.noConflict();
var j$ = jQuery;

/* 01.jQuery Ready
=========================================================== */
j$(function(){

	
	//検索フォーム
	j$('#kadenForm').jqTransform();
	var defaultc = '#b5b5b6';
	var focusc = '#595757';
	j$('input[type="text"]#txtSearch').css('color',defaultc).focus(function(){
		if(j$(this).val() == this.defaultValue){
			j$(this).val('').css('color', focusc);
		}
	})
	.blur(function(){
		if(j$(this).val() == this.defaultValue | j$(this).val() == ''){
			j$(this).val(this.defaultValue).css('color',defaultc);
		};
	});
	

});
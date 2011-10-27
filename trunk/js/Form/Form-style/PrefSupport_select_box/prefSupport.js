/*
 * PrefSupport.js
 *
 * Copyright (c) 2008 nori (norimania@gmail.com)
 * Licensed under the MIT
 *
 * $Date: 2008-07-18 23:00
 * $Update: 2008-07-23 9:00
 */
 
$(function(){
	$.prefSupport.fn();
	$.prefSupport02.fn();
});

(function($){
	$.prefSupport = {
		setting: {
			title: "クリックで確定します"
		},
		fn: function(){
			if($("select").length<1 && $(".prefSupport").length<1) return false;
			$(".prefSupport").each(function(){
				var thisId = $(this).attr("id");
				var input = document.createElement("input");
				$(input).insertAfter(this).attr({
					"name": $(this).attr("name")+"_dammy",
					"id": thisId+"_dammy",
					"value": "",
					"class": $(this).attr("class")
				});
				$("label[for='"+thisId+"']").attr("for",thisId+"_dammy");
				var hiddenInput = document.createElement("input");
				$(hiddenInput).attr({
					"name": $(this).attr("name"),
					"id": thisId,
					"type": "hidden",
					"value": ""
				}).insertBefore(input);
				var id = {
					dammy: "#"+thisId+"_dammy",
					hidden: "#"+thisId
				}
				var values = $("select"+id.hidden).children();
				var matId = thisId+"_mat";
				$("select"+id.hidden).attr("id",id.dammy+"_select");
				var dl = document.createElement("dl");
				$(dl).addClass("prefSupport").attr("id",matId).hide();				
				var createAnchor = function(target,parent){
					var anchor = document.createElement("a");
					var label = $(target).text();
					$(anchor).text(label).attr({
						"href": "#"+label,
						"name": $(target).val(),
						"title": $.prefSupport.setting.title
					});
					$(parent).append(anchor);
				}
				var insertValue = function(dammy,data){
					$("input"+id.dammy).val(dammy);
					$("input"+id.hidden).val(data);
				}
				for(var i=0,j=0;i<values.length;i++){
					if($(values[i]).is("optgroup")){
						var dt = document.createElement("dt");
						var label = $(values[i]).attr("label");
						$(dt).text(label);
						
						$(dl).append(dt);
						if(i!=0) j++;
					}else{
						if($(values[i]).prev().is("optgroup")){
							var dd = document.createElement("dd");
							$(dd).addClass("heading_"+j);
							$(dl).append(dd);
						}
						createAnchor(values[i],dd);
					}
					if($(values[i]).is(":selected")){
						insertValue($(values[i]).text(),$(values[i]).val());
					}
				}
				$(id.dammy).click(function(event){										   
					$("body").css("position","relative");
					//$(this).addClass("focus").attr("disabled","disabled");
					var pos = $(this).offset();
					$("#"+matId).css({
						"position": "absolute",
						"top": pos.top+($(this).height()*1.2),
						"left": pos.left-250
					});
					$("dl.prefSupport").not("#"+matId).hide();
					$("dl.prefSupport>dd.close").remove();
					$("dl.prefSupport").append("<dt class='close'>&nbsp;</dt><dd class='close'><a href='#' class='close'><img class='close' src='ico_close.gif' alt='' /><span>閉じる</span></a></dd>");
					$("#"+matId).show();
					$("a","#"+matId).click(function(){
						if (this.className != 'close') {
							insertValue($(this).attr("href").split("#")[1],$(this).attr("name"));
							$("dl.prefSupport").hide();
							$(id.dammy).removeAttr("disabled").removeClass("focus").removeClass("hover");
							return false;
						} else
						{
							$("dl.prefSupport").hide();
							$(id.dammy).removeAttr("disabled").removeClass("focus").removeClass("hover");
							return false;
						}
					}).mouseover(function(){
						if (this.className != 'close') {
					        insertValue($(this).attr("href").split("#")[1],$(this).attr("name"));
						}
					});															
					
					event.stopPropagation();
				}).hover(function(){
					$(this).addClass("hover");
				},function(){
					$(this).removeClass("hover");
				}).focus(function(){
					$(this).addClass("focus");
				}).blur(function(){
					$(this).removeClass("focus");
				});
				$("body").append(dl);
				$(this).remove();
				/*$("body").click(function(event){										
					$("dl.prefSupport").hide();
					$(id.dammy).removeAttr("disabled").removeClass("focus").removeClass("hover");
				});*/
			});
		}
	}
})(jQuery);

(function($){
	$.prefSupport02 = {
		setting: {
			title: "クリックで確定します"
		},
		fn: function(){
			if($("select").length<1 && $(".prefSupport02").length<1) return false;
			$(".prefSupport02").each(function(){
				var thisId = $(this).attr("id");
				var input = document.createElement("input");
				$(input).insertAfter(this).attr({
					"name": $(this).attr("name")+"_dammy",
					"id": thisId+"_dammy",
					"value": "",
					"class": $(this).attr("class")
				});
				$("label[for='"+thisId+"']").attr("for",thisId+"_dammy");
				var hiddenInput = document.createElement("input");
				$(hiddenInput).attr({
					"name": $(this).attr("name"),
					"id": thisId,
					"type": "hidden",
					"value": ""
				}).insertBefore(input);
				var id = {
					dammy:  "#"+thisId+"_dammy",
					hidden: "#"+thisId
				}
				var values = $("select"+id.hidden).children();
				var matId  = thisId+"_mat";
				$("select"+id.hidden).attr("id",id.dammy+"_select");
				var dl = document.createElement("dl");
				$(dl).addClass("prefSupport02").attr("id",matId).hide();
				var createAnchor = function(target,parent){
					var anchor = document.createElement("a");
					var label = $(target).text();
					$(anchor).text(label).attr({
						"href": "#"+label,
						"name": $(target).val(),
						"title": $.prefSupport02.setting.title
					});
					$(parent).append(anchor);
				}
				var insertValue = function(dammy,data){
					$("input"+id.dammy).val(dammy);
					$("input"+id.hidden).val(data);
				}
				for(var i=0,j=0;i<values.length;i++){
					if($(values[i]).is("optgroup")){						
						var dt = document.createElement("dt");
						var label = $(values[i]).attr("label");
						$(dt).text(label);
						
						$(dl).append(dt);
						if(i!=0) j++;
					}else{
						if($(values[i]).prev().is("optgroup")){
							var dd = document.createElement("dd");
							$(dd).addClass("heading_"+j);
							$(dl).append(dd);
						}
						createAnchor(values[i],dd);
					}
					if($(values[i]).is(":selected")){
						insertValue($(values[i]).text(),$(values[i]).val());
					}
				}
				$(id.dammy).click(function(event){
					$("body").css("position","relative");
					$(this).addClass("focus").attr("disabled","disabled");
					var pos = $(this).offset();
					$("#"+matId).css({
						"position": "absolute",
						"top": pos.top+($(this).height()*1.2),
						"left": pos.left-8,
						"background": "#fff"
					});
					$("dl.prefSupport02").not("#"+matId).hide();
					$("dl.prefSupport02>dd.close").remove();
					$("dl.prefSupport02").append("<dt class='close'>&nbsp;</dt><dd class='close'><a href='#' class='close'><img class='close' src='ico_close.gif' alt='' /><span>閉じる</span></a></dd>");
					$("#"+matId).show();
					$("a","#"+matId).click(function(){
						if (this.className != 'close') {
							insertValue($(this).attr("href").split("#")[1],$(this).attr("name"));
							$("dl.prefSupport02").hide();
							$(id.dammy).removeAttr("disabled").removeClass("focus").removeClass("hover");
							return false;
						}
						else
					    {
							$("dl.prefSupport02").hide();
							$(id.dammy).removeAttr("disabled").removeClass("focus").removeClass("hover");
							return false;
						}
					}).mouseover(function(){
						if (this.className != 'close') {
					        insertValue($(this).attr("href").split("#")[1],$(this).attr("name"));
						}
					});
					
					event.stopPropagation();
				}).hover(function(){
					$(this).addClass("hover");
				},function(){
					$(this).removeClass("hover");
				}).focus(function(){
					$(this).addClass("focus");
				}).blur(function(){
					$(this).removeClass("focus");
				});
				$("body").append(dl);
				$(this).remove();
				$("body").click(function(event){
					$("dl.prefSupport02").hide();
					$(id.dammy).removeAttr("disabled").removeClass("focus").removeClass("hover");
				});
			});
		}
	}
})(jQuery);
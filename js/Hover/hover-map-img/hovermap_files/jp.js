/**
 * @desc	リストページ・詳細ページ共通ファイル
 *
 * @category  特典いっぱい！お得な情報満載！光 Happyタウン
 * @package  ひかり情報局 地域Press
 * @author	$Author: c10@pricer.jp $
 * @since	$Date: 2011-10-05 16:46:21 +0900 (水, 10 5 2011)
 * @version $Rev: 150 $
 */
// 新着に表示する期間
var CFG_DISP_NEW_DAY  = 7;
// リストの1ページに表示する件数
var CFG_DISP_CNT      = 10;

var CFG_ROOT_URL  = "/pub/pages/hikarihappy/";

var areaNames = {
  "秩父エリア":"chichibu",
  "北部エリア":"hokubu",
  "南部エリア":"nanbu"
}; 



var catNames = {
  "new":"新着",
  "shopping":"ショッピング",
  "leisure":"レジャー・宿泊",
  "gourmet":"お食事",
  "lifestyle":"生活文化・学ぶ",
  "sports":"スポーツ",
  "etc":"その他"
}; 



var iconNames = {
  "new":"new",
  "shopping":"shopping",
  "leisure":"leisure",
  "gourmet":"food",
  "lifestyle":"learn",
  "sports":"sports",
  "etc":"etc"
}; 


var shopLat = "";
var shopLon = "";

$.extend({
	getUrlVars: function(){
		var vars = [], hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for(var i = 0; i < hashes.length; i++)
		{
			hash = hashes[i].split('=');
			vars.push(hash[0]);
				 vars[hash[0]] = hash[1];
			}
			return vars;
		},
		getUrlVar: function(name){
			return $.getUrlVars()[name];
		} 
});



function isNew( paramDate )
{
	//var myDate = paramDate.toString().split('-');
	var entryDate = new Date();

	var year = paramDate.substring(0, 4);
	var month = paramDate.substring(5, 7);
	var date = paramDate.substring(8, 10);

	//entryDate.setFullYear(myDate[0], parseInt(myDate[1]) - 1, parseInt(myDate[2]));
	
	
	entryDate = new Date(year, zeroSuppress(month) - 1,  zeroSuppress(date));

	var todayDate = new Date();
	
	var day = Math.floor((todayDate - entryDate) / ( 1000 * 60 * 60 * 24 ));
	
	//alert("paramDate:" + paramDate + "\n" + "year:" + year + "\n" + "month:" + month + "\n" + "date:" + date + "\n" + day + " " + todayDate+ "\n\n" + entryDate);
	//alert(day + " " + myDate[0] + myDate[1] + myDate[2] + " " + todayDate+ "\n\n" + entryDate);
	
	if (day <= CFG_DISP_NEW_DAY)
	{
		return true;
	}else{
		return false;
	}
}

function zeroSuppress( val ) {
	return val.replace( /^0+([0-9]+)/, "$1" );
}

function getXmlFromFileList(xml, cat ,isNewAndRecommend, paramArea){
	var cnt = 0;
	var lists = [];

	$(xml).find('file').each(function(){
		// 各カテゴリ用のXML ファイル名を取得							  
		var fileName = new String($(this).text());
		// 各カテゴリ用の識別子を取得
		var catName =  new String($(this).attr('catName').toString());
	
		// カテゴリの指定がありそのカテゴリが存在する場合は該当ファイルのみ読み込み
		if(catName == cat && cat != "")
		{
			
			$.ajax({
				type: "GET",
				url: fileName,
				dataType: "xml",
				global: true,
				cache: false,

				success: function(catxml) {
					$(catxml).find('shop').each(function(){
														 
						if(paramArea != undefined && paramArea != "")
						{
							if(paramArea == $(this).find('city').text())								 
							{
								lists.push({        
									catName:	 catName,
									catSubName:	 $(this).find('cat').text(),      
									shopId:		 $(this).find('id').text(),      
									shopName: 	 $(this).find('name').text(),
									shopCity:	 $(this).find('city').text(),
									shopAddr:	 $(this).find('addr').text(),
									shopCoupon:  $(this).find('coupon').text(),
									shopImage01: $(this).find('img1').text(),
									shopImage02: $(this).find('img2').text(),
									shopTelNum:  $(this).find('tel').text(),
									entryDate:	 $(this).find('date').text(),
									isRecommend: $(this).attr('recommend').toString()
								});	
							}
						}else{
							lists.push({        
								catName:	 catName,
								catSubName:	 $(this).find('cat').text(),      
								shopId:		 $(this).find('id').text(),      
								shopName: 	 $(this).find('name').text(),
								shopCity:	 $(this).find('city').text(),
								shopAddr:	 $(this).find('addr').text(),
								shopCoupon:  $(this).find('coupon').text(),
								shopImage01: $(this).find('img1').text(),
								shopImage02: $(this).find('img2').text(),
								shopTelNum:  $(this).find('tel').text(),
								entryDate:	 $(this).find('date').text(),
								isRecommend: $(this).attr('recommend').toString()
							});	
						}


					});
					cnt++;
				}
			});
			
		}else if(cat == ""){

			$.ajax({
				type: "GET",
				url: fileName,
				dataType: "xml",
				global: true,
		cache: false,

				success: function(catxml) {
					$(catxml).find('shop').each(function(){
						//alert("push" + $(this).attr('recommend').toString());
						//alert("push" + $(this).find('id').text());
						
						if(paramArea != undefined && paramArea != "")
						{
							
							if(paramArea == $(this).find('city').text())								 
							{
								lists.push({        
									catName:	 catName,
									catSubName:	 $(this).find('cat').text(),      
									shopId:		 $(this).find('id').text(),      
									shopName: 	 $(this).find('name').text(),
									shopCity:	 $(this).find('city').text(),
									shopAddr:	 $(this).find('addr').text(),
									shopCoupon:  $(this).find('coupon').text(),
									shopImage01: $(this).find('img1').text(),
									shopImage02: $(this).find('img2').text(),
									shopTelNum:  $(this).find('tel').text(),
									entryDate:	 $(this).find('date').text(),
									isRecommend: $(this).attr('recommend').toString()
								});	
							}
						}else{
							
							
							lists.push({        
								catName:	 catName,
								catSubName:	 $(this).find('cat').text(),      
								shopId:		 $(this).find('id').text(),      
								shopName: 	 $(this).find('name').text(),
								shopCity:	 $(this).find('city').text(),
								shopAddr:	 $(this).find('addr').text(),
								shopCoupon:  $(this).find('coupon').text(),
								shopImage01: $(this).find('img1').text(),
								shopImage02: $(this).find('img2').text(),
								shopTelNum:  $(this).find('tel').text(),
								entryDate:	 $(this).find('date').text(),
								isRecommend: $(this).attr('recommend').toString()
							});	
						}
					});
					cnt++;
				}
			});

		}
	});


    $(document).ajaxComplete(function(){ 
									  
		var rows = 	xsort(lists,"entryDate",1);	

		var lists1 = [];
		var lists2 = [];
		var lists3 = [];
		var lists4 = [];
		var lists5 = [];
		
		
		$.each(rows, function(){
			
			if(isNew(this.entryDate)){
				//新着
				lists1.push(this);
			}else{
				if(this.isRecommend == "true"){
					
					if(isNew(this.entryDate)){
						alert("a ")
						//新着
						lists1.push(this);
					}else{
						//オススメ
						lists2.push(this);
					}
				}else{
					//通常
					lists3.push(this);
				}			
			}
		});
				
		lists5 = lists4.concat(lists1,lists2,lists3);
		var i = 0;
/*		$.each(lists1, function(){
			lists5[i] = this;
			i++;
		});
		$.each(lists2, function(){
			lists5[i] = this;
			i++;
		});
		$.each(lists3, function(){
			lists5[i] = this;
			i++;
		});
*/									  
		showListByCat(lists5, cat , isNewAndRecommend);
	}); 
}

function xsort(rows, col){
    //二次元配列のソート
    //col:並べ替えの対象となる列
    //order:1=昇順、-1=降順
    rows.sort(function (b1, b2) { return b1[col] > b2[col] ? -1 : 1; } );
    return(rows);
}


function getXmlFromFileListDetail(xml){
	var lists = [];
	$(xml).find('file').each(function(){
		// 各カテゴリ用のXML ファイル名を取得							  
		var fileName = new String($(this).text());
		// 各カテゴリ用の識別子を取得
		var catName =  new String($(this).attr('catName').toString());
		
		if(genreId == catName)
		{
			$.ajax({
				type: "GET",
				url: fileName,
				dataType: "xml",
				global: true,
				success: function(catxml) {
					
					$(catxml).find('shop').each(function(){
														 
						//alert(shopId);
														 
						if(shopId.toString() == $(this).find('id').text().toString())
						{		

							lists.push({        
								catName:	 catName,
								catSubName:	 $(this).find('cat').text(),      
								shopId:		 $(this).find('id').text(),      
								shopName: 	 $(this).find('name').text(),
								shopCity:	 $(this).find('city').text(),
								shopAddr:	 $(this).find('addr').text(),
								shopCoupon:  $(this).find('coupon').text(),
								shopImage01: $(this).find('img1').text(),
								shopImage02: $(this).find('img2').text(),
								shopTelNum:  $(this).find('tel').text(),
								shopOpenTime:$(this).find('opentime').text(),
								shopCloseDay:$(this).find('closeday').text(),
								shopAccess:	 $(this).find('access').text(),
								shopParking: $(this).find('parking').text(),
								shopUrl:	 $(this).find('url').text(),
								shopLat:	 $(this).find('lat').text(),
								shopLon:	 $(this).find('lon').text(),
								shopComment: $(this).find('comment').text(),
								couponLimit: $(this).find('limit').text(),
								couponCaution: $(this).find('caution').text(),
								entryDate:	 $(this).find('date').text(),
								isRecommend: $(this).attr('recommend').toString()
							});
						}
					});
				}
			});
		}else{
			$.ajax({
				type: "GET",
				url: fileName,
				dataType: "xml",
				global: true,
				success: function(catxml) {
					$(catxml).find('shop').each(function(){
						if(shopId == $(this).find('id').text())
						{		

							lists.push({        
								catName:	 catName,
								catSubName:	 $(this).find('cat').text(),      
								shopId:		 $(this).find('id').text(),      
								shopName: 	 $(this).find('name').text(),
								shopCity:	 $(this).find('city').text(),
								shopAddr:	 $(this).find('addr').text(),
								shopCoupon:  $(this).find('coupon').text(),
								shopImage01: $(this).find('img1').text(),
								shopImage02: $(this).find('img2').text(),
								shopTelNum:  $(this).find('tel').text(),
								shopOpenTime:$(this).find('opentime').text(),
								shopCloseDay:$(this).find('closeday').text(),
								shopAccess:	 $(this).find('access').text(),
								shopParking: $(this).find('parking').text(),
								shopUrl:	 $(this).find('url').text(),
								shopLat:	 $(this).find('lat').text(),
								shopLon:	 $(this).find('lon').text(),
								shopComment: $(this).find('comment').text(),
								couponLimit: $(this).find('limit').text(),
								couponCaution: $(this).find('caution').text(),
								entryDate:	 $(this).find('date').text(),
								isRecommend: $(this).attr('recommend').toString()
							});
						}
					});
				}
			});
		}
	});


    $(document).ajaxStop(function(){

		showDetailByShopList(lists);
		
		
		var vars = $.getUrlVars();
		var genreId = vars["gen"];
		var key = "";
		
		for( key in iconNames )
		{
			if((genreId != undefined) && (genreId != ""))
			{
				var img = $("#coupon_cat_btn_" + iconNames[key] + " img");
				var src = "";
				
				if(genreId == key)
				{
					
					src = "../img/common/btn_" + iconNames[key] + "_on.png";
					
//					alert(img.attr('src'));
					
				}else{
					src = "../img/common/btn_" + iconNames[key] + "_off.png";
				}
				
				//img.empty();
				//.append('<img src="' + src + '" alt="' + catNames[key] + '" width="240" height="50">');
				
				
				img.attr('src', src);
			}
		}
		
		if(shopLat != "")
		{
			//alert(shopLat);
										  
			var divmain = GoomapDOMUtil.getElementById("map_mainmap");
			map = new GoomapMapMainControl(divmain, 479, 479);
			map.refreshView(new GoomapPoint(shopLat, shopLon), 7) ;
			map.addControler(new GoomapSliderMainBar(GoomapDOMUtil.getElementById("map_slider")));
			
			
			var point = new GoomapPoint(shopLat, shopLon);
			var marker;
		
			marker =  new GoomapMarker(point,"../img/common/ico_map.png");
			map.addOverlay(marker);
			
			map.refreshView(point, 7);
	
		}
		

		
	}); 
}




function changeGenre(catName, isNewAndRecommend) {

    $.ajax({
        type: "GET",
        url: '/pub/pages/hikarihappy/' + CFG_AREA + '/files.xml',
        dataType: "xml",
		global: true,

		//error: location.replace(CFG_ERRER_URL),
        success: function(xml) {
			getXmlFromFileList(xml, catName ,isNewAndRecommend);
		}
    });
}


function pageselectCallback(page_index, jq){
	$(".coupon_contents").empty();

                // Get number of elements per pagionation page from form
    var items_per_page = CFG_DISP_CNT

	var lists = $('.coupon_contents').data("lists");
	var cat = $('.coupon_contents').data("cat");
	var isNewAndRecommend = $('.coupon_contents').data("isNewAndRecommend");
	var coupon_count = $('.coupon_contents').data("coupon_count");
				
	//alert(coupon_count);
				
    var max_elem = Math.min((page_index+1) * items_per_page, coupon_count);
    var newcontent = '';
                
				
    // Iterate through a selection of the content and build an HTML string
	for(var i=page_index*items_per_page;i<max_elem;i++)
    {
		// 該当件数取得用
		var cnt = 0;
				
		$.each(lists, function(){//
			
			
			
			if(cat != "" && this.catName == cat)
			{
				if(cnt == i){
					$(".coupon_contents").append(getListHtmlFromOne(this));
				}
				cnt++;
				
			}else if(cat == ""){
				
				
				
				
				if(cnt == i){
					
					if(isNewAndRecommend == true){
//						alert("pageselectCallback " + cat + " " + isNewAndRecommend);
						if(isNew(this.entryDate) || this.isRecommend == "true"){
							$(".coupon_contents").append(getListHtmlFromOne(this));
							//cnt++;
						}
					}else{
						$(".coupon_contents").append(getListHtmlFromOne(this));
					}
					
				}
				
				if(isNewAndRecommend == false){
					cnt++;
				}else{
					if(isNew(this.entryDate) || this.isRecommend == "true"){
						cnt++;
					}
				}
			}
			
   		});
	}
	return false;
}


function showListByCat(lists, cat ,isNewAndRecommend) {
	var i = 0;
	
	$.each(lists, function(){
		
		if(cat != "" && this.catName == cat)
		{
			i++;
		}else if(cat == ""){
			if(isNewAndRecommend == true){
				if(isNew(this.entryDate) || this.isRecommend == "true"){
					i++;
				}
			}else{
				i++;
			}
		}
			
	});
	
	// ページングの為取得したリスト・カテゴリ・件数を一時保存
	$(".coupon_contents").data("lists",lists);
    $(".coupon_contents").data("cat",cat);
    $(".coupon_contents").data("isNewAndRecommend",isNewAndRecommend);
    $(".coupon_contents").data("coupon_count",i);

	 // Create pagination element
    $("#Pagination").pagination(i, {
		num_edge_entries: 1,
		num_display_entries: 10,
		callback: pageselectCallback,
		link_to:"#",
		prev_text:"前へ",
		next_text:"次へ",
		prev_show_always:false,
		next_show_always:false,
		items_per_page:CFG_DISP_CNT
	});
}



function showDetailByShopList(lists) {
	var bslisttex2 = "";
	var html = "";
	$.each(lists, function(){
		if(shopId == this.shopId){
			
			html = getDetailHtmlFromOne(this);
			
			shopLat = this.shopLat;
			shopLon = this.shopLon;
	
			bslisttex2 = '<a href="/">ホーム</a>&gt;<a href="/pub/pages/local/">こちら ひかり情報局 地域Press</a>&gt; <a href="/pub/pages/hikarihappy/' + CFG_AREA + '/">特典いっぱい！お得な情報満載！光Saitama Happyタウン</a>&gt; ' + this.shopName;
		}
		
	});
	
	$(".bslisttex2").empty().append(bslisttex2);
	$(".coupon_contents").empty().append(html);
}


function getListHtmlFromOne(list)
{
	var html = '';
	var flagImage = '';
	var detailUrl = CFG_ROOT_URL + CFG_AREA + '/shop/?id=' + list.shopId +'&amp;gen=' + list.catName;
	

	
	if(list.isRecommend == "true")
	{
		flagImage = '<img src="/pub/pages/hikarihappy/img/tab_ichioshi.gif" alt="イチオシ" width="49" height="49">';
	}

	//新着を優先
	if(isNew(list.entryDate) == true){
		flagImage = '<img src="/pub/pages/hikarihappy/img/tab_new.gif" alt="NEW" width="49" height="49">';
	}
	
	html = html + '<div class="coupon_list_btm">';
	html = html + '<div class="coupon_list_top">';
	html = html + '<div class="coupon_list">';
	html = html + '	<div class="frm_' + iconNames[list.catName] + '">';
	html = html + '	<p class="tab">' + flagImage + '</p>';
	html = html + '	<p class="name">' + list.shopName + '</p>';
	html = html + '	<p class="cap">' + list.shopCity + '</p>';
	html = html + '	<p class="img"><a href="' + detailUrl + '">';

	if(list.shopImage01 == "")
	{
		html = html + '	<img src="/pub/pages/hikarihappy/img/noimage.jpg" alt="" width="140" height="100"></a></p>';
	}else{
		html = html + '	<img src="' + list.shopImage01 + '" alt="" width="140" height="100"></a></p>';
	}
	
	html = html + '	<p class="txt1"><a href="' + detailUrl + '">' + list.shopCoupon + '</a></p>';
	html = html + '	<br class="clear">';
	html = html + '	<div class="detail clearfix">';
	html = html + '	<p class="txt2">住所／'  + list.shopAddr + '<br>TEL／' + list.shopTelNum + '</p>';
	html = html + '	<ul class="btn">';
	html = html + '		<li><img src="/pub/pages/hikarihappy/img/ico_' + iconNames[list.catName] + '.png" alt="' + catNames[list.catName] + '" width="104" height="43"></li>';
	html = html + '		<li><a href="' + detailUrl + '"><img onMouseOver="this.src=\'/pub/pages/hikarihappy/img/btn_detail_on.png\'" onMouseOut="this.src=\'/pub/pages/hikarihappy/img/btn_detail_off.png\'" src="/pub/pages/hikarihappy/img/btn_detail_off.png" alt="詳細はこちら" width="106" height="44"></a></li>';
	html = html + '	</ul>';
	html = html + '	</div>';
	html = html + '	</div>';
	html = html + '</div>';
	html = html + '</div>';
	html = html + '</div>';
			
	return html;

}

function getMonthEndDay(year, month) {
    var dt = new Date(year, month, 0);
    return dt.getDate();
}



function getLimitDate(year, month, day, addMonths) {
    month += addMonths;
    var endDay = getMonthEndDay(year, month);
    if(day > endDay) day = endDay;
    var dt = new Date(year, month - 1, day - 1);
    return dt;
}


function getDetailHtmlFromOne(list) {

		var html = '';											

		var jsonPath = CFG_AREA + '/' + list.catName + '/json/' + list.catName + list.shopId + '.js';
		var jsonNomapPath = CFG_AREA + '/' + list.catName + '/json/' + list.catName + list.shopId + '_nomap.js';
		
		if(location.protocol == "https:"){
			if(location.port == ""){
				var jsonUrl = 'https://flets-members.jp/member/pages/hikarihappy/coupon/index.html?json=https://flets-members.jp/pub/pages/hikarihappy/' + jsonPath;
				var jsonNomapUrl = 'https://flets-members.jp/member/pages/hikarihappy/coupon/index.html?json=https://flets-members.jp/pub/pages/hikarihappy/' + jsonNomapPath;
				
				var noMapUrl = 'https://flets-members.jp/pub/pages/htlogin/?page=' + encodeURIComponent(jsonNomapUrl);
				var MapUrl = 'https://flets-members.jp/pub/pages/htlogin/?page=' + encodeURIComponent(jsonUrl);
			}else{
			
				var jsonUrl = 'https://flets-members.jp:12830/member/pages/hikarihappy/coupon/index.html?json=https://flets-members.jp:12830/pub/pages/hikarihappy/' + jsonPath;
				var jsonNomapUrl = 'https://flets-members.jp:12830/member/pages/hikarihappy/coupon/index.html?json=https://flets-members.jp:12830/pub/pages/hikarihappy/' + jsonNomapPath;

				var noMapUrl = 'https://flets-members.jp:12830/pub/pages/htlogin/?page=' + encodeURIComponent(jsonNomapUrl);
				var MapUrl = 'https://flets-members.jp:12830/pub/pages/htlogin/?page=' + encodeURIComponent(jsonUrl);
			}
		}else{

			var jsonUrl = 'http://flets-membersrenew.trass.jp/member/pages/hikarihappy/coupon/index.html?json=http://flets-membersrenew.trass.jp/pub/pages/hikarihappy/' + jsonPath;
			var jsonNomapUrl = 'http://flets-membersrenew.trass.jp/member/pages/hikarihappy/coupon/index.html?json=http://flets-membersrenew.trass.jp/pub/pages/hikarihappy/' + jsonNomapPath;

//			var noMapUrl = 'http://flets-membersrenew.trass.jp/pub/pages/htlogin/?page=' + encodeURIComponent(jsonNomapUrl);
			var noMapUrl = 'http://flets-membersrenew.trass.jp/member/pages/hikarihappy/coupon/index.html?json=http://flets-membersrenew.trass.jp/pub/pages/hikarihappy/' + jsonNomapPath;
//			var MapUrl = 'http://flets-membersrenew.trass.jp/pub/pages/htlogin/?page=' + encodeURIComponent(jsonUrl);
			var MapUrl = 'http://flets-membersrenew.trass.jp/member/pages/hikarihappy/coupon/index.html?json=http://flets-membersrenew.trass.jp/pub/pages/hikarihappy/' + jsonPath;
		}
	
		
		var flagImage = "";
		if(list.isRecommend == "true")
		{
			flagImage = '<img src="../../img/tab_ichioshi.gif" alt="イチオシ" width="49" height="49">';
		}

		//新着を優先
		if(isNew(list.entryDate)){
			
			//alert(isNew(list.entryDate));
			
			flagImage = '<img src="../../img/tab_new.gif" alt="NEW" width="49" height="49">';
		}
	
		
		html = html + '<div class="coupon_list_btm">';
		html = html + '<div class="coupon_list_top">';
		html = html + '<div class="coupon_list">';
		html = html + '		<div class="frm_page">';
		html = html + '		<p class="tab">' + flagImage + '</p>';
		html = html + '		<p class="name">' + list.shopName + '</p>';
		html = html + '		<p class="cap">' + list.shopCity + '</p>';
		html = html + '		<h3>クーポン</h3>';
		html = html + '		<div class="detail">';
		// リンク先不明・・・
		//html = html + '		<p><a href="#">' + list.shopText01 + '</a></p>';
		html = html + '		<p>' + list.shopCoupon + '</p>';
		html = html + '		<div class="photo">';
		
		if(list.shopImage01 == "")
		{
			html = html + '		<img src="../../img/noimage.jpg" alt="' + list.shopName + '" width="236">';
		}else{
			html = html + '		<img src="' + list.shopImage01 + '" alt="' + list.shopName + '" width="236">';
		}

		if(list.shopImage02 == "")
		{
			html = html + '<img src="../../img/noimage.jpg" alt="' + list.shopName + '" width="236">';
		}else{
			html = html + '<img src="' + list.shopImage02 + '" alt="' + list.shopName + '" width="236">';
		}

		html = html + '		</div>';
		html = html + '		<p class="ico ' + iconNames[list.catName] + '"><img src="../../img/ico_' + iconNames[list.catName] + '.gif" alt="' + catNames[list.catName] + '" width="168" height="23">' + list.catSubName + '</p>';
		
		
		
		//　有効期限
		var tmpDate = new Date();

		var year = tmpDate.getFullYear();
		var month = tmpDate.getMonth();
		var date = tmpDate.getDate();
			
		var limitDate = getLimitDate(year, month + 1, date, 1);

		if(list.couponLimit != "")
		{
			html = html + '		<p class="limit">有効期限 ' + list.couponLimit + '</p>';
		}else{
			html = html + '		<p class="limit">有効期限 ' + limitDate.getFullYear() + '年' + (limitDate.getMonth()+1)  + '月' +  limitDate.getDate() + '日まで</p>';
		}
		
		
		//  注意事項
		html = html + '		<p>' + list.couponCaution + '</p>';
		html = html + '		</div>';
		html = html + '		<div id="coupon_mapset">';
		html = html + '		<div id="map_mainmap"></div><div id="slider_box"><div id="map_slider"></div></div>';
		html = html + '		<br class="clear">';
		html = html + '		</div>';
		html = html + '		<ul class="coupon_map_btn">';
		/*
		html = html + '		<li><a href="#" onclick="showPopUpNoMapById(' + list.shopId + ')"><img src="../../img/btn_print1_off.png" alt="地図なしクーポンを印刷する" width="154" height="36"></a></li>';
		html = html + '		<li><a href="#" onclick="showPopUpMapById(' + list.shopId + ')"><img src="../../img/btn_print2_off.png" alt="地図ありクーポンを印刷する" width="154" height="36"></a></li>';
		*/
		html = html + '		<li><a href="' + noMapUrl + '" target="_blank"><img src="../../img/btn_print1_off.png" alt="地図なしクーポンを印刷する" width="154" height="36"></a></li>';
		html = html + '		<li><a href="' + MapUrl + '" target="_blank"><img src="../../img/btn_print2_off.png" alt="地図ありクーポンを印刷する" width="154" height="36"></a></li>';
		
		// リンク先の確認
		html = html + '		<li><br /><a href="/pub/pages/hikarihappy/how_to_use1.html">特典の利用方法についてはこちら</a></li>';
		html = html + '		</ul>';
		html = html + '		<table cellspacing="0">';
		html = html + '		<tr>';
		html = html + '		<th class="tit">店名</th>';
		html = html + '		<td class="tit">' + list.shopName + '</td>';
		html = html + '		</tr>';
		html = html + '		<tr>';
		html = html + '		<th class="line">住所</th>';
//		html = html + '		<td>' + list.shopCity + list.shopAddr + '</td>';
		html = html + '		<td>' + list.shopAddr + '</td>';
		html = html + '		</tr>';
		html = html + '		<tr>';
		html = html + '		<th class="line">電話</th>';
		html = html + '		<td>' + list.shopTelNum + '</td>';
		html = html + '		</tr>';
		html = html + '		<tr>';
		html = html + '		<th class="line">営業時間</th>';
		html = html + '		<td>' + list.shopOpenTime + '</td>';
		html = html + '		</tr>';
		html = html + '		<tr>';
		html = html + '		<th class="line">定休日</th>';
		html = html + '		<td>' + list.shopCloseDay + '</td>';
		html = html + '		</tr>';
		
		html = html + '		<tr>';
		
		if(list.shopParking == "" && list.shopUrl == ""){
			html = html + '		<th>アクセス</th>';
		}else{
			html = html + '		<th class="line">アクセス</th>';
		}
		
		html = html + '		<td>' + list.shopAccess + '</td>';
		html = html + '		</tr>';

		if(list.shopParking != "")
		{
			// 駐車場がある場合
			html = html + '		<tr>';
			if(list.shopUrl != "")
			{
				html = html + '		<th class="line">駐車場</th>';
			}else{
				html = html + '		<th>駐車場</th>';
			}
			html = html + '		<td>' + list.shopParking + '</td>';
			html = html + '		</tr>';
		}
		
		if(list.shopUrl != "")
		{
			// URLがある場合
			html = html + '		<tr>';
			html = html + '		<th>HP</th>';
			html = html + '		<td><a href="' + list.shopUrl + '" target="_blank">' + list.shopUrl + '</a></td>';
			html = html + '		</tr>';
		}

		html = html + '		</table>';
		
		if(list.shopComment != "")
		{
			html = html + '		<table cellspacing="0">';
			html = html + '		<tr>';
			html = html + '		<th>お店からの<br>コメント</th>';
			html = html + '		<td>' + list.shopComment + '</td>';
			html = html + '		</tr>';
			html = html + '		</table>';
		}
		
		html = html + '<!--search:start-->';
		html = html + '<!--search:お店の名前#seg#' + list.shopName + '-->';
		html = html + '<!--search:お店の住所#seg#' + list.shopAddr + '-->';
		html = html + '<!--search:ジャンル#seg#' + list.catName + '-->';
		html = html + '<!--search:写真#seg#' + list.shopImage01 + '-->';
		html = html + '<!--search:お店の種類#seg#' + list.catSubName + '-->';
		html = html + '<!--search:クーポン内容#seg#' + list.shopCoupon + '-->';
		html = html + '<!--search:お店のPR#seg#' + list.shopComment + '-->';
		html = html + '<!--search:地図リンクボタン#seg#load_map(\'' + list.shopLat + '\',\'' + list.shopLon + '\', document.getElementById(\'myMap\')) -->';
		html = html + '<!--search:電話番号#seg#' + list.shopTelNum + '-->';
		html = html + '<!--search:定休日#seg#' + list.shopCloseDay + '-->';
		html = html + '<!--search:営業時間#seg#' + list.shopOpenTime + '-->';
		html = html + '<!--search:アクセス#seg#' + list.shopAccess + '-->';
		html = html + '<!--search:駐車場#seg#' + list.shopParking + '-->';
		html = html + '<!--search:サイトURL#seg#' + list.shopUrl + '-->';
		html = html + '<!--search:end-->';
		
		
		
		html = html + '		</div>';
		html = html + '</div>';
		html = html + '</div>';
		html = html + '</div>';
		
		return html;
		
}






function showPopUpMapById(shopId) {
	window.open('print_map.html?id=' + shopId, 'mywindow1', 'width=600, height=800, menubar=no, toolbar=no, scrollbars=yes');
}
function showPopUpNoMapById(shopId) {
	window.open('print_nomap.html?id=' + shopId, 'mywindow1', 'width=600, height=800, menubar=no, toolbar=no, scrollbars=yes');
}

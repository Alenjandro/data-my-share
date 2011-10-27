/**
 * SWFObject v1.5: Flash Player detection and embed - http://blog.deconcept.com/swfobject/
 *
 * SWFObject is (c) 2007 Geoff Stearns and is released under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 *
 */
if(typeof deconcept=="undefined"){var deconcept=new Object();}if(typeof deconcept.util=="undefined"){deconcept.util=new Object();}if(typeof deconcept.SWFObjectUtil=="undefined"){deconcept.SWFObjectUtil=new Object();}deconcept.SWFObject=function(_1,id,w,h,_5,c,_7,_8,_9,_a){if(!document.getElementById){return;}this.DETECT_KEY=_a?_a:"detectflash";this.skipDetect=deconcept.util.getRequestParameter(this.DETECT_KEY);this.params=new Object();this.variables=new Object();this.attributes=new Array();if(_1){this.setAttribute("swf",_1);}if(id){this.setAttribute("id",id);}if(w){this.setAttribute("width",w);}if(h){this.setAttribute("height",h);}if(_5){this.setAttribute("version",new deconcept.PlayerVersion(_5.toString().split(".")));}this.installedVer=deconcept.SWFObjectUtil.getPlayerVersion();if(!window.opera&&document.all&&this.installedVer.major>7){deconcept.SWFObject.doPrepUnload=true;}if(c){this.addParam("bgcolor",c);}var q=_7?_7:"high";this.addParam("quality",q);this.setAttribute("useExpressInstall",false);this.setAttribute("doExpressInstall",false);var _c=(_8)?_8:window.location;this.setAttribute("xiRedirectUrl",_c);this.setAttribute("redirectUrl","");if(_9){this.setAttribute("redirectUrl",_9);}};deconcept.SWFObject.prototype={useExpressInstall:function(_d){this.xiSWFPath=!_d?"expressinstall.swf":_d;this.setAttribute("useExpressInstall",true);},setAttribute:function(_e,_f){this.attributes[_e]=_f;},getAttribute:function(_10){return this.attributes[_10];},addParam:function(_11,_12){this.params[_11]=_12;},getParams:function(){return this.params;},addVariable:function(_13,_14){this.variables[_13]=_14;},getVariable:function(_15){return this.variables[_15];},getVariables:function(){return this.variables;},getVariablePairs:function(){var _16=new Array();var key;var _18=this.getVariables();for(key in _18){_16[_16.length]=key+"="+_18[key];}return _16;},getSWFHTML:function(){var _19="";if(navigator.plugins&&navigator.mimeTypes&&navigator.mimeTypes.length){if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","PlugIn");this.setAttribute("swf",this.xiSWFPath);}_19="<embed type=\"application/x-shockwave-flash\" src=\""+this.getAttribute("swf")+"\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\" style=\""+this.getAttribute("style")+"\"";_19+=" id=\""+this.getAttribute("id")+"\" name=\""+this.getAttribute("id")+"\" ";var _1a=this.getParams();for(var key in _1a){_19+=[key]+"=\""+_1a[key]+"\" ";}var _1c=this.getVariablePairs().join("&");if(_1c.length>0){_19+="flashvars=\""+_1c+"\"";}_19+="/>";}else{if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","ActiveX");this.setAttribute("swf",this.xiSWFPath);}_19="<object id=\""+this.getAttribute("id")+"\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\" style=\""+this.getAttribute("style")+"\">";_19+="<param name=\"movie\" value=\""+this.getAttribute("swf")+"\" />";var _1d=this.getParams();for(var key in _1d){_19+="<param name=\""+key+"\" value=\""+_1d[key]+"\" />";}var _1f=this.getVariablePairs().join("&");if(_1f.length>0){_19+="<param name=\"flashvars\" value=\""+_1f+"\" />";}_19+="</object>";}return _19;},write:function(_20){if(this.getAttribute("useExpressInstall")){var _21=new deconcept.PlayerVersion([6,0,65]);if(this.installedVer.versionIsValid(_21)&&!this.installedVer.versionIsValid(this.getAttribute("version"))){this.setAttribute("doExpressInstall",true);this.addVariable("MMredirectURL",escape(this.getAttribute("xiRedirectUrl")));document.title=document.title.slice(0,47)+" - Flash Player Installation";this.addVariable("MMdoctitle",document.title);}}if(this.skipDetect||this.getAttribute("doExpressInstall")||this.installedVer.versionIsValid(this.getAttribute("version"))){var n=(typeof _20=="string")?document.getElementById(_20):_20;n.innerHTML=this.getSWFHTML();return true;}else{if(this.getAttribute("redirectUrl")!=""){document.location.replace(this.getAttribute("redirectUrl"));}}return false;}};deconcept.SWFObjectUtil.getPlayerVersion=function(){var _23=new deconcept.PlayerVersion([0,0,0]);if(navigator.plugins&&navigator.mimeTypes.length){var x=navigator.plugins["Shockwave Flash"];if(x&&x.description){_23=new deconcept.PlayerVersion(x.description.replace(/([a-zA-Z]|\s)+/,"").replace(/(\s+r|\s+b[0-9]+)/,".").split("."));}}else{if(navigator.userAgent&&navigator.userAgent.indexOf("Windows CE")>=0){var axo=1;var _26=3;while(axo){try{_26++;axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash."+_26);_23=new deconcept.PlayerVersion([_26,0,0]);}catch(e){axo=null;}}}else{try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");}catch(e){try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");_23=new deconcept.PlayerVersion([6,0,21]);axo.AllowScriptAccess="always";}catch(e){if(_23.major==6){return _23;}}try{axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");}catch(e){}}if(axo!=null){_23=new deconcept.PlayerVersion(axo.GetVariable("$version").split(" ")[1].split(","));}}}return _23;};deconcept.PlayerVersion=function(_29){this.major=_29[0]!=null?parseInt(_29[0]):0;this.minor=_29[1]!=null?parseInt(_29[1]):0;this.rev=_29[2]!=null?parseInt(_29[2]):0;};deconcept.PlayerVersion.prototype.versionIsValid=function(fv){if(this.major<fv.major){return false;}if(this.major>fv.major){return true;}if(this.minor<fv.minor){return false;}if(this.minor>fv.minor){return true;}if(this.rev<fv.rev){return false;}return true;};deconcept.util={getRequestParameter:function(_2b){var q=document.location.search||document.location.hash;if(_2b==null){return q;}if(q){var _2d=q.substring(1).split("&");for(var i=0;i<_2d.length;i++){if(_2d[i].substring(0,_2d[i].indexOf("="))==_2b){return _2d[i].substring((_2d[i].indexOf("=")+1));}}}return "";}};deconcept.SWFObjectUtil.cleanupSWFs=function(){var _2f=document.getElementsByTagName("OBJECT");for(var i=_2f.length-1;i>=0;i--){_2f[i].style.display="none";for(var x in _2f[i]){if(typeof _2f[i][x]=="function"){_2f[i][x]=function(){};}}}};if(deconcept.SWFObject.doPrepUnload){if(!deconcept.unloadSet){deconcept.SWFObjectUtil.prepUnload=function(){__flash_unloadHandler=function(){};__flash_savedUnloadHandler=function(){};window.attachEvent("onunload",deconcept.SWFObjectUtil.cleanupSWFs);};window.attachEvent("onbeforeunload",deconcept.SWFObjectUtil.prepUnload);deconcept.unloadSet=true;}}if(!document.getElementById&&document.all){document.getElementById=function(id){return document.all[id];};}var getQueryParamValue=deconcept.util.getRequestParameter;var FlashObject=deconcept.SWFObject;var SWFObject=deconcept.SWFObject;

// Float media function
var richZIndex = 10000;
function expand24h(divID, url, name1, name2)
{
	eval(divID.substring(0, divID.lastIndexOf("_"))+".stopShow=true;");
	document.getElementById(divID).style.overflow = 'visible';
	document.getElementById(divID).style.zIndex = richZIndex++;
	var so = new SWFObject(url+name1, "mymovie", "100%", "100%", 8);
	so.addParam("wmode", "transparent");
	so.addParam("flashVars", "divID="+divID+"&path="+url+"&startbanner=1&filename1="+name1+"&filename2="+name2);
	so.write(divID+"_child");
}
function collapse24h(divID,url, name1, name2)
{						 
	document.getElementById(divID).style.overflow = 'hidden';
	document.getElementById(divID).style.zIndex = 0;
	var so = new SWFObject(url+name1, "mymovie", "100%", "100%", 8);
	so.addParam("wmode", "transparent");
	so.addParam("flashVars", "divID="+divID+"&path="+url+"&startbanner=0&filename1="+name1+"&filename2="+name2);
	so.write(divID+"_child");
}


// mBanner.js
/////////////////////////////////
// File Name: mBanner.js      //
// By: Manish Kumar Namdeo    //
/////////////////////////////////
// $Id: 24h.js 82 2009-01-14 08:55:31Z dungpt $

function fw24h_getFlash( object) {
	var str = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" border="0" height="'+object.height+'" width="'+object.width+'"><param name="movie" value="'+object.bannerPath+'"><param name="AllowScriptAccess" value="always"><param name="quality" value="High"><param name="wmode" value="transparent"><embed src="'+object.bannerPath+'" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" allowscriptaccess="always" height="'+object.height+'" width="'+object.width+'"></object>';
	return str;
}

function fw24h_getFloatFlash( object, flash_vars) {
	var str = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" border="0" height="100%" width="100%"><param name="movie" value="'+object.bannerPath+object.name1+'"><param name="AllowScriptAccess" value="always"><param name="quality" value="High"><param name="wmode" value="transparent"><param name="flashVars" value="'+flash_vars+'"><embed src="'+object.bannerPath+object.name1+'" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" allowscriptaccess="always" height="100%" width="100%" flashVars="'+flash_vars+'"></object>';
	return str;
}

// BANNER OBJECT
function Banner(objName){
        this.obj = objName;
        this.aNodes = [];
        this.bNodes = [];
        this.currentBanner = 0;//Math.floor(Math.random()*3);
		this.intLoopCount = 1;
		this.intBannerFix = -1;
		this.intBannerLong = 0;
		this.stopShow = false;
};

// ADD NEW BANNER
Banner.prototype.add = function(bannerType, bannerPath, bannerDuration, height, width, hyperlink) {
        this.aNodes[this.aNodes.length] = new Node(this.obj +"_"+ this.aNodes.length, bannerType, bannerPath, bannerDuration, height, width, hyperlink);
};
// Add2
Banner.prototype.add2 = function(bannerType, bannerPath, bannerDuration, height, width, hyperlink, position) {
        this.bNodes[this.bNodes.length] = new Node(this.obj +"_"+ this.bNodes.length, bannerType, bannerPath, bannerDuration, height, width, hyperlink, position);
};
// Add3 - float media
Banner.prototype.add3 = function(bannerType, bannerPath, bannerDuration, height, width, height2, width2, type, name1, name2) {
        this.aNodes[this.aNodes.length] = new NodeRich(this.obj +"_"+ this.aNodes.length, bannerType, bannerPath, bannerDuration, height, width, height2, width2, type, name1, name2);
};

// Node object
function Node(name, bannerType, bannerPath, bannerDuration, height, width, hyperlink) {
        this.name = name;
        this.bannerType = bannerType;
        this.bannerPath = bannerPath;
        this.bannerDuration = bannerDuration;
        this.height = height
        this.width = width;
        this.hyperlink= hyperlink;
};

function Node2(name, bannerType, bannerPath, bannerDuration, height, width, hyperlink, position) {
        this.name = name;
        this.bannerType = bannerType;
        this.bannerPath = bannerPath;
        this.bannerDuration = bannerDuration;
        this.height = height
        this.width = width;
        this.hyperlink= hyperlink;
        this.position= position;
};

function NodeRich(name, bannerType, bannerPath, bannerDuration, height, width, height2, width2, type, name1, name2) {
        this.name = name;
        this.bannerType = bannerType;
        this.bannerPath = bannerPath;
        this.bannerDuration = bannerDuration;
        this.height = height
        this.width = width;
		this.height2= height2;
        this.width2= width2;
        this.type= type;
        this.name1= name1;
        this.name2= name2;
};

// Outputs the banner to the page
Banner.prototype.toString = function() {
		this.currentBanner = Math.floor(Math.random()*this.aNodes.length); // lay ngau nhien 1 banner
        var str = ""
        for (var iCtr=0; iCtr < this.aNodes.length; iCtr++){
			var richbanner = (this.aNodes[iCtr].width2>0 && this.aNodes[iCtr].height2>0) ? true : false;
			if (richbanner) {
				switch (this.aNodes[iCtr].type) {
					case 'phai_xuong':
						parentStyle = '';
						childStyle = '';
						break;
					case 'phai_len':
						parentStyle = '';
						childStyle = 'top:'+(this.aNodes[iCtr].height-this.aNodes[iCtr].height2)+'px;';
						break;
					case 'trai_xuong':
						parentStyle = '';
						childStyle = 'left:'+(this.aNodes[iCtr].width-this.aNodes[iCtr].width2)+'px;';
						break;
					case 'trai_len':
						parentStyle = '';
						childStyle = 'top:'+(this.aNodes[iCtr].height-this.aNodes[iCtr].height2)+'px;';
						childStyle += 'left:'+(this.aNodes[iCtr].width-this.aNodes[iCtr].width2)+'px;';
						break;
					case 'len_xuong':
						parentStyle = '';
						childStyle = 'top:'+(this.aNodes[iCtr].height-this.aNodes[iCtr].height2)/2+'px;';
						break;
					case 'float_trai':
						parentStyle = 'position:fixed; bottom:0px; left:0px;';
						childStyle = 'left:0px; top:'+(this.aNodes[iCtr].height-this.aNodes[iCtr].height2)+'px;';
						break;
					case 'float_phai':
						parentStyle = 'position:fixed; bottom:0px; right:0px;';
						childStyle = 'left:'+(this.aNodes[iCtr].width-this.aNodes[iCtr].width2)+'px; top:'+(this.aNodes[iCtr].height-this.aNodes[iCtr].height2)+'px;';
						break;
					default:
						parentStyle = '';
						childStyle = '';
				}
				str += '<span id="'+this.aNodes[iCtr].name+'" '
				str += 'class="m_banner_hide" style="overflow:hidden;position:relative;';
				str += parentStyle;
				str += 'width:'+this.aNodes[iCtr].width+'px; height:'+this.aNodes[iCtr].height+'px;">\n';
				str += ' 	<span id="'+this.aNodes[iCtr].name+'_child" style="position: absolute;';
				str += 		childStyle;
				str += '	width:'+this.aNodes[iCtr].width2+'px; height:'+this.aNodes[iCtr].height2+'px">';
				str +=	 	fw24h_getFloatFlash( this.aNodes[iCtr], 'startbanner=0&divID='+this.aNodes[iCtr].name+'&path='+this.aNodes[iCtr].bannerPath+'&filename1='+this.aNodes[iCtr].name1+'&filename2='+this.aNodes[iCtr].name2);
				str += '	</span>';
				str += '</span>';
			}
			else {
				str = str + '<span name="'+this.aNodes[iCtr].name+'" '
                str = str + 'id="'+this.aNodes[iCtr].name+'" ';
                str = str + 'class="m_banner_hide" ';
                str = str + 'bgcolor="#FFFCDA" ';        // CHANGE BANNER COLOR HERE
                str = str + 'align="center" ';
                str = str + 'valign="top" >\n';
                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '<a href="'+this.aNodes[iCtr].hyperlink+'" target="_blank">';
                }
                       
                if ( this.aNodes[iCtr].bannerType == "FLASH" ){
					str  += fw24h_getFlash( this.aNodes[iCtr]);
                }else if ( this.aNodes[iCtr].bannerType == "IMAGE" ){
                        str = str + '<img src="'+this.aNodes[iCtr].bannerPath+'" ';
                        str = str + 'border="0" ';
                        str = str + 'height="'+this.aNodes[iCtr].height+'" ';
                        str = str + 'width="'+this.aNodes[iCtr].width+'">';
                }

				if( this.aNodes[iCtr].bannerType == "TEXT") {
					str = str + '<iframe width="'+this.aNodes[iCtr].width+'" height="'+this.aNodes[iCtr].height+'" src="'+this.aNodes[iCtr].bannerPath+'" marginwidth="0" marginheight="0" scrolling="no" frameborder="0"></iframe>'
				}

                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '</a>';
                }

                str += '</span>';
			}
        }
		document.write( str);
		str = '';
        return str;
};

// START THE BANNER ROTATION
Banner.prototype.start = function(){
	if (this.aNodes.length==0)
	{
		return true;
	}
	if( this.stopShow) {
		return true;
	}
	this.changeBanner();
	var thisBannerObj = this.obj;
	// CURRENT BANNER IS ALREADY INCREMENTED IN cahngeBanner() FUNCTION
	setTimeout(thisBannerObj+".start()", this.aNodes[this.currentBanner].bannerDuration * 1000);
}

// CHANGE BANNER
Banner.prototype.changeBanner = function(){
		//
    try {
		
		if( this.intLoopCount > (this.aNodes.length*3 + 1)) {
			this.intBannerLong++;
			if( this.intBannerLong%3 != 0) {
				return false;
			}
		}
		
		var thisBanner;
		var prevBanner = -1;
		if (this.currentBanner>this.aNodes.length-1)
		{
			this.currentBanner=0;
		}
		if (this.currentBanner < this.aNodes.length ){
			thisBanner = this.currentBanner;
			if (this.aNodes.length > 1){
				if ( thisBanner > 0 ){
					prevBanner = thisBanner - 1;
				}else{
					prevBanner = this.aNodes.length-1;
				}
			}
			if (this.currentBanner < this.aNodes.length - 1){
				this.currentBanner = this.currentBanner + 1;
			}else{
				this.currentBanner = 0;
			}
		}
		

		if (prevBanner >= 0){
			document.getElementById(this.aNodes[prevBanner].name).className = "m_banner_hide";
		}
		document.getElementById(this.aNodes[thisBanner].name).className = "m_banner_show";
		this.intLoopCount++;
		
	} catch(e) {}
}


// d_Banner2
// Written by ThaoDX
function d_Banner2(objName){
        this.obj = objName;
        this.aNodes = [];
        this.bNodes = [];
        this.currentBanner = 0;
       
};
// ADD NEW BANNER
d_Banner2.prototype.add = function(bannerType, bannerPath, height, width, hyperlink) {
		var bannerDuration = 0;
        this.aNodes[this.aNodes.length] = new Node(this.obj +"_"+ this.aNodes.length, bannerType, bannerPath, bannerDuration, height, width, hyperlink);
};
// add2
d_Banner2.prototype.add2 = function(bannerType, bannerPath, height, width, hyperlink, position) {
		var bannerDuration = 0;
        this.bNodes[this.bNodes.length] = new Node2(this.obj +"_"+ this.bNodes.length, bannerType, bannerPath, bannerDuration, height, width, hyperlink, position);
};
// Outputs the banner to the page
d_Banner2.prototype.toString = function() {
        var str = "";
		var BannerPostion = Math.floor(Math.random()*12321) % this.aNodes.length;
		var i = 1;
		for (var iCtr=BannerPostion; iCtr < this.aNodes.length; iCtr++){
                // iB for loop
				//str += "I: " + i + "<HR>";
				for(var iB=0; iB < this.bNodes.length; iB++){
					if(i == this.bNodes[iB].position){
						str = str + '<span name="'+this.bNodes[iB].name+'" '
						str = str + 'id="'+this.bNodes[iB].name+'" ';
						str = str + 'class="d_banner2_show" ';
						str = str + 'bgcolor="#FFFCDA" ';        // CHANGE BANNER COLOR HERE
						str = str + 'align="center" ';
						str = str + 'valign="top" >\n';
						if (this.bNodes[iB].hyperlink != ""){
								str = str + '<a href="'+this.bNodes[iB].hyperlink+'" target="_blank">';
						}
							   
						if ( this.bNodes[iB].bannerType == "FLASH" ){
							str  += fw24h_getFlash( this.bNodes[iB]);
						}else if ( this.bNodes[iB].bannerType == "IMAGE" ){
								str = str + '<img src="'+this.bNodes[iB].bannerPath+'" ';
								str = str + 'border="0" ';
								str = str + 'height="'+this.bNodes[iB].height+'" ';
								str = str + 'width="'+this.bNodes[iB].width+'">';
						}
						if( this.bNodes[iB].bannerType == "TEXT") {
							str = str + '<iframe width="'+this.bNodes[iB].width+'" height="'+this.bNodes[iB].height+'" src="'+this.bNodes[iB].bannerPath+'" marginwidth="0" marginheight="0" scrolling="no" frameborder="0"></iframe>'
						}
		
						if (this.bNodes[iB].hyperlink != ""){
								str = str + '</a>';
						}
		
						str += '</span>';
						// str = str + 'Thao Pro '+i;
						i++; continue;
					}
				}
				// End iB for loop
				str = str + '<span name="'+this.aNodes[iCtr].name+'" '
                str = str + 'id="'+this.aNodes[iCtr].name+'" ';
                str = str + 'class="d_banner2_show" ';
                str = str + 'bgcolor="#FFFCDA" ';        // CHANGE BANNER COLOR HERE
                str = str + 'align="center" ';
                str = str + 'valign="top" >\n';
                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '<a href="'+this.aNodes[iCtr].hyperlink+'" target="_blank">';
                }
                       
                if ( this.aNodes[iCtr].bannerType == "FLASH" ){
                        str  += fw24h_getFlash( this.aNodes[iCtr]);
                }else if ( this.aNodes[iCtr].bannerType == "IMAGE" ){
                        str = str + '<img src="'+this.aNodes[iCtr].bannerPath+'" ';
                        str = str + 'border="0" ';
                        str = str + 'height="'+this.aNodes[iCtr].height+'" ';
                        str = str + 'width="'+this.aNodes[iCtr].width+'">';
                }
				if( this.aNodes[iCtr].bannerType == "TEXT") {
					str = str + '<iframe width="'+this.aNodes[iCtr].width+'" height="'+this.aNodes[iCtr].height+'" src="'+this.aNodes[iCtr].bannerPath+'" marginwidth="0" marginheight="0" scrolling="no" frameborder="0"></iframe>'
				}

                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '</a>';
                }

                str += '</span>';
				i++;
        }
		//BannerPostion = 0;
		//return str;
		//str += "<HR>a " + BannerPostion + "  a <HR>";;
		for (var iCtr=0; iCtr < BannerPostion; iCtr++){
                // iB for loop
				for(var iB=0; iB < this.bNodes.length; iB++){
					if(i == this.bNodes[iB].position){
						str = str + '<span name="'+this.bNodes[iB].name+'" '
						str = str + 'id="'+this.bNodes[iB].name+'" ';
						str = str + 'class="d_banner2_show" ';
						str = str + 'bgcolor="#FFFCDA" ';        // CHANGE BANNER COLOR HERE
						str = str + 'align="center" ';
						str = str + 'valign="top" >\n';
						if (this.bNodes[iB].hyperlink != ""){
								str = str + '<a href="'+this.bNodes[iB].hyperlink+'" target="_blank">';
						}
							   
						if ( this.bNodes[iB].bannerType == "FLASH" ){
								str  += fw24h_getFlash( this.bNodes[iB]);
						}else if ( this.bNodes[iB].bannerType == "IMAGE" ){
								str = str + '<img src="'+this.bNodes[iB].bannerPath+'" ';
								str = str + 'border="0" ';
								str = str + 'height="'+this.bNodes[iB].height+'" ';
								str = str + 'width="'+this.bNodes[iB].width+'">';
						}
						if( this.bNodes[iB].bannerType == "TEXT") {
							str = str + '<iframe width="'+this.bNodes[iB].width+'" height="'+this.bNodes[iB].height+'" src="'+this.bNodes[iB].bannerPath+'" marginwidth="0" marginheight="0" scrolling="no" frameborder="0"></iframe>'
						}
		
						if (this.bNodes[iB].hyperlink != ""){
								str = str + '</a>';
						}
		
						str += '</span>';
						i++; continue;
					}
					else{
						//str = str + 'i: e '+i;	
					}
				}
				// End iB for loop
                str = str + '<span name="'+this.aNodes[iCtr].name+'" '
                str = str + 'id="'+this.aNodes[iCtr].name+'" ';
                //str = str + 'class="m_banner_hide" ';
                str = str + 'bgcolor="#FFFCDA" ';        // CHANGE BANNER COLOR HERE
                str = str + 'class="d_banner2_show" ';
                str = str + 'align="center" ';
                str = str + 'valign="top" >\n';
                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '<a href="'+this.aNodes[iCtr].hyperlink+'" target="_blank">';
                }
                       
                if ( this.aNodes[iCtr].bannerType == "FLASH" ){
                        str  += fw24h_getFlash( this.aNodes[iCtr]);
                }else if ( this.aNodes[iCtr].bannerType == "IMAGE" ){
                        str = str + '<img src="'+this.aNodes[iCtr].bannerPath+'" ';
                        str = str + 'border="0" ';
                        str = str + 'height="'+this.aNodes[iCtr].height+'" ';
                        str = str + 'width="'+this.aNodes[iCtr].width+'">';
                }
				if( this.aNodes[iCtr].bannerType == "TEXT") {
					str = str + '<iframe width="'+this.aNodes[iCtr].width+'" height="'+this.aNodes[iCtr].height+'" src="'+this.aNodes[iCtr].bannerPath+'" marginwidth="0" marginheight="0" scrolling="no" frameborder="0"></iframe>'
				}

                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '</a>';
                }
                str += '</span>';
				i++;
        }
		for(x = 0; x < this.bNodes.length; x++) {
			
			if(this.bNodes[x].position >= i) {
				str = str + '<span name="'+this.bNodes[x].name+'" '
				str = str + 'id="'+this.bNodes[x].name+'" ';
				str = str + 'class="d_banner2_show" ';
				str = str + 'bgcolor="#FFFCDA" ';        // CHANGE BANNER COLOR HERE
				str = str + 'align="center" ';
				str = str + 'valign="top" >\n';
				if (this.bNodes[x].hyperlink != ""){
					str = str + '<a href="'+this.bNodes[x].hyperlink+'" target="_blank">';
				}
							   
				if ( this.bNodes[x].bannerType == "FLASH" ){
					str  += fw24h_getFlash( this.bNodes[x]);
				}else if ( this.bNodes[x].bannerType == "IMAGE" ){
					str = str + '<img src="'+this.bNodes[x].bannerPath+'" ';
					str = str + 'border="0" ';
					str = str + 'height="'+this.bNodes[x].height+'" ';
					str = str + 'width="'+this.bNodes[x].width+'">';
				}
				if( this.bNodes[x].bannerType == "TEXT") {
					str = str + '<iframe width="'+this.bNodes[x].width+'" height="'+this.bNodes[x].height+'" src="'+this.bNodes[x].bannerPath+'" marginwidth="0" marginheight="0" scrolling="no" frameborder="0"></iframe>'
				}
		
				if (this.bNodes[x].hyperlink != ""){
					str = str + '</a>';
				}
		
				str += '</span>';	
			}
		}
		document.write( str);
        str = '';
        return str;
};

// d_Banner
// d_Banner
// Written by Dungpt
function d_Banner(objName){
        this.obj = objName;
        this.aNodes = [];
        this.currentBanner = 0;
       
};
// ADD NEW BANNER
d_Banner.prototype.add = function(bannerType, bannerPath, height, width, hyperlink) {
		var bannerDuration = 0;
        this.aNodes[this.aNodes.length] = new Node(this.obj +"_"+ this.aNodes.length, bannerType, bannerPath, bannerDuration, height, width, hyperlink);
};
// Outputs the banner to the page
d_Banner.prototype.toString = function() {
        var str = "";
		var BannerPostion = Math.floor(Math.random()*12321) % this.aNodes.length;
        for (var iCtr=BannerPostion; iCtr < this.aNodes.length; iCtr++){
                str = str + '<span name="'+this.aNodes[iCtr].name+'" '
                str = str + 'id="'+this.aNodes[iCtr].name+'" ';
                str = str + 'class="d_banner_show" ';
                str = str + 'bgcolor="#FFFCDA" ';        // CHANGE BANNER COLOR HERE
                str = str + 'align="center" ';
                str = str + 'valign="top" >\n';
                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '<a href="'+this.aNodes[iCtr].hyperlink+'" target="_blank">';
                }
                       
                if ( this.aNodes[iCtr].bannerType == "FLASH" ){
                        str  += fw24h_getFlash( this.aNodes[iCtr]);
                }else if ( this.aNodes[iCtr].bannerType == "IMAGE" ){
                        str = str + '<img src="'+this.aNodes[iCtr].bannerPath+'" ';
                        str = str + 'border="0" ';
                        str = str + 'height="'+this.aNodes[iCtr].height+'" ';
                        str = str + 'width="'+this.aNodes[iCtr].width+'">';
                }
				if( this.aNodes[iCtr].bannerType == "TEXT") {
					str = str + '<iframe width="'+this.aNodes[iCtr].width+'" height="'+this.aNodes[iCtr].height+'" src="'+this.aNodes[iCtr].bannerPath+'" marginwidth="0" marginheight="0" scrolling="no" frameborder="0"></iframe>'
				}

                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '</a>';
                }

                str += '</span>';
        }
		for (var iCtr=0; iCtr < BannerPostion; iCtr++){
                str = str + '<span name="'+this.aNodes[iCtr].name+'" '
                str = str + 'id="'+this.aNodes[iCtr].name+'" ';
                //str = str + 'class="m_banner_hide" ';
                str = str + 'bgcolor="#FFFCDA" ';        // CHANGE BANNER COLOR HERE
                str = str + 'class="d_banner_show" ';
                str = str + 'align="center" ';
                str = str + 'valign="top" >\n';
                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '<a href="'+this.aNodes[iCtr].hyperlink+'" target="_blank">';
                }
                       
                if ( this.aNodes[iCtr].bannerType == "FLASH" ){
                       str  += fw24h_getFlash( this.aNodes[iCtr]);
                }else if ( this.aNodes[iCtr].bannerType == "IMAGE" ){
                        str = str + '<img src="'+this.aNodes[iCtr].bannerPath+'" ';
                        str = str + 'border="0" ';
                        str = str + 'height="'+this.aNodes[iCtr].height+'" ';
                        str = str + 'width="'+this.aNodes[iCtr].width+'">';
                }
				if( this.aNodes[iCtr].bannerType == "TEXT") {
					str = str + '<iframe width="'+this.aNodes[iCtr].width+'" height="'+this.aNodes[iCtr].height+'" src="'+this.aNodes[iCtr].bannerPath+'" marginwidth="0" marginheight="0" scrolling="no" frameborder="0"></iframe>'
				}

                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '</a>';
                }

                str += '</span>';
        }
		document.write( str);
        str = '';
        return str;
};
// Written by Dungpt
function dFloat_Banner(objName){
        this.obj = objName;
        this.aNodes = [];
        this.currentBanner = 0;
       
};
// ADD NEW BANNER
dFloat_Banner.prototype.add = function(bannerType, bannerPath, height, width, hyperlink) {
		var bannerDuration = 0;
        this.aNodes[this.aNodes.length] = new Node(this.obj +"_"+ this.aNodes.length, bannerType, bannerPath, bannerDuration, height, width, hyperlink);
};
// Outputs the banner to the page
dFloat_Banner.prototype.toString = function() {
        var str = "";
		var BannerPostion = Math.floor(Math.random()*12321) % this.aNodes.length;
        for (var iCtr=BannerPostion; iCtr < this.aNodes.length; iCtr++){
                str = str + '<span name="'+this.aNodes[iCtr].name+'" '
                str = str + 'id="'+this.aNodes[iCtr].name+'" ';
                //str = str + 'class="m_banner_hide" ';
                str = str + 'bgcolor="#FFFCDA" ';        // CHANGE BANNER COLOR HERE
                str = str + 'class="d_Banner2_show" ';
                str = str + 'align="center" ';
                str = str + 'valign="top" >\n';
                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '<a href="'+this.aNodes[iCtr].hyperlink+'" target="_blank">';
                }
                       
                if ( this.aNodes[iCtr].bannerType == "FLASH" ){
					str  += fw24h_getFlash( this.aNodes[iCtr]);
                }else if ( this.aNodes[iCtr].bannerType == "IMAGE" ){
                        str = str + '<img src="'+this.aNodes[iCtr].bannerPath+'" ';
                        str = str + 'border="0" ';
                        str = str + 'height="'+this.aNodes[iCtr].height+'" ';
                        str = str + 'width="'+this.aNodes[iCtr].width+'">';
                }
				if( this.aNodes[iCtr].bannerType == "TEXT") {
					str = str + '<iframe width="'+this.aNodes[iCtr].width+'" height="'+this.aNodes[iCtr].height+'" src="'+this.aNodes[iCtr].bannerPath+'" marginwidth="0" marginheight="0" scrolling="no" frameborder="0"></iframe>'
				}

                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '</a>';
                }

                str += '</span>';
        }
		for (var iCtr=0; iCtr < BannerPostion; iCtr++){
                str = str + '<span name="'+this.aNodes[iCtr].name+'" '
                str = str + 'id="'+this.aNodes[iCtr].name+'" ';
                //str = str + 'class="m_banner_hide" ';
                str = str + 'bgcolor="#FFFCDA" ';        // CHANGE BANNER COLOR HERE
                str = str + 'align="center" ';
                str = str + 'valign="top" >\n';
                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '<a href="'+this.aNodes[iCtr].hyperlink+'" target="_blank">';
                }
                       
                if ( this.aNodes[iCtr].bannerType == "FLASH" ){
					str  += fw24h_getFlash( this.aNodes[iCtr]);
                }else if ( this.aNodes[iCtr].bannerType == "IMAGE" ){
                        str = str + '<img src="'+this.aNodes[iCtr].bannerPath+'" ';
                        str = str + 'border="0" ';
                        str = str + 'height="'+this.aNodes[iCtr].height+'" ';
                        str = str + 'width="'+this.aNodes[iCtr].width+'">';
                }
				if( this.aNodes[iCtr].bannerType == "TEXT") {
					str = str + '<iframe width="'+this.aNodes[iCtr].width+'" height="'+this.aNodes[iCtr].height+'" src="'+this.aNodes[iCtr].bannerPath+'" marginwidth="0" marginheight="0" scrolling="no" frameborder="0"></iframe>'
				}

                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '</a>';
                }

                str += '</span>';
        }
        return str;
};

function flashWrite(url,w,h,id,bg,vars){

     var flashStr=
    "<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' width='"+w+"' height='"+h+"' id='"+id+"' align='middle'>"+
    "<param name='allowScriptAccess' value='always' />"+
    "<param name='movie' value='"+url+"' />"+
    "<param name='FlashVars' value='"+vars+"' />"+
    "<param name='wmode' value='transparent' />"+
    "<param name='allowScriptAccess' value='sameDomain' />"+
    "<param name='menu' value='false' />"+
    "<param name='quality' value='high' />"+
    "<embed src='"+url+"' allowScriptAccess='sameDomain' FlashVars='"+vars+"' wmode='transparent' menu='false' quality='high' width='"+w+"' height='"+h+"' allowScriptAccess='always' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' />"+
    "</object>";
    document.write(flashStr);
}



// dungpt functions
function CreateBookmarkLink() {

	title = "24H.COM.VN - Th&#244;ng tin gi&#7843;i tr&#237; Vi&#7879;t Nam"; 
	url = "http://www.24h.com.vn";

	if (window.sidebar) { // Mozilla Firefox Bookmark
		window.sidebar.addPanel(title, url,"");
	} else if( window.external ) { // IE Favorite
		window.external.AddFavorite( url, title);
	} else if(window.opera && window.print) { // Opera Hotlist
		return true; 
	}
}

function MM_openBrWindow( theURL, winName, features) { //v2.0
	window.open(theURL,winName,features);
}

function j_substr( str, len) {
	str = String( str);
	if( str.length <= len) {
		document.write( str);
		return true;
	}
	var str2 = str.substring( 0, str.substring(0, len).lastIndexOf(" "));
	document.write( str2 + '...');
}

function GetXmlHttpObject(){
	var objXMLHttp = null;
	if( window.XMLHttpRequest){
		objXMLHttp = new XMLHttpRequest();
	}else if( window.ActiveXObject){
		objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	return objXMLHttp;
}

function AjaxAction( where, url){
	var xmlHttp = new GetXmlHttpObject()
	if(xmlHttp==null){
		return;
	}
	var bar = '<img src="/images/loading.gif" align="absmiddle" /> &#272;ang t&#7843;i d&#7919; li&#7879;u';
	document.getElementById( where).innerHTML = bar
	xmlHttp.onreadystatechange= function(){
		if(xmlHttp.readyState==4 || xmlHttp.readyState == 200){
			document.getElementById( where).innerHTML = xmlHttp.responseText
		}
	}
	// Set header so the called script knows that it's an XMLHttpRequest
	//xmlHttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
	xmlHttp.open( "GET", url, true);
	xmlHttp.send(null);
}


function Banner2(objName){
        this.obj = objName;
        this.aNodes = [];
        this.currentBanner = 0;//Math.floor(Math.random()*3);
		this.intLoopCount = 0;
		this.intBannerFix = -1;
		this.stopShow = false;
};

// ADD NEW BANNER
Banner2.prototype.add = function(bannerType, bannerPath, bannerDuration, height, width, hyperlink, desc) {
        this.aNodes[this.aNodes.length] = new Node3(this.obj +"_"+ this.aNodes.length, bannerType, bannerPath, bannerDuration, height, width, hyperlink, desc);
};

// Node object
function Node3(name, bannerType, bannerPath, bannerDuration, height, width, hyperlink, desc) {
        this.name = name;
        this.bannerType = bannerType;
        this.bannerPath = bannerPath;
        this.bannerDuration = bannerDuration;
        this.height = height
        this.width = width;
        this.hyperlink= hyperlink;
        this.desc= desc;
//        alert (name +"|" + bannerType +"|" + bannerPath +"|" + bannerDuration +"|" + height +"|" + width + "|" + hyperlink);
};

// Outputs the banner to the page
Banner2.prototype.toString = function() {
	this.currentBanner = Math.floor(Math.random()*this.aNodes.length); // lay ngau nhien 1 banner
        var str = ""
        for (var iCtr=0; iCtr < this.aNodes.length; iCtr++){
                str = str + '<span name="'+this.aNodes[iCtr].name+'" '
                str = str + 'id="'+this.aNodes[iCtr].name+'" ';
                str = str + 'class="m_banner_hide" ';
                str = str + 'bgcolor="#FFFCDA" ';        // CHANGE BANNER COLOR HERE
                str = str + 'align="center" ';
                str = str + 'valign="top" >\n';
                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '<a href="'+this.aNodes[iCtr].hyperlink+'" target="_blank">';
                }
                       
                if ( this.aNodes[iCtr].bannerType == "FLASH" ){
                        str  += fw24h_getFlash( this.aNodes[iCtr]);
                }else if ( this.aNodes[iCtr].bannerType == "IMAGE" ){
                        str = str + '<img src="'+this.aNodes[iCtr].bannerPath+'" ';
                        str = str + 'border="0" ';
                        str = str + 'height="'+this.aNodes[iCtr].height+'" ';
                        str = str + 'width="'+this.aNodes[iCtr].width+'">';
                }
				if( this.aNodes[iCtr].bannerType == "TEXT") {
					str = str + '<iframe width="'+this.aNodes[iCtr].width+'" height="'+this.aNodes[iCtr].height+'" src="'+this.aNodes[iCtr].bannerPath+'" marginwidth="0" marginheight="0" scrolling="no" frameborder="0"></iframe>'
				}

                if (this.aNodes[iCtr].hyperlink != ""){
                        str = str + '</a>';
                }

                str += '</span>';
				document.getElementById( this.obj + "_desc_" + iCtr).innerHTML = this.aNodes[iCtr].desc;
        }
        return str;
};

// START THE BANNER ROTATION
Banner2.prototype.start = function(){
	if (this.aNodes.length==0) {
		return true;
	}
	
	if( this.stopShow) {
		return true;
	}
	this.changeBanner();
	var thisBannerObj = this.obj;
	// CURRENT BANNER IS ALREADY INCREMENTED IN cahngeBanner() FUNCTION
	return setTimeout(thisBannerObj+".start()", this.aNodes[this.currentBanner].bannerDuration * 1000);
}

// CHANGE BANNER
Banner2.prototype.changeBanner = function(){
		//
    var thisBanner;
	if( this.currentBanner > this.aNodes.length-1) return true;
	var prevBanner = -1;
	if (this.currentBanner < this.aNodes.length ){
		thisBanner = this.currentBanner;
		if (this.aNodes.length > 1){
			if ( thisBanner > 0 ){
				prevBanner = thisBanner - 1;
			}else{
				prevBanner = this.aNodes.length-1;
			}
		}
		if (this.currentBanner < this.aNodes.length - 1){
			this.currentBanner = this.currentBanner + 1;
		}else{
			this.currentBanner = 0;
		}
	}
	for( ii=0; ii<this.aNodes.length; ii++) {
		if( document.getElementById(this.aNodes[ii].name)) {
			document.getElementById(this.aNodes[ii].name).className = "m_banner_hide";
			document.getElementById( this.obj + "_desc_" + ii).className = "m_banner_lost_focus";
		}
	}
	if (prevBanner >= 0){
		document.getElementById(this.aNodes[prevBanner].name).className = "m_banner_hide";
		document.getElementById( this.obj + "_desc_" + prevBanner).className = "m_banner_lost_focus";
	}
	document.getElementById(this.aNodes[thisBanner].name).className = "m_banner_show";
	document.getElementById( this.obj + "_desc_" + thisBanner).className = "m_banner_focus";
	
	//alert( this.currentBanner);
}

//////////////////////////////////////
// File Name: ddlevelsmenu.js 		//
// Using:							//
// app/views/layouts/news.php		//
//////////////////////////////////////

var ddlevelsmenu={

enableshim: true, //enable IFRAME shim to prevent drop down menus from being hidden below SELECT or FLASH elements? (tip: disable if not in use, for efficiency)

hideinterval: 200, //delay in milliseconds before entire menu disappears onmouseout.
effects: {enableswipe: true, enablefade: true, duration: 100},
httpsiframesrc: "blank.htm", //If menu is run on a secure (https) page, the IFRAME shim feature used by the script should point to an *blank* page *within* the secure area to prevent an IE security prompt. Specify full URL to that page on your server (leave as is if not applicable).

///No need to edit beyond here////////////////////

topmenuids: [], //array containing ids of all the primary menus on the page
topitems: {}, //object array containing all top menu item links
subuls: {}, //object array containing all ULs
lastactivesubul: {}, //object object containing info for last mouse out menu item's UL
topitemsindex: -1,
ulindex: -1,
hidetimers: {}, //object array timer
shimadded: false,
nonFF: !/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent), //detect non FF browsers
getoffset:function(what, offsettype){
	return (what.offsetParent)? what[offsettype]+this.getoffset(what.offsetParent, offsettype) : what[offsettype]
},

getoffsetof:function(el){
	el._offsets={left:this.getoffset(el, "offsetLeft"), top:this.getoffset(el, "offsetTop")}
},

getwindowsize:function(){
	this.docwidth=window.innerWidth? window.innerWidth-10 : this.standardbody.clientWidth-10
	this.docheight=window.innerHeight? window.innerHeight-15 : this.standardbody.clientHeight-18
},

gettopitemsdimensions:function(){
	for (var m=0; m<this.topmenuids.length; m++){
		var topmenuid=this.topmenuids[m]
		for (var i=0; i<this.topitems[topmenuid].length; i++){
			var header=this.topitems[topmenuid][i]
			var submenu=document.getElementById(header.getAttribute('rel'))
			header._dimensions={w:header.offsetWidth, h:header.offsetHeight, submenuw:submenu.offsetWidth, submenuh:submenu.offsetHeight}
		}
	}
},

isContained:function(m, e){
	var e=window.event || e
	var c=e.relatedTarget || ((e.type=="mouseover")? e.fromElement : e.toElement)
	while (c && c!=m)try {c=c.parentNode} catch(e){c=m}
	if (c==m)
		return true
	else
		return false
},

addpointer:function(target, imgclass, imginfo, BeforeorAfter){
	var pointer=document.createElement("img")
	pointer.src=imginfo[0]
	pointer.style.width=imginfo[1]+"px"
	pointer.style.height=imginfo[2]+"px"
	if(imgclass=="rightarrowpointer"){
		pointer.style.left=target.offsetWidth-imginfo[2]-2+"px"
	}
	pointer.className=imgclass
	var target_firstEl=target.childNodes[target.firstChild.nodeType!=1? 1 : 0] //see if the first child element within A is a SPAN (found in sliding doors technique)
	if (target_firstEl && target_firstEl.tagName=="SPAN"){
		target=target_firstEl //arrow should be added inside this SPAN instead if found
	}
	if (BeforeorAfter=="before")
		target.insertBefore(pointer, target.firstChild)
	else
		target.appendChild(pointer)
},

css:function(el, targetclass, action){
	var needle=new RegExp("(^|\\s+)"+targetclass+"($|\\s+)", "ig")
	if (action=="check")
		return needle.test(el.className)
	else if (action=="remove")
		el.className=el.className.replace(needle, "")
	else if (action=="add" && !needle.test(el.className))
		el.className+=" "+targetclass
},

addshimmy:function(target){
	var shim=(!window.opera)? document.createElement("iframe") : document.createElement("div") //Opera 9.24 doesnt seem to support transparent IFRAMEs
	shim.className="ddiframeshim"
	shim.setAttribute("src", location.protocol=="https:"? this.httpsiframesrc : "about:blank")
	shim.setAttribute("frameborder", "0")
	target.appendChild(shim)
	try{
		shim.style.filter='progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)'
	}
	catch(e){}
	return shim
},

positionshim:function(header, submenu, dir, scrollX, scrollY){
	if (header._istoplevel){
		var scrollY=window.pageYOffset? window.pageYOffset : this.standardbody.scrollTop
		var topgap=header._offsets.top-scrollY
		var bottomgap=scrollY+this.docheight-header._offsets.top-header._dimensions.h
		if (topgap>0){
			this.shimmy.topshim.style.left=scrollX+"px"
			this.shimmy.topshim.style.top=scrollY+"px"
			this.shimmy.topshim.style.width="99%"
			this.shimmy.topshim.style.height=topgap+"px" //distance from top window edge to top of menu item
		}
		if (bottomgap>0){
			this.shimmy.bottomshim.style.left=scrollX+"px"
			this.shimmy.bottomshim.style.top=header._offsets.top + header._dimensions.h +"px"
			this.shimmy.bottomshim.style.width="99%"
			this.shimmy.bottomshim.style.height=bottomgap+"px" //distance from bottom of menu item to bottom window edge
		}
	}
},

hideshim:function(){
	this.shimmy.topshim.style.width=this.shimmy.bottomshim.style.width=0
	this.shimmy.topshim.style.height=this.shimmy.bottomshim.style.height=0
},


buildmenu:function(mainmenuid, header, submenu, submenupos, istoplevel, dir){
	header._master=mainmenuid //Indicate which top menu this header is associated with
	header._pos=submenupos //Indicate pos of sub menu this header is associated with
	header._istoplevel=istoplevel
	if (istoplevel){
		this.addEvent(header, function(e){
		ddlevelsmenu.hidemenu(ddlevelsmenu.subuls[this._master][parseInt(this._pos)])
		}, "click")
	}
	this.subuls[mainmenuid][submenupos]=submenu
	header._dimensions={w:header.offsetWidth, h:header.offsetHeight, submenuw:submenu.offsetWidth, submenuh:submenu.offsetHeight}
	this.getoffsetof(header)
	submenu.style.left=0
	submenu.style.top=0
	submenu.style.visibility="hidden"
	this.addEvent(header, function(e){ //mouseover event
		if (!ddlevelsmenu.isContained(this, e)){
			var submenu=ddlevelsmenu.subuls[this._master][parseInt(this._pos)]
			if (this._istoplevel){
				ddlevelsmenu.css(this, "selected", "add")
			clearTimeout(ddlevelsmenu.hidetimers[this._master][this._pos])
			}
			ddlevelsmenu.getoffsetof(header)
			var scrollX=window.pageXOffset? window.pageXOffset : ddlevelsmenu.standardbody.scrollLeft
			var scrollY=window.pageYOffset? window.pageYOffset : ddlevelsmenu.standardbody.scrollTop
			var submenurightedge=this._offsets.left + this._dimensions.submenuw + (this._istoplevel && dir=="topbar"? 0 : this._dimensions.w)
			var submenubottomedge=this._offsets.top + this._dimensions.submenuh
			//Sub menu starting left position
			var menuleft=(this._istoplevel? this._offsets.left + (dir=="sidebar"? this._dimensions.w : 0) : this._dimensions.w)
			if (submenurightedge-scrollX>ddlevelsmenu.docwidth){
				menuleft+= -this._dimensions.submenuw + (this._istoplevel && dir=="topbar" ? this._dimensions.w : -this._dimensions.w)
			}
			submenu.style.left=menuleft+"px"
			//Sub menu starting top position
			var menutop=(this._istoplevel? this._offsets.top + (dir=="sidebar"? 0 : this._dimensions.h) : this.offsetTop)
			if (submenubottomedge-scrollY>ddlevelsmenu.docheight){ //no room downwards?
				if (this._dimensions.submenuh<this._offsets.top+(dir=="sidebar"? this._dimensions.h : 0)-scrollY){ //move up?
					menutop+= - this._dimensions.submenuh + (this._istoplevel && dir=="topbar"? -this._dimensions.h : this._dimensions.h)
				}
				else{ //top of window edge
					menutop+= -(this._offsets.top-scrollY) + (this._istoplevel && dir=="topbar"? -this._dimensions.h : 0)
				}
			}
			submenu.style.top=menutop+"px"
			if (ddlevelsmenu.enableshim && (ddlevelsmenu.effects.enableswipe==false || ddlevelsmenu.nonFF)){ //apply shim immediately only if animation is turned off, or if on, in non FF2.x browsers
				ddlevelsmenu.positionshim(header, submenu, dir, scrollX, scrollY)
			}
			else{
				submenu.FFscrollInfo={x:scrollX, y:scrollY}
			}
			ddlevelsmenu.showmenu(header, submenu, dir)
		}
	}, "mouseover")
	this.addEvent(header, function(e){ //mouseout event
		var submenu=ddlevelsmenu.subuls[this._master][parseInt(this._pos)]
		if (this._istoplevel){
			if (!ddlevelsmenu.isContained(this, e) && !ddlevelsmenu.isContained(submenu, e)) //hide drop down ul if mouse moves out of menu bar item but not into drop down ul itself
				ddlevelsmenu.hidemenu(submenu)
		}
		else if (!this._istoplevel && !ddlevelsmenu.isContained(this, e)){
			ddlevelsmenu.hidemenu(submenu)
		}

	}, "mouseout")
},

setopacity:function(el, value){
	el.style.opacity=value
	if (typeof el.style.opacity!="string"){ //if it's not a string (ie: number instead), it means property not supported
		el.style.MozOpacity=value
		if (el.filters){
			el.style.filter="progid:DXImageTransform.Microsoft.alpha(opacity="+ value*100 +")"
		}
	}
},

showmenu:function(header, submenu, dir){
	if (this.effects.enableswipe || this.effects.enablefade){
		if (this.effects.enableswipe){
			var endpoint=(header._istoplevel && dir=="topbar")? header._dimensions.submenuh : header._dimensions.submenuw
			submenu.style.width=submenu.style.height=0
			submenu.style.overflow="hidden"
		}
		if (this.effects.enablefade){
			this.setopacity(submenu, 0) //set opacity to 0 so menu appears hidden initially
		}
		submenu._curanimatedegree=0
		submenu.style.visibility="visible"
		clearInterval(submenu._animatetimer)
		submenu._starttime=new Date().getTime() //get time just before animation is run
		submenu._animatetimer=setInterval(function(){ddlevelsmenu.revealmenu(header, submenu, endpoint, dir)}, 10)
	}
	else{
		submenu.style.visibility="visible"
	}
},

revealmenu:function(header, submenu, endpoint, dir){
	var elapsed=new Date().getTime()-submenu._starttime //get time animation has run
	if (elapsed<this.effects.duration){
		if (this.effects.enableswipe){
			if (submenu._curanimatedegree==0){ //reset either width or height of sub menu to "auto" when animation begins
				submenu.style[header._istoplevel && dir=="topbar"? "width" : "height"]="auto"
			}
			submenu.style[header._istoplevel && dir=="topbar"? "height" : "width"]=(submenu._curanimatedegree*endpoint)+"px"
		}
		if (this.effects.enablefade){
			this.setopacity(submenu, submenu._curanimatedegree)
		}
	}
	else{
		clearInterval(submenu._animatetimer)
		if (this.effects.enableswipe){
			submenu.style.width="auto"
			submenu.style.height="auto"
			submenu.style.overflow="visible"
		}
		if (this.effects.enablefade){
			this.setopacity(submenu, 1)
			submenu.style.filter=""
		}
		if (this.enableshim && submenu.FFscrollInfo) //if this is FF browser (meaning shim hasn't been applied yet
			this.positionshim(header, submenu, dir, submenu.FFscrollInfo.x, submenu.FFscrollInfo.y)
	}
	submenu._curanimatedegree=(1-Math.cos((elapsed/this.effects.duration)*Math.PI)) / 2
},

hidemenu:function(submenu){
	if (typeof submenu._pos!="undefined"){ //if submenu is outermost UL drop down menu
		this.css(this.topitems[submenu._master][parseInt(submenu._pos)], "selected", "remove")
		if (this.enableshim)
			this.hideshim()
	}
	clearInterval(submenu._animatetimer)
	submenu.style.left=0
	submenu.style.top="-1000px"
	submenu.style.visibility="hidden"
},


addEvent:function(target, functionref, tasktype) {
	if (target.addEventListener)
		target.addEventListener(tasktype, functionref, false);
	else if (target.attachEvent)
		target.attachEvent('on'+tasktype, function(){return functionref.call(target, window.event)});
},

init:function(mainmenuid, dir){
	this.standardbody=(document.compatMode=="CSS1Compat")? document.documentElement : document.body
	this.topitemsindex=-1
	this.ulindex=-1
	this.topmenuids.push(mainmenuid)
	this.topitems[mainmenuid]=[] //declare array on object
	this.subuls[mainmenuid]=[] //declare array on object
	this.hidetimers[mainmenuid]=[] //declare hide entire menu timer
	if (this.enableshim && !this.shimadded){
		this.shimmy={}
		this.shimmy.topshim=this.addshimmy(document.body) //create top iframe shim obj
		this.shimmy.bottomshim=this.addshimmy(document.body) //create bottom iframe shim obj
		this.shimadded=true
	}
	var menubar=document.getElementById(mainmenuid)
	var alllinks=menubar.getElementsByTagName("a")
	this.getwindowsize()
	for (var i=0; i<alllinks.length; i++){
		if (alllinks[i].getAttribute('rel')){
			this.topitemsindex++
			this.ulindex++
			var menuitem=alllinks[i]
			this.topitems[mainmenuid][this.topitemsindex]=menuitem //store ref to main menu links
			var dropul=document.getElementById(menuitem.getAttribute('rel'))
			document.body.appendChild(dropul) //move main ULs to end of document
			dropul.style.zIndex=2000 //give drop down menus a high z-index
			dropul._master=mainmenuid  //Indicate which main menu this main UL is associated with
			dropul._pos=this.topitemsindex //Indicate which main menu item this main UL is associated with
			this.addEvent(dropul, function(){ddlevelsmenu.hidemenu(this)}, "click")
			var arrowclass=(dir=="sidebar")? "rightarrowpointer" : "downarrowpointer"
			this.buildmenu(mainmenuid, menuitem, dropul, this.ulindex, true, dir) //build top level menu
			dropul.onmouseover=function(){
				clearTimeout(ddlevelsmenu.hidetimers[this._master][this._pos])
			}
			this.addEvent(dropul, function(e){ //hide menu if mouse moves out of main UL element into open space
				if (!ddlevelsmenu.isContained(this, e) && !ddlevelsmenu.isContained(ddlevelsmenu.topitems[this._master][parseInt(this._pos)], e)){
					var dropul=this
					if (ddlevelsmenu.enableshim)
						ddlevelsmenu.hideshim()
					ddlevelsmenu.hidetimers[this._master][this._pos]=setTimeout(function(){
						ddlevelsmenu.hidemenu(dropul)
					}, ddlevelsmenu.hideinterval)
				}
			}, "mouseout")
			var subuls=dropul.getElementsByTagName("ul")
			for (var c=0; c<subuls.length; c++){
				this.ulindex++
				var parentli=subuls[c].parentNode
				this.buildmenu(mainmenuid, parentli, subuls[c], this.ulindex, false, dir) //build sub level menus
			}
		}
	} //end for loop
	this.addEvent(window, function(){ddlevelsmenu.getwindowsize(); ddlevelsmenu.gettopitemsdimensions()}, "resize")
},

setup:function(mainmenuid, dir){
	this.addEvent(window, function(){ddlevelsmenu.init(mainmenuid, dir)}, "load")
}

}

//////////////////////////////////////
// File Name: dhtml-menu.js 		//
// Using:							//
// app/views/layouts/default.php	//
//////////////////////////////////////

function at_display(x)
{
  var win = window.open();
  for (var i in x) win.document.write(i+' = '+x[i]+'<br>');
}

// ***** DropDown Box **********************************************************

var at_timeout = 10;

// ***** Show Aux *****

function at_show_aux(parent, child)
{
  var p = document.getElementById(parent);
  var c = document.getElementById(child);

  p.className        = "active";

  if (c.offsetWidth <= 0)
  {
    c.style.position   = "absolute";
    c.style.visibility = "visible";
    c.style.display    = "block";
  }

  var direction = undefined;
  if (p.parentNode && p.parentNode["at_position"] == "x")
    direction = p.parentNode["at_direction"];

  var top   = (c["at_position"] == "y") ?  p.offsetHeight : 0;
  var left1 = (c["at_position"] == "x") ?  p.offsetWidth  : 0;
  var left2 = (c["at_position"] == "x") ? -c.offsetWidth  : 0;
  var left3 = (c["at_position"] == "x") ?  p.offsetWidth  : 0;

  for (; p; p = p.offsetParent)
  {
    if (p.style.position != 'absolute')
    {
      left1 += p.offsetLeft;
      left2 += p.offsetLeft;
      top   += p.offsetTop;
    }
    left3 += p.offsetLeft;
  }

  if (direction)
  {
    left = (direction == 'right') ? left1 : left2;
    c['at_direction'] = direction;
  }
  else
  {
    left = (left3+c.offsetWidth < document.body.offsetWidth) ? left1 : left2;
    c['at_direction'] = (left3+c.offsetWidth < document.body.offsetWidth) ? 'right' : 'left';
  }

  c.style.position   = "absolute";
  c.style.visibility = "visible";
  c.style.display    = "block";
  c.style.top        = top +'px';
  c.style.left       = left+'px';
}

// ***** Hide Aux *****

function at_hide_aux(parent, child)
{
  document.getElementById(parent).className        = "parent";
  document.getElementById(child ).style.visibility = "hidden";
  document.getElementById(child ).style.display    = "block";
}

// ***** Show *****

function at_show(e)
{
  var p = document.getElementById(this["at_parent"]);
  var c = document.getElementById(this["at_child" ]);

  at_show_aux(p.id, c.id);

  
  clearTimeout(c["at_timeout"]);
}

// ***** Hide *****

function at_hide()
{
  var c = document.getElementById(this["at_child"]);

  c.style.visibility = "hidden";

  c["at_timeout"] = setTimeout("at_hide_aux('"+this["at_parent"]+"', '"+this["at_child" ]+"')", at_timeout);
}

// ***** Attach *****

function at_attach(parent, child, position)
{
  p = document.getElementById(parent);
  c = document.getElementById(child );

  p["at_child"]    = c.id;
  c["at_child"]    = c.id;
  p["at_parent"]   = p.id;
  c["at_parent"]   = p.id;
  c["at_position"] = position;

  p.onmouseover = at_show;
  p.onmouseout  = at_hide;
  c.onmouseover = at_show;
  c.onmouseout  = at_hide;
}

// ***** DropDown Menu *********************************************************

// ***** Build Aux *****

function dhtmlmenu_build_aux(parent, child, position)
{
  document.getElementById(parent).className = "parent";

  document.write('<div class="vert_menu" id="'+parent+'_child" style="z-index:11000">');

  var n = 0;
  for (var i in child)
  {
    if (i == '-')
    {
      document.getElementById(parent).href = child[i];
      continue;
    }

    if (typeof child[i] == "object")
    {
      document.write('<a class="parent" id="'+parent+'_'+n+'">'+i+'</a>');

      dhtmlmenu_build_aux(parent+'_'+n, child[i], "x");
    }
    else{
	//	document.write('<a id="'+parent+'_'+n+'" href="'+child[i]+'">'+i+'</a>');
		//document.write(child[i]);
		if( child[i].match('newwindow')) {
			child[i] = child[i].replace( /newwindow:/, 'javascript:');
			document.write('<a id="'+parent+'_'+n+'" href2="#" href="'+child[i]+'">'+i+'</a>');
		}else{
			document.write('<a id="'+parent+'_'+n+'" href="'+child[i]+'">'+i+'</a>');
		}
	}
    n++;
  }

  document.write('</div>');

  at_attach(parent, parent+"_child", position);
}

// ***** Build *****

function dhtmlmenu_build(menu)
{
  for (var i in menu) dhtmlmenu_build_aux(i, menu[i], "y");
}

///////////////////////////////
// INDEX TAB BOX
///////////////////////////////

function indexTabOver( tab_id, tab_group) {
	document.getElementById('tab1_' + tab_id).innerHTML = '<img src="/images/index_box_01_04.gif" width="4" height="17" />';
	document.getElementById('tab3_' + tab_id).innerHTML = '<img src="/images/index_box_01_06.gif" width="5" height="17" />';
	document.getElementById('tab4_' + tab_id).innerHTML = '<img src="/images/index_box_01_10.gif" width="4" height="10" />';
	document.getElementById('tab5_' + tab_id).innerHTML = '<img src="/images/index_box_01_11.gif" width="57" height="10" alt="">';
	document.getElementById("tab5_" + tab_id).style.background = "url(/images/index_box_01_15.gif)";
	document.getElementById("tab2_" + tab_id).style.background = "#80C141 url(/images/index_box_01_14.gif)";
	document.getElementById("tab2_" + tab_id).style.fontWeight='bold';
	document.getElementById("tab2_" + tab_id).style.color = "#ffffff";
	document.getElementById("tab2_" + tab_id).className = "home_index_tab_title_over";
	document.getElementById('tab6_' + tab_id).innerHTML = '<img src="/images/index_box_01_12.gif" width="4" height="10" />';
	document.getElementById('tabContent_' + tab_id).style.display = "block";
}


function fw24h_trackPageview( filename) {
	var url = filename + '?dd=' + (new Date).getTime();
	
	AjaxAction( 'fw24h_trackPageview', url);
}

// Popup images
function openNewImage(file, imgText) {	 	
	if (file.lang == 'no-popup') return;
	picfile = new Image();
	picfile.src =(file.src);
	width=picfile.width;
	height=picfile.height;
	
	if (imgText!='' && height>0) {
		height += 40;
	}
	else if (height==0) {
		height = screen.height;
	}

	winDef = 'status=no,resizable=yes,scrollbars=no,toolbar=no,location=no,fullscreen=no,titlebar=yes,height='.concat(height).concat(',').concat('width=').concat(width).concat(',');
	winDef = winDef.concat('top=').concat((screen.height - height)/2).concat(',');
	winDef = winDef.concat('left=').concat((screen.width - width)/2);
	newwin = open('', '_blank', winDef);

	newwin.document.writeln('<style>a:visited{color:blue;text-decoration:none}</style>');
	newwin.document.writeln('<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">');
	newwin.document.writeln('<div style="width:100%;height:100%;overflow:auto;"><a style="cursor:pointer" href="javascript:window.close()"><img src="', file.src, '" border=0></a>');
	if (imgText != '') {
		newwin.document.writeln('<div align="center" style="padding-top:5px;font-weight:bold;font-family:arial,Verdana,Tahoma;color:blue">', imgText , '</div></div>');
	}
	newwin.document.writeln('</body>');
	newwin.document.close();
}

function getElementsByClassName(searchClass, node, tag) {
	var classElements = new Array();
	if (node == null) {
		node = document;
	}
	if (tag == null) {
		tag = '*';
	}
	var els = node.getElementsByTagName(tag);
	var elsLen = els.length;
	var pattern = new RegExp("(^|\\s)" + searchClass + "(\\s|$)");
	for (var i = 0, j = 0; i < elsLen; i++) {
		if (pattern.test(els[i].className)) {
			classElements[j] = els[i];
			j++;
		}
	}
	return classElements;
}

function resizeNewsImage(className, maxWidth) {
	var maxWidth = (maxWidth==null) ? 500 : maxWidth;
	for(var i=0; imgEle=getElementsByClassName(className, null, 'img')[i];i++) {
		if (imgEle.width > maxWidth) {
			imgEle.height = Math.round((imgEle.height*maxWidth)/imgEle.width);
			imgEle.width = maxWidth;
		}
	}
}

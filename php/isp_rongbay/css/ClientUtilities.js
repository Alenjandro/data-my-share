function Numbers(e)
{
	var keynum;
	var keychar;
	var numcheck;
	if(window.event) // IE
	{
	keynum = e.keyCode;
	}
	else if(e.which) // Netscape/Firefox/Opera
	{
	keynum = e.which;
	}
	keychar = String.fromCharCode(keynum);
	numcheck =  /\d{1}/;
	return numcheck.test(keychar);
}
var sesnum = '';
function formatCurrency(num) {
		
		strnum = sesnum.split('.');
		sesnum = '';
		for(var i=0; i<strnum.length; i++){
		sesnum += strnum[i];
		}
		num = num.toString().replace(/$|\,/g,'');
		sesnum = num.replace('.', '');
		if(isNaN(num))
		num = "0";
		sign = (num == (num = Math.abs(num)));
		num = Math.floor(num*100+0.50000000001);
		num = Math.floor(num/100).toString();
		for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
			num = num.substring(0,num.length-(4*i+3))+'.'+
			num.substring(num.length-(4*i+3));
		return (((sign)?'':'-') + num);
	}
function removeLastSpace( str )
	{
		var result = new String();
		result = str.toString();
		if( result.charAt(result.length - 1) - 1 )
			result = result.substr(0, result.length - 1);
		return result;
	}
	var _DigitPlace = new Array( "-", "Nghìn", "Triệu", "Tỷ", "Nghìn", "Trăm", "Triệu", "Quá Lớn" );
	var _Digits = new Array( "Không", "Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín" );
var _FromTenToTwenty = new Array( "Mười", "Mười Một", "Mười Hai", "Mười Ba", "Mười Bốn", "Mười Năm", "Mười Sáu", "Mười Bảy", "Mười Tám", "Mười Chín" );
var _Tens = new Array( "-", "Mười", "Hai Mươi", "Ba Mươi", "Bốn Mươi", "Năm Mươi", "Sáu Mươi", "Bảy Mươi", "Tám Mươi", "Chín Mươi");
function spellWordsOf( amount )
	{
		amount = parseFloat(amount);
		amount = parseInt(amount);
					
		var sb = new String();
		var amountString = new String();
		amountString = "" + amount;
		    var amount_Digits =  new Array(); 
		    var amountDigitValues = new Array();
		    for(var i = 0; i < amountString.length; i++ ) {
				amount_Digits[i] = amountString.charAt(i);
				amountDigitValues[i] = 0;
			}
					
		// So am 
		if (amount < 10 && amount > -10) 
		{
			if(amount < 0) 
			{
				sb += "Âm ";
				amount = -amount;
			}
			sb += (_Digits[amount]);
			
			return sb;

		}
		    
		// Vong lap
		for(var i = 0; i < amount_Digits.length; i++)
		{
			if( amount_Digits[i] != '-' ) amountDigitValues[i] = parseInt(amount_Digits[i]);

			var offset = amount_Digits.length - i - 1;

			// Ki tu am
			if( amount_Digits[i] == '-' )
				sb += ("Âm ");
			else if(amountDigitValues[i] > 0)
			{
				// Cho Ti, Trieu, Tram, Nghan.
				if(offset > 2)
				{
					var nextOffset = offset - (offset % 3);
					var chunk = amountString.substring(i, amount_Digits.length - nextOffset);
					i = amount_Digits.length - nextOffset - 1;
					var digitOffset = parseInt((offset / 3));
					
					sb += ( spellWordsOf( chunk ) );
					sb += (" ");
					sb += ( _DigitPlace[ digitOffset ] );
					sb += (" ");
				}

					else if(offset == 2) // Tram
					{
						sb += ( _Digits[ amountDigitValues[i] ] ); 
						sb += (" ");
						sb += ( "Trăm " );
					}
					else if(offset == 1) // Chuc
					{
						if(amountDigitValues[i] == 1) // T? Mu?i d?n Hai Muoi
						{
							amountDigitValues[i + 1] = parseInt(amount_Digits[i + 1]);
							sb += ( _FromTenToTwenty[ amountDigitValues[i + 1] ] );
							sb += (" ");
							i++;
						}
						else
						{
							sb += ( _Tens[ amountDigitValues[i] ] );
							sb += (" ");
						}
					}
					else if(offset == 0) // So don vi
					{
						if(amountDigitValues[i-1]==0){
							sb += (" Linh ");
							sb += ( _Digits[ amountDigitValues[i] ] );
						}
						else if(amountDigitValues[i-1]==1){
							sb += ( _Digits[ amountDigitValues[i] ] );
							sb += ("");
						}
						else if(amountDigitValues[i]==1){
							sb += (" Một ");
						}
						else{
							sb += ( _Digits[ amountDigitValues[i] ] );
							sb += ("");
						}
						
						
					}

				}


			}
			
			return removeLastSpace(sb);

		}
/* ----------------------------------------------------------------------
	Methods to show/hide awaitng layer when working with VIE Portal software
-----------------------------------------------------------------------	*/
function ___showAwaitingMessage() {
	var left = arguments[0]||-1;
	var top = arguments[1]||-1;
	var awaitingLayerId = "vieAwaiting";
	var awaitingLayer = document.getElementById(awaitingLayerId);
	if(awaitingLayer)
	{
		if(left==-1) left = (document.body.clientWidth - awaitingLayer.style.width) / 2;
		if(top==-1) top = (document.body.clientHeight - awaitingLayer.style.height) / 2;
		awaitingLayer.style.position = "absolute";
		awaitingLayer.style.visibility = "visible";
		awaitingLayer.style.top = top + document.body.scrollTop;
		awaitingLayer.style.left = left;
		return;
	}
	var msg = "Please wait a moment...";
	if(calLanguage && calLanguage == "vi")
		msg = "Xin vui l&#242;ng &#273;&#7907;i m&#7897;t ch&#250;t...";
	var imgRoot = ___getRootUrl() + "Skins/Default/Images/";
	var imgUrl = imgRoot + "Dialogs/";
	awaitingLayer = document.createElement("DIV");	
	awaitingLayer.id = awaitingLayerId;
	awaitingLayer.innerHTML = "<table border=0 cellspacing=0 cellpadding=0>"
													+ "<tr><td><img border=0 src='" + imgUrl + "corner1-topleft.gif'></td>"
													+ "<td bgcolor='#F8EB00'></td><td><img border=0 src='" + imgUrl + "corner1-topright.gif'></td></tr>"
													+ "<td bgcolor='#F8EB00'></td><td bgcolor='#F8EB00' style='font-family:Verdana,Arial;font-size:10px;padding: 10px 10px 10px 10px;'>"
													+ "<nobr>&nbsp;<img border=0 align='absmiddle' src='" + imgRoot + "awaiting.gif'>&nbsp;"
													+ msg + "&nbsp;</nobr>"
													+ "</td><td bgcolor='#F8EB00'></td></tr>"
													+ "<tr><td><img border=0 src='" + imgUrl + "corner1-bottomleft.gif'></td>"
													+ "<td bgcolor='#F8EB00'></td><td><img border=0 src='" + imgUrl + "corner1-bottomright.gif'></td></tr>"
													+ "</table>";
	
	awaitingLayer = document.body.appendChild(awaitingLayer);
	if(left==-1) left = (document.body.clientWidth - awaitingLayer.style.width) / 2;
	if(top==-1) top = (document.body.clientHeight - awaitingLayer.style.height) / 2;

	awaitingLayer.style.position = "absolute";
	awaitingLayer.style.visibility = "visible";
	awaitingLayer.style.top = top + document.body.scrollTop;
	awaitingLayer.style.left = left;
}

function ___hideAwaitingMessage()
{
	var awaitingLayer = document.getElementById("vieAwaiting");
	if(awaitingLayer)
		__hideMe(awaitingLayer);
}

/* ----------------------------------------------------------------------
	Methods to focus into a HTML control when user press Enter key 
-----------------------------------------------------------------------	*/
function ___focusOnEnter(controlId) {
	if(event.keyCode!=13) return;
	var focusCtrl = document.getElementById(controlId);
	if(focusCtrl) focusCtrl.focus();
}

/* ----------------------------------------------------------------------
	Show the calendar (using PopCalendar.js library)

	invokeCtrl: The control that use to specify the postion of the calendar
	outputCtrlId: Id of the output control that store to selected date
	format: Format of the date, might be dd/mm/yyyy or dd-mm-yyyy 
					or anything you like (must contains "dd", "mm" and "yyyy")
-----------------------------------------------------------------------	*/
function ___showCalendar(invokeCtrl, outputCtrlId, format){
	var outputCtrl = document.getElementById(outputCtrlId);
	if(!outputCtrl)
		outputCtrl = document.getElementByName(outputCtrlId);
	if(!outputCtrl)
		return;
	popUpCalendar(invokeCtrl, outputCtrl, format.toLowerCase());
}

function ___showCalendarWithUrl(invokeCtrl, format, url){
	var outputCtrl = document.getElementById("___popCalendarOutput");	
	if(!outputCtrl)
		outputCtrl = document.getElementByName("___popCalendarOutput");
	popUpCalendarWithUrl(invokeCtrl, outputCtrl, format.toLowerCase(), url);
}

/* ----------------------------------------------------------------------
	Methods to get position of mouse pointer and show/hide a layer inside of other 
	in the VIE Portal software desktops	at the position of mouse pointer
	Reference: http://acko.net/blog/mouse-handling-and-absolute-positions-in-javascript
-----------------------------------------------------------------------	*/

function __getAbsoluteSizeById(id)
{
	var obj = document.getElementById(id);
	if(obj)
		return __getAbsoluteSize(obj);
	else
		return { width:0, height:0 };
}

function __getAbsoluteSize(obj)
{
	var size = { width:0, height:0 };
	if(obj)
	{
		if(obj.style.width)
		{
			size = { width:obj.style.width, height:obj.style.height };
			size.width = size.width.replace('px','').replace('pt','');
			size.height = size.height.replace('px','').replace('pt','');
		}
		else
			size = { width:obj.width, height:obj.height };
	}
	return size;
}

function __getAbsolutePositionById(id)
{
	var obj = document.getElementById(id);
	if(obj)
		return __getAbsolutePosition(obj);
	else
		return { x:-1, y:-1 };
}

function __getAbsolutePosition(obj)
{
	if(!obj)
		return { x:-1, y:-1 };
  var pos  = { x:obj.offsetLeft, y:obj.offsetTop };
  if(obj.offsetParent)
  {
    var tmpObj = __getAbsolutePosition(obj.offsetParent);
    pos.x += tmpObj.x;
    pos.y += tmpObj.y;
  }
  return pos;
}

function ___getRelativeCoordinates(event, obj)
{
  var x = 0, y = 0;

	// IE
  if (!window.opera && typeof event.offsetX != 'undefined')
  {
    var pos = __getAbsolutePosition(obj);
    x = event.offsetX + pos.x;
    y = event.offsetY + pos.y;
  }
  else
  {
    x = event.pageX;
    y = event.pageY;
  }
  
  // subtract distance to middle
  return { x: x, y: y };
}

// show a layer (by Id) at the current position of mouse pointer
function ___showInside()
{
	var parentObj = arguments[0]||null;
	var id = arguments[1]||'';
	if(parentObj==null || id=='') return;
	var offsetX = arguments[2]||0;
	var offsetY = arguments[3]||0;
	var e = arguments[4]||window.event;
	var obj = document.getElementById(id);
	if(!obj) return;
	var pos = ___getRelativeCoordinates(e, parentObj);
	obj.style.left = pos.x + offsetX + 'px';
	obj.style.top = pos.y + offsetY + 'px';
}

/* ----------------------------------------------------------------------
	Methods to show tooltip at the position of mouse pointer
-----------------------------------------------------------------------	*/


/* ----------------------------------------------------------------------
	Methods to show/hide a layer in the VIE Portal
-----------------------------------------------------------------------	*/

function __showLayer(parent, id, position, offsetLeft, offsetTop){

	// check layer existing first
	var obj = document.getElementById(id);
	if(!obj)
		return;
		
	// computing positions
	var nTop = 0, nLeft = 0;
	var objParent = parent;	
	while (objParent.tagName!="BODY")
	{
		nTop = nTop + objParent.offsetTop;
		nLeft = nLeft + objParent.offsetLeft;
		objParent = objParent.offsetParent;
	}
	
	// computing offset for the positions
	var nWidth = 0, nHeight = 0;
	switch(position)
	{
		case "left":
			nWidth = 0 - parent.offsetWidth;
			break;

		case "right":
			nWidth = parent.offsetWidth;
			break;
		break;

		case "top":
			nHeight = 0 - parent.offsetHeight;
		break;

		case "under":
			nHeight = parent.offsetHeight;
			break;

		default:
			break;
	}
	
	// re-position and show the layer
	obj.style.top = nTop + nHeight + offsetTop;
	obj.style.left = nLeft + nWidth + offsetLeft;
	obj.style.display = "";
	obj.style.visibility = "visible";
}

// hide a layer by Id on a webpage
function __hideLayer(id){
	var obj = document.getElementById(id);
	if(!obj)
		return;
	obj.style.visibility = "hidden";
}

// show an inline element in the HTML document (by Id)
function __show(){
	var id = arguments[0]||'';
	if(id=='') return;
	var objElement = document.getElementById(id);
	if(!objElement) return;
	if(!objElement.style) return;
	var left = arguments[1]||-1;
	var top = arguments[2]||-1;
	var offsetLeft = arguments[3]||0;
	var offsetTop = arguments[4]||0;
	objElement.style.display = "";
	objElement.style.visibility = "visible";
	if(left>=0) objElement.style.left = left + offsetLeft;
	if(top>=0) objElement.style.top = top + offsetTop;
}

// hide an inline element in the HTML document (by Id)
function __hide(id){
	
	var objElement = document.getElementById(id);
	if(!objElement) return;
	if(!objElement.style) return;
	objElement.style.display = "none";
	objElement.style.visibility = "hidden";
}
function _show_hide(id)
{
	var objElement = document.getElementById(id);
	if(objElement.style.visibility == "hidden") __show_sitemap(id);
	else __hide_sitemap(id);
	
}
function __hide_sitemap(id){
	
	var objElement = document.getElementById(id);
	if(!objElement) return;
	if(!objElement.style) return;
	objElement.style.display = "none";
	objElement.style.visibility = "hidden";
	this.style.visibility="hidden";
	
}
function __show_sitemap(){
	var id = arguments[0]||'';
	if(id=='') return;
	var objElement = document.getElementById(id);
	if(!objElement) return;
	if(!objElement.style) return;
	var left = arguments[1]||-1;
	var top = arguments[2]||-1;
	var offsetLeft = arguments[3]||0;
	var offsetTop = arguments[4]||0;
	objElement.style.display = "";
	objElement.style.visibility = "visible";
	if(left>=0) objElement.style.left = left + offsetLeft;
	if(top>=0) objElement.style.top = top + offsetTop;
}
function show_hide()
{

	_show('vie__ctl5__ctl5_Content');_show('vie__ctl5__ctl4_Content');
}
	
// show an element itself
function __showMe(obj){
	obj.style.visibility = "visible";
}

// hide an element itself
function __hideMe(obj){
	obj.style.visibility = "hidden";
}

// set CSS class for a layer by Id on a webpage
function __setLayerClass(id, className){
	var obj = document.getElementById(id);
	if(!obj)
		return;
	obj.className = className;
}

// set CSS class for a object on a webpage
function __setCssClass(obj, className) {
	if(!obj)
		return;
	obj.className = className;
}

/* ----------------------------------------------------------------------
	Methods to show actions menu and VIE Portal elements
-----------------------------------------------------------------------	*/

// show action menu for a portlet
function _showActionMenu(parent, id) {
	__showLayer(parent, id, "none", 0, 0);
}

// hide (minimize) a portlet in a desktop of ViePortal
function _hide(id){
	_hideViePortalElement(id);
	_hideViePortalElement(id + "_M");
	_showViePortalElement(id + "_R");
}

// show (restore) a minimized portlet in a desktop of ViePortal
function _show(id){
	var Group_container= new Array();
	Group_container[0]="vie__ctl4__ctl4_Content";
	Group_container[1]="vie__ctl4__ctl5_Content";
	Group_container[2]="vie__ctl4__ctl0_Content";
	Group_container[3]="vie__ctl4__ctl1_Content";
	Group_container[4]="vie__ctl4__ctl2_Content";
	Group_container[5]="vie__ctl4__ctl7_Content";
	Group_container[6]="vie__ctl4__ctl8_Content";
	
	Group_container[7]="vie__ctl5__ctl4_Content";
	Group_container[8]="vie__ctl5__ctl5_Content";
	Group_container[9]="vie__ctl5__ctl0_Content";
	Group_container[10]="vie__ctl5__ctl1_Content";
	Group_container[11]="vie__ctl5__ctl2_Content";
	Group_container[12]="vie__ctl5__ctl7_Content";
	Group_container[13]="vie__ctl5__ctl8_Content";
	var id_state=id+"_R";
	var obj = document.getElementById(id_state);
	if(obj.style.visibility =="hidden") 
	{
		_hide(id);
	}
	else
	{
		_hideViePortalElement(id + "_R");
		_showViePortalElement(id);
		_showViePortalElement(id + "_M");
		
		if (id=="vie__ctl5__ctl4_Content") 
			{
				_hide("vie__ctl5__ctl5_Content");
				_hide("vie__ctl5__ctl6_Content");
				_hide("vie__ctl5__ctl7_Content");
				
			}
		if (id=="vie__ctl5__ctl5_Content") 
			{
				_hide("vie__ctl5__ctl4_Content");
				_hide("vie__ctl5__ctl6_Content");
				_hide("vie__ctl5__ctl7_Content");
				
			}				
		if (id=="vie__ctl5__ctl6_Content") 
		{
			_hide("vie__ctl5__ctl4_Content");
			_hide("vie__ctl5__ctl5_Content");
			_hide("vie__ctl5__ctl7_Content");

		}
		if (id=="vie__ctl5__ctl7_Content") 
			{
				_hide("vie__ctl5__ctl4_Content");
				_hide("vie__ctl5__ctl6_Content");
				_hide("vie__ctl5__ctl5_Content");

			}	
			
		if (id=="vie__ctl4__ctl4_Content") 
			{
				_hide("vie__ctl4__ctl5_Content");
				_hide("vie__ctl4__ctl6_Content");
				_hide("vie__ctl4__ctl7_Content");

			}
		if (id=="vie__ctl4__ctl5_Content") 
			{
				_hide("vie__ctl4__ctl4_Content");
				_hide("vie__ctl4__ctl6_Content");
				_hide("vie__ctl4__ctl7_Content");

			}				
		if (id=="vie__ctl4__ctl6_Content") 
		{
			_hide("vie__ctl4__ctl4_Content");
			_hide("vie__ctl4__ctl5_Content");
			_hide("vie__ctl4__ctl7_Content");

		}
		if (id=="vie__ctl4__ctl7_Content") 
			{
				_hide("vie__ctl4__ctl4_Content");
				_hide("vie__ctl4__ctl6_Content");
				_hide("vie__ctl4__ctl5_Content");

			}
	}

	
	
}

// temporary close a portlet in a desktop of ViePortal
function _close(id){
	_hideViePortalElement(id);
}

// show an element on ViePortal desktop (inline on webpage)
function _showViePortalElement(id){
	__show(id);
}

// hide an element on ViePortal desktop (inline on webpage)
function _hideViePortalElement(id){
	__hide(id);
}

/* ----------------------------------------------------------------------
 Use this function to replace inner html of a control in a desktop 
 by inner html of o layer. 
 Useful for moving ASP.NET WebForms control to any position
-----------------------------------------------------------------------	*/

function ___replaceControlInnerHtmlByLayer(controlId, layerId){
	var objControl = document.getElementById(controlId);
	var objLayer = document.getElementById(layerId);
	if(!objControl || !objLayer) return;
	if(objLayer.innerHTML=="") return;
	objControl.innerHTML = objLayer.innerHTML;
	objLayer.innerHTML = "";
}

/* ----------------------------------------------------------------------
	Working with URLs in VIE Portal
-----------------------------------------------------------------------	*/

// get index position of desktop page
function ___getDesktopUrlIndex(url){

	// refine: remove 'ReturnUrl='
  var pos = url.indexOf("ReturnUrl=");
  if(pos>0)
		url = url.substring(0, pos);
	
	// special desktop (open individual portlet)
	pos = url.indexOf("Portlet.aspx");
  if(pos>=0) return pos;

	pos = url.indexOf("PortletBlank.aspx");
  if(pos>=0) return pos;
  
	// special desktop (open individual portlet with module name)
	pos = url.indexOf("PortletMod.aspx");
  if(pos>=0) return pos;

	// normal desktop
  pos = url.indexOf("Desktop.aspx");
  if(pos>=0) return pos;
	
  pos = url.indexOf("Default.aspx");
  if(pos>=0) return pos;

  pos = url.indexOf("Index.aspx");
  if(pos>=0) return pos;

  pos = url.indexOf("LogIn.aspx");
  if(pos>=0) return pos;

  pos = url.indexOf("SignIn.aspx");
  if(pos>=0) return pos;

  pos = url.indexOf("SignUp.aspx");
  if(pos>=0) return pos;

	// personal desktop
  pos = url.indexOf("My.aspx");
  if(pos>=0) return pos;

	// member desktop
  pos = url.indexOf("Member.aspx");
  if(pos>=0) return pos;

	// B2B desktop (module desktop)
  pos = url.indexOf("B2B.aspx");
  if(pos>=0) return pos;

	// e-Store desktop (module desktop)
  pos = url.indexOf("eStore.aspx");
  if(pos>=0) return pos;

	// no desktop is found
	return -1;
}

// get root url for all desktops in the ViePortal
function ___getRootUrl(){
  var url = document.location.href;
  return url.substring(0, ___getDesktopUrlIndex(url));
}

// get rest of all urls without desktop name in the ViePortal
function ___getRestUrl(){
  var url = document.location.href;
  return url.substring(___getDesktopUrlIndex(url)-1, url.length);
}

/* ----------------------------------------------------------------------
	Working with dialogs (file selector, color selector, ... ) in VIE Portal
-----------------------------------------------------------------------	*/

// open window to select color (for Internet Explorer only)
function ___selectColor(id){
  var colorUrl = ___getRootUrl() + "OnlineEditor/dialogs/color2.html";
	var width = 460;
	var height = 120;

	// IE	
	if(document.all)
	{
		var color = color = window.showModalDialog(colorUrl,"","dialogHeight:" + height + "px;dialogWidth:" + width + "px;resizable:0;status:0;scroll:0");
		if(color != null)
		{
			var colorCtrl = document.getElementById(id);
			if(colorCtrl)
				colorCtrl.value = color;
		}
	}
	else
	{
		var left = screen.width/2 - width/2;
		var top = screen.height/2 - height/2; 
		colorUrl += "?output=" + id;
		window.open(colorUrl,"","top=" + top + ",left=" + left + ",height=" + height + ",width=" + width + ",resizable:0,status:0,scroll:0");
	}
}

// open window to select/upload file
function ___selectFile(language, relatedId, control){
  var left = screen.width/2 - 600/2;
  var top = screen.height/2 - 500/2;
  var selectUrl = ___getRootUrl() + "OnlineEditor/FileUploadManager.aspx?language=" + language + "&insert=0&relatedid=" + relatedId + "&output=" + control;
  window.open(selectUrl, "","modal=1,left=" + left + ",top=" + top + ",height=500,width=600,resizable=0,status=0,scrollbars=1");
}

/* ----------------------------------------------------------------------
	Working with popup windows in VIE Portal
-----------------------------------------------------------------------	*/

// open an url into popup window
function ___openPopup(){
	var url = arguments[0]||'/';
	var width = arguments[1]||500;
	if(width==null || width=='') width = 500;
	var height = arguments[2]||500;
	if(height==null || height=='') height = 500;
	var resizable = arguments[3]||'yes';
	var scrollbars = arguments[3]||'yes';
	var location = arguments[4]||'no';
	var status = arguments[5]||'no';
	var menubar = arguments[6]||'no';
	var toolbar = arguments[7]||'no';
	var left = (screen.width - width) / 2;	
	if(!left) left = 400;
	var top = (screen.height - height) / 2;
	if(!top) top = 150;
	window.open(url, '', 'width='+width+',height='+height+',left='+left+',top='+top+',resizable='+resizable+',scrollbars='+scrollbars+',location='+location+',status='+status+',menubar='+menubar+',toolbar='+toolbar);
}

// open an url into fixed popup window (no scroll, no resize)
function ___openFixedPopup(){
	var url = arguments[0]||'/';
	var width = arguments[1]||500;
	if(width==null || width=='') width = 500;
	var height = arguments[2]||500;
	if(height==null || height=='') height = 500;
	var left = (screen.width - width) / 2;
	if(!left) left = 400;
	var top = (screen.height - height) / 2;
	if(!top) top = 150;
	window.open(url, '', 'width='+width+',height='+height+',left='+left+',top='+top+',resizable=no,scrollbars=no', false);
}

// open an url into window
function ___openWindow(){
	var url = arguments[0]||'/';
	var width = arguments[1]||800;
	if(width==null || width=='') width = 800;
	var height = arguments[2]||400;
	if(height==null || height=='') height = 400;
	var left = (screen.width - width) / 2;	
	if(!left) left = 400;
	var top = (screen.height - height) / 2;
	if(!top) top = 100;
	window.open(url, '', 'width='+width+',height='+height+',left='+left+',top='+top+',resizable=yes,scrollbars=yes,location=yes,status=yes,menubar=yes,toolbar=yes');
}

// resize window and move to center of the screen
function ___resizeWindow(width, height){
	window.resizeTo(width, height);
	var left = (screen.width - width) / 2;	
	var top = (screen.height - height) / 2;
	window.moveTo(left, top);
}

// maximize window
function ___maximizeWindow(){
	window.moveTo(0, 0);
	window.resizeTo(screen.width, screen.height);
}

// open an image in a window
function ___openImage(url, width, height)
{
	if (url == '')
		return false;

	var wHeight = height;
	var wWidth = width;
	if(!document.all)		// not IE
	{
		wHeight += 1;
		wWidth += 1;
	}

	var winDef = 'status=no,resizable=no,scrollbars=no,toolbar=no,location=no,fullscreen=no,titlebar=yes,height='.concat(wHeight).concat(',').concat('width=').concat(wWidth).concat(',');
	winDef = winDef.concat('top=').concat((screen.height - wHeight)/2).concat(',');
	winDef = winDef.concat('left=').concat((screen.width - wWidth)/2);
	var newWin = open('', '_blank', winDef);

	var title = "Close";
	if(calLanguage=="vi")
		title = "&#272;&#243;ng l&#7841;i";
		
	newWin.document.writeln('<html><head><title>VIE Portal Image Viewer</title></head>');
	newWin.document.writeln('<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">');
	newWin.document.writeln('<a href="javascript:window.close();" title="' + title + '"><img src="', url, '" border=0 align="absmiddle"></a>');
	newWin.document.writeln('</body></html>');
}

/* ----------------------------------------------------------------------
	Working with listboxes in VIE Portal
-----------------------------------------------------------------------	*/

// mark all items of a list box are selected
function ___markAllListItemsSelected(controlId)
{
	var listControl = document.getElementById(controlId);
	if(!listControl) return;
	var listOptions = listControl.options;
	if(!listOptions) return;
	for(var index=0;index<listOptions.length;index++)
		listControl.options[index].selected = true;
}

// switch position of two items in a list box
function ___switchListItems(controlId, moveType)
{
	var listControl = document.getElementById(controlId);
	if(!listControl) return;
	var listOptions = listControl.options;
	if(!listOptions) return;
	var currentIndex = listOptions.selectedIndex;
	var moveIndex = -1;
	if(moveType=='up')
	{ 
		if(currentIndex<=0)
			return;
		else
			moveIndex = currentIndex - 1;
	}
	if(moveType=='down')
	{
		if(currentIndex>=listOptions.length-1)
			return;
		else
			moveIndex = currentIndex + 1;
	}
	var moveText = listOptions[moveIndex].text;
	var moveValue = listOptions[moveIndex].value;
	listOptions[moveIndex].text = listOptions[currentIndex].text;
	listOptions[moveIndex].value = listOptions[currentIndex].value;
	listOptions[moveIndex].selected  = true;
	listOptions[currentIndex].text = moveText;
	listOptions[currentIndex].value = moveValue;
	listOptions[currentIndex].selected  = false;
}

/* ----------------------------------------------------------------------
	Working with date/time in VIE Portal
-----------------------------------------------------------------------	*/

// return the string determines full date of client
function ___getDateTime(showDate, dateFormat, showTime, showAsGMT)
{
	var days = arguments[4]||new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	var months = arguments[5]||new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	var monthSeperate = arguments[6]||"-";
	var yearSeperate = arguments[7]||"-";
	var now = new Date();
	var month = "";
	var day = "";
	var time = "";
	var first_date_num ="";
	var result = "";

  // show date
	if(showDate)
	{
		// long date
		if(dateFormat!="0")
			day = days[now.getDay()] + ", ";
		month = months[now.getMonth()];
		if (now.getDate() < 10)
			first_date_num = "0";
		result += day + first_date_num + now.getDate() + monthSeperate + month + yearSeperate + now.getFullYear();
	}
	
	// show time
	if(showTime)
	{
		var symbol = "AM";
		if(showAsGMT)
			time = new String(now.getUTCHours());
		else
			time = new String(now.getHours());
		if(time>=12)
		{
			time = time - 12;
			symbol = "PM";
		}
		if (time.length < 2)
			time = "0" + time;
		var minute = new String(now.getMinutes());
		if (minute.length < 2)
			minute = "0"+ minute;
		time = time  + ":" + minute + "&nbsp;" + symbol;
		if(showAsGMT)
			time += " (GMT)";
		if(result!="")
			result += "&nbsp;&nbsp;";
		result += time;
	}
	
	return result;
}

// show current date/time (international)
function ___showDateTime(showDate, dateFormat, showTime, showAsGMT)
{
	document.write("<nobr>&nbsp;" + ___getDateTime(showDate, dateFormat, showTime, showAsGMT) + "&nbsp;</nobr>");
}

// show current date/time (vietnamese)
function ___showDateTimeVietnamese(showDate, dateFormat, showTime, showAsGMT)
{
	var days = new Array("Ch&#7911; nh&#7853;t","Th&#7913; hai","Th&#7913; ba","Th&#7913; t&#432;","Th&#7913; n&#259;m","Th&#7913; s&#225;u","Th&#7913; b&#7843;y");
	var months = new Array("01","02","03","04","05","06","07","08","09","10","11","12");
	var datetime = ___getDateTime(showDate, dateFormat, showTime, showAsGMT, days, months, "/", "/");
	document.write("<nobr>&nbsp;" + datetime + "&nbsp;</nobr>");
}

/* ----------------------------------------------------------------------
	Helper methods to generate shortname in VIE Portal
	(remove all non-English charaters) 
-----------------------------------------------------------------------	*/

// generate short name
function ___generateShortname(inputName)
{
	return ___generateShortName(inputName, false);
}

// generate short name
function ___generateShortName(inputName, replaceSpaceByMinues)
{
	// initialize
	var result = inputName;
	if(!result)
		return "";
	if(result=="")
		return "";

	// convert Vietnamese Unicode to ANSI
  result= result.replace(/\u00E1/g,'a');
  result= result.replace(/\u00C1/g,'A');
  result= result.replace(/\u00E0/g,'a');
  result= result.replace(/\u00C0/g,'A');
  result= result.replace(/\u1EA3/g,'a');
  result= result.replace(/\u1EA2/g,'A');
  result= result.replace(/\u00E3/g,'a');
  result= result.replace(/\u00C3/g,'A');
  result= result.replace(/\u1EA1/g,'a');
  result= result.replace(/\u1EA0/g,'A');
  //á Á

  result= result.replace(/\u0103/g,'a');
  result= result.replace(/\u0102/g,'A');
  result= result.replace(/\u1EAF/g,'a');
  result= result.replace(/\u1EAE/g,'A');
  result= result.replace(/\u1EB1/g,'a');
  result= result.replace(/\u1EB0/g,'A');
  result= result.replace(/\u1EB3/g,'a');
  result= result.replace(/\u1EB2/g,'A');
  result= result.replace(/\u1EB5/g,'a');
  result= result.replace(/\u1EB4/g,'A');
  result= result.replace(/\u1EB7/g,'a');
  result= result.replace(/\u1EB6/g,'A');
  //a A 

  result= result.replace(/\u00E2/g,'a');
  result= result.replace(/\u00C2/g,'A');
  result= result.replace(/\u1EA5/g,'a');
  result= result.replace(/\u1EA4/g,'A');
  result= result.replace(/\u1EA7/g,'a');
  result= result.replace(/\u1EA6/g,'A');
  result= result.replace(/\u1EA9/g,'a');
  result= result.replace(/\u1EA8/g,'A');
  result= result.replace(/\u1EAB/g,'a');
  result= result.replace(/\u1EAA/g,'A');
  result= result.replace(/\u1EAD/g,'a');
  result= result.replace(/\u1EAC/g,'A');
  // â Â 

  result= result.replace(/\u00E9/g,'e');
  result= result.replace(/\u00C9/g,'E');
  result= result.replace(/\u00E8/g,'e');
  result= result.replace(/\u00C8/g,'E');
  result= result.replace(/\u1EBB/g,'e');
  result= result.replace(/\u1EBA/g,'E');
  result= result.replace(/\u1EBD/g,'e');
  result= result.replace(/\u1EBC/g,'E');
  result= result.replace(/\u1EB9/g,'e');
  result= result.replace(/\u1EB8/g,'E');
  // é É 

  result= result.replace(/\u00EA/g,'e');
  result= result.replace(/\u00CA/g,'E');
  result= result.replace(/\u1EBF/g,'e');
  result= result.replace(/\u1EBE/g,'E');
  result= result.replace(/\u1EC1/g,'e');
  result= result.replace(/\u1EC0/g,'E');
  result= result.replace(/\u1EC3/g,'e');
  result= result.replace(/\u1EC2/g,'E');
  result= result.replace(/\u1EC5/g,'e');
  result= result.replace(/\u1EC4/g,'E');
  result= result.replace(/\u1EC7/g,'e');
  result= result.replace(/\u1EC6/g,'E');
  // ê Ê
 
  result= result.replace(/\u00ED/g,'i');
  result= result.replace(/\u00CD/g,'I');
  result= result.replace(/\u00EC/g,'i');
  result= result.replace(/\u00CC/g,'I');
  result= result.replace(/\u1EC9/g,'i');
  result= result.replace(/\u1EC8/g,'I');
  result= result.replace(/\u0129/g,'i');
  result= result.replace(/\u0128/g,'I');
  result= result.replace(/\u1ECB/g,'i');
  result= result.replace(/\u1ECA/g,'I');
  // í Í

  result= result.replace(/\u00F3/g,'o');
  result= result.replace(/\u00D3/g,'O');
  result= result.replace(/\u00F2/g,'o');
  result= result.replace(/\u00D2/g,'O');
  result= result.replace(/\u1ECF/g,'o');
  result= result.replace(/\u1ECE/g,'O');
  result= result.replace(/\u00F5/g,'o');
  result= result.replace(/\u00D5/g,'O');
  result= result.replace(/\u1ECD/g,'o');
  result= result.replace(/\u1ECC/g,'O');
  // ó Ó

  result= result.replace(/\u01A1/g,'o');
  result= result.replace(/\u01A0/g,'O');
  result= result.replace(/\u1EDB/g,'o');
  result= result.replace(/\u1EDA/g,'O');
  result= result.replace(/\u1EDD/g,'o');
  result= result.replace(/\u1EDC/g,'O');
  result= result.replace(/\u1EDF/g,'o');
  result= result.replace(/\u1EDE/g,'O');
  result= result.replace(/\u1EE1/g,'o');
  result= result.replace(/\u1EE0/g,'O');
  result= result.replace(/\u1EE3/g,'o');
  result= result.replace(/\u1EE2/g,'O');
  // o O

  result= result.replace(/\u00F4/g,'o');
  result= result.replace(/\u00D4/g,'O');
  result= result.replace(/\u1ED1/g,'o');
  result= result.replace(/\u1ED0/g,'O');
  result= result.replace(/\u1ED3/g,'o');
  result= result.replace(/\u1ED2/g,'O');
  result= result.replace(/\u1ED5/g,'o');
  result= result.replace(/\u1ED4/g,'O');
  result= result.replace(/\u1ED7/g,'o');
  result= result.replace(/\u1ED6/g,'O');
  result= result.replace(/\u1ED9/g,'o');
  result= result.replace(/\u1ED8/g,'O');
  // ô Ô
 
  result= result.replace(/\u00FA/g,'u');
  result= result.replace(/\u00DA/g,'U');
  result= result.replace(/\u00F9/g,'u');
  result= result.replace(/\u00D9/g,'U');
  result= result.replace(/\u1EE7/g,'u');
  result= result.replace(/\u1EE6/g,'U');
  result= result.replace(/\u0169/g,'u');
  result= result.replace(/\u0168/g,'U');
  result= result.replace(/\u1EE5/g,'u');
  result= result.replace(/\u1EE4/g,'U');
  // ú Ú
 
  result= result.replace(/\u01B0/g,'u');
  result= result.replace(/\u01AF/g,'U');
  result= result.replace(/\u1EE9/g,'u');
  result= result.replace(/\u1EE8/g,'U');
  result= result.replace(/\u1EEB/g,'u');
  result= result.replace(/\u1EEA/g,'U');
  result= result.replace(/\u1EED/g,'u');
  result= result.replace(/\u1EEC/g,'U');
  result= result.replace(/\u1EEF/g,'u');
  result= result.replace(/\u1EEE/g,'U');
  result= result.replace(/\u1EF1/g,'u');
  result= result.replace(/\u1EF0/g,'U');
  // u U

  result= result.replace(/\u00FD/g,'y');
  result= result.replace(/\u00DD/g,'Y');
  result= result.replace(/\u1EF3/g,'y');
  result= result.replace(/\u1EF2/g,'Y');
  result= result.replace(/\u1EF7/g,'y');
  result= result.replace(/\u1EF6/g,'Y');
  result= result.replace(/\u1EF9/g,'y');
  result= result.replace(/\u1EF8/g,'Y');
  result= result.replace(/\u1EF5/g,'y');
  result= result.replace(/\u1EF4/g,'Y');
  // ý Ý

  result= result.replace(/\u00D0/g,'D');
  result= result.replace(/\u0110/g,'D');
  result= result.replace(/\u0111/g,'d');
  // d Ð

	// double spaces
  result = result.replace(/\s\s/g,' ');

	// double special charaters
  result = result.replace(/\s:\s/g,'-');
  result = result.replace(/\s:/g,'-');
  result = result.replace(/\s\!/g,'-');
  result = result.replace(/\s\?/g,'');
  result = result.replace(/\s\./g,'');
  result = result.replace(/\s\,/g,'');

	// space charater
	if(replaceSpaceByMinues)
		result = result.replace(/\s/g,'-');
	else
		result = result.replace(/\s/g,'_');
  
  // special charater
  result = result.replace(/\+/g,'').replace(/\//g,'').replace(/\'/g,'');
  result = result.replace(/\\/g,'').replace(/\=/g,'').replace(/\&/g,'').replace(/\?/g,'');
  result = result.replace(/\,/g,'').replace(/\./g,'').replace(/\&/g,'').replace(/\?/g,'');
  result = result.replace(/\(/g,'').replace(/\)/g,'').replace(/\#/g,'').replace(/\%/g,'');
  result = result.replace(/\`/g,'').replace(/\!/g,'').replace(/\@/g,'').replace(/\$/g,'');
  result = result.replace(/\>/g,'').replace(/\</g,'').replace(/\{/g,'').replace(/\}/g,'');
  result = result.replace(/\[/g,'').replace(/\]/g,'').replace(/\*/g,'').replace(/\^/g,'');
  result = result.replace(/\:/g,'').replace(/\;/g,'').replace(/\|/g,'').replace(/\"/g,'');
  
	// normalize the rest of special case
  result = result.replace(/\_\-\_/g,'-');
  result = result.replace(/\-\_\-/g,'-');

	// rest of all space charaters
  result = result.replace(/\s/g,'');

	// return pre-normalized short name
	return result;
}

/* -----------------------------------------------------------------------------------
	Time countdown ticking
	Robert Hashemian (http://www.hashemian.com/tools/javascript-countdown.htm)
----------------------------------------------------------------------------------- */

function TimeCountdown(obj)
{
	this.obj						= obj;
	this.Div						= "clock";
	this.TargetDate			= "12/31/2020 5:00 AM";
	this.DisplayFormat	= "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
	this.CountActive		= true;
	
	this.DisplayStr			= "";
	
	this.Calcage				= cd_Calcage;
	this.CountBack			= cd_CountBack;
	this.Setup					= cd_Setup;
	
	this.StopWhenReach = true;
	this.ProcessWhenReached = cd_ProcessWhenReached;
	this.ProcessFunctionWhenReached = "";	
}

function cd_Calcage(secs, num1, num2)
{
  s = ((Math.floor(secs/num1))%num2).toString();
  if (s.length < 2) s = "0" + s;
  return (s);
}

function cd_CountBack(secs)
{
	var tickingCtrl = document.getElementById(this.Div);
	if(!tickingCtrl) return;
  this.DisplayStr = this.DisplayFormat.replace(/%%D%%/g,	this.Calcage(secs,86400,100000));
  this.DisplayStr = this.DisplayStr.replace(/%%H%%/g,		this.Calcage(secs,3600,24));
  this.DisplayStr = this.DisplayStr.replace(/%%M%%/g,		this.Calcage(secs,60,60));
  this.DisplayStr = this.DisplayStr.replace(/%%S%%/g,		this.Calcage(secs,1,60));
  tickingCtrl.innerHTML = this.DisplayStr;
	if(secs==0)
		this.ProcessWhenReached();
  if(this.CountActive)
		setTimeout(this.obj +".CountBack(" + (secs-1) + ")", 990);
}

function cd_Setup()
{
	var dthen	= new Date(this.TargetDate);
  var dnow	= new Date();
	ddiff = new Date(dthen-dnow);
	gsecs = Math.floor(ddiff.valueOf()/1000);
	this.CountBack(gsecs);
}

function cd_ProcessWhenReached()
{
	this.CountActive = !this.StopWhenReach;
	if(this.ProcessFunctionWhenReached!="")
		eval(this.ProcessFunctionWhenReached);
}

// ------------------------------------------------------------------------------
// Library for playing Windows Media Player and Flash player inline a web browser
// ------------------------------------------------------------------------------

// get html code for showing Windows Media Player inline a web page
function ___getWindowsMediaPlayerCode()
{
	var mediaUrl = arguments[0]||'';
	var width = arguments[1]||320;
	var height = arguments[2]||304;
	var playCount = arguments[3]||1;
	var uiMode = arguments[4]||'none';			// none, mini, full
	
	// test Windows Media Player 7
	var WMP7;
	try
	{
		if (navigator.appName != "Netscape")
			WMP7 = new ActiveXObject('WMPlayer.OCX');
	}
	catch (error) {}
	
	// html code for showing Windows Media Player
	var html = '';

	// Windows Media Player 7 Code
	if (WMP7)
	{
		html +=  ('<OBJECT height="' +height + '" width="' +width + '" classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6" VIEWASTEXT>');
		html +=  ('<PARAM NAME="URL" VALUE="' + mediaUrl + '">');
		html +=  ('<PARAM NAME="rate" VALUE="1">');
		html +=  ('<PARAM NAME="balance" VALUE="0">');
		html +=  ('<PARAM NAME="currentPosition" VALUE="0">');
		html +=  ('<PARAM NAME="defaultFrame" VALUE="">');
		html +=  ('<PARAM NAME="playCount" VALUE="' + playCount + '">');
		html +=  ('<PARAM NAME="autoStart" VALUE="1">');
		html +=  ('<PARAM NAME="currentMarker" VALUE="0">');
		html +=  ('<PARAM NAME="invokeURLs" VALUE="-1">');
		html +=  ('<PARAM NAME="baseURL" VALUE="">');
		html +=  ('<PARAM NAME="mute" VALUE="0">');
		html +=  ('<PARAM NAME="uiMode" VALUE="' + uiMode + '">');
		html +=  ('<PARAM NAME="stretchToFit" VALUE="1">');
		html +=  ('<PARAM NAME="windowlessVideo" VALUE="1">');
		html +=  ('<PARAM NAME="enabled" VALUE="-1">');
		html +=  ('<PARAM NAME="enableContextMenu" VALUE="1">');
		html +=  ('<PARAM NAME="fullScreen" VALUE="0">');
		html +=  ('<PARAM NAME="SAMIStyle" VALUE="">');
		html +=  ('<PARAM NAME="SAMILang" VALUE="">');
		html +=  ('<PARAM NAME="SAMIFilename" VALUE="">');
		html +=  ('<PARAM NAME="captioningID" VALUE="">');
		html +=  ('<PARAM NAME="Volume" VALUE="100">');
		html +=  ('</OBJECT>');
	}

	// Windows Media Player 6.4 Code
	else
	{
		height -= 18;
		html +=  ('<OBJECT  classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95" ');
		html +=  ('codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,5,715" ');
		html +=  ('width="' +width + '" height="' + height + '"');
		html +=  ('standby="Loading Microsoft Windows Media Player components..." ');
		html +=  ('type="application/x-oleobject" VIEWASTEXT> ');
		html +=  ('<PARAM NAME="FileName"           VALUE="' + mediaUrl + '">');
		html +=  ('<PARAM NAME="TransparentAtStart" Value="false">');
		html +=  ('<PARAM NAME="AutoStart"          Value="true">');
		html +=  ('<PARAM NAME="AnimationatStart"   Value="false">');
		html +=  ('<PARAM NAME="ShowControls"       Value="false">');
		html +=  ('<PARAM NAME="ShowDisplay"	 value ="false">');
		html +=  ('<PARAM NAME="playCount" VALUE="' + playCount + '">');
		html +=  ('<PARAM NAME="displaySize" 	 Value="0">');
		html +=  ('<PARAM NAME="Volume" VALUE="100">');
		html +=  ('<Embed type="application/x-mplayer2" ');
		html +=  ('pluginspage= ');
		html +=  ('"http://www.microsoft.com/Windows/MediaPlayer/" ');
		html +=  ('src="' + mediaUrl + '" ');
		html +=  ('Name=MediaPlayer ');
		html +=  ('transparentAtStart=1 ');
		html +=  ('autostart=1 ');
		html +=  ('playcount=' + playCount + ' ');
		html +=  ('volume=100');
		html +=  ('animationAtStart=0 ');
		html +=  ('width="' +width + '" height="' + height + '"');	
		html +=  ('displaySize=0></embed> ');
		html +=  ('</OBJECT> ');
	}	

	// return HTML code to show the player	
	return html;
}

// get html code for showing Flash Player inline a web page
function ___getFlashPlayerCode()
{
	var mediaUrl = arguments[0]||'';
	if(mediaUrl=='') return '';
	var width = arguments[1]||0;
	var height = arguments[2]||0;
	var html = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"';
	if(width>0)
		html += ' width="' + width + '"';
	if(width>0)
		html += ' height="' + height + '"';
	html += '>';
	html += '<param name="movie" value="' + mediaUrl + '" />';
	html += '<param name="quality" value="high" />';
	html += '<param name="wmode" value="transparent">';
	html += '<embed src="' + mediaUrl + '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" ';
	html += 'type="application/x-shockwave-flash"';
	if(width>0)
		html += ' width="' + width + '"';
	if(width>0)
		html += ' height="' + height + '"';
	html += ' wmode="opaque"></embed></object>';

	// return HTML code to show the player	
	return html;
}

// ------------------------------------------------------------------------------
// show scrolling banner at the left/right of a webpage
// ------------------------------------------------------------------------------
function ___showScrollingBanner(id, type, minScreenWidth, offsetTop)
{
	// computing the starting positions of the banner	
	var startX, startY = 0;
	if(document.body.clientWidth < minScreenWidth)
		startX = -200;
		
	else
	{
		if(type==0)			// scroll left
			startX = 1;
		else						// scroll right
			startX = document.body.clientWidth - 200;
	}

	// get the scroll banner by Id
	var floatObj = document.getElementById ? document.getElementById(id) : document.all ? document.all[id] : document.layers[id];
	if(!floatObj)
		return;
		
	// set positions and scrolling
	floatObj.x = startX;
	floatObj.y = startY;
	___stayFloat(floatObj, type, minScreenWidth, offsetTop);
}

// method for displaying/scrolling the banner
___stayFloat = function(floatObj, type, minScreenWidth, offsetTop)
{
	// hide banner if screen width is less than minimum screen width (best value: 980 pixels)
	if (document.body.clientWidth < minScreenWidth)
	{
		floatObj.style.display = 'none';
		return;
	}
	
	// re-computing the positions
	var ns = navigator.appName.indexOf("Netscape") != -1;
	var startX, startY;

	// computing offset
	if (document.documentElement && document.documentElement.scrollTop)
		var pY = ns ? pageYOffset : document.documentElement.scrollTop;
		
	else if (document.body)
		var pY = ns ? pageYOffset : document.body.scrollTop;

	// computing top position
	if (document.body.scrollTop > offsetTop)
		startY = 2;
	else 
		startY = offsetTop;

	// computing left position
	if(type==0)				// scroll left
		startX = 1;
	else							// scroll right
		startX = document.body.clientWidth - floatObj.offsetWidth - 1;

	// re-positions		
	floatObj.y += (pY + startY - floatObj.y)/8;
	floatObj.style.left = startX;
	floatObj.style.top = floatObj.y;

	// display the banner
	floatObj.style.display = '';			

	// for scrolling smoothly
	setTimeout(function(){___stayFloat(floatObj,type,minScreenWidth,offsetTop)}, 30);
}

// ------------------------------------------------------------------------------
// Show rotator banners and stickers (see sample on vnpec.com)
// ------------------------------------------------------------------------------
function vieRotator()
{
	this.GlobalID='';
	this.ElementID='';
	this.ContainerID='';
	this.AutoStart=true;
	this.HideEffect=null;
	this.HideEffectDuration=0;
	this.Loop=true;
	this.PauseOnMouseOver=true;
	this.RotationType='ContentScroll';
	this.ScrollDirection='up';
	this.ScrollInterval=10;
	this.qw_bg=1;
	this.ShowEffect=null;
	this.ShowEffectDuration=0;
	this.SlidePause=2000;
	this.SmoothScrollSpeed='Medium';
	this.Slides=new Array();
	this.Tickers=new Array();
	this.LeadTickers=new Array();
	this.qw_e=-1;
	this.qw_m=0;
	this.qw_i=0;
	this.qw_f=0;
	this.qw_ae=0;
	this.qw_o=true;
	this.HasTickers=false;
	this.qw_cn=null;
	this.qw_u=false;
	this.qw_ba=false;
	this.qw_aj='';
}

function rcr_Start(qw_a)
{
	if(qw_a.RotationType=='SlideShow')
	{
		ss_ShowNextSlide(qw_a);
	}
	else
	{
		qw_bw(qw_a);
		scroll_ShowNextSlide(qw_a);
	}
}

function qw_bs(qw_a)
{
	if(!qw_a.qw_u)
		return null;
	qw_a.qw_u=false;
	if(!qw_a.qw_ba)
	{
		if(qw_a.RotationType=='SlideShow')
		{
			qw_cm(qw_a);
		}
			else
		{
			qw_bv(qw_a);
		}
	}
}

function qw_av(qw_a)
{
	if(qw_a.qw_u)
		return null;
	qw_a.qw_u=true;
	window.clearTimeout(qw_a.qw_f);
	window.clearTimeout(qw_a.qw_ae);
	if(qw_a.SlidePause==0)
		window.clearInterval(qw_a.qw_i);
	if(qw_a.RotationType=='SlideShow')
	{
		var qw_c=document.getElementById(qw_a.ContainerID);
		qw_c.style.visibility='visible';
	}
}

function qw_v(qw_a)
{
	if(qw_a.qw_e==-1)
		qw_a.qw_e=0;
	else if(qw_a.qw_e==qw_a.Slides.length-1)
	{
		qw_a.qw_e=0;
		qw_a.qw_o=false;
	}
	else
		qw_a.qw_e++;
}

function qw_bw(qw_a)
{
	var qw_c=document.getElementById(qw_a.ContainerID);
	var qw_as=document.getElementById(qw_a.ElementID);
	var qw_bf
	var qw_ay;
	switch(qw_a.ScrollDirection)
	{
		case'up':
			qw_bf=parseInt(qw_as.style.height.replace('px',''))+'px';
			qw_ay='0px';
			break;
		case'left':
			qw_bf='0px';
			qw_ay=parseInt(qw_as.style.width.replace('px',''))+'px';
			break;
	}
	qw_c.style.top=qw_bf;
	qw_c.style.left=qw_ay;
	qw_c.style.visibility='visible'
}

function qw_bv(qw_a)
{
	if(qw_a.qw_i==0)
	{
		scroll_ShowNextSlide(qw_a)
	}
	else if(qw_a.SlidePause==0)
	{
		var qw_b='scroll_NextSlideToView('+qw_a.GlobalID+')';
		qw_a.qw_i=window.setInterval(qw_b,qw_a.ScrollInterval);
	}
}

function scroll_ShowNextSlide(qw_a)
{
	qw_v(qw_a);
	if(!qw_a.Loop&&!qw_a.qw_o)
	{
		qw_av(qw_a);
		return null;
	}
	var qw_b='scroll_NextSlideToView('+qw_a.GlobalID+')';
	qw_a.qw_i=window.setInterval(qw_b,qw_a.ScrollInterval);
}

function scroll_NextSlideToView(qw_a)
{
	var qw_c=document.getElementById(qw_a.ContainerID);
	var qw_ak=document.getElementById(qw_a.Slides[qw_a.qw_e]);
	var qw_ax=parseInt(qw_c.style.top.replace('px',''));
	var qw_ap=parseInt(qw_c.style.left.replace('px',''));
	var qw_w=0,qw_s=0,qw_ad=document.getElementById(qw_a.Slides[qw_q(qw_a)]);
	if(!(qw_a.qw_o&&qw_a.qw_e==0))
	{
		qw_w=qw_ad.offsetHeight;
		qw_s=qw_ad.offsetWidth;
	}
	var qw_az=0;
	switch(qw_a.ScrollDirection)
	{
		case'up':
			if(qw_a.RotationType=='ContentScroll')
			{
				qw_ax-=qw_a.qw_bg;
			}
			else
			{
				qw_az=abs(qw_w+qw_ax)/qw_p(qw_a);
				if(qw_az<=2)
					qw_az=1;
				qw_ax-=qw_az;
			};
			break;
		case'left':
			if(qw_a.RotationType=='ContentScroll')
			{
				qw_ap-=qw_a.qw_bg;
			}
			else
			{
				qw_az=abs(qw_s+qw_ap)/qw_p(qw_a);
				if(qw_az<=2)
					qw_az=1;
				qw_ap-=qw_az;
			}
			break;
	}
	qw_c.style.top=qw_ax+'px';
	qw_c.style.left=qw_ap+'px';
	if((qw_ax+qw_w==0&&qw_a.ScrollDirection=='up')||(qw_ap+qw_s==0&&qw_a.ScrollDirection=='left'))
	{
		window.clearInterval(qw_a.qw_i);
		qw_a.qw_i=0;
		if(!(qw_a.qw_o&&qw_a.qw_e==0))
			qw_al(qw_a);
		if(qw_a.HasTickers)
		{
			rcr_StartTickerSequence(qw_a);
		}
		else
		{
			var qw_b='scroll_ShowNextSlide('+qw_a.GlobalID+')';
			if(!qw_a.qw_u)
				qw_a.qw_f=window.setTimeout(qw_b,qw_a.SlidePause);
		}
	}
}

function qw_al(qw_a)
{
	var qw_c = document.getElementById(qw_a.ContainerID);
	if(qw_a.ScrollDirection=='up')
	{
		var qw_ad=document.getElementById(qw_a.Slides[qw_q(qw_a)]);
		var qw_br=qw_ad.cloneNode(true);
		qw_c.removeChild(qw_ad);
		qw_c.style.top='0px';
		qw_c.appendChild(qw_br);
		qw_t(qw_a);
	}
	else
	{
		var qw_ck = document.getElementById(qw_a.ContainerRowID);
		var qw_bq = qw_ck.cells[0];
		var qw_cv = qw_ck.removeChild(qw_bq);
		qw_c.style.left = '0px';
		var qw_cw = qw_ck.appendChild(qw_cv);
		qw_t(qw_a);
	}
}

function qw_q(qw_a)
{
	if(qw_a.qw_e==0)
		return qw_a.Slides.length-1;
	else
		return qw_a.qw_e-1;
}

function qw_p(qw_a)
{
	switch(qw_a.SmoothScrollSpeed)
	{
		case'Slow':
			return 8;
			break;
		case'Medium':
			return 6;
			break;
		case'Fast':
			return 4;
			break;
	}
}

function qw_cm(qw_a)
{
	if(qw_a.HasTickers&&qw_a.qw_aj=='PlayingShowEffect')
		return null;
	if(!qw_a.qw_ba)
	{
		ss_PlayHideEffect(qw_a);
		var qw_bb=0;
		if(qw_a.HideEffect)
			qw_bb=qw_a.HideEffectDuration;
		qw_b='ss_ShowNextSlide('+qw_a.GlobalID+')';
		qw_a.qw_f=window.setTimeout(qw_b,qw_bb);
	}
}

function ss_ShowNextSlide(qw_a)
{
	if(qw_a.qw_u)
		return null;
	qw_v(qw_a);
	var qw_c=document.getElementById(qw_a.ContainerID);
	var qw_ak=document.getElementById(qw_a.Slides[qw_a.qw_e]);
	qw_c.innerHTML=qw_ak.innerHTML;
	qw_ak.innerHTML='';
	qw_t(qw_a);
	qw_bd(qw_a);
	if(qw_a.HasTickers)
	{
		var qw_b='rcr_StartTickerSequence('+qw_a.GlobalID+')';
		var qw_cr=window.setTimeout(qw_b,qw_a.ShowEffectDuration);
	}
	else
	{
		var qw_b='ss_DisplaySlide('+qw_a.GlobalID+')';
		qw_a.qw_f=window.setTimeout(qw_b,qw_a.ShowEffectDuration);
	}
}

function ss_DisplaySlide(qw_a)
{
	if(qw_a.qw_u)
		return null;
	qw_a.qw_aj='DisplayingSlide';
	window.clearTimeout(qw_a.qw_ae);
	window.clearTimeout(qw_a.qw_f);
	if(!qw_a.Loop&&qw_a.qw_e==qw_a.Slides.length-1)
	{
		qw_av(qw_a);
		return null;
	}
	var qw_b='ss_PlayHideEffect('+qw_a.GlobalID+')';
	qw_a.qw_ae=window.setTimeout(qw_b,qw_a.SlidePause);
	var qw_bb=0;
	if(qw_a.HideEffect)
		qw_bb+=qw_a.HideEffectDuration;
	qw_bb+=qw_a.SlidePause;
	qw_b='ss_ShowNextSlide('+qw_a.GlobalID+')';
	qw_a.qw_f=window.setTimeout(qw_b,qw_bb);
}

function qw_bd(qw_a)
{
	qw_a.qw_aj='PlayingShowEffect';
	var qw_c=document.getElementById(qw_a.ContainerID);
	if(qw_c.filters&&qw_a.ShowEffect)
	{
		qw_c.style.filter=qw_a.ShowEffect;
		qw_c.filters[0].apply();
	}
	qw_c.style.visibility='visible';
	if(qw_c.filters&&qw_a.ShowEffect)
		qw_c.filters[0].play()
}

function ss_PlayHideEffect(qw_a)
{
	qw_a.qw_aj='PlayingHideEffect';
	var qw_c=document.getElementById(qw_a.ContainerID);
	if(qw_c.filters&&qw_a.HideEffect)
	{
		qw_c.style.filter=qw_a.HideEffect;
		qw_c.filters[0].apply();
	};
	var qw_ak=document.getElementById(qw_a.Slides[qw_a.qw_e]);
	qw_ak.innerHTML=qw_c.innerHTML;
	qw_c.style.visibility='hidden';
	if(qw_c.filters&&qw_a.HideEffect)
		qw_c.filters[0].play();
}

function rcr_StartTickerSequence(qw_a)
{
	qw_a.qw_aj='RunningTickers';
	qw_a.qw_ba=true;
	rcr_StartTicker(qw_a.LeadTickers[qw_a.qw_m]);
}

function rcr_EndTickerSequence(qw_a)
{
	qw_a.qw_ba=false;
	if(!qw_a.qw_u)
	{
		if(qw_a.RotationType=='SlideShow')
		{
			ss_DisplaySlide(qw_a);
		}
		else
		{
			var qw_b='scroll_ShowNextSlide('+qw_a.GlobalID+')';
			qw_a.qw_f=window.setTimeout(qw_b,qw_a.SlidePause);
		}
	}
	qw_aq(qw_a);
}

function qw_aq(qw_a)
{
	if(qw_a.qw_m==qw_a.LeadTickers.length-1)
		qw_a.qw_m=0;
	else
		qw_a.qw_m++;
}

function qw_t(qw_a)
{
	if(qw_a.HasTickers)
		for(var qw_ct=0;qw_ct<qw_a.Tickers.length;qw_ct++)
			qw_af(qw_a.Tickers[qw_ct],'');
}

function ie_MsOver(qw_bp,qw_g)
{
	if(!qw_bp.contains(event.fromElement)&&qw_g)
		qw_av(qw_g);
}

function ie_MsOut(qw_bp,qw_g)
{
	if(!qw_bp.contains(event.toElement)&&qw_g)
		qw_bs(qw_g);
}

function ns_MsOver(qw_bo,qw_au,qw_g)
{
	if(qw_ah(qw_au,qw_bo)&&qw_g)
		qw_av(qw_g);
}

function ns_MsOut(qw_bo,qw_au,qw_g)
{
	if(!qw_ah(qw_au,qw_bo)&&qw_g)
		qw_bs(qw_g);
}

function qw_ah(qw_by,qw_bo)
{
	if(qw_by!=null)
	{
		var qw_bp=document.getElementById(qw_by);
		var qw_bz=qw_ci(qw_bp)-1;
		var qw_cc=qw_ch(qw_bp)-1;
		var qw_cj=qw_bz+qw_bp.offsetWidth+1;
		var qw_cb=qw_cc+qw_bp.offsetHeight+1;
		if((qw_bo.pageX>qw_bz)&&(qw_bo.pageX<qw_cj)&&(qw_bo.pageY>qw_cc)&&(qw_bo.pageY<qw_cb))
			return true;
		else
			return false;
	}
	else
		return false;
}

function qw_ci(qw_h)
{
	var x=0;
	do
	{
		if(qw_h.style.position=='absolute')
		{
			return x+qw_h.offsetLeft;
		}
		else
		{
			x+=qw_h.offsetLeft;
			if(qw_h.offsetParent)
				if(qw_h.offsetParent.tagName=='TABLE')
			if(parseInt(qw_h.offsetParent.border)>0)
			{
				x+=1;
			}
		}
	} while((qw_h=qw_h.offsetParent));
	return x;
}

function qw_ch(qw_h)
{
	var y=0;
	do
	{
		if(qw_h.style.position=='absolute')
		{
			return y+qw_h.offsetTop;
		}
		else
		{
			y+=qw_h.offsetTop;
			if(qw_h.offsetParent)
				if(qw_h.offsetParent.tagName=='TABLE')
					if(parseInt(qw_h.offsetParent.border)>0)
					{
						y+=1;
					}
		}
	} while((qw_h=qw_h.offsetParent));
	return y;
}

function abs(x)
{
	if(x<0)
		return-x;
	else return x;
}

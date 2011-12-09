//***********************************************************************************************************************************/
//	LyteBox v3.25
//
//	 Author: Markus F. Hay
//  Website: http://www.dolem.com/lytebox
//	   Date: July 8, 2011
//	License: Creative Commons Attribution 3.0 License (http://creativecommons.org/licenses/by/3.0/)
// Browsers: Tested successfully with the following browsers (using no DOCTYPE and Strict/Transitional/Loose DOCTYPES):
//				* Firefox: 1.5+
//				* Internet Explorer: 9.0, 8.0, 7.0, 6.0 SP2, 5.5 SP2
//				* Opera: 9.23+
//
// Releases: For release information, support, custom modules, etc., visit http://www.dolem.com/lytebox/forums/
//
//				* v3.25 (07/08/11)
//				* v3.24 (07/06/11)
//				* v3.23 (07/05/11)
//				* v3.22 (10/02/07)
//				* v3.21 (09/30/07)
//				* v3.20 (07/12/07)
//				* v3.10 (05/28/07)
//				* v3.00 (05/15/07)
//				* v2.02 (11/13/06)
//***********************************************************************************************************************************/
//  Extended Built-in Objects
//  - Array.prototype.removeDuplicates()
//  - Array.prototype.empty()
//
//	LyteBox Class Definition
//	- LyteBox()
//  - initialize()
//  - updateLyteboxItems()
//  - start()
//  - changeContent(contentNum)
//  - checkFrame()
//  - resizeContainer(width, height)
//  - showContent()
//  - updateDetails()
//  - updateNav()
//  - enableKeyboardNav()
//  - disableKeyboardNav()
//  - keyboardAction()
//  - preloadNeighborImages()
//	- togglePlayPause()
//  - end()
//  - appear(id, opacity)
//  - fade(id, opacity)
//  - resizeW(id, curW, maxW, timer)
//  - resizeH(id, curH, maxH, timer)
//  - getPageScroll()
//  - getPageSize()
//	- toggleFlash(state)
//  - toggleSelects(state)
//  - pause(numberMillis)
//	- combine(anchors, areas)
//
//  - initLytebox()
//**************************************************************************************************************/
Array.prototype.removeDuplicates = function () { for (var i = 1; i < this.length; i++) { if (this[i][0] == this[i-1][0]) { this.splice(i,1); } } }
Array.prototype.empty = function () { for (var i = 0; i <= this.length; i++) { this.shift(); } }
String.prototype.trim = function () { return this.replace(/^\s+|\s+$/g, ''); }

//*************************/
// LyteBox constructor
//*************************/
function LyteBox() {
	/*** Start Global Configuration ***/
		this.theme				= 'grey';	// themes: grey (default), red, green, blue, gold
		this.hideFlash			= true;		// controls whether or not Flash objects should be hidden
		this.outerBorder		= false;	// controls whether to show the outer grey (or theme) border
		this.resizeSpeed		= 8;		// controls the speed of the image resizing (1=slowest and 10=fastest)
		this.maxOpacity			= 80;		// higher opacity = darker overlay, lower opacity = lighter overlay
		this.navType			= 1;		// 1 = "Prev/Next" buttons on top left and left (default), 2 = "<< prev | next >>" links next to image number
		this.autoResize			= true;		// controls whether or not images should be resized if larger than the browser window dimensions
		this.doAnimations		= true;		// controls whether or not "animate" Lytebox, i.e. resize transition between images, fade in/out effects, etc.
		
		this.borderSize			= 12;		// if you adjust the padding in the CSS, you will need to update this variable -- otherwise, leave this alone...
	/*** End Global Configuration ***/
	
	/*** Configure Slideshow Options ***/
		this.slideInterval		= 10000;	// Change value (milliseconds) to increase/decrease the time between "slides" (10000 = 10 seconds)
		this.showNavigation		= true;		// true to display Next/Prev buttons/text during slideshow, false to hide
		this.showClose			= true;		// true to display the Close button, false to hide
		this.showDetails		= true;		// true to display image details (caption, count), false to hide
		this.showPlayPause		= true;		// true to display pause/play buttons next to close button, false to hide
		this.autoEnd			= true;		// true to automatically close Lytebox after the last image is reached, false to keep open
		this.pauseOnNextClick	= false;	// true to pause the slideshow when the "Next" button is clicked
        this.pauseOnPrevClick 	= true;		// true to pause the slideshow when the "Prev" button is clicked
	/*** End Slideshow Configuration ***/
	
	if(this.resizeSpeed > 10) { this.resizeSpeed = 10; }
	if(this.resizeSpeed < 1) { resizeSpeed = 1; }
	this.resizeDuration = (11 - this.resizeSpeed) * 0.15;
	
	/* MEMBER VARIABLES USED TO CLEAR SETTIMEOUTS */
	this.resizeWTimerArray		= new Array();
	this.resizeWTimerCount		= 0;
	this.resizeHTimerArray		= new Array();
	this.resizeHTimerCount		= 0;
	this.showContentTimerArray	= new Array();
	this.showContentTimerCount	= 0;
	this.overlayTimerArray		= new Array();
	this.overlayTimerCount		= 0;
	this.imageTimerArray		= new Array();
	this.imageTimerCount		= 0;
	this.timerIDArray			= new Array();
	this.timerIDCount			= 0;
	this.slideshowIDArray		= new Array();
	this.slideshowIDCount		= 0;
	
	/* GLOBAL */
	this.imageArray	 = new Array();
	this.activeImage = null;
	this.slideArray	 = new Array();
	this.activeSlide = null;
	this.frameArray	 = new Array();
	this.activeFrame = null;
	
	/* Check for iFrame environment (will set this.isFrame and this.doc member variables) */
	this.checkFrame();
	
	/* Set to false by default */
	this.isSlideshow = false;
	this.isLyteframe = false;
	
	// We need to know the certain browser versions (or if it's IE) since IE is "special" and requires spoon feeding.
	/*@cc_on
		/*@if (@_jscript)
			this.ie = (document.all && !window.opera) ? true : false;
		/*@else @*/
			this.ie = false;
		/*@end
	@*/
	this.ie7 = (this.ie && window.XMLHttpRequest);
	this.ie8 = (this.ie && navigator.appVersion.indexOf('IE 8') > 0);
	this.ie9 = (this.ie && navigator.appVersion.indexOf('IE 9') > 0);
	
	/* INITIALIZE */
	this.initialize();
}

//********************************************************************************************/
// initialize()
// Constructor runs on completion of the DOM loading. Prepares the lytebox/lyteshow links on the
// page and inserts html at the bottom of the page which is used to display the shadow overlay
// and the image container.
//********************************************************************************************/
LyteBox.prototype.initialize = function() {
	// Make a call to get all the images on the page.
	this.updateLyteboxItems();
	
	// The rest of this code inserts html at the bottom of the page that looks similar to this:
	//
	//	<div id="lbOverlay"></div>
	//	<div id="lbMain">
	//		<div id="lbOuterContainer">
	//			<div id="lbImageContainer">
	//				<img id="lbImage">
	//				<div style="" id="lbHoverNav">
	//					<a href="#" id="lbPrev"></a>
	//					<a href="#" id="lbNext"></a>
	//				</div>
	//			</div>
	//			<div id="lbIframeContainer">
	//				<iframe id="lbIframe" ... ></iframe>
	//			</div>
	//			<div id="lbLoading"></div>
	//		</div>
	//		<div id="lbDetailsContainer">
	//			<div id="lbDetailsData">
	//				<div id="lbDetails">
	//					<span id="lbCaption"></span>
	//					<span id="lbNumberDisplay"></span>
	//					<span id="lbNavDisplay">  <a href="#" id="lbPrev2Link"></a> || <a href="#" id="lbNext2"></a></span>
	//				</div>
	//				<div id="lbBottomNav">
	//					<a href="#" id="lbPlay"></a>
	//					<a href="#" id="lbPause"></a>
	//					<a href="#" id="lbClose"></a>
	//				</div>
	//			</div>
	//		</div>
	//	</div>

	var objBody = this.doc.getElementsByTagName("body").item(0);
	
	if (this.doc.getElementById('lbOverlay')) {
		objBody.removeChild(this.doc.getElementById("lbOverlay"));
		objBody.removeChild(this.doc.getElementById("lbMain"));
	}

	var objOverlay = this.doc.createElement("div");
		objOverlay.setAttribute('id','lbOverlay');
		objOverlay.setAttribute((this.ie && !((this.ie8 || this.ie9) && this.doc.compatMode != 'BackCompat') ? 'className' : 'class'), this.theme);
		// Change overlay position to absolute for IE6 and below, and IE7 with no DOCTYPE, since a fixed position screws everything up for these.
		if ((this.ie && !this.ie7) || (this.ie7 && this.doc.compatMode == 'BackCompat')) {
			objOverlay.style.position = 'absolute';
		}
		objOverlay.style.display = 'none';
		objBody.appendChild(objOverlay);
	
	var objLytebox = this.doc.createElement("div");
		objLytebox.setAttribute('id','lbMain');
		objLytebox.style.display = 'none';
		objBody.appendChild(objLytebox);
	
	var objOuterContainer = this.doc.createElement("div");
		objOuterContainer.setAttribute('id','lbOuterContainer');
		objOuterContainer.setAttribute((this.ie && !((this.ie8 || this.ie9) && this.doc.compatMode != 'BackCompat') ? 'className' : 'class'), this.theme);
		objLytebox.appendChild(objOuterContainer);
		
	var objIframeContainer = this.doc.createElement("div");
		objIframeContainer.setAttribute('id','lbIframeContainer');
		objIframeContainer.style.display = 'none';
		objOuterContainer.appendChild(objIframeContainer);
		
	var objIframe = this.doc.createElement("iframe");
		objIframe.setAttribute('id','lbIframe');
		objIframe.setAttribute('name','lbIframe');
		objIframe.style.display = 'none';
		objIframeContainer.appendChild(objIframe);

	var objImageContainer = this.doc.createElement("div");
		objImageContainer.setAttribute('id','lbImageContainer');
		objOuterContainer.appendChild(objImageContainer);

	var objLyteboxImage = this.doc.createElement("img");
		objLyteboxImage.setAttribute('id','lbImage');
		objImageContainer.appendChild(objLyteboxImage);
		
	var objLoading = this.doc.createElement("div");
		objLoading.setAttribute('id','lbLoading');
		objOuterContainer.appendChild(objLoading);
		
	var objDetailsContainer = this.doc.createElement("div");
		objDetailsContainer.setAttribute('id','lbDetailsContainer');
		objDetailsContainer.setAttribute((this.ie && !((this.ie8 || this.ie9) && this.doc.compatMode != 'BackCompat') ? 'className' : 'class'), this.theme);
		objLytebox.appendChild(objDetailsContainer);

	var objDetailsData =this.doc.createElement("div");
		objDetailsData.setAttribute('id','lbDetailsData');
		objDetailsData.setAttribute((this.ie && !((this.ie8 || this.ie9) && this.doc.compatMode != 'BackCompat') ? 'className' : 'class'), this.theme);
		objDetailsContainer.appendChild(objDetailsData);
	
	var objDetails = this.doc.createElement("div");
		objDetails.setAttribute('id','lbDetails');
		objDetailsData.appendChild(objDetails);

	var objCaption = this.doc.createElement("span");
		objCaption.setAttribute('id','lbCaption');
		objDetails.appendChild(objCaption);
		
	var objHoverNav = this.doc.createElement("div");
		objHoverNav.setAttribute('id','lbHoverNav');
		objImageContainer.appendChild(objHoverNav);
	
	var objBottomNav = this.doc.createElement("div");
		objBottomNav.setAttribute('id','lbBottomNav');
		objDetailsData.appendChild(objBottomNav);
	
	var objPrev = this.doc.createElement("a");
		objPrev.setAttribute('id','lbPrev');
		objPrev.setAttribute((this.ie && !((this.ie8 || this.ie9) && this.doc.compatMode != 'BackCompat') ? 'className' : 'class'), this.theme);
		objPrev.setAttribute('href','#');
		objHoverNav.appendChild(objPrev);
	
	var objNext = this.doc.createElement("a");
		objNext.setAttribute('id','lbNext');
		objNext.setAttribute((this.ie && !((this.ie8 || this.ie9) && this.doc.compatMode != 'BackCompat') ? 'className' : 'class'), this.theme);
		objNext.setAttribute('href','#');
		objHoverNav.appendChild(objNext);
	
	var objNumberDisplay = this.doc.createElement("span");
		objNumberDisplay.setAttribute('id','lbNumberDisplay');
		objDetails.appendChild(objNumberDisplay);
	
	var objNavDisplay = this.doc.createElement("span");
		objNavDisplay.setAttribute('id','lbNavDisplay');
		objNavDisplay.style.display = 'none';
		objDetails.appendChild(objNavDisplay);

	var objClose = this.doc.createElement("a");
		objClose.setAttribute('id','lbClose');
		objClose.setAttribute((this.ie && !((this.ie8 || this.ie9) && this.doc.compatMode != 'BackCompat') ? 'className' : 'class'), this.theme);
		objClose.setAttribute('href','#');
		objBottomNav.appendChild(objClose);
		
	var objPause = this.doc.createElement("a");
		objPause.setAttribute('id','lbPause');
		objPause.setAttribute((this.ie && !((this.ie8 || this.ie9) && this.doc.compatMode != 'BackCompat') ? 'className' : 'class'), this.theme);
		objPause.setAttribute('href','#');
		objPause.style.display = 'none';
		objBottomNav.appendChild(objPause);
		
	var objPlay = this.doc.createElement("a");
		objPlay.setAttribute('id','lbPlay');
		objPlay.setAttribute((this.ie && !((this.ie8 || this.ie9) && this.doc.compatMode != 'BackCompat') ? 'className' : 'class'), this.theme);
		objPlay.setAttribute('href','#');
		objPlay.style.display = 'none';
		objBottomNav.appendChild(objPlay);
};

//********************************************************************************/
// updateLyteboxItems()
// Loops through anchor and area tags looking for 'lytebox' or 'lyteshow' references and 
// adds onclick events to the appropriate links.
//********************************************************************************/
LyteBox.prototype.updateLyteboxItems = function() {	
	// Populate arrays of anchors and area maps from the appropriate window (could be the parent or iframe document)
	var anchors = (this.isFrame) ? window.parent.frames[window.name].document.getElementsByTagName('a') : document.getElementsByTagName('a');
	var areas = (this.isFrame) ? window.parent.frames[window.name].document.getElementsByTagName('area') : document.getElementsByTagName('area');
	
	// Combine both into a single array.
	var lyteLinks = this.combine(anchors, areas);
	
	// Now loop through all Lytebox enabled links
	for (var i = 0; i < lyteLinks.length; i++) {
		var myLink = lyteLinks[i];
		var relAttribute = String(myLink.getAttribute('rel'));
		
		// use the string.match() method to catch 'lytebox' references in the rel attribute
		if (myLink.getAttribute('href')) {
			if (relAttribute.toLowerCase().match('lytebox')) {
				myLink.onclick = function () { myLytebox.start(this, false, false); return false; }
			} else if (relAttribute.toLowerCase().match('lyteshow')) {
				myLink.onclick = function () { myLytebox.start(this, true, false); return false; }
			} else if (relAttribute.toLowerCase().match('lyteframe')) {
				myLink.onclick = function () { myLytebox.start(this, false, true); return false; }
			}
		}
	}
};

//********************************************************************************/
// start()
// Display overlay and Lytebox. If image is part of a set, add siblings to imageArray.
//********************************************************************************/
LyteBox.prototype.start = function(imageLink, doSlide, doFrame) {
	// Hide select boxes for IE6 and below
	if (this.ie && !this.ie7) {	this.toggleSelects('hide');	}
	
	// Hide flash objects (should add a boolean to disable this)
	if (this.hideFlash) { this.toggleFlash('hide'); }
	
	// If we're dealing with frames instead of images.
	this.isLyteframe = (doFrame ? true : false);
	
	// stretch overlay to fill page and fade in
	var pageSize	= this.getPageSize();
	var objOverlay	= this.doc.getElementById('lbOverlay');
	var objBody		= this.doc.getElementsByTagName("body").item(0);
	
	objOverlay.style.height = pageSize[1] + "px";
	objOverlay.style.display = '';
	
	// If animations are enabled, then fade in the overlay, otherwise set it to this.maxOpacity.
	this.appear('lbOverlay', (this.doAnimations ? 0 : this.maxOpacity));
	
	// Get a reference to our anchor and area tags so we can use them below.
	var anchors = (this.isFrame) ? window.parent.frames[window.name].document.getElementsByTagName('a') : document.getElementsByTagName('a');
	var areas = (this.isFrame) ? window.parent.frames[window.name].document.getElementsByTagName('area') : document.getElementsByTagName('area');
	
	// Combine both into a single array.
	var lyteLinks = this.combine(anchors, areas);
	
	// If we are using LyteFrame, show the iframe and load the document, otherwise we are using LyteBox/LyteShow.
	if (this.isLyteframe) {
		this.frameArray = [];
		this.frameNum = 0;
		
		// if frame is NOT part of a set
		if ((imageLink.getAttribute('rel') == 'lyteframe')) { // add a single frame page to frameArray
			var rev = imageLink.getAttribute('rev');
			this.frameArray.push(new Array(imageLink.getAttribute('href'), imageLink.getAttribute('title'), (rev == null || rev == '' ? 'width: 720px; height: 420px; scrolling: auto;' : rev)));
		} else { // frame is part of a set
			// loop through anchors and areas, find other frames in set, and add them to frameArray
			if (imageLink.getAttribute('rel').indexOf('lyteframe') != -1) {
				for (var i = 0; i < lyteLinks.length; i++) {
					var myLink = lyteLinks[i];
					if (myLink.getAttribute('href') && (myLink.getAttribute('rel') == imageLink.getAttribute('rel'))) {
						var rev = myLink.getAttribute('rev');
						this.frameArray.push(new Array(myLink.getAttribute('href'), myLink.getAttribute('title'), (rev == null || rev == '' ? 'width: 720px; height: 420px; scrolling: auto;' : rev)));
					}
				}
				this.frameArray.removeDuplicates();
				while(this.frameArray[this.frameNum][0] != imageLink.getAttribute('href')) { this.frameNum++; }
			}
		}
	} else {
		this.imageArray = [];
		this.imageNum = 0;
		this.slideArray = [];
		this.slideNum = 0;		
	
		// if image is NOT part of a set..
		if ((imageLink.getAttribute('rel') == 'lytebox')) {	// add single image to imageArray
			this.imageArray.push(new Array(imageLink.getAttribute('href'), imageLink.getAttribute('title')));
		} else { // image is part of a set..
			// loop through anchors and areas, find other images in set, and add them to imageArray or slideArray
			if (imageLink.getAttribute('rel').indexOf('lytebox') != -1) {
				for (var i = 0; i < lyteLinks.length; i++) {
					var myLink = lyteLinks[i];
					if (myLink.getAttribute('href') && (myLink.getAttribute('rel') == imageLink.getAttribute('rel'))) {
						$index = $("a[href='"+myLink.getAttribute('href',2)+"']").parent().parent().index();
						//this.imageArray.push(new Array(myLink.getAttribute('href'), myLink.getAttribute('title'))); // before
						this.imageArray.push(new Array(myLink.getAttribute('href'), $("p.styleText:eq("+$index+")").text() )); // after
					}
				}
				this.imageArray.removeDuplicates();
				while(this.imageArray[this.imageNum][0] != imageLink.getAttribute('href')) { this.imageNum++; }
			}
			if (imageLink.getAttribute('rel').indexOf('lyteshow') != -1) {
				for (var i = 0; i < lyteLinks.length; i++) {
					var myLink = lyteLinks[i];
					if (myLink.getAttribute('href') && (myLink.getAttribute('rel') == imageLink.getAttribute('rel'))) {
						this.slideArray.push(new Array(myLink.getAttribute('href'), myLink.getAttribute('title')));
					}
				}
				this.slideArray.removeDuplicates();
				while(this.slideArray[this.slideNum][0] != imageLink.getAttribute('href')) { this.slideNum++; }
			}
		}
	}

	// Calculate top offset for the lytebox and display.
	var object = this.doc.getElementById('lbMain');
		object.style.top = (this.getPageScroll() + (pageSize[3] / 15)) + "px";
		object.style.display = '';
		
	// Reset the bottom border from #lbOuterContainer.
	if (!this.outerBorder) {
		this.doc.getElementById('lbOuterContainer').style.border = 'none';
		this.doc.getElementById('lbDetailsContainer').style.border = 'none';
	} else {
		this.doc.getElementById('lbOuterContainer').style.borderBottom = '';
		this.doc.getElementById('lbOuterContainer').setAttribute((this.ie && !((this.ie8 || this.ie9) && this.doc.compatMode != 'BackCompat') ? 'className' : 'class'), this.theme);
	}
		
	// Now we need to assign "onclick" handlers for various buttons. It's being done here because IE was apparently having
	// problems with assigning these when the elements were actually created on the page. This occurred randomly, and I was
	// not able to determine why. Whatever the case, the buttons appear to work fine by moving the assignments here. IE sux.
	this.doc.getElementById('lbOverlay').onclick = function() { myLytebox.end(); return false; }
	this.doc.getElementById('lbMain').onclick = function(e) {
		var e = e;
		if (!e) {
			if (window.parent.frames[window.name] && (parent.document.getElementsByTagName('frameset').length <= 0)) {
				e = window.parent.window.event;
			} else {
				e = window.event;
			}
		}
		var id = (e.target ? e.target.id : e.srcElement.id);
		if (id == 'lbMain') { myLytebox.end(); return false; }
	}
	this.doc.getElementById('lbClose').onclick = function() { myLytebox.end(); return false; }
	this.doc.getElementById('lbPause').onclick = function() { myLytebox.togglePlayPause("lbPause", "lbPlay"); return false; }
	this.doc.getElementById('lbPlay').onclick = function() { myLytebox.togglePlayPause("lbPlay", "lbPause"); return false; }	
	
	// Setup for a slideshow... will be used later to show/hide certain images, based on settings.
	this.isSlideshow = doSlide;
	this.isPaused = (this.slideNum != 0 ? true : false);
	
	// We need to be sure that the "Play" button is visible if the slideshow is paused, since "Pause" is displayed by default.
	if (this.isSlideshow && this.showPlayPause && this.isPaused) {
		this.doc.getElementById('lbPlay').style.display = '';
		this.doc.getElementById('lbPause').style.display = 'none';
	}
	
	if (this.isLyteframe) {
		this.changeContent(this.frameNum);
	} else {
		if (this.isSlideshow) {
			this.changeContent(this.slideNum);
		} else {
			this.changeContent(this.imageNum);
		}
	}
};

//******************************************************************************/
// changeContent()
// Hide most elements and load iframe or preload image in preparation for 
// resizing the content container.
//*******************************************************************************/
LyteBox.prototype.changeContent = function(imageNum) {
	// We clear the slideshow timers, if it's a slideshow, just in case "Next/Prev" navigation is enabled and user moves back/forward.
	if (this.isSlideshow) {
		for (var i = 0; i < this.slideshowIDCount; i++) { window.clearTimeout(this.slideshowIDArray[i]); }
	}
	
	// save image number to member variable for later access
	this.activeImage = this.activeSlide = this.activeFrame = imageNum;
	
	// Reset the bottom border from #lbOuterContainer.
	if (!this.outerBorder) {
		this.doc.getElementById('lbOuterContainer').style.border = 'none';
		this.doc.getElementById('lbDetailsContainer').style.border = 'none';
	} else {
		this.doc.getElementById('lbOuterContainer').style.borderBottom = '';
		this.doc.getElementById('lbOuterContainer').setAttribute((this.ie && !((this.ie8 || this.ie9) && this.doc.compatMode != 'BackCompat') ? 'className' : 'class'), this.theme);
	}

	// hide elements during transition
	this.doc.getElementById('lbLoading').style.display = '';
	this.doc.getElementById('lbImage').style.display = 'none';
	this.doc.getElementById('lbIframe').style.display = 'none';
	this.doc.getElementById('lbPrev').style.display = 'none';
	this.doc.getElementById('lbNext').style.display = 'none';
	this.doc.getElementById('lbIframeContainer').style.display = 'none';
	this.doc.getElementById('lbDetailsContainer').style.display = 'none';
	this.doc.getElementById('lbNumberDisplay').style.display = 'none';
	if (this.navType == 2 || this.isLyteframe) {
		object = this.doc.getElementById('lbNavDisplay');
		object.innerHTML = '&nbsp;&nbsp;&nbsp;<span id="lbPrev2_Off" style="display: none;" class="' + this.theme + '">&laquo; prev</span><a href="#" id="lbPrev2" class="' + this.theme + '" style="display: none;">&laquo; prev</a> <b id="lbSpacer" class="' + this.theme + '">||</b> <span id="lbNext2_Off" style="display: none;" class="' + this.theme + '">next &raquo;</span><a href="#" id="lbNext2" class="' + this.theme + '" style="display: none;">next &raquo;</a>';
		object.style.display = 'none';
	}
	
	if (this.isLyteframe) {
		var iframe = myLytebox.doc.getElementById('lbIframe');
		var styles = this.frameArray[this.activeFrame][2];
		
		// if custom styling is to be used (meaning an rev tag was supplied), then get all the attributes that we want to set.
		var aStyles = styles.split(';');

		for (var i = 0; i < aStyles.length; i++) {
			if (aStyles[i].indexOf('width:') >= 0) {
				var w = aStyles[i].replace('width:', '');
				iframe.width = w.trim();
			} else if (aStyles[i].indexOf('height:') >= 0) {
				var h = aStyles[i].replace('height:', '');
				iframe.height = h.trim();
			} else if (aStyles[i].indexOf('scrolling:') >= 0) {
				var s = aStyles[i].replace('scrolling:', '');
				iframe.scrolling = s.trim();
			} else if (aStyles[i].indexOf('border:') >= 0) {
				// Not implemented yet, as there are cross-platform issues with setting the border (from a GUI standpoint)
				//var b = aStyles[i].replace('border:', '');
				//iframe.style.border = b.trim();
			}
		}
		
		this.resizeContainer(parseInt(iframe.width), parseInt(iframe.height));
	} else {
		imgPreloader = new Image();
	
		// once image is preloaded, resize image container (and image, if necessary)
		imgPreloader.onload = function() {
			
			var imageWidth = imgPreloader.width;
			var imageHeight = imgPreloader.height;
			
			if (myLytebox.autoResize) {
				// Resizing for large images taken from thickbox
				var pagesize = myLytebox.getPageSize();
				var x = pagesize[2] - 150;
				var y = pagesize[3] - 150;
				
				if (imageWidth > x) {
					imageHeight = Math.round(imageHeight * (x / imageWidth));
					imageWidth = x; 
					if (imageHeight > y) { 
						imageWidth = Math.round(imageWidth * (y / imageHeight));
						imageHeight = y; 
					}
				} else if (imageHeight > y) { 
					imageWidth = Math.round(imageWidth * (y / imageHeight));
					imageHeight = y; 
					if (imageWidth > x) {
						imageHeight = Math.round(imageHeight * (x / imageWidth));
						imageWidth = x;
					}
				}
			}
			
			var lbImage = myLytebox.doc.getElementById('lbImage')
			lbImage.src = (myLytebox.isSlideshow ? myLytebox.slideArray[myLytebox.activeSlide][0] : myLytebox.imageArray[myLytebox.activeImage][0]);
			lbImage.width = imageWidth;
			lbImage.height = imageHeight;
			myLytebox.resizeContainer(imageWidth, imageHeight);
			imgPreloader.onload = function() {}; // IE animated .gif fix.
		}			
	
		imgPreloader.src = (this.isSlideshow ? this.slideArray[this.activeSlide][0] : this.imageArray[this.activeImage][0]);
	}
};

//******************************************************************************/
// resizeContainer()
//******************************************************************************/
LyteBox.prototype.resizeContainer = function(imgWidth, imgHeight) {
	// get current height and width
	this.wCur = this.doc.getElementById('lbOuterContainer').offsetWidth;
	this.hCur = this.doc.getElementById('lbOuterContainer').offsetHeight;

	// scalars based on change from old to new
	this.xScale = ((imgWidth  + (this.borderSize * 2)) / this.wCur) * 100;
	this.yScale = ((imgHeight  + (this.borderSize * 2)) / this.hCur) * 100;

	// calculate size difference between new and old image, and resize if necessary
	var wDiff = (this.wCur - this.borderSize * 2) - imgWidth;
	var hDiff = (this.hCur - this.borderSize * 2) - imgHeight;
	
	if (!(hDiff == 0)) {
		this.hDone = false;
		this.resizeH('lbOuterContainer', this.hCur, imgHeight + this.borderSize*2, this.getPixelRate(this.hCur, imgHeight));
	} else {
		this.hDone = true;
	}
	if (!(wDiff == 0)) {
		this.wDone = false;
		this.resizeW('lbOuterContainer', this.wCur, imgWidth + this.borderSize*2, this.getPixelRate(this.wCur, imgWidth));
	} else {
		this.wDone = true;
	}

	// if new and old image are same size and no scaling transition is necessary, do a quick pause to prevent image flicker.
	if ((hDiff == 0) && (wDiff == 0)) {
		if (this.ie){ this.pause(250); } else { this.pause(100); } 
	}
	
	this.doc.getElementById('lbPrev').style.height = imgHeight + "px";
	this.doc.getElementById('lbNext').style.height = imgHeight + "px";
	
	// Have to add an additional 2 pixels because IE is retarded. This is only if the border is being displayed.
	this.doc.getElementById('lbDetailsContainer').style.width = (imgWidth + (this.borderSize * 2) + (this.ie && this.doc.compatMode == "BackCompat" && this.outerBorder ? 2 : 0)) + "px";
	this.showContent();
};

//******************************************************************************/
// showContent() - Display content (iframes, images, etc.) and begin preloading 
//				   neighbors images, if we are dealing with images.
//******************************************************************************/
LyteBox.prototype.showContent = function() {
	if (this.wDone && this.hDone) {
		// Clear the timer for showContent...
		for (var i = 0; i < this.showContentTimerCount; i++) { window.clearTimeout(this.showContentTimerArray[i]); }
		
		// Remove the bottom border from #lbOuterContainer.
		if (this.outerBorder) {
			this.doc.getElementById('lbOuterContainer').style.borderBottom = 'none';
		}
		
		this.doc.getElementById('lbLoading').style.display = 'none';
		
		if (this.isLyteframe) {
			this.doc.getElementById('lbIframe').style.display = '';
			this.appear('lbIframe', (this.doAnimations ? 0 : 100));
		} else {
			this.doc.getElementById('lbImage').style.display = '';
			this.appear('lbImage', (this.doAnimations ? 0 : 100));
			this.preloadNeighborImages();
		}
		
		if (this.isSlideshow) {
			// if last image in set, close the slideshow
			if(this.activeSlide == (this.slideArray.length - 1)) {
				if (this.autoEnd) {
					this.slideshowIDArray[this.slideshowIDCount++] = setTimeout("myLytebox.end('slideshow')", this.slideInterval);
				}
			// otherwise, call changeContent in "this.slideInterval" seconds to automatically move to the next slide
			} else {
				if (!this.isPaused) {
					this.slideshowIDArray[this.slideshowIDCount++] = setTimeout("myLytebox.changeContent("+(this.activeSlide+1)+")", this.slideInterval);
				}
			}
			
			this.doc.getElementById('lbHoverNav').style.display = (this.showNavigation && this.navType == 1 ? '' : 'none');
			this.doc.getElementById('lbClose').style.display = (this.showClose ? '' : 'none');
			this.doc.getElementById('lbDetails').style.display = (this.showDetails ? '' : 'none');
			this.doc.getElementById('lbPause').style.display = (this.showPlayPause && !this.isPaused ? '' : 'none');
			this.doc.getElementById('lbPlay').style.display = (this.showPlayPause && !this.isPaused ? 'none' : '');
			this.doc.getElementById('lbNavDisplay').style.display = (this.showNavigation && this.navType == 2 ? '' : 'none');
		} else {
			this.doc.getElementById('lbHoverNav').style.display = (this.navType == 1 && !this.isLyteframe ? '' : 'none');
			if ((this.navType == 2 && !this.isLyteframe && this.imageArray.length > 1) || (this.frameArray.length > 1 && this.isLyteframe)) {
				this.doc.getElementById('lbNavDisplay').style.display = '';
			} else {
				this.doc.getElementById('lbNavDisplay').style.display = 'none';
			}
			this.doc.getElementById('lbClose').style.display = '';
			this.doc.getElementById('lbDetails').style.display = '';
			this.doc.getElementById('lbPause').style.display = 'none';
			this.doc.getElementById('lbPlay').style.display = 'none';
		}
		
		this.doc.getElementById('lbImageContainer').style.display = (this.isLyteframe ? 'none' : '');
		this.doc.getElementById('lbIframeContainer').style.display = (this.isLyteframe ? '' : 'none');
		
		// try/catch added for IE6
		try {
			this.doc.getElementById('lbIframe').src = this.frameArray[this.activeFrame][0];
		} catch(e) { }
	} else {
		this.showContentTimerArray[this.showContentTimerCount++] = setTimeout("myLytebox.showContent()", 200);
	}
};

//******************************************************************************/
// updateDetails() - Display caption, and bottom nav.
//******************************************************************************/
LyteBox.prototype.updateDetails = function() {
	var object = this.doc.getElementById('lbCaption');
	var sTitle = (this.isSlideshow ? this.slideArray[this.activeSlide][1] : (this.isLyteframe ? this.frameArray[this.activeFrame][1] : this.imageArray[this.activeImage][1]));
	object.style.display = '';
	object.innerHTML = (sTitle == null ? '' : sTitle);
	
	this.updateNav();
	this.doc.getElementById('lbDetailsContainer').style.display = '';
	
	object = this.doc.getElementById('lbNumberDisplay');
	
	// if part of set display 'Image x of x' or 'Page x of x'
	if (this.isSlideshow && this.slideArray.length > 1) {
		object.style.display = '';
		object.innerHTML = "Image " + eval(this.activeSlide + 1) + " of " + this.slideArray.length;
		this.doc.getElementById('lbNavDisplay').style.display = (this.navType == 2 && this.showNavigation ? '' : 'none');
	} else if (this.imageArray.length > 1 && !this.isLyteframe) {
		object.style.display = '';
		object.innerHTML = "Image " + eval(this.activeImage + 1) + " of " + this.imageArray.length;
		this.doc.getElementById('lbNavDisplay').style.display = (this.navType == 2 ? '' : 'none');
	} else if (this.frameArray.length > 1 && this.isLyteframe) {
		object.style.display = '';
		object.innerHTML = "Page " + eval(this.activeFrame + 1) + " of " + this.frameArray.length;
		this.doc.getElementById('lbNavDisplay').style.display = '';
	} else {
		this.doc.getElementById('lbNavDisplay').style.display = 'none';
	}
	
	this.appear('lbDetailsContainer', (this.doAnimations ? 0 : 100));
};

//******************************************************************************/
// updateNav() - Display appropriate previous and next hover navigation.
//******************************************************************************/
LyteBox.prototype.updateNav = function() {
	if (this.isSlideshow) {
		// if not first image in set, display prev image button
		if (this.activeSlide != 0) {
			var object = (this.navType == 2 ? this.doc.getElementById('lbPrev2') : this.doc.getElementById('lbPrev'));
				object.style.display = '';
				object.onclick = function() {
					if (myLytebox.pauseOnPrevClick) { myLytebox.togglePlayPause("lbPause", "lbPlay"); }
					myLytebox.changeContent(myLytebox.activeSlide - 1); return false;
				}
		} else {
			if (this.navType == 2) { this.doc.getElementById('lbPrev2_Off').style.display = ''; }
		}
		// if not last image in set, display next image button
		if (this.activeSlide != (this.slideArray.length - 1)) {
			var object = (this.navType == 2 ? this.doc.getElementById('lbNext2') : this.doc.getElementById('lbNext'));
				object.style.display = '';
				object.onclick = function() {
					if (myLytebox.pauseOnNextClick) { myLytebox.togglePlayPause("lbPause", "lbPlay"); }
					myLytebox.changeContent(myLytebox.activeSlide + 1); return false;
				}
		} else {
			if (this.navType == 2) { this.doc.getElementById('lbNext2_Off').style.display = ''; }
		}
	} else if (this.isLyteframe) {
		// if not first image in set, display prev image button
		if(this.activeFrame != 0) {
			var object = this.doc.getElementById('lbPrev2');
				object.style.display = '';
				object.onclick = function() {
					myLytebox.changeContent(myLytebox.activeFrame - 1); return false;
				}
		} else {
			this.doc.getElementById('lbPrev2_Off').style.display = '';
		}
		// if not last image in set, display next image button
		if(this.activeFrame != (this.frameArray.length - 1)) {
			var object = this.doc.getElementById('lbNext2');
				object.style.display = '';
				object.onclick = function() {
					myLytebox.changeContent(myLytebox.activeFrame + 1); return false;
				}
		} else {
			this.doc.getElementById('lbNext2_Off').style.display = '';
		}		
	} else {
		// if not first image in set, display prev image button
		if(this.activeImage != 0) {
			var object = (this.navType == 2 ? this.doc.getElementById('lbPrev2') : this.doc.getElementById('lbPrev'));
				object.style.display = '';
				object.onclick = function() {
					myLytebox.changeContent(myLytebox.activeImage - 1); return false;
				}
		} else {
			if (this.navType == 2) { this.doc.getElementById('lbPrev2_Off').style.display = ''; }
		}
		// if not last image in set, display next image button
		if(this.activeImage != (this.imageArray.length - 1)) {
			var object = (this.navType == 2 ? this.doc.getElementById('lbNext2') : this.doc.getElementById('lbNext'));
				object.style.display = '';
				object.onclick = function() {
					myLytebox.changeContent(myLytebox.activeImage + 1); return false;
				}
		} else {
			if (this.navType == 2) { this.doc.getElementById('lbNext2_Off').style.display = ''; }
		}
	}
	
	this.enableKeyboardNav();
};

//********************************************************************************/
// enableKeyboardNav(), disableKeyboardNav(), keyboardAction() -- COMBINED COMMENT
//********************************************************************************/
LyteBox.prototype.enableKeyboardNav = function() { document.onkeydown = this.keyboardAction; };
LyteBox.prototype.disableKeyboardNav = function() { document.onkeydown = ''; };
LyteBox.prototype.keyboardAction = function(e) {
	var keycode = key = escape = null;
	keycode	= (e == null) ? event.keyCode : e.which;
	key		= String.fromCharCode(keycode).toLowerCase();
	escape  = (e == null) ? 27 : e.DOM_VK_ESCAPE;
	
	if ((key == 'x') || (key == 'c') || (keycode == escape)) {	// close lytebox
		myLytebox.end();
	} else if ((key == 'p') || (keycode == 37)) {	// display previous image
		if (myLytebox.isSlideshow) {
			if(myLytebox.activeSlide != 0) {
				myLytebox.disableKeyboardNav();
				myLytebox.changeContent(myLytebox.activeSlide - 1);
			}
		} else if (myLytebox.isLyteframe) {
			if(myLytebox.activeFrame != 0) {
				myLytebox.disableKeyboardNav();
				myLytebox.changeContent(myLytebox.activeFrame - 1);
			}
		} else {
			if(myLytebox.activeImage != 0) {
				myLytebox.disableKeyboardNav();
				myLytebox.changeContent(myLytebox.activeImage - 1);
			}
		}
	} else if ((key == 'n') || (keycode == 39)) {	// display next image
		if (myLytebox.isSlideshow) {
			if(myLytebox.activeSlide != (myLytebox.slideArray.length - 1)) {
				myLytebox.disableKeyboardNav();
				myLytebox.changeContent(myLytebox.activeSlide + 1);
			}
		} else if (myLytebox.isLyteframe) {
			if(myLytebox.activeFrame != (myLytebox.frameArray.length - 1)) {
				myLytebox.disableKeyboardNav();
				myLytebox.changeContent(myLytebox.activeFrame + 1);
			}
		} else {
			if(myLytebox.activeImage != (myLytebox.imageArray.length - 1)) {
				myLytebox.disableKeyboardNav();
				myLytebox.changeContent(myLytebox.activeImage + 1);
			}
		}
	}
};

//********************************************************************************/
// preloadNeighborImages() - Preload previous and next images.
//********************************************************************************/
LyteBox.prototype.preloadNeighborImages = function() {
	if (this.isSlideshow) {
		if ((this.slideArray.length - 1) > this.activeSlide) {
			preloadNextImage = new Image();
			preloadNextImage.src = this.slideArray[this.activeSlide + 1][0];
		}
		if(this.activeSlide > 0) {
			preloadPrevImage = new Image();
			preloadPrevImage.src = this.slideArray[this.activeSlide - 1][0];
		}
	} else {
		if ((this.imageArray.length - 1) > this.activeImage) {
			preloadNextImage = new Image();
			preloadNextImage.src = this.imageArray[this.activeImage + 1][0];
		}
		if(this.activeImage > 0) {
			preloadPrevImage = new Image();
			preloadPrevImage.src = this.imageArray[this.activeImage - 1][0];
		}
	}
};

//************************************************************************************************/
// togglePlayPause() - Toggle play/pause buttons, and set isPaused to play or pause the slideshow.
//************************************************************************************************/
LyteBox.prototype.togglePlayPause = function(hideID, showID) {
	// clear all settimeout's immediately to avoid going to next slide... if "pause" was pressed.
	// if this was a slideshow, then clear the appropriate timeout id array
	if (this.isSlideshow && hideID == "lbPause") {
		for (var i = 0; i < this.slideshowIDCount; i++) { window.clearTimeout(this.slideshowIDArray[i]); }
	}
	
	this.doc.getElementById(hideID).style.display = 'none';
	this.doc.getElementById(showID).style.display = '';
	
	// determine the state (paused or not) and take the appropriate action (changeContent or end) if the play button is clicked
	if (hideID == "lbPlay") {
		this.isPaused = false;
		
		if (this.activeSlide == (this.slideArray.length - 1)) {
			// last image... close the slideshow
			this.end();
		} else {
			// change to the next image in the slideshow
			this.changeContent(this.activeSlide + 1);
		}
	} else {
		this.isPaused = true;
	}
};

//********************************************************************************/
// end() - caller was added as a parameter so that we could close Lytebox if
//		   the "Close" button is clicked while in the "paused" state.
//********************************************************************************/
LyteBox.prototype.end = function(caller) {
	var closeClick = (caller == 'slideshow' ? false : true);
	
	// if we're doing a slideshow and in a paused state, just return
	if (this.isSlideshow && this.isPaused && !closeClick) { return; }
	
	this.disableKeyboardNav();
	this.doc.getElementById('lbMain').style.display = 'none';
	this.fade('lbOverlay', (this.doAnimations ? this.maxOpacity : 0));
	this.toggleSelects('visible');
	if (this.hideFlash) { this.toggleFlash('visible'); }
	
	// if this was a slideshow, then clear the appropriate timeout id array
	if (this.isSlideshow) {
		for (var i = 0; i < this.slideshowIDCount; i++) { window.clearTimeout(this.slideshowIDArray[i]); }
	}
	
	// if this was a "lyteframe", re-initialize so that the iframe is reset (fixes a bug where IE continues playing flash content)
	if (this.isLyteframe) {
		 this.initialize();
	}
};

//***********************************************************************************/
// checkFrame() - Determines if we are in an iFrame or not so we can display properly
//***********************************************************************************/
LyteBox.prototype.checkFrame = function() {
	// If we are an iFrame ONLY (framesets are excluded because we can't overlay a frameset). Note that there are situations
	// where "this" will not refer to LyteBox, such as when buttons are clicked, therefor we have to set this.lytebox appropriately.
	if (window.parent.frames[window.name] && (parent.document.getElementsByTagName('frameset').length <= 0)) {
		this.isFrame = true;
		this.lytebox = "window.parent." + window.name + ".myLytebox";
		this.doc = parent.document;
	} else {
		this.isFrame = false;
		this.lytebox = "myLytebox";
		this.doc = document;
	}
};

//*******************************************************************************************/
// getPixelRate() - Determines the rate (number of pixels) that we want to scale PER call
//				    to a setTimeout() function. "cur" represents the current width or height,
//					and img represents the image (new) width or height.
//*******************************************************************************************/
LyteBox.prototype.getPixelRate = function(cur, img) {
	var diff = (img > cur) ? img - cur : cur - img;
	
	if (diff >= 0 && diff <= 100) { return 10; }		/* Replaced > with >= for popup window fix. */
	if (diff > 100 && diff <= 200) { return 15; }
	if (diff > 200 && diff <= 300) { return 20; }
	if (diff > 300 && diff <= 400) { return 25; }
	if (diff > 400 && diff <= 500) { return 30; }
	if (diff > 500 && diff <= 600) { return 35; }
	if (diff > 600 && diff <= 700) { return 40; }
	if (diff > 700) { return 45; }
};

//********************************************************************************/
// appear() - Makes an element fade in (appear).
//********************************************************************************/
LyteBox.prototype.appear = function(id, opacity) {
	var object = this.doc.getElementById(id).style;
	object.opacity = (opacity / 100);
	object.MozOpacity = (opacity / 100);
	object.KhtmlOpacity = (opacity / 100);
	object.filter = "alpha(opacity=" + (opacity + 10) + ")";
	
	if (opacity == 100 && (id == 'lbImage' || id == 'lbIframe')) {
		try { object.removeAttribute("filter"); } catch(e) {}	/* Fix added for IE Alpha Opacity Filter bug. */
		this.updateDetails();
	} else if (opacity >= this.maxOpacity && id == 'lbOverlay') {
		// Clear the overlay timer...
		for (var i = 0; i < this.overlayTimerCount; i++) { window.clearTimeout(this.overlayTimerArray[i]); }
		return;
	} else if (opacity >= 100 && id == 'lbDetailsContainer') {
		try { object.removeAttribute("filter"); } catch(e) {}	/* Fix added for IE Alpha Opacity Filter bug. */
		
		// Clear all the image timers...
		for (var i = 0; i < this.imageTimerCount; i++) { window.clearTimeout(this.imageTimerArray[i]); }
		
		// Here we resize the overlay to ensure that it stretches the length of the page, since there is
		// an issue with white space remaining if the image scales outside of the known page height...
		this.doc.getElementById('lbOverlay').style.height = this.getPageSize()[1] + "px";
	} else {
		if (id == 'lbOverlay') {
			this.overlayTimerArray[this.overlayTimerCount++] = setTimeout("myLytebox.appear('" + id + "', " + (opacity+20) + ")", 1);
		} else {
			this.imageTimerArray[this.imageTimerCount++] = setTimeout("myLytebox.appear('" + id + "', " + (opacity+10) + ")", 1);
		}
	}
};

//********************************************************************************/
// fade() - Makes an element fade out (disappear).
//********************************************************************************/
LyteBox.prototype.fade = function(id, opacity) {
	var object = this.doc.getElementById(id).style;
	object.opacity = (opacity / 100);
	object.MozOpacity = (opacity / 100);
	object.KhtmlOpacity = (opacity / 100);
	object.filter = "alpha(opacity=" + opacity + ")";
	
	if (opacity <= 0) {
		try {
			object.display = 'none';
		} catch(err) { }
	} else if (id == 'lbOverlay') {
		this.overlayTimerArray[this.overlayTimerCount++] = setTimeout("myLytebox.fade('" + id + "', " + (opacity-20) + ")", 1);
	} else {
		this.timerIDArray[this.timerIDCount++] = setTimeout("myLytebox.fade('" + id + "', " + (opacity-10) + ")", 1);
	}
};

//********************************************************************************/
// resizeW() - Resize the width of an element (smooth animation)...
//********************************************************************************/
LyteBox.prototype.resizeW = function(id, curW, maxW, pixelrate, speed) {
	// Ensure that the "height" is finished resizing before scaling the width.
	if (!this.hDone) {
		this.resizeWTimerArray[this.resizeWTimerCount++] = setTimeout("myLytebox.resizeW('" + id + "', " + curW + ", " + maxW + ", " + pixelrate + ")", 100);
		return;
	}
	
	var object = this.doc.getElementById(id);
	var timer = speed ? speed : (this.resizeDuration/2);
	var newW = (this.doAnimations ? curW : maxW);
	
	object.style.width = (newW) + "px";
	
	if (newW < maxW) {
		newW += (newW + pixelrate >= maxW) ? (maxW - newW) : pixelrate;	// increase size
	} else if (newW > maxW) {
		newW -= (newW - pixelrate <= maxW) ? (newW - maxW) : pixelrate;	// decrease size
	}
	this.resizeWTimerArray[this.resizeWTimerCount++] = setTimeout("myLytebox.resizeW('" + id + "', " + newW + ", " + maxW + ", " + pixelrate + ", " + (timer+0.02) + ")", timer+0.02);
	
	if (parseInt(object.style.width) == maxW) {
		this.wDone = true;
		// Clear all the timers for resizing...
		for (var i = 0; i < this.resizeWTimerCount; i++) { window.clearTimeout(this.resizeWTimerArray[i]); }
	}
};

//********************************************************************************/
// resizeH() - Resize the height of an element (smooth animation)...
//********************************************************************************/
LyteBox.prototype.resizeH = function(id, curH, maxH, pixelrate, speed) {
	var timer = speed ? speed : (this.resizeDuration/2);
	var object = this.doc.getElementById(id);
	var newH = (this.doAnimations ? curH : maxH);
	
	object.style.height = (newH) + "px";
	
	if (newH < maxH) {
		newH += (newH + pixelrate >= maxH) ? (maxH - newH) : pixelrate;	// increase size
	} else if (newH > maxH) {
		newH -= (newH - pixelrate <= maxH) ? (newH - maxH) : pixelrate;	// decrease size
	}
	this.resizeHTimerArray[this.resizeHTimerCount++] = setTimeout("myLytebox.resizeH('" + id + "', " + newH + ", " + maxH + ", " + pixelrate + ", " + (timer+.02) + ")", timer+.02);
	
	if (parseInt(object.style.height) == maxH) {
		this.hDone = true;
		// Clear all the timers for resizing...
		for (var i = 0; i < this.resizeHTimerCount; i++) { window.clearTimeout(this.resizeHTimerArray[i]); }
	}
};

//**************************************************/
// getPageScroll() - returns the y page scroll value
//**************************************************/
LyteBox.prototype.getPageScroll = function() {
	if (self.pageYOffset) {
		return this.isFrame ? parent.pageYOffset : self.pageYOffset;
	} else if (this.doc.documentElement && this.doc.documentElement.scrollTop){	 // Explorer 6 Strict
		return this.doc.documentElement.scrollTop;
	} else if (document.body) {// all other Explorers
		return this.doc.body.scrollTop;
	}
};

//*******************************************************************************/
// getPageSize() - Returns array with page width, height and window width, height
// Core code from - quirksmode.org, Edit for Firefox by pHaez
//*******************************************************************************/
LyteBox.prototype.getPageSize = function() {	
	var xScroll, yScroll, windowWidth, windowHeight;
	
	if (window.innerHeight && window.scrollMaxY) {
		xScroll = this.doc.scrollWidth;
		yScroll = (this.isFrame ? parent.innerHeight : self.innerHeight) + (this.isFrame ? parent.scrollMaxY : self.scrollMaxY);
	} else if (this.doc.body.scrollHeight > this.doc.body.offsetHeight){ // all but Explorer Mac
		xScroll = this.doc.body.scrollWidth;
		yScroll = this.doc.body.scrollHeight;
	} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
		xScroll = this.doc.getElementsByTagName("html").item(0).offsetWidth;
		yScroll = this.doc.getElementsByTagName("html").item(0).offsetHeight;
		
		// Strict mode fixes
		xScroll = (xScroll < this.doc.body.offsetWidth) ? this.doc.body.offsetWidth : xScroll;
		yScroll = (yScroll < this.doc.body.offsetHeight) ? this.doc.body.offsetHeight : yScroll;
	}
	
	if (self.innerHeight) {	// all except Explorer
		windowWidth = (this.isFrame) ? parent.innerWidth : self.innerWidth;
		windowHeight = (this.isFrame) ? parent.innerHeight : self.innerHeight;
	} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
		windowWidth = this.doc.documentElement.clientWidth;
		windowHeight = this.doc.documentElement.clientHeight;
	} else if (document.body) { // other Explorers
		windowWidth = this.doc.getElementsByTagName("html").item(0).clientWidth;
		windowHeight = this.doc.getElementsByTagName("html").item(0).clientHeight;
		
		// Strict mode fixes...
		windowWidth = (windowWidth == 0) ? this.doc.body.clientWidth : windowWidth;
		windowHeight = (windowHeight == 0) ? this.doc.body.clientHeight : windowHeight;
	}
	
	// for small pages with total height/width less then height/width of the viewport
	var pageHeight = (yScroll < windowHeight) ? windowHeight : yScroll;
	var pageWidth = (xScroll < windowWidth) ? windowWidth : xScroll;
	
	return new Array(pageWidth, pageHeight, windowWidth, windowHeight);
};

//**********************************************************************************************************/
// toggleFlash(state) - Toggles embedded Flash objects so they don't appear above the overlay/lytebox.
//**********************************************************************************************************/
LyteBox.prototype.toggleFlash = function(state) {
	var objects = this.doc.getElementsByTagName("object");
	for (var i = 0; i < objects.length; i++) {
		objects[i].style.visibility = (state == "hide") ? 'hidden' : 'visible';
	}

	var embeds = this.doc.getElementsByTagName("embed");
	for (var i = 0; i < embeds.length; i++) {
		embeds[i].style.visibility = (state == "hide") ? 'hidden' : 'visible';
	}
	
	if (this.isFrame) {
		for (var i = 0; i < parent.frames.length; i++) {
			try {
				objects = parent.frames[i].window.document.getElementsByTagName("object");
				for (var j = 0; j < objects.length; j++) {
					objects[j].style.visibility = (state == "hide") ? 'hidden' : 'visible';
				}
			} catch(e) { /* ignore */ }
			
			try {
				embeds = parent.frames[i].window.document.getElementsByTagName("embed");
				for (var j = 0; j < embeds.length; j++) {
					embeds[j].style.visibility = (state == "hide") ? 'hidden' : 'visible';
				}
			} catch(e) { /* ignore */ }
		}
	}
};

//**********************************************************************************************************/
// toggleSelects(state) - Toggles select boxes between hidden and visible states, including those in iFrames
//**********************************************************************************************************/
LyteBox.prototype.toggleSelects = function(state) {
	// hide in the parent frame, then in child frames
	var selects = this.doc.getElementsByTagName("select");
	for (var i = 0; i < selects.length; i++ ) {
		selects[i].style.visibility = (state == "hide") ? 'hidden' : 'visible';
	}

	if (this.isFrame) {
		for (var i = 0; i < parent.frames.length; i++) {
			try {
				selects = parent.frames[i].window.document.getElementsByTagName("select");
				for (var j = 0; j < selects.length; j++) {
					selects[j].style.visibility = (state == "hide") ? 'hidden' : 'visible';
				}
			} catch(e) { /* ignore */ }
		}
	}
};

//********************************************************************************/
// pause(numberMillis)
// Pauses code execution for specified time. Uses busy code, not good.
// Code from http://www.faqts.com/knowledge_base/view.phtml/aid/1602
//********************************************************************************/
LyteBox.prototype.pause = function(numberMillis) {
	var now = new Date();
	var exitTime = now.getTime() + numberMillis;
	while (true) {
		now = new Date();
		if (now.getTime() > exitTime) { return; }
	}
};

//**********************************************************************************************************/
// combine(anchors, areas) - Combines objects of anchors and areas into a single array.
//**********************************************************************************************************/
LyteBox.prototype.combine = function(anchors, areas) {
	var lyteLinks = [];
	for (var i = 0; i < anchors.length; i++) {
		lyteLinks.push(anchors[i]);
	}
	for (var i = 0; i < areas.length; i++) {
		lyteLinks.push(areas[i]);
	}
	return lyteLinks;
}

//***************/
// add listeners
//***************/
if (window.addEventListener) {		// W3C
	window.addEventListener("load",initLytebox,false);
} else if (window.attachEvent) {	// Exploder
	window.attachEvent("onload",initLytebox);
} else {							// Old skool
	window.onload = function() {initLytebox();}
}

/* START IT UP! */
function initLytebox() { myLytebox = new LyteBox(); }
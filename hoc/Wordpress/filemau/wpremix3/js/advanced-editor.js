jQuery(document).ready(function() {
	var $j = jQuery;
	$j.RemixAdvancedEditor = {
		init: function() { events(); }
	};
	var ThemeUrl = remixeditorvars.template_dir + "/editor/RemixEditor.php";
	function events() {
		$j("#postremixeditor_inside button, #postremixeditor button").bind("click", function() { sent_to_editor();
		return false; });
		$j("#postremixeditor_inside button, , #postremixeditor button").attr("disabled", "disabled");
		$j("#postremixeditor_inside #remix_template, , #postremixeditor #remix_template").bind("change", function() {
			if ($j("#remix_template").attr("value") != $j("#remix_selected_template").attr("value")) {
				$j("#postremixeditor_inside button, #postremixeditor button").removeAttr("disabled", "disabled");
			}
		});
	}
	function sent_to_editor() {
		var s = {};
		s.nonce = $j("#remix_nonce").attr("value");
		s.response = 'ajax-response';
		s.pid = parseInt($j("#post_ID").attr("value"));
		s.action = "sent_to_editor";
		s.type = "POST";
		s.page = $j("#remix_template option:selected").attr("value");
		s.url = ThemeUrl;

		s.data = $j.extend({ action: s.action }, { _ajax_nonce: s.nonce }, { _wpnonce: s.nonce }, { pid:s.pid }, { page:s.page });
		s.global = false;
		s.timeout = 30000;
		//Change the edit text and events
		$j("#postremixeditor_inside button, #postremixeditor button").html("Sending...");
		$j("#postremixeditor_inside button, #postremixeditor button").attr("disabled", "disabled");
		s.success = function(r) {
			$j("#postremixeditor_inside button, #postremixeditor button").html("Send to Editor");
			$j("#remix_selected_template, #rsidebar, #rheader, #rfooter").remove();
			$j("#postremixeditor_inside button").before("<input type='hidden' id='remix_selected_template' name='remix_selected_template' value='" + s.page + "' />");
			if ($j("input[value='_wp_remix_page_template']").length > 0) {      				$j("input[value='_wp_remix_page_template']").parent().next().children(":first").html(s.page); } 
			var res = wpAjax.parseAjaxResponse(r, s.response,s.element);
			$j.each( res.responses, function() {
				switch(this.what) {
					case "content":
						if ($j("#edButtonHTML").attr("class") == "active") {
							window.edInsertContent(window.edCanvas, this.data);
						} else if (typeof tinyMCE != 'undefined' && tinyMCE.getInstanceById('content') ) {
							tinyMCE.selectedInstance.getWin().focus();
							tinyMCE.execCommand('mceInsertContent', false, this.data);
						} else {
							window.edInsertContent(window.edCanvas, this.data);
						}
						break;
					case "sidebar":
							if ($j.trim(this.data) == "Default" ) { break; }
							var sidebar = this.data.split(',');
							var sidebar_code = "<div id='rsidebar'><h4>Select Sidebar</h4><input type='hidden' name='remix_sidebar' id='remix_sidebar' value='" + $j.trim(this.data) + "' /><select name='remix_selected_sidebar' id='remix_selected_sidebar'>";
							jQuery.each(sidebar, function() {
								if (this != "") {
									sidebar_code += '<option value=' + $j.trim(this) + '>' + $j.trim(this) + '</option>';
								}
							});
							sidebar_code += "</select></div>";
							$j("#postremixeditor_inside button, #postremixeditor button").after(sidebar_code);
						break;
				}
			});
		}
		$j.ajax(s);
	} //end sent_to_editor
});
jQuery(document).ready(function(){
   jQuery.RemixAdvancedEditor.init();
	 
});

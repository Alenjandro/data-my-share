<?php //Begin widget code
if ( function_exists('register_sidebars') )
	register_sidebars(2);
?>
<?php
$themename = "WP Remix 3.0";
$wpr_default = 
	array(
		'general' => 
			array(
				'wpr_feedburner_id' => '',
				'wpr_flickr_id' => '88392804@N00',
				'wpr_news' => '6',
				'wpr_featured' => '8',
				'wpr_exclude_news' => '-6',
				'wpr_body_color' => 'default',
				'remix-global-header' => '',
			),
		'header' =>
			array(
				'wpr_custom_links' => '',
				'wpr_header1_logo' => 'logo1.png',
				'wpr_header2_logo' => 'logo2.png',
				'wpr_header2_image' => 'headerbg2.png',
				'wpr_header3_image' => 'headerbg4.jpg',
			),
		'seo' =>
			array(
				'wpr_seo_home_title' => '',
				'wpr_seo_home_desc' => '',
				'wpr_seo_home_key' => '',
				'wpr_seo_format_home' => '%BLOG_TITLE% - %BLOG_TAGLINE%',
				'wpr_seo_format_post' => '%POST_TITLE% - %BLOG_TITLE%',
				'wpr_seo_format_pages' => '%PAGE_TITLE% - %BLOG_TITLE%',
				'wpr_seo_format_category' => '%CATEGORY_TITLE% - %BLOG_TITLE%',
				'wpr_seo_format_archive' => '%ARCHIVE_DATE% - %BLOG_TITLE%',
				'wpr_seo_format_search' => '%SEARCH_QUERY% - %BLOG_TITLE%',
				'wpr_seo_noindex_category' => 0,
				'wpr_seo_noindex_archives' => 0,
				'wpr_seo_noindex_tags' => 0,
			),
	);


add_filter('comments_template', 'legacy_comments');

/*
Plugin Name: Gravatar
Plugin URI: http://www.gravatar.com/implement.php#section_2_2
*/
function gravatar($rating = false, $size = false, $default = false, $border = false) {
	global $comment;
	$out = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($comment->comment_author_email);
	if($rating && $rating != '')
		$out .= "&amp;rating=".$rating;
	if($size && $size != '')
		$out .="&amp;size=".$size;
	if($default && $default != '')
		$out .= "&amp;default=".urlencode($default);
	if($border && $border != '')
		$out .= "&amp;border=".$border;
	echo $out;
}

function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) { // WP 2.7-only check
		$file = TEMPLATEPATH . '/legacy.comments.php';
	}
	return $file;
}

function wpremix_trackback($comment, $args, $depth) 
{
	$GLOBALS['comment'] = $comment;

	if ($comment->comment_type == "trackback" || $comment->comment_type == "pingback" || ereg("<pingback />", $comment->comment_content) || ereg("<trackback />", $comment->comment_content)) {
		if (!$runonce) { $runonce = true; ?>
			<h4 class="trackbacks">Trackbacks &amp; Pingbacks</h4>
		<?php } ?>
		<a name="comment-<?php comment_ID() ?>"></a>
		<ul class="trackbacklist">
		<li>
		<?php comment_type(__('Comment'), __('Trackback'), __('Pingback')); ?> <?php _e('by'); ?><strong><?php comment_author_link() ?></strong> on	<?php comment_date() ?> @ <a href="#comment-<?php comment_ID() ?>"> <?php comment_time() ?></a>	<?php edit_comment_link(__("Edit This"), ' | '); ?>
		</li>
		</ul>
	<?php 
	}
}

function wpremix_comment($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;

	if ($comment->comment_type != "trackback" && $comment->comment_type != "pingback" && !ereg("<pingback />", $comment->comment_content) && !ereg("<trackback />", $comment->comment_content)) { ?>
		<a name="comment-<?php comment_ID() ?>"></a>
		<div class="<?php if ( $comment->comment_author_email == get_the_author_email() ) echo 'commentmainauthor'; else echo 'commentmain' ?>" id="comment-<?php comment_ID() ?>">

		<div class="comment_left"> <span class="comment-author">
		<?php comment_type(__(''), __('Trackback'), __('Pingback')); ?> <?php _e(''); ?><strong><?php comment_author_link() ?></strong></span> <span class="comment-timestamp clearfix"> <?php comment_date() ?></span><a href="#comment-<?php comment_ID() ?>"> </a> <br /><?php edit_comment_link(__("Edit This"), ''); ?>
	 
			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
		</div>
		<!--comment left-->
		<div class="comment_right">
			<div class="<?php if ( $comment->comment_author_email == get_the_author_email() ) echo 'authorcomment'; else echo 'thecomment' ?>" > </div>
			<div class="comment-body">
			<?php if (function_exists('gravatar')) { ?>
				<img src="<?php gravatar("R", 40); ?>" alt="" class="gravatar"/>
			<?php } ?>
			<?php comment_text() ?>
			</div>
		</div>
	<!--comment right-->
	</div>
	<?php }
}

function mytheme_valid_image($image) {
	if(file_exists(TEMPLATEPATH . '/images/' . $image))
		return true;
	return false;
}

function mytheme_add_admin() {
	global $themename, $wpr_default;

	if ( $_GET['page'] == 'wpremix_admin' ) {
		// Save Options
		if ( $_REQUEST['savegeneral'] || $_REQUEST['saveall'] ) {
			update_option('wpr_feedburner_id', $_POST['wpr_feedburner_id']);
			update_option('wpr_flickr_id', $_POST['wpr_flickr_id']);
			update_option('wpr_news', $_POST['wpr_news']);
			update_option('wpr_featured', $_POST['wpr_featured']);
			update_option('wpr_exclude_news', $_POST['wpr_exclude_news']);
			update_option('wpr_body_color', $_POST['wpr_body_color']);
			update_option('remix-global-header', $_POST['remix-global-header']);
		}
		if ( $_REQUEST['saveheader'] || $_REQUEST['saveall'] ) {
			$custom_links = serialize($_POST['wpr_custom_links']);
			update_option('wpr_custom_links', $custom_links);
/*
			if(mytheme_valid_image($_POST['wpr_header1_logo'])) {
				update_option('wpr_header1_logo', $_POST['wpr_header1_logo']);
			}
			if(mytheme_valid_image($_POST['wpr_header2_logo'])) {
				update_option('wpr_header2_logo', $_POST['wpr_header2_logo']);
			}
			if(mytheme_valid_image($_POST['wpr_header2_image'])) {
				update_option('wpr_header2_image', $_POST['wpr_header2_image']);
			}
			if(mytheme_valid_image($_POST['wpr_header3_image'])) {
				update_option('wpr_header3_image', $_POST['wpr_header3_image']);
			}
*/
		}
		if ( $_REQUEST['saveseo'] || $_REQUEST['saveall'] ) {
			update_option('wpr_seo_enable', $_POST['wpr_seo_enable']);
			if($_POST['wpr_seo_enable']) {
				update_option('wpr_seo_home_title', $_POST['wpr_seo_home_title']);
				update_option('wpr_seo_home_desc', $_POST['wpr_seo_home_desc']);
				update_option('wpr_seo_home_key', $_POST['wpr_seo_home_key']);
				update_option('wpr_seo_format_home', $_POST['wpr_seo_format_home']);
				update_option('wpr_seo_format_post', $_POST['wpr_seo_format_post']);
				update_option('wpr_seo_format_pages', $_POST['wpr_seo_format_pages']);
				update_option('wpr_seo_format_category', $_POST['wpr_seo_format_category']);
				update_option('wpr_seo_format_archive', $_POST['wpr_seo_format_archive']);
				update_option('wpr_seo_format_search', $_POST['wpr_seo_format_search']);
				update_option('wpr_seo_noindex_category', $_POST['wpr_seo_noindex_category']);
				update_option('wpr_seo_noindex_archives', $_POST['wpr_seo_noindex_archives']);
				update_option('wpr_seo_noindex_tags', $_POST['wpr_seo_noindex_tags']);
			}
		}

		// Reset Options
		if ( $_REQUEST['resetgeneral'] || $_REQUEST['resetall'] ) {
			foreach($wpr_default['general'] as $key => $value) {
				update_option($key, $value);
			}
		}
		if ( $_REQUEST['resetheader'] || $_REQUEST['resetall'] ) {
			foreach($wpr_default['header'] as $key => $value) {
				update_option($key, $value);
			}
		}
		if ( $_REQUEST['resetseo'] || $_REQUEST['resetall'] ) {
			foreach($wpr_default['seo'] as $key => $value) {
				update_option($key, $value);
			}
		}
	}

	add_theme_page($themename." Options", $themename." Options", 'edit_themes', 'wpremix_admin', 'mytheme_admin');
}

function mytheme_admin() {

	global $themename;

	if ( $_REQUEST['saveall'] ) $message = $themename.' options saved.';
	if ( $_REQUEST['resetall'] ) $message = $themename.' options reset to default values.';
	if ( $_REQUEST['savegeneral'] ) $message = $themename.' General Settings saved.';
	if ( $_REQUEST['resetgeneral'] ) $message = $themename.' General Settings reset to default.';
	if ( $_REQUEST['saveheader'] ) $message = $themename.' Header Options saved.';
	if ( $_REQUEST['resetheader'] ) $message = $themename.' Header Options reset to default.';
	if ( $_REQUEST['saveseo'] ) $message = $themename.' SEO Options saved.';
	if ( $_REQUEST['resetseo'] ) $message = $themename.' SEO Options reset to default.';

	if(isset($message)) {
		echo '<div id="message" class="updated fade"><p><strong>' . $message . '</strong></p></div>';
	}
	
?>
<div class="wrap">
<h2><?php echo $themename; ?> Options</h2>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/admin.css"></style>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/taber.js"></script>
<script type="text/javascript">
	document.write('<style type="text/css">.tabber{display:none;}<\/style>');
	function wpr_reset_all() {
		var verify = confirm("All Settings will be reset to default. Custom links will be removed. Are you sure!?");
		return verify;
	}
</script>

<form method="post" id="remixform" name="settingsform">
<div class="tabber">
	<?php wpremix_tab_general() ?>
	<?php wpremix_tab_header() ?>
	<?php wpremix_tab_seo() ?>
	<?php wpremix_tab_other() ?>
</div>
</form>
<?php
}

function wpremix_tab_general() {
?>
	<div id="general" class="tabbertab">
		<h2>General Settings</h2>

		<div class="inputline">
			<div class="inputtitle">Feedburner and Flickr Settings</div>
		</div>
		<div class="inputline">
			<div class="inputtext">Your Feedburner ID</div>
			<div class="inputvalue">
				<input type="text" id="wpr_feedburner_id" name="wpr_feedburner_id" value="<?php echo get_option('wpr_feedburner_id');?>"/> 
				<a href="#" onclick="jQuery('#help_wpr_feedburner_id').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_feedburner_id" class="helpbox">Specify Your Feedburner ID here. To find out what your Feedburner ID is, check ThemeGuide PDF shipped with the theme</div>
			</div>
		</div>
	
		<div class="inputline">
			<div class="inputtext">Your Flickr ID</div>
			<div class="inputvalue">
				<input type="text" id="wpr_flickr_id" name="wpr_flickr_id" value="<?php echo get_option('wpr_flickr_id');?>"/>
				<a href="#" onclick="jQuery('#help_wpr_flickr_id').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_flickr_id" class="helpbox">Specify Your Flickr ID here - Use the <a href="http://idgettr.com" target="_blank">IdGettr</a> to find your id.</div>
			</div>
		</div>

		<div class="inputlinegap"></div>
		<div class="inputline">
			<div class="inputtitle">Home Page Settings</div>
		</div>
	
		<div class="inputline">
			<div class="inputtext">News Image - Categories</div>
			<div class="inputvalue">
				<input type="text" id="wpr_news" name="wpr_news" value="<?php echo get_option('wpr_news');?>"/>
				<a href="#" onclick="jQuery('#help_wpr_news').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_news" class="helpbox">Specify from which categories, images in Homepage news should be displayed</div>
			</div>
		</div>
	
		<div class="inputline">
			<div class="inputtext">Featured Image - Categories</div>
			<div class="inputvalue">
				<input type="text" id="wpr_featured" name="wpr_featured" value="<?php echo get_option('wpr_featured');?>"/>
				<a href="#" onclick="jQuery('#help_wpr_featured').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_featured" class="helpbox">Specify from which categories, images in Homepage Featured should be displayed</div>
			</div>
		</div>
	
		<div class="inputline">
			<div class="inputtext">Exclude Categories from Latest News</div>
			<div class="inputvalue">
				<input type="text" id="wpr_exclude_news" name="wpr_exclude_news" value="<?php echo get_option('wpr_exclude_news');?>"/>
				<a href="#" onclick="jQuery('#help_wpr_exclude_news').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_exclude_news" class="helpbox">If blog updates from some categories need to be EXCLUDED in latest news in homepage, specify category ids (e.g. -1, -15)</div>
			</div>
		</div>
	
		<div class="inputlinegap"></div>
		<div class="inputline">
			<div class="inputtitle">Theme Color and Header Settings</div>
		</div>
	
		<div class="inputline">
			<div class="inputtext">Theme Color Change</div>
			<div class="inputvalue">
				<select id="wpr_body_color" name="wpr_body_color">
				<?php
					$colors = array("default", "lightblue", "black", "blue", "pink", "lavender", "yellow", "brown", "green");
					foreach($colors as $color) {
						echo '<option value="' . $color . '"';
						echo (get_option('wpr_body_color') == $color) ? ' selected="selected" >' : '>';
						echo $color . '</option>';
					}
				?>
				</select>
				<a href="#" onclick="jQuery('#help_wpr_body_color').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_body_color" class="helpbox">Specify primary color that will be used for normal text</div>
			</div>
		</div>

		<div class="inputline">
			<div class="inputtext">Global Header</div>
			<div class="inputvalue">
				<select id="remix-global-header" name="remix-global-header">
				<?php
					global $remix_advanced_editor;
					$headerOptions = $remix_advanced_editor->get_page_options("header");
					ksort($headerOptions);
					if ($headerOptions) {
						foreach($headerOptions as $header) {
							echo '<option value="' . trim($header) . '"';
							echo (get_option('remix-global-header') == trim($header)) ? ' selected="selected" >' : '>';
							echo trim($header) . '</option>';
						}
					}
				?>
				</select>
				<a href="#" onclick="jQuery('#help_remix-global-header').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_remix-global-header" class="helpbox">Select a header you would like applied to the entire site.</div>
			</div>
		</div>
	
		<div class="inputlinegap"></div>
		<div class="inputline inputtitle">
			<div class="inputsubmit">
				<input name="savegeneral" type="submit" class="button" value="Save General Settings" />
				<input name="resetgeneral" type="submit" class="button" value="Reset General Settings" />
			</div>
			<div class="inputsubmitr">
				<input name="saveall" type="submit" class="button" value="Save All" />
				<input name="resetall" type="submit" class="button" value="Reset All" onclick="return wpr_reset_all();" />
			</div>
		</div>
	</div>
<?php
}

function wpremix_tab_header() {
?>
	<div id="header" class="tabbertab">
		<h2>Header Options</h2>
		<script type="text/javascript">
			function wpr_remove_link(elink) {
				$rlink = jQuery;
				var verify = confirm("Are you sure to remove this link!?");
				if(verify) {
					$rlink(elink).parent().remove();
					if ( $rlink("#custom_link_list li").length == 0 )
					{
						$rlink("#wpr_custom_links").append("<p>You haven't added any custom link yet!</p>");
					}
				}
				return false;
			}
			function wpr_clear_link() {
				$cancellink = jQuery;
				$cancellink(".addlink #link_title")[0].value = '';
				$cancellink(".addlink #link_url")[0].value = '';
				return false;
			}
			function wpr_add_link() {
				$clink = jQuery;
				var new_title = $clink(".addlink #link_title").val();
				var new_link = $clink(".addlink #link_url").val();
				if(new_title == '') {
					alert('Title cannot be empty');
					return false;
				}
				if(new_link == '') {
					alert('Link cannot be empty');
					return false;
				}
				$clink(".addlink #link_title")[0].value = '';
				$clink(".addlink #link_url")[0].value = '';
				$clink("#wpr_custom_links p").remove();
				$clink("#custom_link_list").append("<li><input type=\"hidden\" name=\"wpr_custom_links[]\" value=\""+new_link+"||"+new_title+"\" class=\"addlink_link\"/><a href=\"http://"+new_link+"\" title=\""+new_title+"\" target=\"_blank\">"+new_title+"</a> <img src=\"<?php bloginfo('template_url');?>/images/i_delete.png\" onclick=\"return wpr_remove_link(this);\" title=\"Remove this link\" /></li>")
			}
		</script>
		<div class="inputline">
			<div class="inputtitle">Custom Link in Navigation Menu</div>
		</div>
		<div id="wpr_custom_links" class="inputline">
			<?php
			$custom_links = unserialize(get_option('wpr_custom_links'));
			echo '<ul id="custom_link_list" class="inputvalue">';
			if(is_array($custom_links)) {
				foreach($custom_links as $link) {
					$url = explode("||", $link);
					echo '<li><input type="hidden" name="wpr_custom_links[]" value="' . $link . '" /><a href="http://'.$url[0]. '" title="'.$url[1].'" target="_blank">'.$url[1].'</a>  <img src="' . get_bloginfo('template_url') . '/images/i_delete.png" onclick="return wpr_remove_link(this);" title="Remove this link" /></li>';
				}
				echo '</ul>';
			} else {
				echo '</ul>';
				echo '<p>You haven\'t added any custom link yet!</p>';
			}
			?>
		</div>
		<a id="wpr_add_link" class="inputtitle" href="#" onclick="jQuery('#help_wpr_add_link').slideToggle('fast'); return false;" title="Add Link">Add Link</a>
		<div id="help_wpr_add_link" class="helpbox">
			<div class="addlink">
				<label for="link_title">Title</label><input type="text" name="link_title" id="link_title" value="" /> eg. WP Remix<br class="clear" />
				<label for="link_url">URL</label><input type="text" name="link_url" id="link_url" value="" /> eg. www.wpremix.com<br class="clear" />
				<input class="button" type="button" value="Add Link" onclick="return wpr_add_link()" />
				<input class="button" type="button" value="Clear" onclick="return wpr_clear_link()" />
			</div>
		</div>

<!--
		<div class="inputlinehr"></div>
		<div class="inputline">
			<div class="inputtitle">Header Image Options</div>
		</div>
		<div class="inputline">
			<div class="inputtext">Header 1 - Logo</div>
			<div class="inputvalue">
				<input type="text" id="wpr_header1_logo" name="wpr_header1_logo" value="<?php echo get_option('wpr_header1_logo');?>" />
				<a href="#" onclick="jQuery('#help_wpr_header1_logo').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_header1_logo" class="helpbox">Header Logo displayed in header template - header1 (size - 160px X 40px). eg. newlogo.png <br/>Upload image to /images/ folder in template folder and enter the image name, if not found default image will be used</div>
			</div>
			<div class="inputimagebox">
				<img src="<?php echo get_bloginfo('template_url') . '/images/' . get_option('wpr_header1_logo');?>" alt="Header 1 - Logo" />
			</div>
		</div>
		<div class="inputline">
			<div class="inputtext">Header 2 - Logo</div>
			<div class="inputvalue">
				<input type="text" id="wpr_header2_logo" name="wpr_header2_logo" value="<?php echo get_option('wpr_header2_logo');?>" />
				<a href="#" onclick="jQuery('#help_wpr_header2_logo').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_header2_logo" class="helpbox">Header Logo displayed in header template - header2 (size - 194px X 25px). eg. newlogo.png <br/>Upload image to /images/ folder in template folder and enter the image name, if not found default image will be used</div>
			</div>
			<div class="inputimagebox">
				<img src="<?php echo get_bloginfo('template_url') . '/images/' . get_option('wpr_header2_logo');?>" alt="Header 2 - Logo" />
			</div>
		</div>
		<div class="inputline">
			<div class="inputtext">Header 2 - Background Image</div>
			<div class="inputvalue">
				<input type="text" id="wpr_header2_image" name="wpr_header2_image" value="<?php echo get_option('wpr_header2_image');?>" />
				<a href="#" onclick="jQuery('#help_wpr_header2_image').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_header2_image" class="helpbox">Header background image displayed in header template - header2 (size - 160px X 40px). eg. newheader2bg.png <br/>Upload image to /images/ folder in template folder and enter the image name, if not found default image will be used</div>
			</div>
			<div class="inputimagebox">
				<img src="<?php echo get_bloginfo('template_url') . '/images/' . get_option('wpr_header2_image');?>" alt="Header 2 - Background Image" />
			</div>
		</div>
		<div class="inputline">
			<div class="inputtext">Header 3 - Background Image</div>
			<div class="inputvalue">
				<input type="text" id="wpr_header3_image" name="wpr_header3_image" value="<?php echo get_option('wpr_header3_image');?>" />
				<a href="#" onclick="jQuery('#help_wpr_header3_image').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_header3_image" class="helpbox">Header background image displayed in header template - header3 (size - 840px X 150px). eg. headerbg.jpg <br/>Upload image to /images/ folder in template folder and enter the image name, if not found default image will be used</div>
			</div>
			<div class="inputimagebox">
				<img src="<?php echo get_bloginfo('template_url') . '/images/' . get_option('wpr_header3_image');?>" alt="Header 3 - Background Image" />
			</div>
		</div>
-->
		<div class="inputlinehr"></div>
		<div class="inputlinegap"></div>
		<div class="inputline inputtitle">
			<div class="inputsubmit ignore">
				<input name="saveheader" type="submit" class="button" value="Save Header Options" />
			</div>
			<div class="inputsubmitr ignore">
				<input name="saveall" type="submit" class="button" value="Save All" />
				<input name="resetall" type="submit" class="button" value="Reset All" onclick="return wpr_reset_all();" />
			</div>
		</div>
	</div>
<?php
}

function wpremix_tab_seo() {
	$enabled = '';
	$disabled = '';
	if(get_option('wpr_seo_enable')) {
		$enabled = 'checked="checked"';
	} else {
		$disabled = 'disabled';
	}

	?>
	<script type="text/javascript">
		function toggleSEOForm() {
			$j = jQuery;
			if($j('#wpr_seo_enable').is(':checked')) {
				$j('#seo :input').removeAttr('disabled');	
			} else {
				$j('#seo :input').attr('disabled', true);
				$j('#seo .ignore :input').removeAttr('disabled');
			}
		}
	</script>
	<div id="seo" class="tabbertab">
		<h2>SEO Options</h2>

		<div class="inputline">
			<div class="inputtitle">WP Remix SEO Options</div>
		</div>
		<div class="inputline">
			<div class="inputtext">Enable SEO Features?</div>
			<div class="inputvalue ignore">
				<input type="checkbox" id="wpr_seo_enable" name="wpr_seo_enable" value="1" <?php echo $enabled;?> onchange="toggleSEOForm()"/> This is the master on/off switch for SEO features. 
			</div>
		</div>

		<div class="inputlinegap"></div>
		<div class="inputline">
			<div class="inputtitle">General SEO Options</div>
		</div>
	
		<div class="inputline">
			<div class="inputtext">Blog Title</div>
			<div class="inputvalue">
				<input type="text" id="wpr_seo_home_title" name="wpr_seo_home_title" value="<?php echo get_option('wpr_seo_home_title');?>" <?php echo $disabled;?>/>
				<a href="#" onclick="jQuery('#help_wpr_seo_home_title').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_seo_home_title" class="helpbox">Title of your blog</div>
			</div>
		</div>	
	
		<div class="inputline">
			<div class="inputtext">Home Description</div>
			<div class="inputvalue">
				<input type="text" id="wpr_seo_home_desc" name="wpr_seo_home_desc" value="<?php echo get_option('wpr_seo_home_desc');?>" <?php echo $disabled;?>/>
				<a href="#" onclick="jQuery('#help_wpr_seo_home_desc').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_seo_home_desc" class="helpbox">META description of your home page</div>
			</div>
		</div>	
	
		<div class="inputline">
			<div class="inputtext">Home Keywords</div>
			<div class="inputvalue">
				<input type="text" id="wpr_seo_home_key" name="wpr_seo_home_key" value="<?php echo get_option('wpr_seo_home_key');?>" <?php echo $disabled;?>/>
				<a href="#" onclick="jQuery('#help_wpr_seo_home_key').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_seo_home_key" class="helpbox">META keywords of your home page</div>
			</div>
		</div>	
	
		<div class="inputlinegap"></div>
		<div class="inputline">
			<div class="inputtitle">Title Formats</div>
		</div>
	
		<div class="inputline">
			<div class="inputtext">Home Title</div>
			<div class="inputvalue">
				<input type="text" class="large" id="wpr_seo_format_home" name="wpr_seo_format_home" value="<?php echo get_option('wpr_seo_format_home');?>" <?php echo $disabled;?>/>
				<a href="#" onclick="jQuery('#help_wpr_seo_format_home').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_seo_format_home" class="helpbox">Title format for your homepage.<br/>Allowed Tags: %BLOG_TITLE%, %BLOG_TAGLINE%</div>
			</div>
		</div>	
	
		<div class="inputline">
			<div class="inputtext">Post Title</div>
			<div class="inputvalue">
				<input type="text" class="large" id="wpr_seo_format_post" name="wpr_seo_format_post" value="<?php echo get_option('wpr_seo_format_post');?>" <?php echo $disabled;?>/>
				<a href="#" onclick="jQuery('#help_wpr_seo_format_post').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_seo_format_post" class="helpbox">Title format for your posts.<br/>Allowed Tags: %BLOG_TITLE%, %BLOG_TAGLINE%, %CATEGORY%, %POST_TITLE%</div>
			</div>
		</div>	
	
		<div class="inputline">
			<div class="inputtext">Page Title</div>
			<div class="inputvalue">
				<input type="text" class="large" id="wpr_seo_format_pages" name="wpr_seo_format_pages" value="<?php echo get_option('wpr_seo_format_pages');?>" <?php echo $disabled;?>/>
				<a href="#" onclick="jQuery('#help_wpr_seo_format_pages').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_seo_format_pages" class="helpbox">Title format for your pages.<br/>Allowed Tags: %BLOG_TITLE%, %BLOG_TAGLINE%, %CATEGORY%, %PAGE_TITLE%</div>
			</div>
		</div>	
	
		<div class="inputline">
			<div class="inputtext">Category Title</div>
			<div class="inputvalue">
				<input type="text" class="large" id="wpr_seo_format_category" name="wpr_seo_format_category" value="<?php echo get_option('wpr_seo_format_category');?>" <?php echo $disabled;?>/>
				<a href="#" onclick="jQuery('#help_wpr_seo_format_category').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_seo_format_category" class="helpbox">Title format for your categories.<br/>Allowed Tags: %BLOG_TITLE%, %BLOG_TAGLINE%, %CATEGORY_TITLE%, %CATEGORY_DESCRIPTION%</div>
			</div>
		</div>	
	
		<div class="inputline">
			<div class="inputtext">Archive Title</div>
			<div class="inputvalue">
				<input type="text" class="large" id="wpr_seo_format_archive" name="wpr_seo_format_archive" value="<?php echo get_option('wpr_seo_format_archive');?>" <?php echo $disabled;?>/>
				<a href="#" onclick="jQuery('#help_wpr_seo_format_archive').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_seo_format_archive" class="helpbox">Title format for your archives.<br/>Allowed Tags: %BLOG_TITLE%, %BLOG_TAGLINE%, %ARCHIVE_DATE%</div>
			</div>
		</div>	
	
		<div class="inputline">
			<div class="inputtext">Search Title</div>
			<div class="inputvalue">
				<input type="text" class="large" id="wpr_seo_format_search" name="wpr_seo_format_search" value="<?php echo get_option('wpr_seo_format_search');?>" <?php echo $disabled;?>/>
				<a href="#" onclick="jQuery('#help_wpr_seo_format_search').slideToggle('fast'); return false;" title="Help!?">?</a>
				<div id="help_wpr_seo_format_search" class="helpbox">Title format for your search results.<br/>Allowed Tags: %BLOG_TITLE%, %BLOG_TAGLINE%, %SEARCH_QUERY%</div>
			</div>
		</div>	
	
		<div class="inputlinegap"></div>
		<div class="inputline">
			<div class="inputtitle">NoIndex Options</div>
		</div>
	
		<div class="inputline">
			<div class="inputtext">Noindex Categories</div>
			<div class="inputvalue">
				<input type="checkbox" id="wpr_seo_noindex_category" name="wpr_seo_noindex_category" value="1" <?php if(get_option('wpr_seo_noindex_category')) echo ' checked="checked"';?> <?php echo $disabled;?>/> Exclude categories from being crawled to avoid duplicate contents.
			</div>
		</div>	
	
		<div class="inputline">
			<div class="inputtext">Noindex Archives</div>
			<div class="inputvalue">
				<input type="checkbox" id="wpr_seo_noindex_archives" name="wpr_seo_noindex_archives" value="1" <?php if(get_option('wpr_seo_noindex_archives')) echo ' checked="checked"';?> <?php echo $disabled;?>/> Exclude archives from being crawled to avoid duplicate contents.
			</div>
		</div>	
	
		<div class="inputline">
			<div class="inputtext">Noindex Tags</div>
			<div class="inputvalue">
				<input type="checkbox" id="wpr_seo_noindex_tags" name="wpr_seo_noindex_tags" value="1" <?php if(get_option('wpr_seo_noindex_tags')) echo 'checked="checked"';?> <?php echo $disabled;?>/> Exclude tags archive from being crawled to avoid duplicate contents.
			</div>
		</div>

		<div class="inputlinegap"></div>
		<div class="inputline inputtitle">
			<div class="inputsubmit ignore">
				<input name="saveseo" type="submit" class="button" value="Save SEO Options" />
				<input name="resetseo" type="submit" class="button" value="Reset SEO Options" />
			</div>
			<div class="inputsubmitr">
				<input name="saveall" type="submit" class="button" value="Save All" />
				<input name="resetall" type="submit" class="button" value="Reset All" onclick="return wpr_reset_all();" />
			</div>
		</div>
	</div>
<?php
}

function wpremix_tab_other() {
?>
	<div id="other" class="tabbertab">
		<h2>More Options...</h2>
		<p>More options coming soon...</p>
	</div>
<?php
}

/**
 * Get the Header
 */
function get_remix_header() {
	// Load all settings.
	global $wpr_default;
	foreach($wpr_default as $group) {
		foreach($group as $key => $value) {
			global $$key;
			$$key = get_option($key);
		}
	}

	//Header
	global $post;
	if (isset($post)) {
		$id = $post->ID;
		$value = get_post_custom_values('_wp_remix_page_header', $id);
		if (isset($value[0])) {
			if (file_exists(TEMPLATEPATH . '/includes/header/' . $value[0] . ".php")) {
				include(TEMPLATEPATH . '/includes/header/' . $value[0] . ".php");
				return;
			}
		}
	}

	$rheader = get_option('remix-global-header');
	if ($rheader) {
		if (file_exists(TEMPLATEPATH . '/includes/header/' . $rheader . ".php")) {
			include(TEMPLATEPATH . '/includes/header/' . $rheader . ".php");
		} else {
			include (TEMPLATEPATH . '/includes/header/header1.php');
		}
	} else {
		include (TEMPLATEPATH . '/includes/header/header1.php');
	}
}

function remix_add_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('remix_faq', get_bloginfo('template_directory') . '/js/faq.js', array("jquery", ) , 1.0);
}
function mytheme_wp_head() {
?>
<link href="<?php bloginfo('template_directory'); ?>/style.php" rel="stylesheet" type="text/css" />
<?php 
	mytheme_wp_seo_meta();
}
function mytheme_templateredir() 
{
	ob_start('mytheme_rewritetitle');
}

function mytheme_rewritetitle($html)
{
	
	if ( get_option('wpr_seo_enable') == 1 )
	{
		if ( preg_match('/<title>/', $html) )
		{
			$html = preg_replace('#<title>(.+)<\/title>#es','mytheme_buildtitle("\\1")', $html);		
		}
	}

	return $html;
}

function mytheme_buildtitle($default)
{
	global $wp_query;

	// %BLOG_TITLE%
	$blog_title = get_option('wpr_seo_home_title');
	if ( $blog_title == '' )
	{
		$blog_title = get_bloginfo('name');
	}
	
	// POST, PAGES, CATEGORIES, ARCHIVES, SEARCH 
		
	//formats: wpr_seo_format_category, wpr_seo_format_archive, wpr_seo_format_search
	if ( is_home() || is_front_page() )
	{
		if ( get_option('wpr_seo_format_home') != '' )
		{
			//macros blog_title & tagline
			$title = get_option('wpr_seo_format_home');
			$title = str_replace('%BLOG_TITLE%',$blog_title, $title);
			$title = str_replace('%BLOG_TAGLINE%', get_bloginfo('description'), $title);
		}
		else
		{
			$title = $default;
		}
	}
	/* POST */
	elseif ( is_single() )
	{
		if ( get_option('wpr_seo_format_post') != '' )
		{
			$post_title = single_post_title('', false);

			$category = '';
			$categories = get_the_category();
			if ( count($categories) > 0 )
			{
				$category	= $categories[0]->cat_name;
			}

			$title = get_option('wpr_seo_format_post');
			$title = str_replace('%BLOG_TITLE%',$blog_title, $title);
			$title = str_replace('%BLOG_TAGLINE%', get_bloginfo('description'), $title);
			$title = str_replace('%CATEGORY%', $category, $title);
			$title = str_replace('%POST_TITLE%',$post_title, $title);
		}
		else
		{
			$title = $default;
		}
	}
	/* PAGES */
	elseif ( is_page() )
	{
		if ( get_option('wpr_seo_format_pages') != '' )
		{
			$page_title = single_post_title('', false);
			
			$category = '';
			$categories = get_the_category();
			if ( count($categories) > 0 )
			{
				$category	= $categories[0]->cat_name;
			}

			$title = get_option('wpr_seo_format_pages');
			$title = str_replace('%BLOG_TITLE%',$blog_title, $title);
			$title = str_replace('%BLOG_TAGLINE%', get_bloginfo('description'), $title);
			$title = str_replace('%CATEGORY%', $category, $title);	
			$title = str_replace('%PAGE_TITLE%',$page_title, $title);
		}
		else
		{
			$title = $default;
		}
	}
	/* CATEGORIES */
	elseif ( is_category() )
	{
		if ( get_option('wpr_seo_format_category') != '' )
		{
			$cat_title	= single_cat_title('', false);
			$cat_desc	= category_description();			

			$title = get_option('wpr_seo_format_category');
			$title = str_replace('%BLOG_TITLE%',$blog_title, $title);
			$title = str_replace('%BLOG_TAGLINE%', get_bloginfo('description'), $title);
			$title = str_replace('%CATEGORY_TITLE%', $cat_title, $title);	
			$title = str_replace('%CATEGORY_DESCRIPTION%',$cat_desc, $title);
		}
		else
		{
			$title = $default;
		}
	}
	/* ARCHIVE */
	elseif ( is_archive() )
	{
		if ( get_option('wpr_seo_format_archive') != '' )
		{
			$thedate = wp_title('', false);
			$title = get_option('wpr_seo_format_archive');
			$title = str_replace('%BLOG_TITLE%',$blog_title, $title);
			$title = str_replace('%BLOG_TAGLINE%', get_bloginfo('description'), $title);
			$title = str_replace('%ARCHIVE_DATE%', $thedate, $title);	
		}
		else
		{
			$title = $default;
		}
	}
	/* SEARCH */
	elseif ( is_search() )
	{
		global $s;

		if ( !empty($s) && get_option('wpr_seo_format_search') )
		{
			$title = get_option('wpr_seo_format_search');
			$title = str_replace('%BLOG_TITLE%',$blog_title, $title);
			$title = str_replace('%BLOG_TAGLINE%', get_bloginfo('description'), $title);
			$title = str_replace('%SEARCH_QUERY%',attribute_escape($s), $title);	
		}
		else
		{
			$title = $default;
		}
	}
	else
	{
		$title = $default;
	}

	
	return '<title>'.$title.'</title>';
}

function mytheme_wp_seo_meta()
{
	// If seo not enabled do nothing...
	if ( get_option('wpr_seo_enable') != 1 ) return;

	// add meta
	$metatag = '<meta name="robots" content="noindex" />'."\n";
	$show = 0;

	if ( get_option('wpr_seo_noindex_category') == 1 && is_category() ) $show = 1;
	if ( get_option('wpr_seo_noindex_archives') == 1 && is_archive() ) $show = 1;
	if ( get_option('wpr_seo_noindex_tags')		== 1 && is_tag() ) $show = 1;

	if ( $show == 1 ) echo $metatag;
}

function mytheme_enqueue_jquery() {
	wp_enqueue_script('jquery');
}


/**
 * Function to add custom link to navigation menu
 */
function wpremix_add_custom_links($links) {
    // Adding custom link to the Navigation bar
    $custom_links = array();
    $custom_links = unserialize(get_option('wpr_custom_links'));

    if(is_array($custom_links)) {
		foreach($custom_links as $link) {
			$url = explode("||", $link);
	        $links .= '<li class="page-item page-item-custom"><a href="http://' . $url['0'] . '" title="' . $url['1'] . '" target="_blank">' . $url['1'] . '</a></li>' . "\n";
		}
    }
    return $links;
}

add_filter('wp_list_pages', 'wpremix_add_custom_links');
add_action('wp_head', 'mytheme_wp_head');
add_action('template_redirect', 'mytheme_templateredir');
add_action('admin_menu', 'mytheme_add_admin'); 
add_action('admin_head', 'mytheme_enqueue_jquery'); 
add_action('wp_print_scripts','remix_add_scripts');

//Remix Editor
include(TEMPLATEPATH . "/editor/remix_advanced_editor.php");
?>

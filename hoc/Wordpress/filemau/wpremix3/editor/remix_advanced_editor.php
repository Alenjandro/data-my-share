<?php
/*
Description: Allows advanced theme editing using WP Remix
Author: WP Remix
Version: 0.2
Author URI: http://www.wpremix.com
Copyright: The remix editor idea and entire code is copyrighted by R.Bhavesh at WP remix.com website and can NOT be used in full or part with any other themes without prior written permission from the author. 
*/ 

/**
 * prevent file from being accessed directly
 */
if ('remix_advanced_editor.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die ('Please do not access this file directly. Thanks!');
}


if (!class_exists('remix_advanced_editor')) {
    class remix_advanced_editor	{
			var $localizationName = 'wp-remix-editor';
			var $qa = '';
			var $action = '';
			var $templatepath = '';
			var $offset = '0';
			var $page = '';
			var $raw = '';
		/**
		* PHP 4 Compatible Constructor
		*/
		function remix_advanced_editor(){$this->__construct();}
		
		/**
		* PHP 5 Constructor
		*/		
		function __construct(){
			  $this->templatepath = get_template_directory();
		}
		//Makes sure certain tags are allowed
		function allow_tags($allowed='') {
			if (current_user_can('edit_pages')) {
				return 'div/-div[*],p/-r[*],-table[*],-tr[*],-td[*],-tbody[*],-strong/-b[*],-em/-i[*],-font[*],-ul[*],-ol[*],-li[*],*[*]';
			} else {
				return $allowed;
			}
		
		}
		//Searches a directory for templates options and returns an array of any returned options
		//Returns false if none can e found
		function get_page_options($option = '') {
			$include_dir = $this->templatepath . "/includes/" . strtolower($option);
			$mice = @opendir($include_dir);
			if (!$mice) { return false; }
			$options = array(); 
			$i = 0;
			while (($includes = readdir($mice)) !== false ) {
				$pathinfo = pathinfo($includes);
				if ($pathinfo['extension'] == "php") {
					$options[$i] = $includes;
					$options[$i] = preg_replace("/\.php/i",'', $options[$i], 1);
					$i += 1;
				}
			}
			if (count($options) == 0) { 
				return false; 
			} else {
				ksort($options);
				return $options;
			}
		}
		//Retrives a dropdown of available page templates
		function get_page_templates() {
			$templates = get_page_templates();
			ksort( $templates );
			$page_templates = array ();
			if ( is_array( $templates ) ) {
				foreach ( $templates as $template ) {
					$template_data = implode( '', file( TEMPLATEPATH."/".$template ));
					preg_match( '|emplate Name:(.*)$|mi', $template_data, $name ); // Using emplate instead of Template intentionally
					preg_match( '|Description:(.*)$|mi', $template_data, $description );
					preg_match( '|Exclude:(.*)$|mi', $template_data, $exclude );
				
					$name = $name[1];
					$description = $description[1];
					$exclude = trim($exclude[1]);
				
					if ( !empty( $name ) ) {
						if (!empty($exclude)) { continue; }
						$page_templates[trim( $name )] = basename( $template );
					}
				}
			}
			return $page_templates;
		}
		//Gets a list of templates available in the remix theme
		//Returns a hidden input box for the theme
		function get_templates_dropdown($postID = 0) {
			global $wpdb;
			$templates = $this->get_page_templates();
			ksort( $templates );
			$postMeta = $wpdb->get_row("SELECT meta_value FROM $wpdb->postmeta WHERE post_id = " . $postID . " and meta_key = '_wp_remix_page_template'", ARRAY_A);
			$selectedTemplate = '';
			if ($postMeta) { 
				$selectedTemplate = $postMeta['meta_value'];
			}
			$selected = $hidden = '';
			echo "\n\t<option value='none'>None</option>";
			foreach (array_keys( $templates ) as $template ) {
				if ($templates[$template] == $selectedTemplate) {
					$selected = "selected='selected'";
					$hidden = "\n\t<input type='hidden' id='remix_selected_template' value='$template' />";
				} else { $selected = ''; }
				echo "\n\t<option value='".$templates[$template]."' $selected>$template</option>";
			}
			return $hidden;
		} //end function get_templates_dropdown
		function add_editor_interface() {
			global $post;
			echo '<input type="hidden" id="remix_nonce" name="remix_nonce" value="' . wp_create_nonce('wp-remix-advanced-editor') . '" />'; //For 2.5 and 2.3
			?>
      <h4>Select Header</h4>
      <p>If you select a header, make sure to "Save" the changes.</p>
      <select name="remix_header" id="remix_header">
      <?php
			$headerOptions = $this->get_page_options("header");
			ksort($headerOptions);
			$selected = get_option('remix-global-header');
			if ($headerOptions) {
				foreach($headerOptions as $header) {
					$sel = '';
					if (trim($header) == $selected) {
						$sel = "selected='selected'";
					}
					?>
					<option value='<?php echo trim($header) ?>' <?php echo $sel ?>><?php echo trim($header) ?></option>
					<?php
				}
			}
			?></select>
      <h4>Select Template</h4>
      <select name="remix_template" id="remix_template">
      <?php $hidden = $this->get_templates_dropdown($post->ID); ?>
      </select><?php echo $hidden; ?><button class="button">Send to Editor</button>
      <?php
      $sidebar = get_post_custom_values("_wp_remix_page_sidebar", $post->ID);
			//$footer = get_post_custom_values("_wp_remix_page_footer", $post->ID);
			//$header = get_post_custom_values("_wp_remix_page_header", $post->ID);
			if ($sidebar) {
				if ($sidebar[0] == "false") {
					$this->add_shf_interface("false|false", "Sidebar");
				} else {
					$this->add_shf_interface($sidebar[0], "Sidebar");
				}
			}
			?>
      <?php
		}
		//Adds the sidebar/footer/header interface
		//$value = Value of the custom field
		//$type = Sidebar/Footer/Header
		function add_shf_interface($value, $type) {
			if (preg_match("/\|/i", $value)) {
				$value = split('\|',$value);
				$selected = trim($value[0]);
			} else {
				$selected = $value;
			}
			
			if (empty($selected)) { return; }
			?>
      
			<div id='r<?php echo strtolower($type) ?>'><h4>Select <?php echo $type ?></h4><select name='remix_selected_<?php echo strtolower($type) ?>' id='remix_selected_<?php echo strtolower($type) ?>'>
      <?php
			if ($selected == "false") {
			?>
				<option value='<?php echo trim($selected) ?>'><?php echo trim($selected) ?></option>
			<?php
      } else {
				$options = $this->get_page_options($type);
				ksort($options);
				if ($options) {
					foreach($options as $option) {
						$sel = '';
						if (trim($option) == $selected) {
							$sel = "selected='selected'";
						}
						?>
						<option value='<?php echo trim($option) ?>' <?php echo $sel ?>><?php echo trim($option) ?></option>
						<?php
					}
				}
			}
			?>
			</select></div>
     
			<?php
		} //end add_shf_interface
		function add_editor_interface27() { 
			$this->add_editor_interface(); 
		} //end function add_editor_interface27
		function add_editor_interface25() { 
		?>
      <div id="postremixeditor" class="postbox">
      <h3><?php _e('Remix - Add Template File', $this->localizationName) ?></h3>
      <div class="inside">
      <div id="postremixeditor_inside">
      <?php $this->add_editor_interface(); ?>
      </div>
      </div></div></div>
		<?php
		} //end function add_editor_interface25
		function add_editor_interface23() {
		?>
      <div class="dbx-b-ox-wrapper" id="postremixeditor_inside">
      <fieldset id="seodiv" class="dbx-box">
      <div class="dbx-h-andle-wrapper">
      <h3 class="dbx-handle"><?php _e('Remix - Add Template File', $this->localizationName) ?></h3>
      </div>
      <div class="dbx-c-ontent-wrapper">
      <div class="dbx-content">
      <?php $this->add_editor_interface(); ?>
      </div>
      </fieldset>
      </div>
    <?php
		}
		/**
		* Tells WordPress to load the scripts
		*/
		function add_post_scripts(){
			if (get_bloginfo('version') >= "2.8") {
				wp_enqueue_script("wp-ajax-response");
			} else {
	            wp_deregister_script(array('jquery'));
    	        wp_enqueue_script('jquery', get_bloginfo('template_directory') . '/js/jquery.js', false);
        	    if (get_bloginfo('version') >= "2.7") {
	                wp_deregister_script('jquery-ui-sortable');
   		            wp_enqueue_script('jquery-ui-sortable',get_bloginfo('template_directory') . '/js/ui.sortable.js', array('jquery-ui-core'),'1.5.2c');
         	   	}
	            if (get_bloginfo('version') < "2.5") {
    	            wp_enqueue_script("wpAjax",get_bloginfo('template_directory') . '/js/wpAjax.js');
	                wp_enqueue_script("wp-ajax-response",get_bloginfo('template_directory') . '/js/wp-ajax-response.js', array('jquery', 'wpAjax'));
    	        } else {
	                wp_enqueue_script("wp-ajax-response");
    	        }
			}
        	wp_enqueue_script('wp-remix-advanced-editor', get_bloginfo('template_directory') . '/js/advanced-editor.js', array("jquery", "wp-ajax-response") , 1.0);
			wp_localize_script( 'wp-remix-advanced-editor', 'remixeditorvars', array('template_dir' => get_bloginfo('template_directory')));
		}
		//Adds a custom field to a post based on what template is being used
		function add_template_custom_field($postID = 0, $key = '',$value = '') {
			global $wpdb;
			//Get post meta template
			$postMeta = $wpdb->get_row("SELECT * FROM $wpdb->postmeta WHERE post_id = " . $postID . " and meta_key = '$key'", ARRAY_A);
			if (!$postMeta) { 
				//Insert template into DB as custom field
				add_post_meta($postID, $key, $value);
				//$postMeta = $wpdb->get_row("SELECT * FROM $wpdb->postmeta WHERE post_id = " . $postID . " and meta_key = '$key'", ARRAY_A);
			} else {
				update_post_meta($postID, $key, $value);
				//$postMeta = $wpdb->get_row("SELECT * FROM $wpdb->postmeta WHERE post_id = " . $postID . " and meta_key = '$key'", ARRAY_A);
				//print_r($postMeta);
			}
		}
		//Extracts raw code to be executed later
		function extract_raw_exclusions($content) {
			global $post, $wpdb;
			$postMeta = $wpdb->get_row("SELECT meta_value FROM $wpdb->postmeta WHERE post_id = " . $post->ID . " and meta_key = '_wp_remix_page_template'", ARRAY_A);
			if ($postMeta) {
				//Assuming user has selected a custom template...
				remove_filter('the_content', 'wptexturize');
				//remove_filter('the_content', 'wpautop');
			}
			return preg_replace_callback("/(<!--\s*rcode_start\s*-->|\[REMIX\])(.*)(<!\s*--rcode_end\s*-->|\[\/REMIX\])/Uis", 
		array(&$this,"extract_raw_exclusions_callback"), $content);
		}
		//Support function to save in $raw array content to be executed later
		function extract_raw_exclusions_callback($matches) {
			global $remix_raw;
			$remix_raw[]=$matches[2];
			return "!REMIX".(count($remix_raw)-1)."!";
		}
		//Inserts raw code to be executed, including PHP
		function insert_raw_exclusions($content) {
			global $remix_raw;
			if(!isset($remix_raw)) { return $content; }
			if(preg_match('#!REMIX[^!]*!#', $content)) {
				$content = preg_replace_callback("/!REMIX([^!])*!/Uis", array(&$this, "insert_raw_exclusions_callback"), $content);
					//Code snippet from Exec-PHP - http://bluesome.net/post/2005/08/18/50/
					ob_start();
					global $wpr_flickr_id; //for flickr
					eval("?>$content<?php ");
					$output = ob_get_contents();
					ob_end_clean();
					return $output;
			}
			return $content;
		}
		//Support function to output data in $raw array for execution
		function insert_raw_exclusions_callback($matches) {
			global $remix_raw;
			$match = $remix_raw[intval($matches[1])];
			$match = html_entity_decode($match);
			$match = str_replace('[php]', '<?php ', $match);
			$match = str_replace('[/php]', ' ?>', $match);
			$match = str_replace('< ?php', '<?php ',$match);
			$match = str_replace('< =', '<=', $match);
			$match = str_replace('> =', '>=', $match);
			return $match;
		}
		//Extracts and replaces remix tags
		function extract_remix_tags($content) {
			global $post;
			if(preg_match('#(?:\[|<!--)remix_[^\)]*\)(?:\]|-->)#', $content))
		  	$content = preg_replace_callback('/(?:\[|<!--)remix_([^\(]*)\(([^\)]*)\)(?:\]|-->)/', array(&$this,'replace_remix_tags'), $content);
			$content = preg_replace('/<p class\=\"remix\"><\/p>/', '', $content); //Strips empty p tags
			$content = str_replace('<li class="remix">Do not remove</li>', '', $content); //Strips extra LIs inserted by the editor
			return $content;
		}
		//Strips out various PHP tags and such so that a template can be sent to the editor
		function get_content_to_edit($postID = 0, $content = '') {
			$content = str_replace("<?php bloginfo('template_url'); ?>", get_bloginfo('template_url'), $content);
			$content = str_replace("<?php bloginfo('template_directory'); ?>", get_bloginfo('template_directory'),$content);
		  $content = preg_replace_callback('/(<\?php\s\/\*remix_code_start\*\/\s?\?>(.*)<\?php\s\/\*remix_code_end\*\/\s\?>)/is', array(&$this,'replace_php_code'), $content);
			$content = preg_replace('/(<!--[^>]*(?<=--)>)/is','', $content); //comment strings
			$content = preg_replace('/(<\?[^>]*(?<=\?)>)/is','', $content); //php strings
			$content = str_replace('<p>', '<p class="remix">', $content);
			$content = preg_replace('/\<br[^\>]*\>/is', '<br class="remix" />', $content);
			$content = str_replace('<ul>', '<ul><li class="remix">Do not remove</li>', $content); //Adds LIs for empty ULs since TinyMCE likes to close the ULs if there is no content in them
			$content = trim($content);
			return $content;
		}
		function replace_php_code($matches) {
	//	print_r($matches);
			$match = $matches[2];
			$content = '[REMIX]';
			$match = str_replace("<?php", "[php]", $match);
			$match = str_replace("<?", "[php]", $match);
			$match = str_replace("?>", "[/php]", $match);
			$content .= $match;
			$content .= '[/REMIX]';
			return $content;
		}
		//Gets whether the template author would like a sidebar/header/footer showing or not
		function get_content_options($postID, $content) {
			$response = new WP_Ajax_Response();
			//See if template author wants a sidebar
			preg_match( '|Sidebar:(.*)$|mi', $content, $sidebar );
			if (!empty($sidebar)) {
				if (trim($sidebar[1]) == "false" ) {
					$this->add_template_custom_field($postID, '_wp_remix_page_sidebar',trim($sidebar[1]));
				}
				$response->add( array(
					'what' => 'sidebar',
					'id' => $postID,
					'data' => trim($sidebar[1])
				));
			} else {
				//No sidebars present - Use the lookup option
				$sidebars = $this->get_page_options("sidebar");
				if (!sidebars) {
					$response->add( array(
						'what' => 'sidebar',
						'id' => $postID,
						'data' => "Default"
					));
				} else {
					$sides = '';
					foreach ($sidebars as $sidebar) {
						$sides .= $sidebar . ",";
					}
					$sides = preg_replace('/,$/', '', $sides,1);
					$response->add( array(
						'what' => 'sidebar',
						'id' => $postID,
						'data' => trim($sides)
					));
				}
			}
			return $response;
		}
		//Redoes the next_posts_link to return a string instead
		function next_posts_link($label='Next Page &raquo;', $max_page=0) {
			global $paged, $wp_query;
			$link = '';
			if ( !$max_page ) {
				$max_page = $wp_query->max_num_pages;
			}
			if ( !$paged )
				$paged = 1;
			$nextpage = intval($paged) + 1;
			if ( (! is_single()) && (empty($paged) || $nextpage <= $max_page) ) {
				$link .= '<a href="';
				$link .= clean_url(get_next_posts_page_link($max_page));
				$link .= '">'. preg_replace('/&([^#])(?![a-z]{1,8};)/', '&#038;$1', $label) .'</a>';
			}
			return $link;
		}//end function next_posts_link
		//Applied to the limits to allow offsets while paging
		function post_limit($limit) { 
			global $paged;
			//Setup the paging
			if (array_key_exists("paged", $this->qa)) {
				if ($this->qa['paged'] != "paged") {
					$paged = intval($this->qa['paged']);
				}
			} else {
				$this->paged = $paged;
			}
			if (array_key_exists("showposts", $this->qa)) {
				$postperpage = $this->qa['showposts'];
			} else {
				$postperpage = intval(get_option('posts_per_page'));
			}
			if (empty($paged)) {
					$paged = 1;
			}
			$pgstrt = ((intval($paged) -1) * $postperpage)+$this->offset . ', ';
			$limit = 'LIMIT '.$pgstrt.$postperpage;
			return $limit;
		} //end function post_limit
		//Redoes the previous_posts_link to return a string instead
		function previous_posts_link($label='&laquo; Previous Page') {
			global $paged;
			$link = '';
			if ( (!is_single())	&& ($paged > 1) ) {
				$link .= '<a href="';
				$link .= clean_url(get_previous_posts_page_link());
				$link .= '">'. preg_replace('/&([^#])(?![a-z]{1,8};)/', '&#038;$1', $label) .'</a>';
			}
			return $link;
		} //end function previous_posts_link
		//Removes a custom field if remix templates aren't selected
		function remove_template_custom_field($postID = 0, $key = '') {
			global $wpdb;
			@$wpdb->query("DELETE from $wpdb->postmeta WHERE post_id = $postID and meta_key = '$key'");
		}
		//Replaces remix tags with the loop equivalent
		//Paramaters - $postID, $query (same arguments as query_posts)
		//Returns loop content
		function replace_remix_tags($matches) {
			$action = $matches[1];
			global $wp_query, $paged, $WP_Query, $post;
			//Build the query
			$temp = $wp_query;
			$this->qa = array();
			$matches[2] = str_replace("&#038;", '&' ,$matches[2]);
			parse_str($matches[2], $this->qa);
			$content = '';
			$file = $this->templatepath . "/editor/templates/" . $action . ".php";
			switch($matches[1]) {
				case "cat":
				break;
				case "link":
				break;
				case "subpage5author":
				break;
				default:
					$wp_query= null;
					add_filter('post_limits', array(&$this, 'post_limit'));
					if (array_key_exists("offset", $this->qa)) 
					$this->offset = $this->qa['offset'];
					$wp_query = new WP_Query();
					$wp_query->query($this->qa);
					remove_filter('post_limits', array(&$this, 'post_limit'));
			}
			if (is_file($file)) 
				include($file);
			$wp_query = $temp;
			return $content;
		} //end function replace_remix_tags
		//This function is used for when the visual editor converts chars to encoded chars.  
		//Hitting save will convert these back.
		function html_unencode($content) {
			return html_entity_decode($content);
		}
		//Updates a post with data
		function update_post_data($id = 0) {
			if (isset($_POST['post_ID'])) {
				if (is_numeric($_POST['post_ID'])) {
					$id = $_POST['post_ID'];
				}
			} 
			if (isset($_POST['action'])) {
				if ($_POST['action'] == "autosave") { 
					return $id; 
				}
			}
			if (isset($_POST['remix_header'])) {
				if (get_option('remix-global-header') != $_POST['remix_header']) {
					$this->add_template_custom_field($id, '_wp_remix_page_header', $_POST['remix_header']);
				} else {
					$this->remove_template_custom_field($id, '_wp_remix_page_header');
				}
			} else {
				$this->remove_template_custom_field($id, '_wp_remix_page_header');
			}
			if (isset($_POST['remix_selected_template'])) {
				$this->add_template_custom_field($id, '_wp_remix_page_template', $_POST['remix_selected_template']);
			}
			if (isset($_POST['remix_selected_sidebar'])) {
				$this->add_template_custom_field($id, '_wp_remix_page_sidebar', trim($_POST['remix_selected_sidebar']));
			} else {
				$this->remove_template_custom_field($id, '_wp_remix_page_sidebar');
			}
			if (isset($_POST['remix_selected_footer'])) {
				$this->add_template_custom_field($id, '_wp_remix_page_footer', trim($_POST['remix_selected_footer']));
			}	else {
				$this->remove_template_custom_field($id, '_wp_remix_page_footer');
			}
		}
    }//End class remix_advanced_editor
}

//instantiate the class
if (class_exists('remix_advanced_editor')) {
	$remix_advanced_editor = new remix_advanced_editor();
	$version = get_bloginfo('version');
	//JavaScript
	add_action('admin_print_scripts', array($remix_advanced_editor,'add_post_scripts')); 
	add_action('edit_post', array($remix_advanced_editor, 'update_post_data'));
	add_action('publish_post', array($remix_advanced_editor, 'update_post_data'));
	add_action('save_post', array($remix_advanced_editor, 'update_post_data'));
	if ($version >= "2.7") {
		require_once(ABSPATH . 'wp-admin/includes/template.php'); //for add_meta_box
		add_meta_box('postremixeditor', __('Remix - Add Template File'), array($remix_advanced_editor, 'add_editor_interface27'), 'page', 'normal', 'high');
	} elseif ($version >= "2.5") { 
		add_action('edit_page_form', array($remix_advanced_editor, 'add_editor_interface25'));
	} elseif ($version >= "2.3") {
		add_action('edit_page_form', array($remix_advanced_editor, 'add_editor_interface23'));
		add_filter('mce_valid_elements', array($remix_advanced_editor,'allow_tags'),10000);
	
	}
	$remix_raw = array();
	add_filter('the_content', array($remix_advanced_editor, 'extract_raw_exclusions'), 0);
	add_filter('the_content', array($remix_advanced_editor, 'insert_raw_exclusions'), 999);
	add_filter('the_content', array($remix_advanced_editor, 'extract_remix_tags'),1000);
	add_filter('the_editor_content', array($remix_advanced_editor, 'html_unencode'),1000);
}


?>

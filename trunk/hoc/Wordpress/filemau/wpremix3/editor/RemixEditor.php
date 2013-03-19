<?php 
/*From http://planetozh.com/blog/2008/07/what-plugin-coders-must-know-about-wordpress-26/*/
$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if (file_exists($root.'/wp-load.php')) {
		// WP 2.6
		require_once($root.'/wp-load.php');
} else {
		// Before 2.6
		require_once($root.'/wp-config.php');
}
header('Content-Type: text/html; charset='.get_option('blog_charset').'');
if (isset($_POST['action']) && isset($remix_advanced_editor)) {
	check_admin_referer("wp-remix-advanced-editor");
	$postID = isset($_POST['pid'])? (int) $_POST['pid'] : 0;
	$action = $_POST['action'];
	$page = (string)$_POST['page'];
	//Remove sidebar custom field
	$remix_advanced_editor->remove_template_custom_field($postID, '_wp_remix_page_sidebar');
	if ($action == "sent_to_editor") {
		$file = $remix_advanced_editor->templatepath . "/" . $page;
		if (!is_file($file)) {
			$remix_advanced_editor->remove_template_custom_field($postID, '_wp_remix_page_template');
			die('');
		}
		$f = fopen($file, 'r');
		$content = fread($f, filesize($file));
		//Add a custom field, let's us know which template is being use
		$response = new WP_Ajax_Response();
		$remix_advanced_editor->add_template_custom_field($postID, '_wp_remix_page_template', $page);
		$response = $remix_advanced_editor->get_content_options($postID, $content);
		$content = $remix_advanced_editor->get_content_to_edit($postID, $content);
		$response->add( array(
			'what' => 'content',
			'id' => $postID,
			'data' => $content
		));
		$response->send(); 
	}
}
?>

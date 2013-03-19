<?php
$this->qa['echo'] = "0";
$this->qa['title_li'] = "";
$this->qa['hierarchical'] = 0;
$this->qa['style'] = "list";
$this->qa['categorize'] = 0;
$content .= wp_list_bookmarks($this->qa);
?>
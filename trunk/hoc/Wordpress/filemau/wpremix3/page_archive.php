<?php
/*
Template Name: Archive Page
*/
?>
<?php get_remix_header(); ?>
<div id="content-wrap">
<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
		<p><?php /*remix_code_start*/ ?></p>
			<div class="breadcrumb">
				<?php include(TEMPLATEPATH."/includes/breadcrumb.php");?>
			</div>
			
		<h1>Site Archives</h1>
		
		<div class="archive">

			<b>by page:</b>
				<ul>
					<?php wp_list_pages('title_li='); ?>
				</ul>
		
			<b>by month:</b>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
					
			<b>by category:</b>
				<ul>
					<?php wp_list_cats('sort_column=name'); ?>
				</ul>

		</div>
		
		<div class="archive">
			
			<b>by post:</b>
				<ul>
					<?php get_archives('postbypost', 100); ?>
				</ul>
		</div>
						
		</div>
		
	</div>
</div>
<p><?php /*remix_code_end*/ ?></p>
<?php get_sidebar(); ?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>

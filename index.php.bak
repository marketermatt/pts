<?php get_header(); ?>
<div class='content_back title-area'>

    <?php

		if( is_home() && get_option('page_for_posts') ) {
			$blog_page_id = get_option('page_for_posts');
			echo '<h2 class="page-title">'.get_page($blog_page_id)->post_title.'</h2>';
		}
	?>

</div>
<div class="container-wrap">
    <div class="container">
        <div class="row">
            <div class="page-title">
            </div>
            <div class="content-area col-xs-12 col-sm-8 col-md-9 hidden-overflow">
			<?php
				$page_request = explode("?",$_SERVER['REQUEST_URI']);
				$page_name = explode("=",$page_request[1]);
				if($page_name[0]=='dealsvendors')
				{
					get_template_part('template/deal','list');
				}
				else
				{
					get_template_part('template/cat','list');
				}
			?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

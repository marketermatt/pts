<div class="post-list">

    <?php
        if ( have_posts() ) :
            // Start the Loop.
            while ( have_posts() ) : the_post(); ?>
                <div class="list-item">
                    <div class="list-content">
                        <h4><?php echo get_the_title(); ?></h4>
                    </div>
                </div>
            <?php endwhile;
        endif;
    ?>
    <!--<ul class="nav nav-pills ct-azure articles-nav">
					<li class="left"><?php next_posts_link(__('&larr; Older Posts', PTS_DOMAIN)); ?></li>
					<li class="right"><?php previous_posts_link(__('Newer Posts &rarr;', PTS_DOMAIN)); ?></li>
				</ul>-->
</div>

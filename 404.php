<?php get_header(); ?>
<div class="container-wrap">
    <div class="container-fluid borderbottom">
        <div class="page-excerpt container">
            <h2 style="text-align:center;">Opps!!! Page not found...</h2>
            <div style="text-align:center;"><?php pts_breadcrumbs(); ?></div>
        </div>
    </div>
    <div class="<?php echo set_container(); ?>" style="text-align:center;">
            <h1>Error 404.</h1>
        <p>The page you are looking for does not exsist. Click <a href="<?php echo home_url(); ?>">here</a> to go back to the homepage.</p>
    </div>
</div>
<?php get_footer(); ?>

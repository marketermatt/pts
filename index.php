<?php get_header(); ?>
<div class="container-wrap">
    <div class="container-fluid borderbottom">
        <div class="page-excerpt container">
            <h3><?php echo single_cat_title(); ?></h3>
            <?php pts_breadcrumbs(); ?>
        </div>
    </div>

    <?php if(ot_get_option('pts_archive_page_width')=='1'){ ?>
        <div class="<?php echo set_container(); ?>">
    <?php }else{ ?>
        <div class="container">
            <div class="row">
                <div class="content-area col-xs-12 col-sm-8 col-md-9 hidden-overflow">
    <?php }

        if(ot_get_option('pts_archive_list_type')==1)
            get_template_part('template/cat','masonry');

        if(ot_get_option('pts_archive_list_type')==2)
            get_template_part('template/cat','list');

    if(ot_get_option('pts_archive_page_width')=='1'){ ?>
        </div>
    <?php }else{ ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
    <?php } ?>
</div>
<?php get_footer(); ?>

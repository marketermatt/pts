<?php get_header(); ?>
<div class="container-wrap">

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

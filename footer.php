<div id="top-footer-ads">
    <div class="container-fluid no-15">
        <div class="container">
            This area is for the sales advert masonry area. This a footer region as it will be displayed on all pages.
        </div>
    </div>
</div>
<div id="footer-area">
    <div class="container-fluid" style="min-height:100px;">
        <?php get_template_part('template/footer','widget'); ?>
    </div>
    <div class="clearfix"></div>
    <div class="container-fluid copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?php echo do_shortcode(ot_get_option('pts_copyright_info')); ?>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6" style="text-align:right;">
                    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_right')): ?><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
<?php wp_footer(); ?>
</body>
</html>

<?php
//global $pts_main_font;
//echo $pts_main_font;
//echo ot_get_option('pts_main_font');

/*print('<pre>');
print_r(get_option('option_tree'));
//print_r(select_fa());
//echo $pts_social_facebook;
print('</pre>');*/
?>

<div id="footer-area">
    <div class="container-fluid <?php echo ot_get_option('pts_footer_color_theme'); ?>">
        <?php get_template_part('template/footer','widget'); ?>
    </div>
    <div class="clearfix"></div>
    <div class="container-fluid copyright-area">
        <div> <?php
                    echo do_shortcode(ot_get_option('pts_copyright_info'));
            ?> </div>
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

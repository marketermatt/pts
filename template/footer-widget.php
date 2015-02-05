<?php if(ot_get_option('pts_footer_widget_on_off')=='on'): ?>
<div class="container footer-widgets">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3">
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('first_footer_widget')): ?>
            <?php endif; ?>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('second_footer_widget')): ?>
            <?php endif; ?>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('third_footer_widget')): ?>
            <?php endif; ?>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('fourth_footer_widget')): ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

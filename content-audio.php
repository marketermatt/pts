<div class="audio-content">
<?php
    $pattern = get_shortcode_regex();
    preg_match('/'.$pattern.'/s', $post->post_content, $matches);

    if (is_array($matches)) {
        $shortcode = $matches[0];
        echo do_shortcode($shortcode);
    }
?>
</div><!-- .audio-content -->

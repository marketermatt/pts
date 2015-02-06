<div class="gallery-content">
    <?php
        $pattern = get_shortcode_regex();
        preg_match('/'.$pattern.'/s', $post->post_content, $matches);

        if (is_array($matches)) {
            $shortcode = $matches[0];
            $gallery_html=do_shortcode($shortcode);

        }
    ?>
</div>

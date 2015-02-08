<div class="video-content">
    <?php
    $pattern = get_shortcode_regex();
    preg_match('/'.$pattern.'/s', $post->post_content, $matches);

    if (is_array($matches)) {
        $link = $matches[5];
        if (false !== strpos($link,'vimeo')) {
            $link_array = explode('/',$link);
            echo '<iframe src="//player.vimeo.com/video/'.$link_array[3].'" width="100%" height="331" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        } elseif(false !== strpos($link,'youtube')) {
            $link_array = explode('=',$link);
            echo '<iframe title="YouTube video player" class="youtube-player" type="text/html"
width="100%" height="331" src="http://www.youtube.com/embed/'.$link_array[1].'"
frameborder="0" allowFullScreen></iframe>';
        }
    }
?>
    <div class="clearfix"></div>
</div>

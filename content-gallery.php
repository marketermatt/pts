<div class="gallery-content">
    <?php
        $pattern = get_shortcode_regex();
        //preg_match('/'.$pattern.'/s', $post->post_content, $matches);
        preg_match('/\[gallery.*ids=.(.*).\]/', $post->post_content, $matches);
        //print_r($matches);
        $ids = $matches[1];
        $ids =  explode('"',$ids);
        $ids = explode(',',$ids[0]);
        $ids = array_slice($ids, 0, 3);
        echo '<div class="row">';
            foreach($ids as $imageid){
                $image_atts = wp_get_attachment_image_src( $imageid, array(165,210) );
                echo '<div class="col-xs-12 col-sm-4 col-md-4 list-gallery">';
                echo '<a href="'.get_the_permalink().'"><img src="'.$image_atts[0].'"/></a>';
                echo '</div>';
            }
        echo '</div>';
    ?>
</div>

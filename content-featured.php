<?php
/**
 * Featured listings
 * @since Alien Ship 0.4
 */
?>
    <div class="item">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_post_thumbnail( $post_id, array(of_get_option('alienship_featured_posts_image_width'), of_get_option('alienship_featured_posts_image_height')), array('title' => trim(strip_tags( $attachment->post_title )), )); ?></a>
      <div class="carousel-caption">
        <h4><?php the_title(); ?></h4>
      </div><!-- .carousel-caption -->
    </div><!-- .item -->

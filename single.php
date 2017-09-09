<?php
/**
 * Created by PhpStorm.
 * User: jabaltorres
 * Date: 9/9/17
 * Time: 12:46 AM
 */

//* Add custom body class to the head
add_filter( 'body_class', 'single_posts_body_class' );
function single_posts_body_class( $classes ) {
  $classes[] = 'custom-single';
  return $classes;

}
// Force content-sidebar layout setting
//add_filter( 'genesis_site_layout', '__genesis_return_content_sidebar' );

//* Remove site footer widgets
//remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );


/* Code to Display Featured Image on top of the post */
//add_action( 'genesis_before_entry', 'featured_post_image', 8 );
//
//function featured_post_image() {
////  if ( ! is_singular( 'post' ) )  return;
//  the_post_thumbnail('post-image');
//}



add_action( 'genesis_entry_header', 'single_post_featured_image', 15 );

function single_post_featured_image() {

//  if ( ! is_singular( 'post' ) )
//    return;

  $img = genesis_get_image( array( 'format' => 'html', 'size' => genesis_get_option( 'image_size' ), 'attr' => array( 'class' => 'post-image' ) ) );
  printf( '<a href="%s" title="%s">%s</a>', get_permalink(), the_title_attribute( 'echo=0' ), $img );

}


//* Run the Genesis loop
genesis();
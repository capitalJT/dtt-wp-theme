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
  $classes[] = 'advisory-team-member';
  return $classes;
}

// Display Featured Image on top of the post
add_action( 'genesis_before_entry', 'featured_post_image', 8 );

function featured_post_image() {
  the_post_thumbnail('post-image');
}

// Add member title
add_action('genesis_entry_header', 'add_member_title', 11);
function add_member_title(){
  $profileImage = get_field('profile_image');
  $memberTitle = get_field('member_title');

  echo "<h3 class='member-title'>" . $memberTitle . "</h3>";

  // next_posts_link() usage with max_num_pages
//  next_posts_link( 'Older Entries', $the_query->max_num_pages );
//  previous_posts_link( 'Newer Entries' );
}

// Remove Meta info
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

//* Run the Genesis loop
genesis();
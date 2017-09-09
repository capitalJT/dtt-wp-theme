<?php 

/**
* Template Name: Advisory Template
*/

add_action('genesis_after_content', 'advisory_loop');

function advisory_loop(){


	/* START - Advisory Team */
	$advisory_args = array(
		'post_type'  => 'advisory_team',
		'posts_per_page' => '12',
	);

	$advisorySections = new WP_Query($advisory_args);
	if(($advisorySections -> have_posts()) && (is_page( 'advisory-board' ))) {
      echo "<div class='container'>";
        echo "<div class='row'>";
          while($advisorySections -> have_posts()): $advisorySections ->the_post();
              $profileImage = get_field('profile_image');
              $memberTitle = get_field('member_title');
          ?>

          <div class="col-xs-12 col-sm-3">

            <div>
              <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $profileImage; ?>" alt=""></a>
              <div class="member-name"><?php echo the_title();?></div>
              <div class="member-title"><?php echo $memberTitle; ?></div>
              <a href="<?php echo get_permalink(); ?>">READ MORE</a>
            </div>

            <?php echo edit_post_link('(Edit)', '<span>', '</span>'); ?>
          </div>

          <?php

          endwhile;
        echo "</div>";
      echo "</div>";
	}
	/* END - Advisory Team */

}

// remove Primary Sidebar from the Primary Sidebar area
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

genesis();
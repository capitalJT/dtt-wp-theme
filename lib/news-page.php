<?php 

/**
* Template Name: News Template
*/

add_action('genesis_after_content', 'cyberNews_loop');

function cyberNews_loop(){


	/* START - Digital Page Sections */
	$news_args = array(
		'post_type'  => 'cyber_news',
		'posts_per_page' => '12',
	);

	$newsSections = new WP_Query($news_args);
	if(($newsSections -> have_posts()) && (is_page( 'news' ))) {
	    echo "<div class='news-list'>";
		while($newsSections -> have_posts()): $newsSections ->the_post();
			$news_title = get_field('title');
			$news_summary = get_field('summary');
		?>
		
		<article id="" class="post-list-item">
          <div class="news-image">
            <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
          </div>
          <div class="news-content">
            <a href="<?php echo get_permalink(); ?>"><h3 class="news-title"><?php echo the_title();?></h3></a>
            <span class="news-meta">
              <span class="postmetadata">Posted in <?php the_category(', '); ?></span> |
              <span><?php echo get_the_date(); ?></span>
            </span>
            <?php echo $news_summary; ?>
            <a href="<?php echo get_permalink(); ?>">READ MORE</a>


          </div>

          <?php echo edit_post_link('(Edit)', '<span>', '</span>'); ?>
		</article>

		<?php

		endwhile;
        echo "</div>";

	}
	/* END - Digital Page Sections */

}

// remove Primary Sidebar from the Primary Sidebar area
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

// remove content
//remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

// On-Air custom sidebar
add_action( 'genesis_after_content', 'news_page_sidebar' );
function news_page_sidebar() {
  genesis_widget_area( 'news-menu', array(
      'before' => '<aside class="sidebar sidebar-primary widget-area"><div class="wrap">',
      'after'  => '</div></aside>',
  ) );
}

// add content after the entry
//


genesis();
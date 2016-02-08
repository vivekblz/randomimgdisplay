<?php
/**
 * Template Name: Random
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<center><h1 class="entry-title">By Template</h1></center>
 <?php $randm_query = new WP_Query(array('cat' => '2', 'posts_per_page' => '5','orderby'=>'rand')); 
	echo '<span style="margin-left:100px;">';
    if($randm_query->have_posts()) : while($randm_query->have_posts()) : $randm_query->the_post(); 
			
                        if (has_post_thumbnail()) {
				echo '<a href="' . get_permalink($post->ID) . '" >';
				echo get_the_post_thumbnail($post->ID,'thumbnail');
				echo '</a>';
			      }
			 
                      endwhile; 
                         endif;  ?> </span>
			
		</div> 
	</div>
<?php
get_sidebar( 'content' );
get_sidebar();
get_footer(); ?>

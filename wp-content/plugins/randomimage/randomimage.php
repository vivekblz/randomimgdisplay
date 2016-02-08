<?php
/**
 * @package Randomimage
 */
/*
Plugin Name: Randomimage
Plugin URI: http://localhost.com/
Description: Used to display the post feature image in a single row in a random order everytime on page refresh.
Version: 3.3
Author: Vivek
Author URI: http://localhost.com/
License: GPLv2 or later
Text Domain: randomimage
*/


/*error_reporting (E_ALL);
ini_set("display_errors", 1); */

class randomimage { 
	
	public function __construct() 
	{  
	add_menu_page("Randomimage","Randomimage",10,"Randomimage","random_image","",108);
	}

	public function random_image()
	{
		global $wpdb;
        
        echo '<span style="font-weight:bold;text-decoration:underline;"><center>Random</center></span>';
        echo "Use the random-image shortcode <strong>[RandomImage]</strong> to display the post featured image randomly on every page refresh";
        
	}

	public function randomimag()
	{
	  $randm_query = new WP_Query(array('cat' => '2', 'posts_per_page' => '5','orderby'=>'rand')); 
			
    if($randm_query->have_posts()) : while($randm_query->have_posts()) : $randm_query->the_post(); 
			
                        if (has_post_thumbnail()) {
				echo '<a href="' . get_permalink($post->ID) . '" >';
				echo get_the_post_thumbnail($post->ID,'thumbnail');
				echo '</a>';
			      }
			 
                      endwhile; 
                         endif; 
	}
 
	
	
 }
    add_action('admin_menu', 'randomimg');
	add_shortcode('RandomImage', array("randomimage", 'randomimag')); 
?>

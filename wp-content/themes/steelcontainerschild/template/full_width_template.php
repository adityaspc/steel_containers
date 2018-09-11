<?php
/**
 * Template Name:Full-width
 *
 * 
 */

get_header();

 ?>

<section id="fullwidth">
  
        <?php
            // Start the loop.
            while ( have_posts() ) : the_post();
    
            //$id = get_the_ID();
            //$id = $_POST[$id];
            // Include the page content template.
        
            the_content();
        
            // End the loop.
            endwhile;
        ?>
</section>

<?php get_footer(); ?>
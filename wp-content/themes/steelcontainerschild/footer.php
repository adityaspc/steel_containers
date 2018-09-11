<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="col-sm-12 footer-adds">
			<div class="container">
			<ul class="col-sm-12 add-name navbar-nav">
			 <?php
    $args = array( 'post_type' => 'logo', 'posts_per_page' => 5,'order'=>'ASC' );
$loop = new WP_Query( $args );
$i = 1;
while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li class="nav-item"><img src="<?php echo get_the_post_thumbnail_url();  ?>"></li>
			<?php $i++; endwhile;
  ?>  
			</ul>	
			</div>
			</div>
			<div class="col-sm-12 footer-nav">
			<div class="container">
			<nav class="navbar navbar-expand-sm justify-content-center main-nav">
			  <ul class="navbar-nav">
			  <?php
			  	wp_nav_menu( array(
    'theme_location' => 'footer-menu',
    'items_wrap'     => '<ul class="navbar-nav"><li class="nav-item">%3$s</li></ul>'
) );
			 
?>
			
			    
			  </ul>
			</nav>
			<nav class="navbar navbar-expand-sm contact-nav">
			  <ul class="navbar-nav">
			    <li class="nav-item">
			     <a class="nav-link" href="mailto:<?php echo toz_option('Email' , '51565073180'); ?>"><span class="icon-sign"><i class="fa fa-envelope" aria-hidden="true"></i></span> Email: <?php echo toz_option('Email' , '51565073180'); ?></a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="javascript:;"><span class="icon-sign"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
 						Address: <?php echo toz_option('Address' , '52565073623'); ?></a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="tel:<?php echo toz_option('Call Now' , '3565074095'); ?>"><span class="icon-sign"><i class="fa fa-phone" aria-hidden="true"></i></span>
 						Call Now: <?php echo toz_option('Call Now' , '3565074095'); ?></a>
			    </li>
			  </ul>
			</nav>
			</div>
			</div>
			<div class="col-sm-12 copyright-section">
			<div class=container"">
			<div class="justify-content-center copyright-text">
				<p class="justify-content-center"><?php echo toz_option('CopyRight' , '5565074537'); ?></p>
			</div>
			</div>
			</div>
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>

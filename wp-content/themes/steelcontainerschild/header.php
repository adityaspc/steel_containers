<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<meta charset="utf-8">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
 <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
<div class="header-nav">
	<div class="container">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		  <!-- Brand/logo -->
		  <a class="navbar-brand" href="<?php echo get_site_url();  ?>">Steel Container</a>
		  
		  <!-- Links -->
		  <ul class="navbar-nav">
		    <li class="nav-item">
		      <a class="nav-item" href="tel:<?php echo toz_option('Call Now' , '3565074095'); ?>">
		      <i class="fa fa-phone phone " aria-hidden="true"></i>
					Call Now: <?php echo toz_option('Call Now' , '3565074095'); ?></a>
		    </li>
		  </ul>
		</nav>
	</div>
</div>
<?php if(is_front_page()):  ?>
<div id="demo" class="carousel slide" data-ride="carousel">
  <!-- <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul> -->
  <div class="carousel-inner">
  <?php
    $args = array( 'post_type' => 'sldier', 'posts_per_page' => 5,'order'=>'ASC' );
$loop = new WP_Query( $args );
$i = 1;
while ( $loop->have_posts() ) : $loop->the_post(); ?>
   <div class="carousel-item <?php if($i==1){ echo "active"; }else{ echo ""; } ?>">
      <img src="<?php echo get_the_post_thumbnail_url();  ?>" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption inner-slider">
        <h1><?php the_title(); ?></h1>
       <?php the_content(); ?>
      </div>   
    </div>
<?php $i++; endwhile;
  ?>    
  </div>
  <!-- <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a> -->
</div>
<?php else: ?>
  <div class="inner_banner">
    <h1><?php the_title(); ?></h1>
  </div>
<?php endif; ?>


	</header><!-- #masthead -->
	<div class="site-content-contain">
		<div id="content" class="site-content">

<?php
/*
 Template Name: Page: Testimonials
 */
?>

<?php get_header(); ?>
			<div id="content">
        		<div id="inner-content" class="wrap cf">
	            	<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
	              	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	              		<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">
	                		<header class="article-header">
	                			<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );} ?>
	                  			<h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
	                		</header>

							<section class="entry-content cf home-content intro-text" itemprop="articleBody">
								<?php the_field('intro_text'); ?>
							</section>
							<section class="entry-content cf" itemprop="articleBody">

<?php

// check if the repeater field has rows of data
if( have_rows('testimonials') ):

	echo '<div class="testimonials-container">';

 	// loop through the rows of data
    while ( have_rows('testimonials') ) : the_row();

    	echo '<div>';

        // vars
		$name = get_sub_field('client_name');
		$extra = get_sub_field('extra');
		$content = get_sub_field('description');
		$image = get_sub_field('image');
		$sizeSquare = 'square-size';
		$imageDefault = get_stylesheet_directory_uri() . '/library/images/wedding-placeholder-4-square.jpg';

		// image
		if( $image ) {
			echo wp_get_attachment_image( $image, $sizeSquare );	
		} else {
			echo '<img src="' . $imageDefault . '" />';	
		}

		echo '<p>' . $content . '</p>';

		echo '<h4>' . $name . '</h4>';
		echo '<small>' . $extra . '</small>';
		echo '</div>';

		
		

    endwhile;

    echo '</div>';


else :

    // no rows found

endif;

?>



							</section>
						</article>
					<?php endwhile; endif; ?>
					</main>
				</div>
			</div>
<?php get_footer(); ?>
<?php
/*
 Template Name: Page: Other bands
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
if( have_rows('bands') ):

	echo '<div class="bands-container">';

 	// loop through the rows of data
    while ( have_rows('bands') ) : the_row();

        // vars
		$name = get_sub_field('band_name');
		$content = get_sub_field('description');
		$songlist = get_sub_field('songlist');
		$image = get_sub_field('image');
		$sizeSquare = 'square-size';
		$imageDefault = get_stylesheet_directory_uri() . '/library/images/wedding-placeholder-4-square.jpg';

		
		// div for band grid
		echo '<div class="band-grid">';

		// image div for grid
		echo '<div>';

		// image
		if( $image ) {
			echo wp_get_attachment_image( $image, $sizeSquare );	
		} else {
			echo '<img src="' . $imageDefault . '" />';	
		}
		echo '</div>';

		// content div for grid
		echo '<div>';

		echo '<h4>' . $name . '</h4>';
		echo $content;

		// if has songlist
		if ($songlist) {
			echo '<button class="accordion">Click to view song list</button><div id="accordion" class="songlist panel">' . $songlist . '</div>';
		}
		echo '</div>';
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
<?php
/*
 Template Name: Page: Packages
 */
?>

<?php get_header(); ?>
    <div id="content" class="page">
				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article class="hentry" role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<header class="article-header">
									<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );} ?>
	                <h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
	              </header>
	              <section class="entry-content cf home-content intro-text" itemprop="articleBody">
	              	<?php the_field('intro_text'); ?>
	              		
	              	</section>
								<section class="entry-content cf" itemprop="articleBody">
									<?php get_template_part( 'template-parts/packages' ); ?>
								</section>
								<section class="entry-content cf" itemprop="articleBody">
									<?php the_content(); ?>
								</section>
							</article>

							<?php endwhile; else : ?>
									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>
							<?php endif; ?>
						</main>
				</div>
			</div>
<?php get_footer(); ?>
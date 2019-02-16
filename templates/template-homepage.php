<?php
/*
 Template Name: Page: Hompage
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<script>

	document.addEventListener("DOMContentLoaded", function(event) {

function scrollClick() {
    document.querySelector('.home-content').scrollIntoView({ 
    behavior: 'smooth',
    block: "start"
  });
}

document.querySelector('.arrow-click').addEventListener('click', function () {
  console.log("You finally clicked without jQuery");
  scrollClick();
});


	});

	
</script>

			<div id="content" class="homepage">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if( have_rows('home_images') ): ?>

	<ul class="home-slider">

	<?php while( have_rows('home_images') ): the_row(); 
		// vars
		$image = get_sub_field('image');
?>

		<li class="slide">
			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
		</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>

				<div class="home-hero home-hero-typed" style="background-image: url('<?php echo the_post_thumbnail_url('full'); ?>">
				<?php endwhile; endif;?>
					<div class="home-hero-inner">
						<span class="typed-strings typed-strings-one">
							<p>Josh Johnstone is</p>
						</span>
						<span class="typed-strings typed-strings-two">
							<p>Your Wedding Singer</p>
						</span>
						<div>
							<p class="typed-para typed-one"></p>
							<p class="typed-para typed-two"></p>
						</div>
						<i class="fas fa-chevron-down arrow-click"></i>
					</div>
				</div>
				<div id="inner-content" class="wrap cf">
						<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<section class="entry-content cf home-content intro-text" itemprop="articleBody">
									<?php the_field('intro_text'); ?>
								</section>
								<section class="entry-content cf" itemprop="articleBody">
									<?php get_template_part( 'template-parts/packages' ); ?>
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

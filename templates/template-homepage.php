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

			<div id="content" class="homepage">

				<div class="home-hero home-hero-mobile" style="background-image: url('<?php echo get_site_url(); ?>/wp-content/uploads/2018/12/image-13.jpg');">
					<p>Mobile version</p>
				</div>

				<div class="home-hero home-hero-desktop" style="background-image: url('<?php echo get_site_url(); ?>/wp-content/uploads/2018/12/image-33.jpg');">
					<p>Desktop version</p>
				</div>
				
				

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content cf" itemprop="articleBody">

									<?php
										// the content (pretty self explanatory huh)
										//the_content();

										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</section>

								<!-- hardcoded for review -->
								<section class="entry-content cf" itemprop="articleBody">
									<p>With 20 years experience as a musician, specialising in weddings and corporate events, Josh has performed at over 500 weddings and boasts one of the largest song repertoires in Perth. Rather than using backing tracks, his live solo performance features vocals, acoustic guitar, stomp/beat box and loop pedal, which is paired with top quality audio equipment to produce a full sound that keeps the party on the dance floor where it belongs!</p>

									<!-- cards 3 column -->
									<div class="grid-column-three">


										<div class="card card-1">
											<img src="http://grandstandagency.com.au/website2/wp-content/uploads/2015/07/josh-johnstone-bio-400x267.jpg" />
											<div class="card-1-content">
											<h3>Solo</h3>
											
											<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>
											<a class="button-standard">Find out more</a>
										</div>
										</div>
										<div class="card card-1">
											<img src="http://grandstandagency.com.au/website2/wp-content/uploads/2016/09/original-act-josh-johnstone-1-e1488808212835-400x234.jpg" />
											
											<div class="card-1-content">
												<h3>Duo</h3>
											
											<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur</p>
											<a class="button-standard">Find out more</a>
										</div>
										</div>
										<div class="card card-1">

											<img src="http://grandstandagency.com.au/website2/wp-content/uploads/2018/10/wedding-entertainment-perth-hire.jpg" />
											<div class="card-1-content">
												<h3>Three piece</h3>
											
											<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
											<a class="button-standard">Find out more</a>
										</div>
										</div>

									</div>

									<p>Depending on the size of your event, Josh can perform solo, or with his duo, trio… all the way up to a 6 piece band, which features a female singer and some of Perth’s best musicians. Josh’s accompanying musicians are all not only WAAPA trained (Western Australia Academy of Performing Arts), but have been also playing with Josh for several years, so you can expect nothing but the highest quality whichever lineup you choose.</p>
									<p>As well as both stripped back acoustic and uptempo party music, Josh also offers a DJ service as part of all Your Wedding Singer packages and also has an interactive</p>
									<p>Photo-booth available for hire.</p>
									<p>Email Josh directly HERE to enquire about your special day</p>
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

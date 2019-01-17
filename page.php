<?php get_header(); ?>
			<div id="content">
        <div id="inner-content" class="wrap cf">
            <main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">
                <header class="article-header">
                  <h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
                </header>

								<section class="entry-content cf home-content intro-text" itemprop="articleBody">
									<?php the_field('intro_text'); ?>
								</section>
								<section class="entry-content cf" itemprop="articleBody">
									<?php the_content(); ?>
								</section>
							</article>
							<?php endwhile; endif; ?>
						</main>
				</div>
			</div>
<?php get_footer(); ?>

<?php get_header(); ?>
      <div id="content" class="packages-single">
        <div id="inner-content" class="wrap cf">
            <main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">
                <header class="article-header">
                  <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );} ?>
                  <h1 class="single-title custom-post-type-title">Packages: <?php the_title(); ?></h1>
                  <?php 

                  // post thumb var
                  $image = get_the_post_thumbnail_url(get_the_ID(),'full');
                  
                  if ( $image ) {
                    echo '<div class="package-image" style="background-image: url(' . esc_url($image) . '"></div>';
                  }

                  ?>
                </header>
                <section class="entry-content cf">
                  <h3><?php echo get_the_excerpt(); ?></h3>
                  <p class="tagline"><?php the_field('tagline'); ?></p>
                  <hr />
                  <h2>What you get:</h2>
                  <?php the_content(); ?>
                  <hr />
                  <?php the_field('packages_text', 'option'); ?>
                </section> <!-- end article section -->
              </article>
              <?php endwhile; ?>
              <?php else : ?>
                  <article id="post-not-found" class="hentry cf">
                    <header class="article-header">
                      <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                    </header>
                    <section class="entry-content">
                      <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                    </section>
                    <footer class="article-footer">
                      <p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
                    </footer>
                  </article>
              <?php endif; ?>
            </main>
        </div>
      </div>
<?php get_footer(); ?>

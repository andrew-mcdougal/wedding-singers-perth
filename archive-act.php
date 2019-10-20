<?php
/*
 * CUSTOM POST TYPE ARCHIVE TEMPLATE
 *
 * This is the custom post type archive template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is called "register_post_type( 'bookmarks')",
 * then your template name should be archive-bookmarks.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>
      <div id="content" class="packages-single">
        <div id="inner-content" class="wrap cf">
          <main id="main" class="m-all t-3of3 d-7of7 cf hentry" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
            <header class="article-header">
              <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );} ?>
              <h1 class="single-title custom-post-type-title">Wedding entertainment</h1>
            </header>
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article role="article">
              <section class="entry-content cf">
                <h3><?php echo get_the_excerpt(); ?></h3>
                <p class="tagline"><?php the_field('tagline'); ?></p>
                <hr />
                <h2>What you get:</h2>
              </section> <!-- end article section -->
            <?php endwhile; ?>
            <?php else : ?>
            <article id="post-not-found" class="cf">
              <header class="article-header">
                <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
              </header>
              <section class="entry-content">
                <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
              </section>
              <footer class="article-footer">
                <p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
              </footer>
            <?php endif; ?>
            </article>
          </main>
        </div>
      </div>
<?php get_footer(); ?>
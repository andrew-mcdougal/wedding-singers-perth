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
              <h1 class="single-title custom-post-type-title">Wedding entertainments</h1>
            </header>
            <div class="act-list-grid">
            <?php if (have_posts()) : while (have_posts()) : the_post();
            // variables
            $image = get_the_post_thumbnail_url(get_the_ID(),'square-size');
            $thumbnail_id = get_post_thumbnail_id( $post->ID );
            $image_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            // ACF
            $intro = get_field('intro');
            ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">
                <header class="article-header">
                  <div class="intro-grid">
                    <?php 
                    if ( $image ) {
                      the_post_thumbnail( 'square-size' );
                    } else {

                    }
                    ?>
                  <div>
                    <h4><?php the_title(); ?></h4>
                    <?php echo $intro; ?>
                  </div>
                </div>
                </header>
                <a class="button-standard button-standard--full" href="<?php echo get_permalink(); ?>">Click for details</a>
                
              </article>
            <?php endwhile; ?>
            </div>
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
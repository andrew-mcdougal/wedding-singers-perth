<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>
      <div id="content" class="acts-single">
        <div id="inner-content" class="wrap cf">
            <main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
              <?php if (have_posts()) : while (have_posts()) : the_post();
              
              // variables
              $image = get_the_post_thumbnail_url(get_the_ID(),'full');
              $thumbnail_id = get_post_thumbnail_id( $post->ID );
              $image_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

              // ACF
              $intro = get_field('intro');
              $bio = get_field('bio');
              $songlist = get_field('songlist');
              $video = get_field('video_content');
              ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">
                <header class="article-header">
                  <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );} ?>
                  <h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
                  <div class="intro-grid">
                    <?php 
                    if ( $image ) {
                      the_post_thumbnail( 'large' );
                    } else {

                    }
                    ?>
                  <div>
                    <?php echo $intro; ?>
                  </div>
                </header>
                <?php 
                // Show tabs if has bio
                if($bio) { ?>
                <script>
                // band tabs
                document.addEventListener("DOMContentLoaded", function(event) {
                  var tabs = new Tabby('[data-tabs]');
                });
                </script>
                <section id="tab-section" class="entry-content cf">
                  <ul data-tabs>
                    <li><a data-tabby-default href="#bio">About</a></li>
                    <?php if($songlist) { ?>
                    <li><a href="#songs">Songlist</a></li>
                    <?php }
                    if( $video ) { ?>
                    <li><a href="#video">Videos</a></li>
                    <?php }
                    if( have_rows('testimonials') ) { ?>
                    <li><a href="#testimonials">Testimonials</a></li>
                    <?php } ?>
                  </ul>
                </section>
                <?php } ?>

                <section id="bio" class="entry-content cf">
                  <?php echo $bio; ?>
                </section>

                <section id="songs" class="entry-content cf">
                <?php
                // if has songlist
                if ($songlist) {
                ?>
                <script>
                // search songlist
                function searchSongs() {
                  // Declare variables
                  var input, filter, ul, songPara, a, i, txtValue;
                  input = document.getElementById('myInput');
                  filter = input.value.toUpperCase();
                  ul = document.getElementById("accordion");
                  songPara = ul.getElementsByTagName('p');

                  // Loop through all list items, and hide those who don't match the search query
                  for (i = 0; i < songPara.length; i++) {
                    a = songPara[i];
                    txtValue = a.textContent || a.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                      songPara[i].style.display = "";
                    } else {
                      songPara[i].style.display = "none";
                    }
                  }
                }
                </script>
                  <div class="songlist">
                    <input type="text" id="myInput" onkeyup="searchSongs()" placeholder="Search for song names or artists..">
                    <?php echo $songlist . '</div>';
                  } // end if
                  ?>
                </section>
                
                <section id="video" class="entry-content cf">
                  <?php echo $video; ?>
                </section>

                <?php
                // check if the repeater field has rows of data
                if( have_rows('testimonials') ):

                  echo '<section id="testimonials" class="entry-content cf">';
                  echo '<div class="testimonials-container">';

                  // loop through the rows of data
                    while ( have_rows('testimonials') ) : the_row();

                      echo '<div>';
                        // vars
                        $name = get_sub_field('name');
                        $content = get_sub_field('words');
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
                    echo '</div>';

                    endwhile;

                      echo '</div>';
                    echo '</section>';
                else :
                    // no rows found
                endif;
                ?>
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
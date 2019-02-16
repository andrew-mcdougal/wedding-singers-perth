									<div class="grid-column grid-column-three grid-column-no-margin">
									<?php
									$loop = new WP_Query( array(
										'post_type' => 'bands',
										'posts_per_page' => -1
										)
									);
									while ( $loop->have_posts() ) : $loop->the_post(); ?>
										<div class="card">
											<?php if ( has_post_thumbnail() ) {the_post_thumbnail('full');} ?>

											<div class="card-content">
												<h3><?php the_title(); ?></h3>
												<h4><?php the_excerpt(); ?></h4>
												<p><?php the_field('tagline'); ?></p>
												<a class="button-standard" href="<?php echo get_permalink(); ?>"><i class="fas fa-info-circle"></i> Find out more</a>
												<p><?php the_content(); ?></p>
											</div>
										</div>
										<?php endwhile; wp_reset_query(); ?>
									</div>
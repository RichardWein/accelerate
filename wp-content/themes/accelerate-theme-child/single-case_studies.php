<?php
/**
 * The template for displaying a single case study
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

$size = "full";
 
get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="one-case-study">
					<div class="case-study-column-1">
						<div class="case-study-title"><?php the_title(); ?></div>
						<div class="case-study-services"><?php the_field('services'); ?></div>
						<?php if( get_field('client') ) : ?>
							<div class="case-study-client">Client: <?php the_field('client'); ?></div>
						<?php endif; ?>
						<div class="case-study-description"><?php the_content(); ?></div>
						<?php if( get_field('url') ) : ?>
							<div class="case-study-url"><a href="https://<?php the_field('url') ?>">Visit Live Site</a></div>
						<?php endif; ?>
					</div>

					<div class="case-study-column-2">
						<?php if( get_field('image_1') ) : ?>
							<div class="case-study-image"><?php echo wp_get_attachment_image( get_field('image_1'), $size ); ?></div>
						<?php endif; ?>
						<?php if( get_field('image_2') ) : ?>
							<div class="case-study-image"><?php echo wp_get_attachment_image( get_field('image_2'), $size ); ?></div>
						<?php endif; ?>
						<?php if( get_field('image_3') ) : ?>
							<div class="case-study-image"><?php echo wp_get_attachment_image( get_field('image_3'), $size ); ?></div>
						<?php endif; ?>
					</div>
				</div>
				
			<?php endwhile; // end of the loop. ?>
			

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
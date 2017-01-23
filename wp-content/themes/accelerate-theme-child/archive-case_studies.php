<?php
/**
 * Page template for the Case Studies archive page
 *
 * Displays a list of case studies excerpts
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
			<div class="single-case-study">
				<div class="case-study-column-1">
					<div class="case-study-title"><?php the_title(); ?></div>
					<div class="case-study-services"><?php the_field('services'); ?></div>
					<div class="case-study-description"><?php the_excerpt(); ?></div>
					<?php if( get_field('url') ) : ?>
						<div class="case-study-url"><a href="<?php the_permalink(); ?>">View project &gt;</a></div>
					<?php endif; ?>
				</div>

				<div class="case-study-column-2">
					<?php if( get_field('image_1') ) : ?>
						<div class="case-study-image"><?php echo wp_get_attachment_image( get_field('image_1'), $size ); ?></div>
					<?php endif; ?>
				</div>
			</div>
		<?php endwhile; // end of the loop. ?>
		
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
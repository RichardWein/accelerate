<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?>

<div class="about-page-top-image">
	<div class="about-page-overlay-text">
		<?php echo get_field('header_image_overlay_text'); ?>
	</div>
</div>

<div id="primary" class="site-content">
	<div class="services-intro">
		<h2><?php the_field('intro_title'); ?></h2>
		<?php the_field('intro_text'); ?>
	</div>
	
	<div class="services-list">
		<?php query_posts( array( 'post_type' => 'services', 'orderby' => 'date', 'order' => 'ASC' ) ); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="one-service">
				<div class="service-symbol">
					<?php if( get_field('service_symbol') ) : ?>
						<?php echo wp_get_attachment_image( get_field('service_symbol'), 'full' ); ?>
					<?php endif; ?>
				</div>
				<div class="service-text">
					<div class="service-text-title"><?php the_title(); ?></div>
					<div class="service-text-description"><?php the_content(); ?></div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
				
	<?php wp_reset_query(); ?>
	<div class="about-page-bottom">
		<?php if( get_field('contact_question') ) : ?>
			<span><?php the_field('contact_question'); ?></span>
		<?php endif; ?>
		<a class="button" href="<?php echo home_url('/contact'); ?>">Contact Us</a>
	</div>
</div>

<?php get_footer(); ?>
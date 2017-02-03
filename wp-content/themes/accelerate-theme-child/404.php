<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<section class="error-404 not-found">
				<div class="page-content">
					<?php $post_id = get_page_by_title( '404 Page' ); ?>
					<?php the_field('404_page_content', $post_id); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>

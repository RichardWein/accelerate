<?php
/**
 * The template for displaying the homepage
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?>

<section class="home-page">
	<div class="site-content">
	
		<?php while ( have_posts() ) : the_post(); ?>
			<div class='homepage-hero'>
				<?php the_content(); ?>
				<a class="button" href="<?php echo home_url('/case-studies'); ?>">View Our Work</a>
			</div>
		<?php endwhile; // end of the loop. ?>

	</div><!-- .container -->
</section><!-- .home-page -->

<div class="site-content">
		<?php
		// New Query
		query_posts( 'posts_per_page=3&post_type=case_studies' );
		?>
		<h2 class="centered-text">Featured Work</h2>
		<br>
		<div class="featured-work-list">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="featured-work-list-item">
					<?php if ( get_field( 'image_1') ) : ?>
						<?php echo wp_get_attachment_image( get_field('image_1'), 'medium' ); ?>
					<?php endif; ?>
					<h5 class="centered-text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				</div>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
</div>

<div class="site-content">
	<div class="blog-plus-tweet">
		<div class="blog">
			<?php
			// New Query
			query_posts( 'posts_per_page=1' );
			?>
			<h2>From the Blog</h2>
			<br>
			<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>
						<div class="entry-wrap">
							<header class="entry-header">
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</header>
							<div class="entry-summary">
									<?php the_excerpt(); ?>
							</div>
							<div class="more-link">
								<a href="<?php the_permalink(); ?>">Read More &gt;</a>
							</div>
						</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		
		
		<div class="tweet">
			<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<h2>Recent Tweet</h2>
				<br>
				<div class="accelerate-heading">
					@Accelerate
				</div>
				<div id="secondary" class="widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
				<div class="more-link">
					<a href="https://twitter.com/intent/follow?ref_src=twsrc%5Etfw&amp;region=follow_link&amp;screen_name=RichardSWein&amp;tw_p=followbutton">Follow Us &gt;</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
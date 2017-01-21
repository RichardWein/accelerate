<?php
/**
 * The template for displaying the homepage
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

<section class="home-page">
	<div class="site-content">
	
		<?php while ( have_posts() ) : the_post(); ?>
			<div class='homepage-hero'>
				<?php the_content(); ?>
				<a class="button" href="<?php echo home_url(); ?>/blog">View Our Work</a>
			</div>
		<?php endwhile; // end of the loop. ?>

	</div><!-- .container -->
</section><!-- .home-page -->

<section class="selected-posts">
	<div class="site-content">
		<div class="main-content">
			<?php
			// New Query
/* 			query_posts( array( 'tag' => 'show-on-front-page' ) ); */
			query_posts( 'tag=show-on-front-page' );
			?>
			<h2>Selected posts from the blog</h2>
			<br>
			<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>
				
					<article class="post-entry">
						<div class="entry-wrap">
							<header class="entry-header">
								<div class="entry-meta">
									<time class="entry-time"><?php echo get_the_date();?></time>
								</div>
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</header>
						<div class="entry-summary">
								<?php the_excerpt(); ?>
						</div>
							<footer class="entry-footer">
								<div class="entry-meta">
									<span class="entry-terms author">Written by <?php the_author_posts_link(); ?></span>
									<span class="entry-terms category">Posted in <?php the_category(', '); ?></span>
									<span class="entry-terms comments"><?php comments_number( 'No comments yet!', '1 comment', '% comments' ); ?></span>
								</div>
							</footer>
						</div>
					
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>


<?php get_footer(); ?>
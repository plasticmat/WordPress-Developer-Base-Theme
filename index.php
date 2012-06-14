<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); // Loop start ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			
			<?php get_template_part('meta'); ?>
			
			<?php the_content(); ?>

		</article>

	<?php endwhile; else: // Loop end ?>

		<article class="no-posts">
			<p>Sorry, no posts found.</p>
		</article>

	<?php endif; ?>

<?php get_footer(); ?>
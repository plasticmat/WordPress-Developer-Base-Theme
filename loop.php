<?php if (have_posts()) : while (have_posts()) : the_post(); // Loop start ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		
		<?php get_template_part('meta'); ?>

		<?php if ( has_post_thumbnail() ): ?>
			<div class='post-thumbnail'>
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>
		
		<div class="post-excerpt">
			<?php the_excerpt(); ?>
		</div>
		
	</article>

<?php endwhile; ?>

	<nav class="wp-prev-next clearfix">
		<span class="pages"><?php wp_link_pages(); ?></span>
		<span class="prev-link pull-right"><?php next_posts_link(); ?></span>
		<span class="next-link pull-left"><?php previous_posts_link(); ?></span>
	</nav>	

<?php else: ?>

	<article class="no-posts">
		<p><?php _e('Sorry, no posts found', 'basetheme'); ?></p>
	</article>

<?php endif; ?>

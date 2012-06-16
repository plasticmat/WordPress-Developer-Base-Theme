<?php if (have_posts()) : while (have_posts()) : the_post(); // Loop start ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

		<h2><?php the_title(); ?></h2>

		<?php if ( has_post_thumbnail() ): ?>
			<div class='post-thumbnail'>
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>
		
		<div class="post-content">
			<?php the_content(); ?>
		</div>
		
	</article>

<?php endwhile; endif; ?>

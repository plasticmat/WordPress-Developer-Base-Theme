<?php get_header(); ?>

	<section class="span8 content clearfix">

		<hgroup class="archive-title">

			<?php if (is_category()): ?>

				<h2><span><?php _e('Catgeory:', 'basetheme'); ?></span> <?php single_cat_title(); ?></h2>

			<?php elseif (is_tag()): ?> 
				
				<h2><span><?php _e('Tag:', 'basetheme'); ?></span> <?php single_tag_title(); ?></h2>
			
			<?php elseif (is_author()): ?>

				<?php
					// To get author info. http://codex.wordpress.org/Author_Templates
					global $wp_query;
					$curauth = $wp_query->get_queried_object();
				?>
				<h2><span><?php _e('Author:', 'basetheme'); ?></span> <?php echo $curauth->nickname; ?></h2>

			<?php elseif (is_day()): ?>

				<h2><span><?php _e('Daily Archives:', 'basetheme'); ?></span> <?php the_time('l, F j, Y'); ?></h2>
			
			<?php elseif (is_month()): ?>

			    <h2><span><?php _e('Monthly Archives:', 'basetheme'); ?>:</span> <?php the_time('F Y'); ?></h2>

			<?php elseif (is_year()): ?>

			    <h2><span><?php _e('Yearly Archives:', 'basetheme'); ?>:</span> <?php the_time('Y'); ?></h2>

			<?php endif; ?>

		</hgroup>

		<?php get_template_part('loop'); ?>

	</section>

	<section class="span4 sidebar clearfix">

		<?php get_sidebar(); ?>

	</section>

<?php get_footer(); ?>
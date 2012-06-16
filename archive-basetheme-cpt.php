<?php get_header(); ?>

	<section class="span8 content clearfix">

		<hgroup class="archive-title">

			<h2>Archive for CPT</h2>

		</hgroup>

		<?php get_template_part('loop'); ?>

	</section>

	<section class="span4 sidebar clearfix">

		<?php get_sidebar(); ?>

	</section>

<?php get_footer(); ?>
<?php if ( is_active_sidebar( 'sidebar-primary' ) ) : ?>

	<section class="sidebar-primary widget-area clearfix">
		<?php dynamic_sidebar( 'sidebar-primary' ); ?>
	</section>

<?php else : ?>

	<section class="no-widgets clearfix">
		<p><?php _e('There are currently no widgets activated for this sidebar (Primary Sidebar)', 'basetheme'); ?></p>
	</section>

<?php endif; ?>

<?php

class BaseTheme_Widget extends WP_Widget {

	function BaseTheme_Widget() {
		$widget_ops = array('classname' => 'basetheme_widget', 'description' => 'Example custom basetheme widget.' );
		$this->WP_Widget('basetheme_widget', 'BaseTheme Widget', $widget_ops);
	}
	
	function widget($args, $instance) {

		// This is what the wiget will dump in to the page

		echo '<h3>' . $instance['title'] . '</h3>';
		echo '<p>' . $instance['text'] . '</p>';
		
	}
	
	function form($instance) {
			
		// The widget form displayed in the admin section
		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '') );

		$title = strip_tags($instance['title']);
		$entry_title = strip_tags($instance['text']); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title: 
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>">Text: 
				<textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_attr($entry_title); ?></textarea>
			</label>
		</p>
	
	<?php
	
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = strip_tags($new_instance['text']);
		return $instance;
	}
	
}

register_widget('BaseTheme_Widget');
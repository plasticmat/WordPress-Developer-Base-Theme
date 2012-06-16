<ul class="postmetadata clearfix">
    <li class="author"><?php _e('Author:', 'basetheme'); ?> <?php the_author_posts_link(); ?></li>		
    <li class="date"><?php _e('Date:', 'basetheme'); ?> <?php the_time('F jS, Y'); ?></li>
    <li class="categories"><?php _e('Categories:', 'basetheme'); ?> <?php the_category(', '); ?></li>
	<li class="tags"><?php _e('Tags:', 'basetheme'); ?> <?php the_tags('', ', ', ''); ?></li>			
	<li class="comments"><?php _e('Comments:', 'basetheme'); ?> <?php comments_number(); ?></li>
</ul>
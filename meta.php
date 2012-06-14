<ul class="postmetadata clearfix">
    <li class="author">By: <?php the_author_posts_link(); ?></li>		
    <li class="date">Date: <?php the_time('F jS, Y'); ?></li>
    <li class="categories">Categories: <?php the_category(', '); ?></li>
	<li class="tags">Tags: <?php the_tags('', ', ', ''); ?></li>			
	<li class="comments">Comments: <?php comments_number(); ?></li>
</ul>
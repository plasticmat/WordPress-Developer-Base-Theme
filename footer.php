	</div><!-- end of main -->
	
	<footer>
		<p class="copy">
		<?php
			$default_copyright = '&copy; <a href="' . get_bloginfo('url') . '">' . get_bloginfo('name') . '</a> ' . date('Y');
			echo $default_copyright;
		?>
		</p>
	</footer><!--//footer-->
	
</div><!-- end of page -->
	
<?php wp_footer(); ?>

<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

</body>
</html>
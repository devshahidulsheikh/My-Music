<footer>
	<div class="wrap-footer zerogrid">
		<div class="row block09">
			
			<?php dynamic_sidebar("footer-widget") ?>
			
		</div>
		
		<div class="row copyright">
			<p>
				<?php
				/* global $zboom_opt;
				echo $zboom_opt['copyright-text']; */

				/* echo Redux::get_option( 'zboom_opt', 'copyright-text' ); */

				global $opt_name;
				echo Redux::get_option( $opt_name, 'copyright-text' );
			 	?>
			</p>
		</div>
	</div>
</footer>

<?php wp_footer() ?>
</body>
</html>
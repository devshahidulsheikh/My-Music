<!--------------Header--------------->
<?php get_header() ?>

<section>
	<div class="zerogrid">
		This Template: page.php
	</div>
</section>

<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block03">
			<div class="col-2-3">
				<div class="wrap-col">

				<h1>404 Page, Not Found</h1>	
				<h2>May be you are looking for something else</h2>
                
                You may visit the <a href="<?php print ltrim("home") ?>">Home</a>

				</div>
			</div>
			<div class="col-1-3">
				<?php get_sidebar() ?>
			</div>
		</div>
	</div>
</section>
<!--------------Footer--------------->
<?php get_footer() ?>
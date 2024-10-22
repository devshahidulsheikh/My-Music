<!--------------Header--------------->
<?php get_header()
/* Template Name: Test */
?>

<section>
	<div class="zerogrid  wrap-footer">
		This Template: test.php
	</div>
</section>

<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block03">
			<div class="col-2-3">
				<div class="wrap-col">

					<h2>Our Favourite Food: <?php #echo get_post_meta( 192,"Favourite Food",true ) ?></h2>
					<h2>Our Favourite Food: <?php #echo get_post_meta( $post->ID,"Favourite Food",true ) ?></h2>
					<h2>Our Favourite Food: <?php echo get_post_meta( get_the_ID(),"Favourite Food",true ) ?></h2>

                    <h2>My Favourite Food: <?php echo get_post_meta( get_the_ID(),"favfood",true ) ?></h2>

				</div>
			</div>
			<div class="col-1-3">
				<div class="wrap-col">
					<?php get_sidebar() ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--------------Footer--------------->
<?php get_footer() ?>
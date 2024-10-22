<?php get_header();
/* Template Name: Gallery */
?>

<section>
	<div class="zerogrid wrap-footer">
		This Template: gallery.php
	</div>
</section>

<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block03">

			<?php
			$gallery_items = new WP_Query(array(
				"post_type" => "zboom-gallery",
				"posts_per_page" => -1
			));

			while($gallery_items->have_posts()) : $gallery_items->the_post() ?>
			<div class="col-1-4">
				<div class="wrap-col">
					<article>
						<?php the_post_thumbnail() ?>
						<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					</article>
				</div>
			</div>
			<?php endwhile ?>
		</div>
	</div>
</section>
<!--------------Footer--------------->
<?php get_footer() ?>
<!--------------Header--------------->
<?php get_header();
/* Template Name: Home */
?>

<section>
	<div class="zerogrid wrap-footer">
		This Template: frontpage.php
	</div>
</section>

<div class="featured">
	<div class="wrap-featured zerogrid">
		<div class="slider">
			<div class="rslides_container">
				<ul class="rslides" id="slider">

					<?php
					$slider_items = new WP_Query(array(
						"post_type" => "zboom-slider",
						"posts_per_page" => -1
					));

					while($slider_items->have_posts()) : $slider_items->the_post() ?>
					<li><?php the_post_thumbnail() ?></li>
					<?php endwhile ?>

				</ul>
			</div>
		</div>
	</div>
</div>

<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block01">

			<?php
			$block_items = new WP_Query(array(
				"post_type" => "zboom-services",
				"posts_per_page" => 3
			));

			while($block_items->have_posts()) : $block_items->the_post() ?>
			<div class="col-1-3">
				<div class="wrap-col box">
					<h2><?php the_title() ?></h2>
					<p><?php read_more(10) ?></p>
					<div class="more"><a href="<?php the_permalink() ?>">[...]</a></div>
				</div>
			</div>
			<?php endwhile ?>

		</div>
		<div class="row block02">

			<?php if($zboom_opt['site-layout'] == 1) : ?>
			
			<div class="col-full">
				<div class="wrap-col">
					<div class="heading"><h2>Latest Blog</h2></div>

					<?php
					$post_contents = new WP_Query(array(
						"post_type" => "post",
						"posts_per_page" => 5
					));

					while($post_contents->have_posts()) : $post_contents->the_post() ?>
					<article class="row">
						<div class="col-1-3">
							<div class="wrap-col">
								<?php the_post_thumbnail() ?>
							</div>
						</div>
						<div class="col-2-3">
							<div class="wrap-col">
								<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
								<div class="info">By <?php the_author() ?> on <?php the_time("F d, Y") ?> with <?php comments_popup_link("Comment Nai","Ekta Comment Ace","% comments","shahidul","Comments Off") ?></div>
								<?php read_more(12) ?>
								<a href="<?php the_permalink() ?>" class="more">[...]</a>
							</div>
						</div>
					</article>
					<?php endwhile ?>
				</div>
			</div>
			
			<?php elseif($zboom_opt['site-layout'] == 2) : ?>

			<div class="col-1-3">
				<div class="wrap-col">
					<?php get_sidebar() ?>
				</div>
			</div>
			<div class="col-2-3">
				<div class="wrap-col">
					<div class="heading"><h2>Latest Blog</h2></div>

					<?php
					$post_contents = new WP_Query(array(
						"post_type" => "post",
						"posts_per_page" => 5
					));

					while($post_contents->have_posts()) : $post_contents->the_post() ?>
					<article class="row">
						<div class="col-1-3">
							<div class="wrap-col">
								<?php the_post_thumbnail() ?>
							</div>
						</div>
						<div class="col-2-3">
							<div class="wrap-col">
								<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
								<div class="info">By <?php the_author() ?> on <?php the_time("F d, Y") ?> with <?php comments_popup_link("Comment Nai","Ekta Comment Ace","% comments","shahidul","Comments Off") ?></div>
								<?php read_more(12) ?>
								<a href="<?php the_permalink() ?>" class="more">[...]</a>
							</div>
						</div>
					</article>
					<?php endwhile ?>
				</div>
			</div>
			
			<?php elseif($zboom_opt['site-layout'] == 3) : ?>

			<div class="col-2-3">
				<div class="wrap-col">
					<div class="heading"><h2>Latest Blog</h2></div>

					<?php
					$post_contents = new WP_Query(array(
						"post_type" => "post",
						"posts_per_page" => 5
					));

					while($post_contents->have_posts()) : $post_contents->the_post() ?>
					<article class="row">
						<div class="col-1-3">
							<div class="wrap-col">
								<?php the_post_thumbnail() ?>
							</div>
						</div>
						<div class="col-2-3">
							<div class="wrap-col">
								<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
								<div class="info">By <?php the_author() ?> on <?php the_time("F d, Y") ?> with <?php comments_popup_link("Comment Nai","Ekta Comment Ace","% comments","shahidul","Comments Off") ?></div>
								<?php read_more(12) ?>
								<a href="<?php the_permalink() ?>" class="more">[...]</a>
							</div>
						</div>
					</article>
					<?php endwhile ?>
				</div>
			</div>
			<div class="col-1-3">
				<div class="wrap-col">
					<?php get_sidebar() ?>
				</div>
			</div>

			<?php else : ?>

				<div class="col-full">
					<h1 style="font-size: 35px; text-align: center;background: red; color: yellow; padding: 25px 0;">Warning: Select Another Layout</h1>
				</div>
				
			<?php endif ?>

		</div>
	</div>
</section>

<!--------------Footer--------------->
<?php get_footer() ?>

<?php
/* Template Name: Contact */
?>

<!--------------Header--------------->
<?php get_header() ?>

<section>
	<div class="zerogrid wrap-footer">
		This Template: contact.php
	</div>
</section>

<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block03">
			<div class="col-2-3">
				<div class="wrap-col">

					<?php while(have_posts()) : the_post() ?>
					<article>
						<?php the_content() ?>
					</article>
					<?php endwhile ?>

				</div>
			</div>
			<div class="col-1-3">
				<div class="wrap-col">
					<?php dynamic_sidebar("contact-sidebar") ?>
					<ul>
						
						<?php if($zboom_opt['social-icon'][1]) : ?>
						<li><a href="<?php echo $zboom_opt['social-icon'][1] ?>"><i class="fa-brands fa-facebook"></i></a></li>
						<?php endif ?>
						
						<?php if($zboom_opt['social-icon'][2]) : ?>
						<li><a href="<?php echo $zboom_opt['social-icon'][2] ?>"><i class="fa-brands fa-instagram"></i></a></li>
						<?php endif ?>

						<?php if($zboom_opt['social-icon'][3]) : ?>
						<li><a href="<?php echo $zboom_opt['social-icon'][3] ?>"><i class="fa-brands fa-twitter"></i></a></li>
						<?php endif ?>

						<?php if($zboom_opt['social-icon'][4]) : ?>
						<li><a href="<?php echo $zboom_opt['social-icon'][4] ?>"><i class="fa-brands fa-linkedin"></i></a></li>
						<?php endif ?>

						<?php if($zboom_opt['social-icon'][5]) : ?>
						<li><a href="<?php echo $zboom_opt['social-icon'][5] ?>"><i class="fa-brands fa-youtube"></i></a></li>
						<?php endif ?>

					</ul>
				</div>
			</div>
		</div>
		<div class="row block09">
			<div class="wrap-col">
				<div class="col-full content">
					<ul>
						<li class="tag"><a href="<?php echo get_category_link( $zboom_opt['tag-select'] ) ?>"><?php echo get_the_category_by_ID( $zboom_opt['tag-select'] ) ?></a></li>
						<li class="tag"><a href="#"><?php echo $zboom_opt['post-select'] ?></a></li>
						<li class="tag"><a href="#"><?php echo $zboom_opt['opt-slider-label'] ?></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row block03">
			<div class="col-2-4">
				<div class="wrap-col">
					<?php
				
					$national = new WP_Query(array(
						'post_type' => 'post',
						'post_per_page' => 4,
						'cat' => $zboom_opt['left-side-cat']
					));

					while($national->have_posts()) : $national->the_post(); ?>

					<h2><?php the_title() ?></h2>
					<?php endwhile ?>
				</div>
			</div>
			<div class="col-2-4">
				<div class="wrap-col">
					<?php
				
					$national = new WP_Query(array(
						'post_type' => 'post',
						'post_per_page' => 4,
						'cat' => $zboom_opt['right-side-cat']
					));

					while($national->have_posts()) : $national->the_post(); ?>

					<h2><?php the_title() ?></h2>
					<?php endwhile ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!--------------Footer--------------->
<?php get_footer() ?>

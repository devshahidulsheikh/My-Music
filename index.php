<!--------------Header--------------->
<?php get_header() ?>

<section>
	<div class="zerogrid wrap-footer">
		This Template: index.php
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
						<?php the_post_thumbnail() ?>
						<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
						<div class="info">[By <?php the_author() ?> on <?php the_time("F d, Y") ?> with <?php comments_popup_link("Comment Nai","Ekta Comment Ace","% comments","any-class","Comments Off") ?>]</div>
						<?php read_more(30) ?>...<a href="<?php the_permalink() ?>">read more</a>
					</article>
					<?php endwhile ?>

					<!-- <?php the_posts_navigation(array(
						"prev_text" => "Prev",
						"next_text" => "Next",
					)) ?> -->
					<div id="pagi">
						<?php the_posts_pagination(array(
						"prev_text" => "Prev",
						"next_text" => "Next",
						// "before_page_number" => "<span>Page </span>",
						/* "before_page_number" => "<strong>",
						"after_page_number" => "</strong>" */
						// "show_all" => true
						)) ?>
					</div>
					
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
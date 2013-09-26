<?php get_header(); ?>
	<div class="b_wrap">
		<div class="content_list">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>
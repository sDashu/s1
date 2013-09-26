<?php get_header(); ?>
	<div class="b_wrap">
		<div class="content_list">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<article class="article">
				<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
				<?php the_content('Read More'); ?>
				<cite>
					<div class="tag">
						<?php the_tags('','') ?>
					</div>
					<a href="<?php the_permalink();?>" class="more">Read More</a>
					<p class="msg">
						<span class="click">Click(<?php echo getPostViews(get_the_ID()); ?>)</span>
						<span class="date"><?php echo date('M',get_the_time('U'));?> <?php the_time('d, Y') ?></span>
					</p>
				</cite>
			</article>
			<?php endwhile; ?>
		<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>
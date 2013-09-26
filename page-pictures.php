<?php
/**
 * Template Name: Pictures
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<?php get_header(); ?>
	<div class="b_wrap">
		<div class="content_list">
		<?php query_posts(array('post_type'=>'pictures')); ?>
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<article class="photo">
					<h1 class="title"><?php the_title(); ?></h1>
					<?php the_content(); ?>
					<div class="clear"></div>
					<cite>
						<div class="tag">
							<?php tagtext(); ?>
						</div>
						<p class="msg">
							<span class="date"><?php echo date('M',get_the_time('U'));?> <?php the_time('d, Y') ?></span>
						</p>
					</cite>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>
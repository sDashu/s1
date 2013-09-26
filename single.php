<?php setPostViews(get_the_ID()); ?>
<?php get_header(); ?>
	<!-- <div style="width:1000px; height:400px; background-color:#ccc;"></div> -->
	<div class="b_wrap">
		<div class="content_list">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<div class="single">
				<h1 class="title"><?php the_title(); ?></h1>
				<div class="msg">
					<span class="click">Click(<?php echo getPostViews(get_the_ID()); ?>)</span>
					<span class="date"><?php echo date('M',get_the_time('U'));?> <?php the_time('d, Y') ?></span>
				</div>
				<div class="content">
					<?php the_content(); ?>
				</div>
				<div class="comments">
					<?php comments_template(); ?>
				</div>
			</div>
			<?php endwhile; ?>
		<?php endif; ?>
		</div>
	</div>
	<?php
		if(get_previous_post()){
			echo "<div class='previous'><span title='上一篇'>";
			previous_post_link('%link','');
			echo "</span></div>";
		}else{
			echo "<div class='previous'><span title='没有了，已经是第一篇'><a class='n'></a></span></div>";
		};
		if(get_next_post()){
			echo "<div class='next'><span title='下一篇'>";
			next_post_link('%link','');
			echo "</span></div>";
		}else{
			echo "<div class='next'><span title='没有了，已经是最新一篇'><a class='n'></a></span></div>";
		};
	?>
	<script>
	$(function(){
		$('.previous,.next').hover(function(){
			$(this).children('span').css('display','block');
		},function(){
			$(this).children('span').hide();
		})
	})
	</script>
<?php get_footer(); ?>
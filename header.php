<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta content="yes" name="apple-mobile-web-app-capable" />
	<meta content="black" name="apple-mobile-web-app-status-bar-style" />
	<meta name="keywords" content="<?php bloginfo('keywords'); ?>" />
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<title><?php wp_title('-', true, 'right'); echo get_option('blogname'); if (is_home ()) echo "-", get_option('blogdescription'); if ($paged > 1) echo '-Page ', $paged; ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<!--[if lt IE 8]>
	<script>
		$(function(){
			$('body>*').hide();
			var scrHeight = $(document).height();
			var tips = '<div class="z">\
							<div class="tips">\
								您现在用的这浏览器款式太旧，请立即丢掉它！<br />\
								下面推荐您几款比较好的浏览器：<br />\
								<a href="https://www.google.com/intl/zh-CN/chrome/browser/?hl=zh-CN" target="_blank">Chrome</a>\
								<a href="http://www.mozillaonline.com/" target="_blank">Firefox</a>\
								<a href="http://www.apple.com.cn/safari/" target="_blank">Safari</a>\
								<a href="http://www.operachina.com/" target="_blank">Opera</a>\
								<a href="http://www.microsoft.com/china/windows/internet-explorer/" target="_blank">高版本IE</a>\
							</div>\
						</div>';
			$('body').append(tips);
			$('.z').css('height',scrHeight);
		})
	</script>
	<![endif]-->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="favicon.ico">
    <?php wp_head(); ?>
</head>
<?php flush(); ?>
<body>
	<a href="javascipt:;" class="scrollTop"></a>
	<?php if (is_home()){ ?>
		<header class="header index_top">
			<h1><a href="<?php echo get_option('home'); ?>">I UUUUU.com</a></h1>
			<?php wp_nav_menu( array( 'menu' => 'mymenu', 'depth' => 1) ) ?>
			<a href="javascript:;" class="skip">SKIP &gt;&gt;</a>
		</header>
	<?php } ?>
	<?php if (!is_home()){ ?>
		<header class="header content_top">
			<h1><a href="<?php echo get_option('home'); ?>">I UUUUU.com</a></h1>
			<?php wp_nav_menu( array( 'menu' => 'mymenu', 'depth' => 1) ) ?>
		</header>
	<?php } ?>
	<script>
		// 滚动置顶部
		$(window).bind('scroll', function(){
			if ($(this).scrollTop() > 120) { $('.scrollTop').show(); } else { $('.scrollTop').hide();}	
		});
		$('.scrollTop').click(function(){
			$('html,body').animate({scrollTop:0},500);
			return false;
		});
	</script>
<?php

//Gzip
ob_start('ob_gzhandler');

//文章点击数设置
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
?>

<?php
// 自定义菜单
register_nav_menus(
    array('header-nav' => __('导航菜单' ),)
);
?>

<?php
// 不带链接的标签
function tagtext(){
    global $post;
    $gettags = get_the_tags($post->ID);
    if ($gettags) {
        foreach ($gettags as $tag) {
        $posttag[] = '<a href="javascript:;">'.$tag->name.'</a>';
    }
    $tags = implode( '', $posttag );
        echo $tags;
    }
}
?>

<?php

// 创建照片页面模板
add_theme_support('post-thumbnails');
add_theme_support('post-formats',array('gallery'));
add_action('init','create_my_post_type');

function create_my_post_type(){ 
    $post_type="pictures";
    $args=array(
        'label'=>'照片',
        'public'=>true,
        'labels'=>array(
            'add_new'=>'添加照片',
            'all_items'=>'所有照片',
            'add_new_item'=>'增加一个新的照片',
            'view_item'=>'查看照片',
            'edit_item'=>'编辑照片',
            'search_items'=>'搜索照片',
            'not_found'=>'没有找到此照片',
            'not_found_in_trash'=>'回收站中没有找到此照片',
            'menu_name'=>'照片',
            'description'=>'展示照片，show time',
        ),  
        'menu_position'=>5,
        'capability_type'=>'post',
        'hierarchical'=>true,
        'show_ui'=>true,
        'show_in_menu'=>true,
        'supports'=>array(
            'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','page-attributes','post-formats'
        ),
        'taxonomies' => array('post_tag','category')
    );
    register_post_type($post_type,$args);
}
?>

<?php

// 评论
function aurelius_comment($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment; ?>
   <li class="comment" id="li-comment-<?php comment_ID(); ?>">
        <div class="gravatar"> <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?>
 <?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?> </div>
        <div class="comment_content" id="comment-<?php comment_ID(); ?>">   
            <div class="clearfix">
                    <?php printf(__('<cite class="author_name">%s</cite>'), get_comment_author_link()); ?>
                    <div class="comment-meta commentmetadata">发表于：<?php echo get_comment_time('Y-m-d H:i'); ?></div>
                    &nbsp;&nbsp;&nbsp;<?php edit_comment_link('修改'); ?>
            </div>

            <div class="comment_text">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em>你的评论正在审核，稍后会显示出来！</em><br />
        <?php endif; ?>
        <?php comment_text(); ?>
            </div>
        </div>
    </li>
<?php } ?>
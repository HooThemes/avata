<?php

get_header();

global $avata_page_meta;

$fullwidth  = isset($avata_page_meta->full_width)?$avata_page_meta->full_width:'';

$container = 'container';
if ($fullwidth=='on')
	$container = 'container-fluid';
	
$sidebar = 'none';
$left_sidebar  = esc_attr(avata_option('left_sidebar_pages'));
$right_sidebar = esc_attr(avata_option('right_sidebar_pages'));
$hide_page_titlebar = esc_attr(avata_option('hide_page_titlebar'));
$page_title_bar_text_align = esc_attr(avata_option('page_title_bar_text_align'));

$left_sidebar = apply_filters('avata_left_sidebar_pages',$left_sidebar);
$right_sidebar = apply_filters('avata_right_sidebar_pages',$right_sidebar);
$hide_page_titlebar = apply_filters('avata_hide_page_titlebar',$hide_page_titlebar);

if ($left_sidebar != '' && $left_sidebar != '0')
	$sidebar = 'left';

if ($right_sidebar != '' && $right_sidebar != '0')
	$sidebar = 'right';

if ($left_sidebar != '' && $left_sidebar != '0' && $right_sidebar != '' && $right_sidebar != '0')
	$sidebar = 'both';
if( $page_title_bar_text_align == '' )
	$page_title_bar_text_align = 'center';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if($hide_page_titlebar !='1'){
	$cssstyle = '';	
	if (isset($avata_page_meta->page_title_bar_padding  ) && $avata_page_meta->page_title_bar_padding !='')
		$cssstyle  = 'style="padding:'.esc_attr($avata_page_meta->page_title_bar_padding).'"';
	?>
  <section class="page-title-bar title-<?php echo esc_attr($page_title_bar_text_align);?> no-subtitle" <?php echo $cssstyle;?> >
    <div class="<?php echo $container;?>">
      <hgroup class="page-title text-<?php echo esc_attr($page_title_bar_text_align);?>">
        <h1><?php the_title();?></h1>
      </hgroup>
      <div class="breadcrumb-nav breadcrumbs text-<?php echo esc_attr($page_title_bar_text_align);?>" itemprop="breadcrumb"> <?php avata_breadcrumbs();?></div>
      <div class="clearfix"></div>
    </div>
  </section>
 <?php }?>
  <div class="post-wrap">
    <div class="<?php echo $container;?>">
      <div class="page-inner row <?php echo avata_get_sidebar_class($sidebar);?>">
        <div class="col-main">
          <?php while (have_posts()) : ?>
          <?php the_post(); ?>
          <?php get_template_part('template-parts/content', 'page'); ?>
          <?php endwhile; ?>
        </div>
        <?php avata_get_sidebar($sidebar, 'page'); ?>
      </div>
    </div>
  </div>
</article>
<?php 
get_footer();

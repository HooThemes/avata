<?php
  global $avata_animation, $avata_animation_delay;
  $section_title     = avata_option('section_title_gallery');
  $section_subtitle  = avata_option('section_subtitle_gallery');
  $gallery           = avata_option('section_items_gallery');
  $fullwidth         = avata_option('section_fullwidth_gallery');
  $columns           = avata_option('columns_gallery');
  
  $avata_animation = esc_attr($avata_animation);
  $avata_animation_delay = esc_attr($avata_animation_delay);
  
  $columns           = $columns==0?6:$columns;
  $column           = 12/$columns;
  if($columns == 5)
  	$column = 15;
	
  $container         = 'container';
  if ($fullwidth=='1')
 	 $container         = 'container-fluid';

  
  ?>
<div class="section-content-wrap">
  <div class="<?php echo $container;?>">
  <?php if ( $section_title !='' || $section_subtitle !='' ){?>
    <div class="section-title-area">
      <h2 class="section-title text-center avata-section_title_gallery <?php echo $avata_animation;?>" data-os-animation="fadeInUp" data-os-animation-delay="<?php echo $avata_animation_delay;?>"><?php echo esc_attr($section_title);?></h2>
      <p class="section-subtitle text-center avata-section_subtitle_gallery <?php echo $avata_animation;?>" data-os-animation="fadeInUp" data-os-animation-delay="<?php echo $avata_animation_delay;?>"><?php echo wp_kses_post(do_shortcode($section_subtitle));?></p>
    </div>
    <?php }?>
    <div class="section-content avata-section_items_gallery">
		<ul class="row no-gutter" id="lightgallery">
    <?php
	$i = 1;
	$avata_animation_delay_new = $avata_animation_delay;
	if (is_array($gallery) && !empty($gallery) ):
		foreach($gallery as $item ):
			if(is_numeric($item['image']))
				$item['image'] = wp_get_attachment_image_url($item['image'],'full');
				
				
	?>
    <li class="col-md-<?php echo $column;?> work <?php echo $avata_animation;?>" data-download-url="<?php echo esc_url($item['image']);?>" data-src="<?php echo esc_url($item['image']);?>" data-sub-html="<?php echo wp_kses_post($item['title']);?>" data-facebook-share-url="<?php echo esc_url($item['image']);?>" data-twitter-share-url="<?php echo esc_url($item['image']);?>" data-googleplus-share-url="<?php echo esc_url($item['image']);?>" data-pinterest-share-url="<?php echo esc_url($item['image']);?>" data-os-animation="fadeIn" data-os-animation-delay="<?php echo $avata_animation_delay_new;?>"><a href="#" class="work-box"> <img src="<?php echo esc_url($item['image']);?>" class="img-responsive" alt="" />
        <div class="overlay">
          <div class="overlay-caption">
            <p><i class="fa fa-search" aria-hidden="true"></i></p>
          </div>
        </div>
        </a> 
        </li>
     <?php
	 $i++;
	 $avata_animation_delay_new = str_replace('s','',$avata_animation_delay_new);
	 $avata_animation_delay_new = $avata_animation_delay_new+0.2;
	 $avata_animation_delay_new = $avata_animation_delay_new.'s';
	 endforeach;
	 endif; 
	 ?>
		</ul>
    </div>
  </div>
  </div>

<?php
  global $avata_animation, $avata_animation_delay;
  $section_title     = avata_option('section_title_service_1');
  $section_subtitle  = avata_option('section_subtitle_service_1');
  $service           = avata_option('section_items_service_1');
  $fullwidth         =  avata_option('section_fullwidth_service_1');
  
  $avata_animation = esc_attr($avata_animation);
  $avata_animation_delay = esc_attr($avata_animation_delay);
  
  $columns           = avata_option('columns_service_1');
  $columns           = $columns==0?3:$columns;
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
      <h2 class="section-title text-center avata-section_title_service_1 <?php echo $avata_animation;?>" data-os-animation="fadeInUp" data-os-animation-delay="<?php echo $avata_animation_delay;?>"><?php echo esc_attr($section_title);?></h2>
      <p class="section-subtitle text-center avata-section_subtitle_service_1 <?php echo $avata_animation;?>" data-os-animation="fadeInUp" data-os-animation-delay="<?php echo $avata_animation_delay;?>"><?php echo wp_kses_post(do_shortcode($section_subtitle));?></p>
    </div>
    <?php }?>
    <div class="section-content">
    <div class="avata-service-style-1 avata-section_items_service_1">
    <?php
	$avata_animation_delay_new = $avata_animation_delay;
	if (is_array($service) && !empty($service) ):
		foreach($service as $item ):
				
	?>
    <div class="col-md-<?php echo $column;?> avata-feature <?php echo $avata_animation;?>" data-os-animation="fadeInUp" data-os-animation-delay="<?php echo $avata_animation_delay_new;?>">
					<div class="avata-icon">
                    <?php if($item['image']!=''){
						if(is_numeric($item['image']))
							$item['image'] = wp_get_attachment_image_url($item['image'],'full');
						?>
                   <img src="<?php echo esc_url($item['image']);?>" alt="<?php echo esc_attr($item['title']);?>"/>
                    <?php }else{?>
                    <i class="fa fa-<?php echo esc_attr(str_replace('fa-','',$item['icon']));?>"></i>
                    <?php }?>
                    </div>
					<div class="avata-desc">
						<h3><?php echo esc_attr($item['title']);?></h3>
						<p><?php echo wp_kses_post(do_shortcode($item['description']));?></p>
					</div>	
				</div>
     <?php
	 $avata_animation_delay_new = str_replace('s','',$avata_animation_delay_new);
	 $avata_animation_delay_new = $avata_animation_delay_new+0.4;
	 $avata_animation_delay_new = $avata_animation_delay_new.'s';
	 endforeach;
	 endif; 
	 ?>
     </div>
     <div class="content-widgets">
      <?php dynamic_sidebar("section-service-1"); ?>
      </div>
    </div>
  </div>
  </div>
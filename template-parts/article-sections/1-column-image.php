<?php

if ( get_sub_field('padding_top') )    { $classes[] = 'padding-top-none'; }
if ( get_sub_field('padding_bottom') ) { $classes[] = 'padding-bottom-none'; }

?>
<div class="one-column-image-main">
  <div class="one-column-image-wrapper one-column-image-wrapper" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100" data-aos-easing="ease-out">
    <?php $image1 = get_sub_field('image'); ?>
    <?php if ($image1): ?>
      <div class="one-column-media-wrapper">
         <a class="js-lightbox" href="<?php echo esc_url($image1['url']); ?>">
        <img src="<?php echo esc_url($image1['url']); ?>" class="one-column-media-image" alt="<?php echo esc_attr($image1['alt']); ?>">
        </a>
      </div>
    <?php endif; ?>

    <?php if ( get_sub_field('text') ): ?>
        <span class="one-column-image-main-text"><?php the_sub_field('text'); ?></span>
    <?php endif; ?>
  </div>
</div>

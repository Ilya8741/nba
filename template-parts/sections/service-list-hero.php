<div class="service-list-hero">
    <div class="service-list-hero-wrapper">
        <h1 class="service-list-hero-title" data-aos="fade-up" data-aos-duration="600">
            <?php the_sub_field('title'); ?>
        </h1>

         <div class="service-list-hero-image-wrapper" data-aos="fade-up" data-aos-duration="600">
                <?php $image1 = get_sub_field('image'); ?>
                <?php if ($image1): ?>
                    <img src="<?php echo esc_url($image1['url']); ?>" class="service-list-hero-image" alt="<?php echo esc_attr($image1['alt']); ?>">
                <?php endif; ?>
            </div>
    </div>
</div>
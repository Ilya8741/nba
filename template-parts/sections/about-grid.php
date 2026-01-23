<div class="about-grid">
    <div class="about-grid-wrapper">
        <div class="about-grid-header">
            <div class="about-grid-header-text" data-aos="fade-right" data-aos-duration="1000">
                <?php
                $title = get_sub_field('content');
                if ($title) {
                    echo apply_filters('the_content', $title);
                }
                ?>
            </div>
            <div>
            </div>
        </div>
        <div class="about-grid-images">
            <div class="about-grid-images-wrapper about-grid-image-left" data-aos="fade-right" data-aos-duration="1000">
                <?php $image1 = get_sub_field('image1'); ?>
                <?php if ($image1): ?>
                    <img src="<?php echo esc_url($image1['url']); ?>" class="about-grid-image" alt="<?php echo esc_attr($image1['alt']); ?>">
                <?php endif; ?>
            </div>
            <div class="about-grid-images-wrapper about-grid-image-right" data-aos="fade-left" data-aos-duration="1000">
                <?php $image2 = get_sub_field('image2'); ?>
                <?php if ($image2): ?>
                    <img src="<?php echo esc_url($image2['url']); ?>" class="about-grid-image" alt="<?php echo esc_attr($image2['alt']); ?>">
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
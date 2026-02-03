<div class="careers-hero" data-theme="dark">
    <div class="careers-hero-wrapper">
        <?php $image1 = get_sub_field('image'); ?>
        <img src="<?php echo esc_url($image1['url']); ?>" class="careers-hero-image" alt="<?php echo esc_attr($image1['alt']); ?>">
        <div class="careers-hero-content-overlay">
            <div class="careers-hero-content-overlay-block">

            </div>
            <h1 class="careers-hero-title"><?php the_sub_field('title'); ?></h1>
            <div class="careers-hero-content">
                <?php
                $content = get_sub_field('content');
                if ($content) {
                    echo apply_filters('the_content', $content);
                }
                ?>
            </div>
        </div>
    </div>
</div>
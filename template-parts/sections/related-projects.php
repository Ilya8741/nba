<div class="related-projects">
    <div class="related-projects-wrapper">
        <div class="grid-section-item related-projects-item related-projects-item-big" data-aos="fade-right">
                <div class="grid-section-image-wrapper related-projects-img-wrapper">
                    <?php $image1 = get_sub_field('item1_image'); ?>
                    <?php if ($image1): ?>
                        <img src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>">
                    <?php endif; ?>
                </div>
        </div>
        <div class="grid-section-item related-projects-item related-projects-item-small" data-aos="fade-left">
                <div class="grid-section-image-wrapper related-projects-img-wrapper-small">
                    <?php $image2 = get_sub_field('item2_image'); ?>
                    <?php if ($image2): ?>
                        <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>">
                    <?php endif; ?>
                </div>
        </div>
    </div>
</div>
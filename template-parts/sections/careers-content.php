<div class="careers-content <?php if (get_sub_field('version')): ?> careers-content-v1 <?php endif; ?>">
    <div class="careers-content-wrapper">
        <?php $image2 = get_sub_field('image_left'); ?>
        <?php if ( get_sub_field('text1') || $image2 ): ?>
            <div class="careers-content-left-main" <?php if (get_sub_field('version')): ?> data-aos="fade-left" <?php else : ?> data-aos="fade-right" <?php endif; ?>  data-aos-duration="600" data-aos-delay="100" data-aos-easing="ease-out">
                <?php if (get_sub_field('text1')): ?>
                    <div class="careers-content-left">
                        <div class="careers-content-text-first">
                            <?php
                            $text1 = get_sub_field('text1');
                            if ($text1) {
                                echo apply_filters('the_content', $text1);
                            }
                            ?>
                        </div>
                        <div class="careers-content-text-second">
                            <?php
                            $text2 = get_sub_field('text2');
                            if ($text2) {
                                echo apply_filters('the_content', $text2);
                            }
                            ?>
                        </div>
                        <?php
                        $link = get_sub_field('link');

                        if ($link && is_array($link)) :
                            $url    = $link['url'] ?? '';
                            $title  = $link['title'] ?? '';
                            $target = $link['target'] ?? '_self';

                            if ($url) :
                        ?>
                                <a href="<?php echo esc_url($url); ?>"
                                    class="main-link careers-content-main-link"
                                    target="<?php echo esc_attr($target); ?>">
                                    <span><?php echo esc_html($title ?: 'See positions'); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 19L12 5" stroke="#221F1C" stroke-linejoin="round" />
                                        <path d="M5 12L19 12" stroke="#221F1C" stroke-linejoin="round" />
                                    </svg>
                                </a>
                        <?php
                            endif;
                        endif;
                        ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($image2): ?>
                    <div class="careers-media-image-1-wrapper careers-media-image-1-desktop">
                        <img src="<?php echo esc_url($image2['url']); ?>" class="careers-media-image-1" alt="<?php echo esc_attr($image2['alt']); ?>">
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="careers-content-right-main" <?php if (get_sub_field('version')): ?> data-aos="fade-right" <?php else : ?>data-aos="fade-left" <?php endif; ?> data-aos-duration="600" data-aos-delay="100" data-aos-easing="ease-out">
            <?php $image1 = get_sub_field('image_right1'); ?>
            <?php if ($image1): ?>
                <div class="careers-media-image-2-wrapper">
                    <img src="<?php echo esc_url($image1['url']); ?>" class="careers-media-image-2" alt="<?php echo esc_attr($image1['alt']); ?>">
                </div>
            <?php endif; ?>
              <?php $image2 = get_sub_field('image_left'); ?>
            <?php if ($image2): ?>
                <div class="careers-media-image-1-wrapper careers-media-image-1-mobile">
                    <img src="<?php echo esc_url($image2['url']); ?>" class="careers-media-image-1" alt="<?php echo esc_attr($image2['alt']); ?>">
                </div>
            <?php endif; ?>
            <div class="careers-content-right-item">
                <?php $image3 = get_sub_field('image_right2'); ?>
                <?php if ($image3): ?>
                    <div class="careers-media-image-3-wrapper">
                        <img src="<?php echo esc_url($image3['url']); ?>" class="careers-media-image-3" alt="<?php echo esc_attr($image3['alt']); ?>">
                    </div>
                <?php endif; ?>

                <div class="careers-content-right-item-text">
                    <span>
                        “
                    </span>
                    <h3>
                        <?php the_sub_field('card_title'); ?>
                    </h3>
                    <div class="careers-content-right-item-text-bottom">
                        <?php
                        $card_content = get_sub_field('card_content');
                        if ($card_content) {
                            echo apply_filters('the_content', $card_content);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
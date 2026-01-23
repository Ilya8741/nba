<div class="text-with-button <?php if (get_sub_field('padding')): ?> text-with-button-padding <?php endif; ?>">
    <div class="text-with-button-wrapper main-container">
        <div class="text-with-button-left" data-aos="fade-right" data-aos-duration="600">
            <p><?php the_sub_field('main_text'); ?></p>
        </div>
        <div class="text-with-button-right" data-aos="fade-left" data-aos-duration="600">
            <div class="text-with-button-right-first text-with-button-right-content">
                <p>
                    <?php the_sub_field('right_text_1'); ?>
                </p>
            </div>
            <div class="text-with-button-right-second text-with-button-right-content" >
                <p>
                    <?php the_sub_field('right_text_2'); ?>
                </p>
                <?php
                    $link = get_sub_field('link'); 

                    if ($link && is_array($link)) :
                    $url    = $link['url'] ?? '';
                    $title  = $link['title'] ?? '';
                    $target = $link['target'] ?? '_self';

                    if ($url) :
                    ?>
                    <a href="<?php echo esc_url($url); ?>"
                        class="main-link text-with-button-main-link"
                        target="<?php echo esc_attr($target); ?>">
                        <span><?php echo esc_html($title ?: 'Learn more'); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M12 19L12 5" stroke="#221F1C" stroke-linejoin="round"/>
                        <path d="M5 12L19 12" stroke="#221F1C" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <?php
                    endif;
                    endif;
                ?>
            </div>
        </div>
    </div>
</div>
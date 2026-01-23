<div class="title-with-image">
    <div class="title-with-image-wrapper">
        <div class="title-with-image-left" data-aos="fade-right" data-aos-duration="1000">
            <div class="title-with-image-text">
                <?php
                $title = get_sub_field('title');
                if ($title) {
                    echo apply_filters('the_content', $title);
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
                        class="main-link title-with-image-link"
                        target="<?php echo esc_attr($target); ?>">
                        <span><?php echo esc_html($title ?: 'Work with us'); ?></span>
                        <svg svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 19L12 5" stroke="#221F1C" stroke-linejoin="round" />
                            <path d="M5 12L19 12" stroke="#221F1C" stroke-linejoin="round" />
                        </svg>
                    </a>
            <?php
                endif;
            endif;
            ?>
        </div>

        <div class="title-with-image-images-wrapper" data-aos="fade-left" data-aos-duration="1000">
            <?php $image1 = get_sub_field('image'); ?>
            <?php if ($image1): ?>
                <img src="<?php echo esc_url($image1['url']); ?>" class="title-with-image-image" alt="<?php echo esc_attr($image1['alt']); ?>">
            <?php endif; ?>
        </div>

    </div>
</div>
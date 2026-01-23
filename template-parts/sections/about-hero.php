<div class="about-hero">
    <div class="about-hero-header" data-aos="fade-right" data-aos-duration="1000">
        <?php
        $title = get_sub_field('title');
        if ($title) {
            echo apply_filters('the_content', $title);
        }
        ?>
    </div>
    <div class="about-hero-swiper-wrapper" data-aos="fade-left" data-aos-duration="1000">
        <?php if (have_rows('slides')) : ?>
            <div class="swiper about-swiper">
                <div class="swiper-wrapper">
                    <?php while (have_rows('slides')) : the_row();
                        $image = get_sub_field('slide_image');

                        if (!$image) continue;
                    ?>
                        <div class="swiper-slide">
                            <img
                                src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>"
                                loading="lazy">
                        </div>
                    <?php endwhile; ?>

                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const el = document.querySelector('.about-swiper');
        if (!el) return;

        new Swiper(el, {
            slidesPerView: 'auto',
            spaceBetween: 16,
            loop: true,
            speed: 2000,
            autoplay: {
                delay: 1000,
                disableOnInteraction: false,
                pauseOnMouseEnter: false,
            },
            allowTouchMove: true,
            grabCursor: true,

            breakpoints: {
                992: {
                    spaceBetween: 20
                }
            }
        });
    });
</script>
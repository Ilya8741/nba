<div class="instafeed" data-aos="fade-up" data-aos-offset="160">

  <div class="instafeed-swiper-wrapper">
    <?php if (have_rows('instafeed_slides')) : ?>
      <div class="swiper instafeed-swiper">
        <div class="swiper-wrapper">

          <?php while (have_rows('instafeed_slides')) : the_row();
            $image = get_sub_field('slide_image');

            if (!$image) continue;
          ?>
            <div class="swiper-slide instafeed-slide">
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

  <div class="instafeed-link-wrapper">
<?php
$link = get_sub_field('link');

if ($link && is_array($link)) :
  $url    = 'https://www.instagram.com/neilboddisonassociatesltd/?hl=en';
  $title  = $link['title'] ?? '';
  $target = $link['target'] ?? '_self';
?>
  <a href="<?php echo esc_url($url); ?>"
    class="main-link instafeed-main-link"
    target="_blank">
    <span><?php echo esc_html($title ?: 'Follow us'); ?></span>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
      <path d="M7 7H17V17" stroke="#221F1C" stroke-linecap="square" stroke-linejoin="round" />
      <path d="M7 17L17 7" stroke="#221F1C" stroke-linecap="square" stroke-linejoin="round" />
    </svg>
  </a>
<?php endif; ?>


  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const el = document.querySelector('.instafeed-swiper');
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

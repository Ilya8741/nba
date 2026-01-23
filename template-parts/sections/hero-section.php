<div class="hero-section" data-theme="dark">
  <div class="hero-section-images">
  <?php $image1 = get_sub_field('image1'); ?>
  <?php if ($image1): ?>
    <img src="<?php echo esc_url($image1['url']); ?>" class="hero-section-image hero-section-image-left" alt="<?php echo esc_attr($image1['alt']); ?>">
  <?php endif; ?>
  <?php $image2 = get_sub_field('image2'); ?>
  <?php if ($image2): ?>
    <img src="<?php echo esc_url($image2['url']); ?>" class="hero-section-image hero-section-image-right" alt="<?php echo esc_attr($image2['alt']); ?>">
  <?php endif; ?>
  </div>

  <div class="hero-section-wrapper">
    <div class="hero-section-wrapper-anim" data-aos="fade-up" data-aos-offset="0">
    <div class="hero-section-title">
        <?php
        $hero_title = get_sub_field('hero_title');
        if ($hero_title) {
          echo apply_filters('the_content', $hero_title);
        }
        ?>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" width="114" height="118" viewBox="0 0 114 118" fill="none" class="hero-section-svg">
      <path d="M0 30.3536V84.2461H6.08176V33.6822L57.0812 6.58575L107.923 34.5597V88.7193L114 84.909V31.2835L57.132 0L0 30.3536Z" fill="#E8E8E8" />
      <path d="M102.762 91.9319V37.3621L57.0288 12.5537L11.2852 37.1571V84.2758H17.3482V40.4703L57.0187 19.1372L96.6993 40.6609V95.7456L102.762 91.9319Z" fill="#E8E8E8" />
      <path d="M29.0274 46.3143L57.1141 30.8781L85.221 46.5V102.96L91.2796 99.1506V43.248L57.1343 24.2646L22.9688 43.0385V84.2477H29.0274V46.3143Z" fill="#E8E8E8" />
      <path d="M40.4686 52.2098L56.9965 43.1984L73.7827 52.591V109.986L79.8439 106.173V49.341L57.0371 36.584L34.4023 48.9217V84.1286H40.4686V52.2098Z" fill="#E8E8E8" />
      <path d="M51.4936 59.2369L57.121 56.0343L62.7485 59.2369V117.012L68.8057 113.205V56.0247L57.121 49.3721L45.4414 56.0247V84.2106H51.4936V59.2369Z" fill="#E8E8E8" />
    </svg>
    <div class="hero-section-content">
      <div class="hero-section-text">
        <?php the_sub_field('hero_text'); ?>
      </div>
      <div class="hero-section-subtitle">
        <?php
        $hero_subtitle = get_sub_field('hero_subtitle');
        if ($hero_subtitle) {
          echo apply_filters('the_content', $hero_subtitle);
        }
        ?>
      </div>
    </div>
     </div>
  </div>
</div>
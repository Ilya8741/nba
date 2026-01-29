<section class="services-slider" id="services">
  <div class="services-slider-wrapper">
    <div class="services-slider-grid">
      <?php
      $rows = get_sub_field('services_repeater');
      if ($rows && is_array($rows) && count($rows)) :
      ?>
        <div class="services-stack">
          <?php foreach ($rows as $i => $row):
            $title = $row['title'] ?? '';
            $text  = $row['text']  ?? '';
            $content  = $row['content']  ?? '';
            $btn   = (isset($row['button']) && is_array($row['button'])) ? $row['button'] : null;
            $btn_url   = $btn['url']   ?? '';
            $btn_title = $btn['title'] ?? '';
            $btn_tgt   = $btn['target'] ?? '_self';
            $img       = $row['image1'] ?? null;
            $img2       = $row['image2'] ?? null;
          ?>
           <article class="service-card" style="--z: <?php echo 1 + (int)$i; ?>">
              <div class="service-card__grid">
                <div class="service-card__content">
                  <?php if ($title): ?>
                    <h3 class="ssc-title"><?php echo esc_html($title); ?></h3>
                  <?php endif; ?>
                  <?php if ($text): ?>
                    <p class="ssc-text"><?php echo esc_html($text); ?></p>
                  <?php endif; ?>
                  <?php if ($content): ?>
                    <p class="ssc-content"><?php echo esc_html($content); ?></p>
                  <?php endif; ?>
                  <?php if ($btn_url && $btn_title): ?>
                    <a class="ssc-btn main-link" href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_tgt); ?>">
                      <span><?php echo esc_html($btn_title); ?></span>
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M12 19L12 5" stroke="#221F1C" stroke-linejoin="round"/>
                      <path d="M5 12L19 12" stroke="#221F1C" stroke-linejoin="round"/>
                    </svg>
                    </a>
                  <?php endif; ?>
                </div>

                <figure class="service-card__media <?php echo (!empty($img2['ID']) ? ' service-card__media-duo' : ''); ?>" aria-hidden="true">
                  <?php
                  if (!empty($img['ID'])) {
                    echo wp_get_attachment_image(
                      (int)$img['ID'],
                      '1536x1536',
                      false,
                      ['loading' => 'eager', 'decoding' => 'async']
                    );
                  }
                  ?>
                   <?php
                  if (!empty($img2['ID'])) {
                    echo wp_get_attachment_image(
                      (int)$img2['ID'],
                      '1536x1536',
                      false,
                      ['loading' => 'eager', 'decoding' => 'async']
                    );
                  }
                  ?>
                </figure>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>


<script>
(function () {
  const cards = Array.from(document.querySelectorAll('.service-card'));
  if (!cards.length) return;

  const START_OPACITY = 0.3;
  const END_OPACITY = 1;
  const FULL_AT = 0.85; // 85%

  let ticking = false;

  function clamp(v, min, max) {
    return Math.min(max, Math.max(min, v));
  }

  function updateOpacity() {
    const vh = window.innerHeight;

    cards.forEach(card => {
      const rect = card.getBoundingClientRect();

      
      const progress = clamp(
        (vh - rect.top) / (vh * FULL_AT),
        0,
        1
      );

      const opacity =
        START_OPACITY + (END_OPACITY - START_OPACITY) * progress;

      card.style.opacity = opacity.toFixed(3);
    });

    ticking = false;
  }

  function onScroll() {
    if (!ticking) {
      requestAnimationFrame(updateOpacity);
      ticking = true;
    }
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', updateOpacity);

  updateOpacity();
})();
</script>

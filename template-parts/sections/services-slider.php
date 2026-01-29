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
  const stack = document.querySelector('.services-stack');
  const cards = Array.from(document.querySelectorAll('.service-card'));
  if (!stack || cards.length < 2) return;

  const MIN_OPACITY = 0;
  const MAX_OPACITY = 1;

  const EARLY_START_MULT = 2.8;

  function clamp(v, min, max) {
    return Math.min(max, Math.max(min, v));
  }

  function pxToNum(v) {
    const n = parseFloat(v);
    return Number.isFinite(n) ? n : 0;
  }

  function getOverlapPx() {
    const cs = getComputedStyle(stack);
    return pxToNum(cs.getPropertyValue('--overlap')) || 160;
  }

  function update() {
    const overlap = getOverlapPx();
    const range = overlap * EARLY_START_MULT;

    for (const c of cards) c.style.opacity = MAX_OPACITY;

    for (let i = 0; i < cards.length - 1; i++) {
      const prev = cards[i];
      const next = cards[i + 1];

      const topPx = pxToNum(getComputedStyle(next).top);
      const nextTop = next.getBoundingClientRect().top;

      let progress = 1 - (nextTop - topPx) / range;
      progress = clamp(progress, 0, 1);

      next.style.opacity = MAX_OPACITY;

      const prevOpacity = MAX_OPACITY - progress * (MAX_OPACITY - MIN_OPACITY);
      prev.style.opacity = prevOpacity.toFixed(3);
    }
  }

  let ticking = false;
  function onScroll() {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(() => {
      update();
      ticking = false;
    });
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', update);
  update();
})();
</script>

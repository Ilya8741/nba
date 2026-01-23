<div class="services-article-hero">
    <div class="services-article-hero-wrapper">
        <div class="services-article-hero-content"  data-aos="fade-right">
            <div class="services-article-hero-top">
                <h2 class="services-article-hero-title">
                    <?php the_sub_field('title'); ?>
                </h2>
                    <p class="services-article-hero-bold-text">
                    <?php the_sub_field('bold_text'); ?>
                </p>
                <p class="services-article-hero-text">
                    <?php the_sub_field('text'); ?>
                </p>
            </div>
            <div class="services-article-hero-content-bottom">
                <div class="services-hero-repeater-grid">
                    <?php if (have_rows('services_repeater')): ?>
                        <?php $delay = 100; ?>
                        <?php while (have_rows('services_repeater')): the_row();
                            $text = get_sub_field('subtitle');
                            $number = get_sub_field('number');
                        ?>
                            <div class="services-hero-item" data-aos="fade-right" data-aos-delay="<?php echo esc_attr($delay); ?>">
                                <p class="services-key"><?php echo esc_html($text); ?></p>
                                <p class="services-number" data-duration="4"><?php echo esc_html($number); ?></p>
                            </div>
                            <?php $delay += 100; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="services-article-hero-image-wrapper" data-aos="fade-left">
            <?php $image1 = get_sub_field('image'); ?>
            <?php if ($image1): ?>
                <img src="<?php echo esc_url($image1['url']); ?>" class="services-article-hero-image" alt="<?php echo esc_attr($image1['alt']); ?>">
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
(function () {
  const els = document.querySelectorAll('.services-number');
  if (!els.length) return;

  function splitParts(raw) {
    const m = String(raw).trim().match(/^(\D*?)([-\d.,\s]+)(\D*?)$/);
    return {
      prefix: m ? m[1] : '',
      num:    m ? m[2].replace(/\s/g, '') : raw,
      suffix: m ? m[3] : ''
    };
  }

  function detectFormat(numStr) {
    const lastDot   = numStr.lastIndexOf('.');
    const lastComma = numStr.lastIndexOf(',');
    let decSep = null;

    if (lastDot !== -1 && lastComma !== -1) {
      decSep = lastDot > lastComma ? '.' : ',';
    } else if (lastDot !== -1) {
      const after = numStr.length - lastDot - 1;
      decSep = (after === 3 && /\d{3}$/.test(numStr)) ? null : '.';
    } else if (lastComma !== -1) {
      const after = numStr.length - lastComma - 1;
      decSep = (after === 3 && /\d{3}$/.test(numStr)) ? null : ',';
    }

    const locale = decSep === ',' ? 'de-DE' : 'en-GB';
    return { decSep, locale };
  }

  function toFloat(numStr, decSep) {
    let s = numStr;
    if (decSep) {
      const reDec = new RegExp('\\' + decSep + '(?=\\d+$)');
      s = s.replace(reDec, 'D');    
    }
    s = s.replace(/[.,](?=\d{3}\b)/g, '');
    s = s.replace(/[.,](?=.*[.,]\d+$)/g, '');
    s = s.replace('D', '.');
    return parseFloat(s.replace(/[^\d.-]/g, '')) || 0;
  }

  function decimalsCount(numStr) {
    const mDot = numStr.match(/\.(\d+)$/);
    const mCom = numStr.match(/,(\d+)$/);
    const frac = (mDot && mDot[1]) || (mCom && mCom[1]) || '';
    return frac.length;
  }

  function format(val, locale, decs) {
    return new Intl.NumberFormat(locale, {
      minimumFractionDigits: decs,
      maximumFractionDigits: decs,
      useGrouping: true
    }).format(val);
  }

  function animateEl(el) {
    const raw = el.textContent;
    const { prefix, num, suffix } = splitParts(raw);
    const { decSep, locale } = detectFormat(num);

    const target   = toFloat(num, decSep);
    const decsAttr = el.dataset.decimals ? parseInt(el.dataset.decimals, 10) : null;
    const decs     = Number.isInteger(decsAttr) ? decsAttr : decimalsCount(num);
    const dur      = parseFloat(el.dataset.duration || '1.2');

    const hasFromAttr = el.hasAttribute('data-from');
    const from = hasFromAttr ? parseFloat(el.dataset.from || '0') : (target / 2);

    if (!window.gsap) {
      const start = performance.now();
      (function tick(now) {
        const p = Math.min(1, (now - start) / (dur * 1200));
        const val = from + (target - from) * p;
        el.textContent = prefix + format(val, locale, decs) + suffix;
        if (p < 1) requestAnimationFrame(tick);
      })(start);
      return;
    }

    const obj = { v: from };
    gsap.to(obj, {
      v: target,
      duration: dur,
      ease: 'power1.out',
      onUpdate: () => {
        el.textContent = prefix + format(obj.v, locale, decs) + suffix;
      }
    });
  }

  const io = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateEl(entry.target);
        obs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.35 });

  els.forEach(el => io.observe(el));
})();
</script>

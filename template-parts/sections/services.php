<?php if (have_rows('services_repeater')) : ?>
    <?php
    $services = [];
    while (have_rows('services_repeater')) : the_row();
        $title = (string) get_sub_field('title');
        $text  = (string) get_sub_field('text');
        $img   = get_sub_field('image');
        $url_f = get_sub_field('url');

        // url может быть Link field (array) или строкой
        $href = '';
        $target = '_self';
        if (is_array($url_f)) {
            $href = (string) ($url_f['url'] ?? '');
            $target = (string) ($url_f['target'] ?? '_self');
        } else {
            $href = (string) $url_f;
        }

        if (!$title && !$text && empty($img)) continue;

        $services[] = [
            'title'  => $title,
            'text'   => $text,
            'img'    => $img,
            'href'   => $href,
            'target' => $target,
        ];
    endwhile;

    if (empty($services)) return;
    $first = $services[0];
    $first_img_url = is_array($first['img']) ? ($first['img']['url'] ?? '') : '';
    $first_img_alt = is_array($first['img']) ? ($first['img']['alt'] ?? '') : '';
    ?>

    <section class="services-tabs" data-services-tabs>
        <div class="services-cursor" data-services-cursor aria-hidden="true">
            <div class="services-cursor__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                    <path d="M20.002 31.666L20.002 8.33268" stroke="#221F1C" stroke-width="1.66667" stroke-linejoin="round" />
                    <path d="M8.33398 20L31.6673 20" stroke="#221F1C" stroke-width="1.66667" stroke-linejoin="round" />
                </svg>
            </div>
        </div>

        <div class="services-tabs__inner">
            <div class="services-tabs__left" data-aos="fade-right" data-aos-duration="1000">
                <div class="services-tabs__list" role="tablist">
                    <?php foreach ($services as $i => $s) :
                        $img_url = is_array($s['img']) ? ($s['img']['url'] ?? '') : '';
                        $img_alt = is_array($s['img']) ? ($s['img']['alt'] ?? '') : '';
                    ?>
                        <a
                            class="services-tab <?php echo $i === 0 ? 'is-active' : ''; ?>"
                            href="<?php echo $s['href'] ? esc_url($s['href']) : '#'; ?>"
                            <?php if ($s['href']) : ?>target="<?php echo esc_attr($s['target']); ?>" <?php endif; ?>
                            role="tab"
                            aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                            data-tab
                            data-title="<?php echo esc_attr($s['title']); ?>"
                            data-text="<?php echo esc_attr($s['text']); ?>"
                            data-img="<?php echo esc_url($img_url); ?>"
                            data-img-alt="<?php echo esc_attr($img_alt); ?>">
                            <div class="services-tab__title"><?php echo esc_html($s['title']); ?></div>

                            <div class="services-tab__text" data-tab-text>
                                <?php if ($i === 0 && $s['text']) : ?>
                                    <?php echo wp_kses_post(wpautop($s['text'])); ?>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
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
                            class="services-tabs__all main-link"
                            data-all-link
                            target="<?php echo esc_attr($target); ?>">
                            <span><?php echo esc_html($title ?: 'Follow us'); ?></span>
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

            <!-- DESKTOP images (all) -->
            <div class="services-tabs__right" data-aos="fade-left" data-aos-duration="1000">
            <div class="services-tabs__image" data-images>
                <?php foreach ($services as $i => $s) :
                $img_url = is_array($s['img']) ? ($s['img']['url'] ?? '') : '';
                $img_alt = is_array($s['img']) ? ($s['img']['alt'] ?? '') : '';
                if (!$img_url) continue;
                ?>
                <img
                    class="services-tabs__img <?php echo $i === 0 ? 'is-active' : ''; ?>"
                    data-image-index="<?php echo (int) $i; ?>"
                    src="<?php echo esc_url($img_url); ?>"
                    alt="<?php echo esc_attr($img_alt); ?>"
                    loading="lazy"
                >
                <?php endforeach; ?>
            </div>
            </div>


            <!-- MOBILE swiper -->
            <div class="services-swiper swiper" data-services-swiper>
                <div class="swiper-wrapper">
                    <?php foreach ($services as $s) :
                        $img_url = is_array($s['img']) ? ($s['img']['url'] ?? '') : '';
                        $img_alt = is_array($s['img']) ? ($s['img']['alt'] ?? '') : '';
                    ?>
                        <div class="swiper-slide services-slide">
                            <?php if ($img_url) : ?>
                                <div class="services-slide__img">
                                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" loading="lazy">
                                </div>
                            <?php endif; ?>

                            <div class="services-slide__content">
                                <div class="services-slide__title"><?php echo esc_html($s['title']); ?></div>
                                <?php if (!empty($s['text'])) : ?>
                                    <div class="services-slide__text"><?php echo wp_kses_post(wpautop($s['text'])); ?></div>
                                <?php endif; ?>

                                <?php if (!empty($s['href'])) : ?>
                                    <a class="services-slide__link main-link" href="<?php echo esc_url($s['href']); ?>" target="<?php echo esc_attr($s['target']); ?>">
                                        View service <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 19L12 5" stroke="#221F1C" stroke-linejoin="round"/>
                                    <path d="M5 12L19 12" stroke="#221F1C" stroke-linejoin="round"/>
                                    </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
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
                        class="services-tabs__all services-tabs__all--mobile main-button"
                        data-all-link-mobile
                        target="<?php echo esc_attr($target); ?>">
                        <span><?php echo esc_html($title ?: 'Follow us'); ?></span>
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
    </section>
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const section = document.querySelector('[data-services-tabs]');
        if (!section) return;

        const tabs = Array.from(section.querySelectorAll('[data-tab]'));
        const images = Array.from(section.querySelectorAll('.services-tabs__img'));

      function setActive(tab) {
        tabs.forEach(t => {
            t.classList.remove('is-active');
            t.setAttribute('aria-selected', 'false');

            const tText = t.querySelector('[data-tab-text]');
            if (tText) tText.innerHTML = '';
        });

        tab.classList.add('is-active');
        tab.setAttribute('aria-selected', 'true');

        const text = tab.dataset.text || '';
        const targetText = tab.querySelector('[data-tab-text]');
        if (targetText && text) {
            targetText.innerHTML = '<p>' + text.replace(/\n\n+/g, '</p><p>').replace(/\n/g, '<br>') + '</p>';
        }
        const idx = tabs.indexOf(tab);
        images.forEach((im, i) => im.classList.toggle('is-active', i === idx));
        }


        tabs.forEach(tab => {
            tab.addEventListener('mouseenter', () => {
                if (window.matchMedia('(min-width: 1000px)').matches) setActive(tab);
            });
            tab.addEventListener('focus', () => {
                if (window.matchMedia('(min-width: 1000px)').matches) setActive(tab);
            });
            tab.addEventListener('click', (e) => {
                const href = tab.getAttribute('href') || '';
                if (!href || href === '#') {
                    e.preventDefault();
                    setActive(tab);
                }
            });
        });

        const cursor = section.querySelector('[data-services-cursor]');

        const canHover = window.matchMedia('(hover: hover)').matches;
        const finePointer = window.matchMedia('(pointer: fine)').matches;

        if (cursor && canHover && finePointer) {
        const move = (e) => {
            const x = e.clientX;
            const y = e.clientY;
            cursor.style.transform = `translate(${x - cursor.offsetWidth / 2}px, ${y - cursor.offsetHeight / 2}px)`;
        };

        section.addEventListener('mouseenter', () => section.classList.add('is-cursor-on'));
        section.addEventListener('mouseleave', () => section.classList.remove('is-cursor-on'));
        section.addEventListener('mousemove', move);
        } else {
        section.classList.remove('is-cursor-on');
        if (cursor) cursor.style.display = 'none';
        }

        const swiperEl = section.querySelector('[data-services-swiper]');
        if (swiperEl) {
            const initSwiper = () => {
                if (!window.Swiper) return;

                if (window.matchMedia('(max-width: 992px)').matches && !swiperEl.swiper) {
                    new Swiper(swiperEl, {
                        slidesPerView: 1.1,
                        spaceBetween: 16,
                        speed: 600,
                    });
                }
            };

            initSwiper();
            window.addEventListener('resize', initSwiper);
        }
    });
</script>
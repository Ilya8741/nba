<div class="article-hero">
    <div class="article-hero-wrapper">
        <div class="article-hero-media-wrapper" data-theme="dark">
            <?php $image1 = get_sub_field('featured_image'); ?>
            <?php if ($image1): ?>
                <a class="js-lightbox" href="<?php echo esc_url($image1['url']); ?>">
                    <img src="<?php echo esc_url($image1['url']); ?>" class="article-hero-image" alt="<?php echo esc_attr($image1['alt']); ?>">


                    <div class="article-hero-content-overlay">
                        <h1 class="article-hero-title"><?php echo esc_html(get_the_title()); ?></h1>
                        <div class="article-tags-grid">
                            <?php $tags = get_the_tags(); ?>
                            <?php if ($tags) : foreach ($tags as $tag) : ?>
                                    <span class="article-tag">
                                        <?php echo esc_html($tag->name); ?>
                                    </span>
                                <?php endforeach;
                            else : ?>
                                <span class="article-tag article-tag--empty">No tags</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            <?php endif; ?>

        </div>
        <div class="article-hero-content-wrapper">
            <?php
            $text_1 = get_sub_field('text_1');
            $text_2 = get_sub_field('text_2');

            // Architect modal fields (как на скрине)
            $arch_img     = get_sub_field('image_architect');
            $arch_name    = get_sub_field('name_architect');
            $arch_job     = get_sub_field('job_title_architect');
            $arch_content = get_sub_field('content_architect'); // WYSIWYG

            // helper: превращаем <a href="#"> в триггер модалки
            function pl_make_hash_links_modal($html, $modal_id = '#architect-modal-1')
            {
                if (!$html) return $html;

                // href="#" -> data-modal="#architect-modal-1"
                $html = preg_replace(
                    '/<a([^>]*?)href=(["\'])#\2([^>]*?)>/i',
                    '<a$1href="javascript:void(0)" data-modal="' . esc_attr($modal_id) . '"$3>',
                    $html
                );

                return $html;
            }

            // Repeater content
            $repeater_html = '';
            if (have_rows('info_repeater')) {
                ob_start();
                while (have_rows('info_repeater')) : the_row();
                    $c = get_sub_field('content'); // WYSIWYG
                    if (!$c) continue;

                    $c = pl_make_hash_links_modal($c, '#architect-modal-1');

                    echo '<div class="article-hero-info-item">';
                    echo wp_kses_post($c);
                    echo '</div>';
                endwhile;
                $repeater_html = trim(ob_get_clean());
            }

            // Подготовим text_1 / text_2 тоже
            $text_1 = pl_make_hash_links_modal($text_1, '#architect-modal-1');
            $text_2 = pl_make_hash_links_modal($text_2, '#architect-modal-1');

            // Проверка "есть ли что выводить" (чтобы не рендерить пустой .article-hero-content)
            $has_any = false;
            if (!empty(trim(wp_strip_all_tags((string)$text_1)))) $has_any = true;
            if (!empty(trim(wp_strip_all_tags((string)$text_2)))) $has_any = true;
            if (!empty(trim(wp_strip_all_tags((string)$repeater_html)))) $has_any = true;

            if ($has_any): ?>
                <div class="article-hero-content">
                    <div class="article-hero-content-right">
                        <?php if ($text_1): ?>
                            <div class="article-hero-text article-hero-text--1">
                                <?php echo wp_kses_post($text_1); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($text_2): ?>
                            <div class="article-hero-text article-hero-text--2">
                                <?php echo wp_kses_post($text_2); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ($repeater_html): ?>
                        <div class="article-hero-info">
                            <?php echo $repeater_html; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php $image2 = get_sub_field('bottom_image'); ?>
            <?php if ($image2): ?>
                <div class="one-column-image-wrapper hero-one-column-image-wrapper">

                    <div class="one-column-media-wrapper hero-one-column-media-wrapper" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100" data-aos-easing="ease-out">
                        <a class="js-lightbox" href="<?php echo esc_url($image2['url']); ?>">
                            <img src="<?php echo esc_url($image2['url']); ?>" class="one-column-media-image" alt="<?php echo esc_attr($image2['alt']); ?>">
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
// Рендерим модалку только если реально заполнены поля архитектора
$has_arch_modal = $arch_img || $arch_name || $arch_job || $arch_content;
if ($has_arch_modal): ?>

    <!-- TEMPLATE (теперь вне article-hero) -->
    <div id="architect-modal-1" class="team-modal-template" hidden>
        <div class="team-modal__inner">
            <div class="team-modal__media">
                <?php
                if ($arch_img) {
                    if (is_array($arch_img) && !empty($arch_img['ID'])) {
                        echo wp_get_attachment_image($arch_img['ID'], 'large', false, [
                            'alt' => esc_attr($arch_img['alt'] ?? ($arch_name ?: ''))
                        ]);
                    } elseif (is_numeric($arch_img)) {
                        echo wp_get_attachment_image((int)$arch_img, 'large', false, [
                            'alt' => esc_attr($arch_name ?: '')
                        ]);
                    }
                }
                ?>
            </div>

            <div class="team-modal__text">
                <?php if ($arch_name): ?><h3 class="team-modal__title"><?php echo esc_html($arch_name); ?></h3><?php endif; ?>
                <?php if ($arch_job):  ?><div class="team-modal__subtitle"><?php echo esc_html($arch_job); ?></div><?php endif; ?>
                <?php if ($arch_content): ?><div class="team-modal__content"><?php echo wp_kses_post($arch_content); ?></div><?php endif; ?>
            </div>
        </div>
    </div>

    <!-- MODAL SHELL (вне article-hero) -->
    <div class="team-modal" aria-hidden="true" data-architect-modal>
        <div class="team-modal__overlay" data-close></div>
        <div class="team-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="team-modal-title">
            <button class="team-modal__close" type="button" data-close aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                    <path d="M2.63672 16.3643L15.3646 3.63634" stroke="white" stroke-linejoin="round" />
                    <path d="M2.63672 3.63574L15.3646 16.3637" stroke="white" stroke-linejoin="round" />
                </svg>
                <span>Close</span>
            </button>
            <div class="team-modal__mount"></div>
        </div>
    </div>

<?php endif; ?>

<script>
    (function() {
        const triggersRoot = document.querySelector('.article-hero');
        if (!triggersRoot) return;

        // модалка теперь НЕ внутри article-hero
        const modal = document.querySelector('.team-modal[data-architect-modal]');
        if (!modal) return;

        const mount = modal.querySelector('.team-modal__mount');
        const overlay = modal.querySelector('.team-modal__overlay');
        const closeBtns = modal.querySelectorAll('[data-close]');
        const html = document.documentElement;

        function openModalFromTemplate(selector) {
            // template теперь тоже глобально
            const tpl = document.querySelector(selector);
            if (!tpl) return;

            mount.innerHTML = tpl.innerHTML;
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            html.classList.add('is-locked');
            trapFocus(modal);
        }

        function closeModal() {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            html.classList.remove('is-locked');
            mount.innerHTML = '';
            releaseFocus();
        }

        triggersRoot.addEventListener('click', function(e) {
            const trigger = e.target.closest('[data-modal]');
            if (!trigger || !triggersRoot.contains(trigger)) return;

            const sel = trigger.getAttribute('data-modal');
            if (!sel) return;

            e.preventDefault();
            openModalFromTemplate(sel);
        });

        closeBtns.forEach(b => b.addEventListener('click', closeModal));
        overlay.addEventListener('click', closeModal);

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
        });

        let lastFocused = null;

        function trapFocus(container) {
            lastFocused = document.activeElement;

            const getFocusables = () =>
                Array.from(container.querySelectorAll(
                    'a, button, input, textarea, select, [tabindex]:not([tabindex="-1"])'
                )).filter(el => !el.hasAttribute('disabled'));

            const list = getFocusables();
            if (list.length) list[0].focus();

            container.addEventListener('keydown', onTab);

            function onTab(e) {
                if (e.key !== 'Tab') return;
                const live = getFocusables();
                if (!live.length) return;
                const first = live[0];
                const last = live[live.length - 1];

                if (e.shiftKey && document.activeElement === first) {
                    e.preventDefault();
                    last.focus();
                } else if (!e.shiftKey && document.activeElement === last) {
                    e.preventDefault();
                    first.focus();
                }
            }
        }

        function releaseFocus() {
            if (lastFocused && typeof lastFocused.focus === 'function') lastFocused.focus();
        }
    })();
</script>
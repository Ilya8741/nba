<?php

/**
 * OUR TEAM section (ACF Repeater: our_team_repeater)
 * Subfields: image (Image), name (Text), job_title (Text), content (WYSIWYG),
 */
?>

<section class="team-section" id="team-section">
    <div class="team-section-wrapper">
        <div class="team-grid">
            <?php if (have_rows('our_team_repeater')): ?>
                <?php $i = 0;
                while (have_rows('our_team_repeater')): the_row();
                    $i++;
                    $img          = get_sub_field('image');
                    $name         = get_sub_field('name');
                    $job          = get_sub_field('job_title');
                    $content      = get_sub_field('content');
                    $tpl_id       = 'team-modal-' . $i;
                ?>
                    <button class="team-card" data-aos="fade-up" data-aos-offset="200" type="button" data-modal="#<?php echo esc_attr($tpl_id); ?>">
                        <div class="team-card__image team-card__image-grid-item">
                            <?php
                            if ($img) {
                                echo wp_get_attachment_image($img['ID'], 'large', false, [
                                    'alt' => esc_attr($img['alt'] ?? ($name ?: ''))
                                ]);
                            }
                            ?>
                        </div>
                        <span class="team-card__meta">
                            <?php if ($name): ?><span class="team-card__name"><?php echo esc_html($name); ?></span><?php endif; ?>
                            <?php if ($job):  ?><span class="team-card__job"><?php echo esc_html($job); ?></span><?php endif; ?>
                        </span>
                    </button>

                    <div id="<?php echo esc_attr($tpl_id); ?>" class="team-modal-template" hidden>
                        <div class="team-modal__inner">
                            <div class="team-modal__media">
                                <?php
                                if ($img) {
                                    echo wp_get_attachment_image($img['ID'], 'large', false, [
                                        'alt' => esc_attr($img['alt'] ?? ($name ?: ''))
                                    ]);
                                }
                                ?>
                            </div>
                            <div class="team-modal__text">
                                <?php if ($name): ?><h3 class="team-modal__title"><?php echo esc_html($name); ?></h3><?php endif; ?>
                                <?php if ($job):  ?><div class="team-modal__subtitle"><?php echo esc_html($job); ?></div><?php endif; ?>
                                <?php if ($content): ?><div class="team-modal__content"><?php echo wp_kses_post($content); ?></div><?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="team-modal" aria-hidden="true">
        <div class="team-modal__overlay" data-close></div>
        <div class="team-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="team-modal-title">
            <button class="team-modal__close" type="button" data-close aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M2.63672 16.3643L15.3646 3.63634" stroke="white" stroke-linejoin="round" />
                    <path d="M2.63672 3.63574L15.3646 16.3637" stroke="white" stroke-linejoin="round" />
                </svg>
                <span>Close</span>
            </button>
            <div class="team-modal__mount"></div>
        </div>
    </div>
</section>


<style>
    html {
        scroll-behavior: smooth !important;
    }
</style>

<script>
    (function() {
        const root = document.querySelector('.team-section');
        if (!root) return;

        const modal = root.querySelector('.team-modal');
        const mount = modal.querySelector('.team-modal__mount');
        const overlay = modal.querySelector('.team-modal__overlay');
        const closeBtns = modal.querySelectorAll('[data-close]');
        const html = document.documentElement;

        function openModalFromTemplate(selector) {
            const tpl = root.querySelector(selector);
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

        root.addEventListener('click', function(e) {
            const trigger = e.target.closest('[data-modal]');
            if (!trigger || !root.contains(trigger)) return;
            e.preventDefault();
            const sel = trigger.getAttribute('data-modal');
            if (sel) openModalFromTemplate(sel);
        });

        closeBtns.forEach(b => b.addEventListener('click', closeModal));
        overlay.addEventListener('click', closeModal);
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
        });

        let lastFocused = null;

        function trapFocus(container) {
            lastFocused = document.activeElement;
            const focusables = container.querySelectorAll('a, button, input, textarea, select, [tabindex]:not([tabindex="-1"])');
            if (focusables.length) focusables[0].focus();
            container.addEventListener('keydown', onTab);

            function onTab(e) {
                if (e.key !== 'Tab') return;
                const list = Array.from(focusables).filter(el => !el.hasAttribute('disabled'));
                if (!list.length) return;
                const first = list[0],
                    last = list[list.length - 1];
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
            if (lastFocused) lastFocused.focus();
        }
    })();
</script>
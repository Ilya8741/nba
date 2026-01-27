<?php

/**
 * The template for displaying the footer
 * @package project-london
 */
?>


<footer id="colophon" class="site-footer" data-theme="dark">
	<div class="site-footer-wrapper">
		<div class="site-footer-header">
			<div class="site-footer-header-links-wrapper" data-aos="fade-up" data-aos-duration="1000">
		<?php
      $image1 = get_field('footer_image1', 'footer_options');

      $image1_id  = 0;
      $image1_alt = '';

      if (is_array($image1)) {
        $image1_id  = (int) ($image1['ID'] ?? 0);
        $image1_alt = (string) ($image1['alt'] ?? '');
      } elseif (is_numeric($image1)) {
        $image1_id = (int) $image1;
      }
      ?>

      <?php if ($image1_id) : ?>
        <?php
        echo wp_get_attachment_image(
          $image1_id,
          'full',
          false,
          [
            'class' => 'footer-main-image',
            'alt'   => esc_attr($image1_alt),
          ]
        );
        ?>
      <?php endif; ?>

			</div>
		</div>
		<div class="footer-info" data-aos="fade-left" data-aos-duration="1000">
			<div class="footer-info-wrapper">
				<?php if ($html = get_field('footer_info', 'footer_options')) : ?>
          <div class="footer-info-richtext">
					<div class="footer-wysiwyg">
						<?php echo wp_kses_post($html); ?>
					</div>
          </div>
				<?php endif; ?>

        	<div class="footer-buttons">
          <?php
          $work_text  = get_field('work_button_text', 'footer_options');
          $work_title = get_field('footer_popup_title', 'footer_options');
          $work_form  = get_field('footer_contact_form', 'footer_options', false);
          $footer_tpl_id = 'footer-contact-modal';
          ?>

          <?php if ($work_text): ?>
            <button type="button"
              class="footer-white-main-button"
              data-modal="#<?php echo esc_attr($footer_tpl_id); ?>">
              <span><?php echo esc_html($work_text); ?></span>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M7 7H17V17" stroke="white" stroke-linecap="square" stroke-linejoin="round"/>
                <path d="M7 17L17 7" stroke="white" stroke-linecap="square" stroke-linejoin="round"/>
              </svg>
            </button>

            <div id="<?php echo esc_attr($footer_tpl_id); ?>" class="team-modal-template contact-team-modal-template" hidden>
              <div class="team-modal__inner">
                <div class="team-modal__text">
                  <?php if ($work_title): ?>
                    <h3 class="team-modal__title"><?php echo esc_html($work_title); ?></h3>
                  <?php endif; ?>
                  <?php if ($work_form): ?>
                    <div class="team-modal__content contact-team-modal__content">
                      <?php echo do_shortcode(shortcode_unautop($work_form)); ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>

              <?php
          $start_text  = get_field('start_project_button', 'footer_options');
          $start_form  = get_field('start_project_form', 'footer_options', false);
          $footer_start_id = 'footer-start-modal';
          ?>

            <?php if ($start_text): ?>
            <button type="button"
              class="footer-white-main-button"
              data-modal="#<?php echo esc_attr($footer_start_id); ?>">
              <span><?php echo esc_html($start_text); ?></span>
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M7 7H17V17" stroke="white" stroke-linecap="square" stroke-linejoin="round"/>
                <path d="M7 17L17 7" stroke="white" stroke-linecap="square" stroke-linejoin="round"/>
              </svg>
            </button>

            <div id="<?php echo esc_attr($footer_start_id); ?>" class="team-modal-template contact-team-modal-template" hidden>
              <div class="team-modal__inner">
                <div class="team-modal__text">
                  <h3 class="team-modal__title">Start a project</h3>
                  <?php if ($start_form): ?>
                    <div class="team-modal__content contact-team-modal__content">
                      <?php echo do_shortcode(shortcode_unautop($start_form)); ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>

        </div>
                  </div>
        <div class="footer-address">
            <?php
          $address_url  = get_field('address_url', 'footer_options');
          $address  = get_field('address', 'footer_options');
          $address_text = get_field('address_text', 'footer_options');
          $copyright = get_field('copyright', 'footer_options');
          ?>
          <p class="footer-address-text">
            <?php echo esc_html($address); ?>
          </p>
          <a href="<?php echo esc_url($address_url); ?>" class="footer-white-main-button">
            <span><?php echo esc_html($address_text); ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M7 7H17V17" stroke="white" stroke-linecap="square" stroke-linejoin="round"/>
                <path d="M7 17L17 7" stroke="white" stroke-linecap="square" stroke-linejoin="round"/>
              </svg>
          </a>
        </div>
        <span class="footer-copyright">
         <?php echo esc_html($copyright); ?>
        </span>
		</div>

	</div>
	<div class="team-modal footer-modal" aria-hidden="true">
		<div class="team-modal__overlay" data-close></div>
		<div class="team-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="footer-modal-title">
			<button class="team-modal__close" type="button" data-close aria-label="Close">
				<span aria-hidden="true" class="team-modal__close-button">
					<div class="team-modal__close-line"></div>
					<div class="team-modal__close-line"></div>
				</span>
			</button>
			<div class="team-modal__mount footer-team-modal__mount"></div>
		</div>
	</div>

</footer> 

<script>
/**
 * GLOBAL modal manager for any section
 * - Opens templates by [data-modal="#id"] into the nearest .team-modal within the same section/page part
 * - Re-inits CF7 on mount
 * - Normalizes file inputs (unique id/for, meta, size/type checks)
 * - Keeps focus trapped; supports close on overlay / [data-close] / Esc
 * - Restores last-opened modal after CF7 AJAX submit (sessionStorage)
 */

(function () {
  // ---------- Utilities ----------
  const html = document.documentElement;
  const STORAGE_KEY = 'globalModalToReopen';

  function closestContainerWithModal(fromEl) {
    let el = fromEl;
    while (el && el !== document) {
      if (el.querySelector && el.querySelector('.team-modal')) return el;
      el = el.parentElement;
    }
    return document;
  }

  function getModalParts(container) {
    const modal = container.querySelector('.team-modal');
    if (!modal) return {};
    const mount = modal.querySelector('.team-modal__mount');
    const overlay = modal.querySelector('.team-modal__overlay');
    const dialog = modal.querySelector('.team-modal__dialog');
    return { modal, mount, overlay, dialog };
  }

  function ensureId(el, prefix) {
    if (!el) return null;
    if (!el.id) {
      el.id = prefix + '-' + Date.now() + '-' + Math.random().toString(36).slice(2, 8);
    }
    return el.id;
  }

  // ---------- Submit button decorator (input->button) ----------
  function decorateSubmitButtons(scope) {
    const buttons = scope.querySelectorAll('.wpcf7-submit.contact-form-button');
    buttons.forEach(btn => {
      if (btn.tagName.toLowerCase() !== 'input') return;
      const newBtn = document.createElement('button');
      newBtn.type = 'submit';
      newBtn.className = btn.className;
      newBtn.innerHTML =
        '<span>' + (btn.value || 'Submit') + '</span>' +
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">' +
          '<path d="M7 7H17V17" stroke="#221F1C" stroke-linecap="square" stroke-linejoin="round"/>' +
          '<path d="M7 17L17 7" stroke="#221F1C" stroke-linecap="square" stroke-linejoin="round"/>' +
        '</svg>';
      btn.parentNode.replaceChild(newBtn, btn);
    });
  }

  // ---------- CF7 re-init ----------
  function initCF7(scope) {
    try {
      const forms = scope.querySelectorAll('.wpcf7 form');
      if (!forms.length) return;
      if (window.wpcf7?.init) {
        forms.forEach(f => window.wpcf7.init(f));
      } else if (window.wpcf7?.initForm) {
        forms.forEach(f => window.wpcf7.initForm(f));
      }
    } catch (_) {}
  }

  const FileDrop = (function () {
    function fmtMB(bytes) { return (bytes / (1024 * 1024)).toFixed(2) + ' MB'; }

    function ensureMeta(wrap) {
      let meta = wrap.querySelector('.file-drop__meta');
      if (!meta) {
        meta = document.createElement('div');
        meta.className = 'file-drop__meta';
        meta.setAttribute('aria-live', 'polite');
        wrap.appendChild(meta);
      }
      return meta;
    }

    function renderFileMeta(wrap, file) {
      const meta = ensureMeta(wrap);
      const labelText = wrap.querySelector('.file-drop__text');
      if (file) {
        const name = file.name || '';
        const size = Number.isFinite(file.size) ? fmtMB(file.size) : '';
        const out  = size ? (name + ' • ' + size) : name;
        meta.textContent = out;
        wrap.classList.add('has-file');
        if (labelText) labelText.style.visibility = 'hidden';
      } else {
        meta.textContent = '';
        wrap.classList.remove('has-file');
        if (labelText) labelText.style.visibility = '';
      }
    }

    function markError(wrap, msg) {
      wrap.classList.add('file-drop--error');
      const meta = ensureMeta(wrap);
      if (msg) meta.textContent = msg;
    }
    function clearError(wrap) { wrap.classList.remove('file-drop--error'); }

    let uid = 0;
    function ensureUniqueIdForInput(wrap) {
      const input = wrap.querySelector('input[type="file"]');
      const label = wrap.querySelector('label.file-drop__label');
      if (!input || !label) return;

      if (!input.id || document.querySelectorAll('#' + CSS.escape(input.id)).length > 1) {
        input.id = 'file-input-' + Date.now() + '-' + (uid++);
      }
      if (label.getAttribute('for') !== input.id) {
        label.setAttribute('for', input.id);
      }
    }

    function initWrap(wrap) {
      ensureUniqueIdForInput(wrap);
      const input = wrap.querySelector('input[type="file"]');
      if (!input) return;

      renderFileMeta(wrap, input.files && input.files[0] ? input.files[0] : null);

      function validateAndRender() {
        clearError(wrap);
        const f = input.files && input.files[0];
        if (!f) { renderFileMeta(wrap, null); return; }

        const maxMB = parseFloat(wrap.getAttribute('data-max') || '0');
        if (maxMB > 0 && Number.isFinite(f.size)) {
          const sizeMB = f.size / (1024 * 1024);
          if (sizeMB > maxMB) {
            markError(wrap, `File is too large (${fmtMB(f.size)}), max ${maxMB} MB`);
            try { input.value = ''; } catch(_) {}
            renderFileMeta(wrap, null);
            return;
          }
        }

        const accept = (input.getAttribute('accept') || '').trim();
        if (accept) {
          const ok = accept.split(',').map(s => s.trim()).some(rule => {
            if (!rule) return true;
            if (rule.endsWith('/*')) {
              const prefix = rule.slice(0, -1);
              return (f.type || '').startsWith(prefix);
            }
            return (f.type || '') === rule;
          });
          if (!ok) {
            markError(wrap, `File type not allowed (${f.type || 'unknown'})`);
            try { input.value = ''; } catch(_) {}
            renderFileMeta(wrap, null);
            return;
          }
        }

        renderFileMeta(wrap, f);
      }

      input.addEventListener('change', validateAndRender, true);
      input.addEventListener('input',  validateAndRender, true);
    }

    function sanitizeAllTemplates(scope) {
      scope.querySelectorAll('.team-modal-template input[type="file"]').forEach(inp => {
        if (inp.id) inp.removeAttribute('id');
        const lbl = inp.closest('.file-drop')?.querySelector('label.file-drop__label[for]');
        if (lbl) lbl.removeAttribute('for');
      });
    }

    function initScope(scope) {
      sanitizeAllTemplates(scope);
      scope.querySelectorAll('.file-drop').forEach(initWrap);
    }

    return { initScope };
  })();

  // ---------- Focus trap ----------
  function trapFocus(modal) {
    const focusables = () => modal.querySelectorAll('a, button, input, textarea, select, [tabindex]:not([tabindex="-1"])');
    modal.__lastFocused = document.activeElement;

    function onTab(e) {
      if (e.key !== 'Tab') return;
      const list = Array.from(focusables()).filter(el => !el.hasAttribute('disabled'));
      if (!list.length) return;
      const first = list[0];
      const last  = list[list.length - 1];
      if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
      else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
    }

    const listNow = Array.from(focusables()).filter(el => !el.hasAttribute('disabled'));
    if (listNow.length) listNow[0].focus();

    modal.addEventListener('keydown', onTab);
    modal.__onTabHandler = onTab;
  }

  function releaseFocus(modal) {
    if (modal.__onTabHandler) {
      modal.removeEventListener('keydown', modal.__onTabHandler);
      modal.__onTabHandler = null;
    }
    if (modal.__lastFocused && document.contains(modal.__lastFocused)) {
      modal.__lastFocused.focus();
    }
  }

  // ---------- Open/Close ----------
  function afterMount(container, selector) {
    const { modal, mount, dialog } = getModalParts(container);
    if (!modal || !mount) return;

    const title = mount.querySelector('.team-modal__title');
    if (title && dialog) {
      const titleId = ensureId(title, 'team-modal-title');
      dialog.setAttribute('aria-labelledby', titleId);
    }

    initCF7(mount);
    decorateSubmitButtons(mount);

    FileDrop.initScope(mount);

    const ev = new CustomEvent('team-modal:mounted', { detail: { mount } });
    document.dispatchEvent(ev);

    modal.dataset.origin = selector;

    trapFocus(modal);
  }

  function openModalFromTemplate(container, selector, trigger) {
    const { modal, mount } = getModalParts(container);
    if (!modal || !mount) return;
    const tpl = container.querySelector(selector) || document.querySelector(selector);
    if (!tpl) return;

    const wasOpen = modal.classList.contains('is-open');

    mount.innerHTML = tpl.innerHTML;
    if (!wasOpen) {
      modal.classList.add('is-open');
      modal.setAttribute('aria-hidden', 'false');
      html.classList.add('is-locked');
    }

    if (modal.__currentTrigger) modal.__currentTrigger.setAttribute('aria-expanded', 'false');
    modal.__currentTrigger = trigger || null;
    if (modal.__currentTrigger) modal.__currentTrigger.setAttribute('aria-expanded', 'true');

    afterMount(container, selector);
  }

  function closeModal(container) {
    const { modal, mount } = getModalParts(container);
    if (!modal || !mount) return;

    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    html.classList.remove('is-locked');
    mount.innerHTML = '';

    if (modal.__currentTrigger) {
      modal.__currentTrigger.setAttribute('aria-expanded', 'false');
      modal.__currentTrigger = null;
    }
    delete modal.dataset.origin;

    releaseFocus(modal);
  }

  // ---------- Global delegates ----------
  document.addEventListener('click', function (e) {
    const trigger = e.target.closest('[data-modal]');
    if (!trigger) return;

	if (trigger.hasAttribute('data-modal-local')) return;

    const selector = trigger.getAttribute('data-modal');
    if (!selector) return;

    const container = closestContainerWithModal(trigger);
    const { modal, overlay } = getModalParts(container);
    if (!modal) return;

    e.preventDefault();
    openModalFromTemplate(container, selector, trigger);

    if (!modal.__boundClose) {
      modal.__boundClose = true;

      // overlay click
      overlay && overlay.addEventListener('click', () => closeModal(container));

      // buttons with [data-close]
      modal.addEventListener('click', (evt) => {
        if (evt.target.hasAttribute('data-close') || evt.target.closest('[data-close]')) {
          closeModal(container);
        }
      });

      // Esc
      document.addEventListener('keydown', (evt) => {
        if (evt.key === 'Escape' && modal.classList.contains('is-open')) {
          closeModal(container);
        }
      });
    }
  });

  function initGlobal() {
    FileDrop.initScope(document);
    decorateSubmitButtons(document);
  }
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initGlobal);
  } else {
    initGlobal();
  }

  // ---------- Restore modal after CF7 submit ----------

  document.addEventListener('submit', function (e) {
    const form = e.target.closest('.wpcf7 form');
    if (!form) return;

    const container = closestContainerWithModal(form);
    const { modal } = getModalParts(container);
    const modalId = ensureId(modal, 'team-modal');

    let selector = modal?.dataset?.origin || '';
    if (!selector) {
      const tpl = form.closest('.team-modal-template[id]');
      if (tpl) selector = '#' + tpl.id;
    }
    if (!selector) return;

    try {
      sessionStorage.setItem(STORAGE_KEY, JSON.stringify({ modalId, selector }));
    } catch (_) {}
  }, true);

  ['wpcf7mailsent','wpcf7invalid','wpcf7mailfailed'].forEach(evtName => {
    document.addEventListener(evtName, function (e) {
      const wrap = e.target; // .wpcf7
      if (!wrap) return;

      const container = closestContainerWithModal(wrap);
      const { modal } = getModalParts(container);
      if (!modal) return;

      if (modal.classList.contains('is-open')) return;

      const raw = sessionStorage.getItem(STORAGE_KEY);
      if (!raw) return;
      try {
        const data = JSON.parse(raw);
        if (!data || !data.selector) return;
        if (data.modalId && modal.id && data.modalId !== modal.id) return;

        openModalFromTemplate(container, data.selector);
      } catch (_) {}
    });
  });

  function restoreFromStorageOnLoad() {
    const raw = sessionStorage.getItem(STORAGE_KEY);
    if (!raw) return;
    try {
      const { modalId, selector } = JSON.parse(raw) || {};
      if (!selector) return;
      const modal = modalId ? document.getElementById(modalId) : document.querySelector('.team-modal');
      if (!modal) return;
      const container = modal.closest('[class]') || document;
      openModalFromTemplate(container, selector);
    } catch (_) {}
    sessionStorage.removeItem(STORAGE_KEY);
  }
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', restoreFromStorageOnLoad);
  } else {
    restoreFromStorageOnLoad();
  }
})();
</script>
<script>
(function(){
  var isHome = document.body.classList.contains('home');
  try {
    var seen = sessionStorage.getItem('pl_seen') === '1' || localStorage.getItem('pl_seen') === '1';
    if (!isHome && !seen) {
      sessionStorage.setItem('pl_seen','1');
      localStorage.setItem('pl_seen','1');
    }
  } catch(e) {}
})();
</script>



</div><!-- #page -->
<?php wp_footer(); ?>
</body>

</html>
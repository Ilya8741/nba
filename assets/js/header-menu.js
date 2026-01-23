document.addEventListener("DOMContentLoaded", function () {
  const menu = document.querySelector(".hb-menu");
  const wrapper = document.querySelector(".hb-menu-with-img");
  if (!menu || !wrapper) return;

  const mqDesktop = window.matchMedia("(min-width: 993px)");

  const list = menu.querySelector(".hb-menu__list");
  const links = menu.querySelectorAll(".hb-menu__link[data-submenu-id]");
  const desktopPanels = document.querySelectorAll(".hb-right .hb-submenu-panel");
  const mobilePanels = document.querySelectorAll(".hb-submenu-panel--mobile");

  function closeAll() {
    list.classList.remove("dim");
    menu.classList.remove("is-submenu-active");

    links.forEach((l) => {
      l.classList.remove("is-current");
      l.setAttribute("aria-expanded", "false");
    });

    desktopPanels.forEach((p) => p.classList.remove("is-active"));
    mobilePanels.forEach((p) => p.classList.remove("is-active"));
  }

  function openDesktop(link, id) {
    closeAll();
    menu.classList.add("is-submenu-active");
    list.classList.add("dim");

    link.classList.add("is-current");
    link.setAttribute("aria-expanded", "true");

    const panel = document.getElementById(id);
    if (panel) panel.classList.add("is-active");
  }

  function openMobile(link, id) {
    closeAll();
    menu.classList.add("is-submenu-active");
    list.classList.add("dim");

    link.classList.add("is-current");
    link.setAttribute("aria-expanded", "true");

    const panel = document.getElementById(id + "-mobile");
    if (panel) panel.classList.add("is-active");
  }

  /* ---------- DESKTOP ---------- */
  links.forEach((link) => {
    const id = link.dataset.submenuId;

    link.addEventListener("mouseenter", () => {
      if (!mqDesktop.matches) return;
      openDesktop(link, id);
    });

    link.addEventListener("focus", () => {
      if (!mqDesktop.matches) return;
      openDesktop(link, id);
    });
  });

  menu.addEventListener("mouseleave", () => {
    if (!mqDesktop.matches) return;
    closeAll();
  });

  /* ---------- MOBILE (ВАЖНО) ---------- */
  wrapper.addEventListener("click", (e) => {
    const back = e.target.closest("[data-back]");
    if (back) {
      e.preventDefault();

      const panel = back.closest(".hb-submenu-panel--mobile");
      if (panel) {
        panel.classList.remove("is-active");
      }

      closeAll();
      return;
    }

    const link = e.target.closest(".hb-menu__link[data-open-submenu]");
    if (!link) return;

    if (!mqDesktop.matches) {
      e.preventDefault();
      openMobile(link, link.dataset.openSubmenu);
    }
  });

  window.addEventListener("resize", closeAll);
});


// assets/js/burger.js
document.addEventListener("DOMContentLoaded", () => {
  const btn = document.querySelector(".header-open");
  const wrap = document.querySelector(".site-header-wrapper");
  const panel = document.querySelector(".header-burger-menu");

  if (!btn || !wrap || !panel) return;

  btn.addEventListener("click", () => {
    const willOpen = !panel.classList.contains("active");

    btn.classList.toggle("active");
    wrap.classList.toggle("active");
    panel.classList.toggle("active");

    document.body.style.overflow = willOpen ? "hidden" : "";
  });
});


<!-- COOKIE BANNER & PREFERENCES -->
<div id="cookie-banner" class="fixed inset-x-0 bottom-6 z-50 flex items-center justify-center">
  <div class="w-full max-w-4xl bg-white/95 backdrop-blur-md shadow-lg rounded-xl p-4 md:p-6 flex flex-col md:flex-row gap-4 items-start">
    <div class="flex-1">
      <h3 class="text-lg font-semibold">We use cookies</h3>
      <p class="mt-1 text-sm text-gray-600">
        We use cookies to personalise content, to provide social media features and to analyse our traffic.
        Choose which categories you accept.
      </p>
      <div class="mt-3 flex flex-wrap gap-2">
        <button id="btn-accept-all" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm">Accept all</button>
        <button id="btn-reject-all" class="px-4 py-2 bg-gray-100 text-gray-800 rounded-lg text-sm">Reject non-essential</button>
        <button id="btn-preferences" class="px-4 py-2 border border-gray-200 rounded-lg text-sm">Manage preferences</button>
      </div>
    </div>

    <div class="w-full md:w-72 hidden">
      <div class="text-sm text-gray-700 mb-2">Active categories</div>
      <ul id="banner-categories" class="space-y-2">
        <!-- dynamically filled -->
      </ul>
    </div>
  </div>
</div>

<!-- Preferences modal (hidden by default) -->
<div id="cookie-modal" class="fixed inset-0 z-60 hidden items-center justify-center bg-black/50 p-4">
  <div class="w-full max-w-2xl bg-white rounded-xl shadow-lg p-6">
    <h2 class="text-xl font-semibold">Cookie preferences</h2>
    <p class="mt-2 text-sm text-gray-600">Select which cookies you allow. Necessary cookies are always active.</p>

    <div class="mt-6 grid gap-4">
      <!-- Necessary -->
      <div class="flex items-start gap-4 p-4 border rounded-lg">
        <div class="flex-1">
          <div class="text-sm font-semibold">Necessary</div>
          <div class="text-xs text-gray-500">Required for site functionality (always active).</div>
        </div>
        <div class="flex items-center">
          <input type="checkbox" id="consent-necessary" class="hidden" checked disabled>
          <span class="px-3 py-1 bg-gray-100 text-xs rounded">Required</span>
        </div>
      </div>

      <!-- Analytics -->
      <div class="flex items-start gap-4 p-4 border rounded-lg">
        <div class="flex-1">
          <div class="text-sm font-semibold">Analytics</div>
          <div class="text-xs text-gray-500">Helps us understand how visitors use our site (Google Analytics, etc).</div>
        </div>
        <div class="flex items-center">
          <input type="checkbox" id="consent-analytics" class="h-5 w-5 rounded border-gray-300" />
        </div>
      </div>

      <!-- Marketing -->
      <div class="flex items-start gap-4 p-4 border rounded-lg">
        <div class="flex-1">
          <div class="text-sm font-semibold">Marketing</div>
          <div class="text-xs text-gray-500">Used for personalized ads and remarketing (ad networks).</div>
        </div>
        <div class="flex items-center">
          <input type="checkbox" id="consent-marketing" class="h-5 w-5 rounded border-gray-300" />
        </div>
      </div>
    </div>

    <div class="mt-6 flex justify-end gap-3">
      <button id="modal-save" class="px-4 py-2 bg-indigo-600 text-white rounded">Save preferences</button>
      <button id="modal-cancel" class="px-4 py-2 border rounded">Cancel</button>
    </div>
  </div>
</div>

<!-- Example blocked scripts (leave type text/plain so they don't auto-execute).
     In production you can output your tag scripts with type="text/plain" and data-consent attribute.
     When consent is granted, the loader will replace them as real scripts. -->

<!-- Example: Google Analytics placeholder -->
<script type="text/plain" data-consent="analytics" data-src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>

<!-- Example: marketing pixel placeholder -->
<script type="text/plain" data-consent="marketing" data-src="https://example.com/marketing-pixel.js"></script>

<!-- Cookie Consent Script -->
<script>
/**
 * CookieConsent v1
 * - categories: necessary (always true), analytics, marketing
 * - stores preferences in localStorage under "cookie_consent_v1"
 * - updates Google Consent Mode via gtag('consent','update', {...})
 * - auto-loads scripts marked <script type="text/plain" data-consent="analytics|marketing" data-src="...">
 */
(function () {
  'use strict';

  // CONFIG: mapping of categories to Consent Mode fields
  const CONSENT_MODE_MAP = {
    analytics: { analytics_storage: 'granted' },
    marketing: { ad_storage: 'granted' }
  };

  const DEFAULT_PREFS = {
    necessary: true,
    analytics: true,
    marketing: true
  };

  const LS_KEY = 'cookie_consent_v1';
  const COOKIE_NAME = 'cookie_consent_v1'; // for server-side use if needed
  const COOKIE_TTL_DAYS = 365;

  // Helpers: cookie/localStorage
  function readPrefs() {
    try {
      const raw = localStorage.getItem(LS_KEY);
      if (!raw) return { ...DEFAULT_PREFS };
      return Object.assign({}, DEFAULT_PREFS, JSON.parse(raw));
    } catch (e) {
      return { ...DEFAULT_PREFS };
    }
  }
  function savePrefs(prefs) {
    localStorage.setItem(LS_KEY, JSON.stringify(prefs));
    // set a cookie too for server-side checks if desired
    const d = new Date();
    d.setTime(d.getTime() + COOKIE_TTL_DAYS * 24*60*60*1000);
    document.cookie = `${COOKIE_NAME}=${encodeURIComponent(JSON.stringify(prefs))}; expires=${d.toUTCString()}; path=/; SameSite=Lax`;
  }

  // UI Elements
  const banner = document.getElementById('cookie-banner');
  const modal = document.getElementById('cookie-modal');
  const btnAcceptAll = document.getElementById('btn-accept-all');
  const btnRejectAll = document.getElementById('btn-reject-all');
  const btnPreferences = document.getElementById('btn-preferences');
  const modalSave = document.getElementById('modal-save');
  const modalCancel = document.getElementById('modal-cancel');

  const chkAnalytics = document.getElementById('consent-analytics');
  const chkMarketing = document.getElementById('consent-marketing');

  const bannerCategoriesEl = document.getElementById('banner-categories');

  // Script loader: convert placeholder scripts (type=text/plain + data-consent) to real scripts
  function loadConsentScripts(category) {
    // find all script placeholders for this category which are not loaded yet
    document.querySelectorAll(`script[type="text/plain"][data-consent="${category}"]`).forEach(placeholder => {
      if (placeholder.dataset.loaded === "1") return;
      const src = placeholder.dataset.src;
      const inline = placeholder.textContent && placeholder.textContent.trim();
      const script = document.createElement('script');
      script.async = true;
      if (src) script.src = src;
      if (inline && !src) {
        script.text = inline;
      }
      // copy other data attributes (optional)
      const attrs = placeholder.attributes;
      for (let i = 0; i < attrs.length; i++) {
        const name = attrs[i].name;
        if (name.startsWith('data-') && name !== 'data-src' && name !== 'data-consent') {
          script.setAttribute(name, attrs[i].value);
        }
      }
      placeholder.parentNode.insertBefore(script, placeholder);
      placeholder.dataset.loaded = "1";
    });
  }

  // Remove scripts? (Not reliably possible once executed). We won't attempt to remove executed third-party code.
  // Instead we ensure they are not loaded until allowed.

  // Update visible banner categories
  function renderBannerCategories(prefs) {
    const lines = [];
    lines.push(`<li class="flex items-center justify-between"><span class="text-sm">Necessary</span><span class="text-sm text-gray-500">Required</span></li>`);
    lines.push(`<li class="flex items-center justify-between"><span class="text-sm">Analytics</span><span class="text-sm ${prefs.analytics ? 'text-green-600' : 'text-gray-500'}">${prefs.analytics ? 'Enabled' : 'Disabled'}</span></li>`);
    lines.push(`<li class="flex items-center justify-between"><span class="text-sm">Marketing</span><span class="text-sm ${prefs.marketing ? 'text-green-600' : 'text-gray-500'}">${prefs.marketing ? 'Enabled' : 'Disabled'}</span></li>`);
    bannerCategoriesEl.innerHTML = lines.join('');
  }

  // Apply consent to Google Consent Mode (gtag)
  function updateGoogleConsentMode(prefs) {
    // If gtag isn't present, create a small queue that will apply once gtag loads.
    // Map our categories to consent mode fields:
    const consentPayload = {
      analytics_storage: prefs.analytics ? 'granted' : 'denied',
      ad_storage: prefs.marketing ? 'granted' : 'denied'
    };

    // if gtag exists, call update; otherwise queue in window.dataLayer so GTM/gtag can pick it up.
    try {
      if (typeof window.gtag === 'function') {
        // consent v2: use 'update' to change consent state
        window.gtag('consent', 'update', consentPayload);
      } else {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({ event: 'consent-update', consent: consentPayload });
      }
    } catch (e) {
      console.warn('Consent Mode update failed', e);
    }
  }

  // Run user-provided callbacks / load scripts when a category becomes allowed
  const listeners = { analytics: [], marketing: [] };
  function onGrant(category, cb) {
    if (!listeners[category]) listeners[category] = [];
    listeners[category].push(cb);
  }
  function notifyGrant(category) {
    if (!listeners[category]) return;
    listeners[category].forEach(fn => {
      try { fn(); } catch (e) { console.error(e); }
    });
  }

  // Apply preferences (save, update UI, fire consent mode, load scripts)
  function applyPreferences(prefs, hideBanner = true) {
    savePrefs(prefs);
    renderBannerCategories(prefs);
    updateGoogleConsentMode(prefs);

    // load scripts for categories that are granted
    if (prefs.analytics) {
      loadConsentScripts('analytics');
      notifyGrant('analytics');
    }
    if (prefs.marketing) {
      loadConsentScripts('marketing');
      notifyGrant('marketing');
    }

    if (hideBanner) {
      banner.style.display = 'none';
    }
  }

  // Public API
  window.CookieConsent = {
    getPreferences: readPrefs,
    setPreferences(prefs) { applyPreferences(prefs); },
    onConsent(category, cb) { onGrant(category, cb); }
  };

  // INIT: wire up UI & events
  (function initUI() {
    const prefs = readPrefs();

    // If user hasn't expressed a choice, show banner
    const seen = !!localStorage.getItem(LS_KEY);
    if (!seen) {
      banner.style.display = 'flex';
    } else {
      banner.style.display = 'none';
    }

    // render banner categories
    renderBannerCategories(prefs);

    // set modal checkboxes initial state
    chkAnalytics.checked = !!prefs.analytics;
    chkMarketing.checked = !!prefs.marketing;

    // BUTTON ACTIONS
    btnAcceptAll.addEventListener('click', () => {
      const p = { necessary: true, analytics: true, marketing: true };
      applyPreferences(p, true);
    });

    btnRejectAll.addEventListener('click', () => {
      const p = { necessary: true, analytics: false, marketing: false };
      applyPreferences(p, true);
    });

    btnPreferences.addEventListener('click', () => {
      modal.classList.remove('hidden');
      modal.querySelector('button').focus();
    });

    modalCancel.addEventListener('click', () => {
      modal.classList.add('hidden');
    });

    modalSave.addEventListener('click', () => {
      const p = {
        necessary: true,
        analytics: !!chkAnalytics.checked,
        marketing: !!chkMarketing.checked
      };
      applyPreferences(p, true);
      modal.classList.add('hidden');
    });

    // if preferences already granted for categories, load scripts immediately (for example on page refresh)
    if (prefs.analytics) {
      loadConsentScripts('analytics');
      notifyGrant('analytics');
    }
    if (prefs.marketing) {
      loadConsentScripts('marketing');
      notifyGrant('marketing');
    }
  })();

})();
</script>



@php
    $orders = get_bookedby_info();
@endphp


    <div class="boughtnotification" id="salesNotification">
        <span class="close-btn" id="closeBtn">&times;</span>
        <div class="content"></div>
    </div>
    
    
<script>
        let orders = @json($orders);
        let index = 0;
        let notificationInterval;

        function showNotification() {
            if (index >= orders.length) index = 0; // loop
            let order = orders[index];

            $('#salesNotification .content').html(
                `<div class="flex">
                   <div class="justify-start w-[100%]">
                                <div class="w-[100%] justify-start text-zinc-500 text-sm font-medium font-['Roboto']">${order.name} booked</div> 
                                <div class="w-[100%] justify-start text-orange-500 text-base font-bold font-['Roboto']">${order.item}</div>
                                <small>${order.time}</small>
                    </div>
                </div>`
            );
            $('#salesNotification').fadeIn(500);

            // Auto-hide after 4 sec unless user closes
            setTimeout(() => {
                if ($('#salesNotification').is(':visible')) {
                    $('#salesNotification').fadeOut(500);
                }
            }, 4000);

            index++;
        }

        // Show new notification every 6 sec
        notificationInterval = setInterval(showNotification, 10000);
        showNotification();

        // Close button event
        $('#closeBtn').on('click', function() {
            $('#salesNotification').fadeOut(300);
            clearInterval(notificationInterval); // stop auto loop if user closes
        });
    </script>

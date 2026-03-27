<aside id="sidebar" class="w-64 bg-surface-900 text-slate-300 flex flex-col min-h-screen fixed z-30 top-0 left-0">
  <!-- Logo -->
  <div class="px-6 py-5 border-b border-surface-800 flex items-center gap-3">
    <div class="w-9 h-9 rounded-xl bg-brand-500 flex items-center justify-center shrink-0">
      <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.4 7h12.8M7 13H5.4M10 21a1 1 0 100-2 1 1 0 000 2zm7 0a1 1 0 100-2 1 1 0 000 2z"/>
      </svg>
    </div>
    <div>
      <p class="font-display font-700 text-white text-base leading-tight">supermaket</p>
      <p class="text-xs text-slate-500">Supermarché Central</p>
    </div>
  </div>

  <!-- Nav -->
  <nav class="flex-1 py-4 px-3 space-y-1 overflow-y-auto">
    <p class="text-xs font-600 uppercase tracking-widest text-slate-600 px-3 pt-2 pb-1">Principal</p>
    <a href="?page=dashboard" class="nav-item <?= ($page ?? '') === 'dashboard' ? 'active' : '' ?> flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer text-sm font-500 transition-all">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/></svg>
      Tableau de bord
    </a>

    <p class="text-xs font-600 uppercase tracking-widest text-slate-600 px-3 pt-3 pb-1">Commandes</p>
    <a href="?page=commandes" class="nav-item <?= ($page ?? '') === 'commandes' ? 'active' : '' ?> flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer text-sm font-500 transition-all">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
      Gérer les commandes
    </a>
    <a href="?page=nouvelle" class="nav-item <?= ($page ?? '') === 'nouvelle' ? 'active' : '' ?> flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer text-sm font-500 transition-all">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
      Passer une commande
    </a>
    <a href="?page=reception" class="nav-item <?= ($page ?? '') === 'reception' ? 'active' : '' ?> flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer text-sm font-500 transition-all">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
      Réceptionner
    </a>
    <a href="?page=factures" class="nav-item <?= ($page ?? '') === 'factures' ? 'active' : '' ?> flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer text-sm font-500 transition-all">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6M4 6h16M4 10h4m12 0h-4M4 14h4m12 0h-4M4 18h16"/></svg>
      Factures
    </a>

    <p class="text-xs font-600 uppercase tracking-widest text-slate-600 px-3 pt-3 pb-1">Catalogue</p>
    <a class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer text-sm font-500 transition-all">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
      Produits
    </a>
    <a class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg cursor-pointer text-sm font-500 transition-all">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
      Fournisseurs
    </a>
  </nav>

  <!-- User -->
  <div class="px-4 py-4 border-t border-surface-800 flex items-center gap-3">
    <div class="w-8 h-8 rounded-full bg-brand-500 flex items-center justify-center text-white text-xs font-700">MK</div>
    <div class="flex-1 min-w-0">
      <p class="text-sm font-500 text-white truncate">Kt princesse</p>
      <p class="text-xs text-slate-500">Responsable achats</p>
    </div>
  </div>
</aside>
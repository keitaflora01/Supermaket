<header class="bg-white border-b border-surface-200 px-6 py-4 flex items-center justify-between sticky top-0 z-20">
  <div>
    <h1 class="font-display font-700 text-xl text-surface-900">
      <?= $titres[$page] ?? 'Tableau de bord' ?>
    </h1>
    <p class="text-sm text-slate-400">Mercredi 18 mars 2026</p>
  </div>
  <div class="flex items-center gap-3">
    <div class="relative hidden md:block">
      <input type="text" placeholder="Rechercher…" 
        class="pl-9 pr-4 py-2 rounded-lg bg-surface-100 border border-surface-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 w-52"/>
      <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
      </svg>
    </div>
    <button class="relative p-2 rounded-lg hover:bg-surface-100 transition">
      <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
      </svg>
      <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full dot-anim"></span>
    </button>
  </div>
</header>
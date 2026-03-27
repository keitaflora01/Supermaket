<!-- ═══ SECTION: DASHBOARD ═══ -->
<section id="sec-dashboard" class="section-pane">
  <!-- KPI Cards -->
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="card-hover bg-white rounded-2xl p-5 border border-surface-200">
      <div class="flex items-start justify-between mb-3">
        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
          <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
          </svg>
        </div>
        <span class="text-xs text-blue-500 bg-blue-50 px-2 py-0.5 rounded-full font-500">+3 auj.</span>
      </div>
      <p class="text-2xl font-display font-700 text-surface-900">24</p>
      <p class="text-sm text-slate-400 mt-0.5">Commandes en cours</p>
    </div>

    <div class="card-hover bg-white rounded-2xl p-5 border border-surface-200">
      <div class="flex items-start justify-between mb-3">
        <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center">
          <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <span class="text-xs text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full font-500">Urgent</span>
      </div>
      <p class="text-2xl font-display font-700 text-surface-900">7</p>
      <p class="text-sm text-slate-400 mt-0.5">En attente de réception</p>
    </div>

    <div class="card-hover bg-white rounded-2xl p-5 border border-surface-200">
      <div class="flex items-start justify-between mb-3">
        <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center">
          <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <span class="text-xs text-brand-600 bg-brand-50 px-2 py-0.5 rounded-full font-500">Ce mois</span>
      </div>
      <p class="text-2xl font-display font-700 text-surface-900">152</p>
      <p class="text-sm text-slate-400 mt-0.5">Commandes réceptionnées</p>
    </div>

    <div class="card-hover bg-white rounded-2xl p-5 border border-surface-200">
      <div class="flex items-start justify-between mb-3">
        <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center">
          <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <span class="text-xs text-purple-600 bg-purple-50 px-2 py-0.5 rounded-full font-500">+12%</span>
      </div>
      <p class="text-2xl font-display font-700 text-surface-900">4,8M</p>
      <p class="text-sm text-slate-400 mt-0.5">Dépenses (FCFA)</p>
    </div>
  </div>

  <!-- Recent + Quick actions -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
    <!-- Recent orders -->
    <div class="lg:col-span-2 bg-white rounded-2xl border border-surface-200 overflow-hidden">
      <div class="flex items-center justify-between px-5 py-4 border-b border-surface-100">
        <h3 class="font-display font-700 text-surface-900">Commandes récentes</h3>
        <a href="?page=commandes" class="text-xs text-brand-600 hover:underline font-500">Voir tout →</a>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead class="bg-surface-50">
            <tr>
              <th class="px-5 py-3 text-left text-xs text-slate-400 font-600 uppercase tracking-wide">Réf.</th>
              <th class="px-5 py-3 text-left text-xs text-slate-400 font-600 uppercase tracking-wide">Fournisseur</th>
              <th class="px-5 py-3 text-left text-xs text-slate-400 font-600 uppercase tracking-wide">Montant</th>
              <th class="px-5 py-3 text-left text-xs text-slate-400 font-600 uppercase tracking-wide">Statut</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-surface-100">
            <tr class="row-hover cursor-pointer" onclick="window.location.href='?page=commandes'">
              <td class="px-5 py-3 font-600 text-surface-900">#CMD-2026-089</td>
              <td class="px-5 py-3 text-slate-500">Nestlé Cameroun</td>
              <td class="px-5 py-3 font-500">320 000 F</td>
              <td class="px-5 py-3"><span class="badge-confirmed text-xs px-2.5 py-1 rounded-full font-500">Confirmée</span></td>
            </tr>
            <tr class="row-hover cursor-pointer">
              <td class="px-5 py-3 font-600 text-surface-900">#CMD-2026-088</td>
              <td class="px-5 py-3 text-slate-500">Brasseries du Cameroun</td>
              <td class="px-5 py-3 font-500">850 000 F</td>
              <td class="px-5 py-3"><span class="badge-received text-xs px-2.5 py-1 rounded-full font-500">Réceptionnée</span></td>
            </tr>
            <tr class="row-hover cursor-pointer">
              <td class="px-5 py-3 font-600 text-surface-900">#CMD-2026-087</td>
              <td class="px-5 py-3 text-slate-500">SCDP Douala</td>
              <td class="px-5 py-3 font-500">125 000 F</td>
              <td class="px-5 py-3"><span class="badge-pending text-xs px-2.5 py-1 rounded-full font-500">En attente</span></td>
            </tr>
            <tr class="row-hover cursor-pointer">
              <td class="px-5 py-3 font-600 text-surface-900">#CMD-2026-086</td>
              <td class="px-5 py-3 text-slate-500">Promo-Conso</td>
              <td class="px-5 py-3 font-500">210 500 F</td>
              <td class="px-5 py-3"><span class="badge-cancelled text-xs px-2.5 py-1 rounded-full font-500">Annulée</span></td>
            </tr>
            <tr class="row-hover cursor-pointer">
              <td class="px-5 py-3 font-600 text-surface-900">#CMD-2026-085</td>
              <td class="px-5 py-3 text-slate-500">Unilever Cameroun</td>
              <td class="px-5 py-3 font-500">430 000 F</td>
              <td class="px-5 py-3"><span class="badge-confirmed text-xs px-2.5 py-1 rounded-full font-500">Confirmée</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Quick actions -->
    <div class="space-y-3">
      <div class="bg-white rounded-2xl border border-surface-200 p-5">
        <h3 class="font-display font-700 text-surface-900 mb-4">Actions rapides</h3>
        <div class="space-y-2">
          <a href="?page=nouvelle" 
            class="w-full flex items-center gap-3 px-4 py-3 bg-brand-500 hover:bg-brand-600 text-white rounded-xl text-sm font-500 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nouvelle commande
          </a>
          
          <a href="?page=reception"
            class="w-full flex items-center gap-3 px-4 py-3 bg-surface-100 hover:bg-surface-200 rounded-xl text-sm font-500 transition-colors">
            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8"/>
            </svg>
            Réceptionner livraison
          </a>
          
          <a href="?page=factures"
            class="w-full flex items-center gap-3 px-4 py-3 bg-surface-100 hover:bg-surface-200 rounded-xl text-sm font-500 transition-colors">
            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z"/>
            </svg>
            Générer une facture
          </a>
        </div>
      </div>

      <!-- Alert stock -->
      <div class="bg-amber-50 rounded-2xl border border-amber-100 p-5">
        <div class="flex items-center gap-2 mb-3">
          <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
          </svg>
          <h4 class="font-display font-700 text-amber-800 text-sm">Stocks critiques</h4>
        </div>
        <div class="space-y-2 text-xs text-amber-700">
          <div class="flex justify-between"><span>Farine de blé 50kg</span><span class="font-600">12 u.</span></div>
          <div class="flex justify-between"><span>Huile palme 25L</span><span class="font-600">8 u.</span></div>
          <div class="flex justify-between"><span>Sucre blanc 25kg</span><span class="font-600">5 u.</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECTION: GÉRER COMMANDES ═══ -->
<section id="sec-commandes" class="section-pane">
  <!-- Toolbar -->
  <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
    <div class="flex items-center gap-2 flex-wrap">
      <div class="relative">
        <input type="text" placeholder="N° commande ou fournisseur…" 
          class="pl-9 pr-4 py-2.5 rounded-xl bg-white border border-surface-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 w-60"/>
        <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
      </div>
      <select class="px-3 py-2.5 rounded-xl bg-white border border-surface-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        <option value="">Tous les statuts</option>
        <option>En attente</option>
        <option>Confirmée</option>
        <option>Réceptionnée</option>
        <option>Annulée</option>
      </select>
      <input type="date" class="px-3 py-2.5 rounded-xl bg-white border border-surface-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500" title="Filtrer par date"/>
    </div>
    <a href="?page=nouvelle" 
      class="flex items-center gap-2 px-4 py-2.5 bg-brand-500 hover:bg-brand-600 text-white rounded-xl text-sm font-600 transition-colors">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
      </svg>
      Nouvelle commande
    </a>
  </div>

  <!-- Stats rapides -->
  <div class="grid grid-cols-4 gap-3 mb-5">
    <div class="bg-white rounded-xl border border-surface-200 px-4 py-3 flex items-center gap-3">
      <div class="w-2 h-2 rounded-full bg-amber-400"></div>
      <div>
        <p class="text-xs text-slate-400">En attente</p>
        <p class="font-display font-700 text-surface-900">14</p>
      </div>
    </div>
    <div class="bg-white rounded-xl border border-surface-200 px-4 py-3 flex items-center gap-3">
      <div class="w-2 h-2 rounded-full bg-blue-400"></div>
      <div>
        <p class="text-xs text-slate-400">Confirmées</p>
        <p class="font-display font-700 text-surface-900">7</p>
      </div>
    </div>
    <div class="bg-white rounded-xl border border-surface-200 px-4 py-3 flex items-center gap-3">
      <div class="w-2 h-2 rounded-full bg-brand-500"></div>
      <div>
        <p class="text-xs text-slate-400">Réceptionnées</p>
        <p class="font-display font-700 text-surface-900">66</p>
      </div>
    </div>
    <div class="bg-white rounded-xl border border-surface-200 px-4 py-3 flex items-center gap-3">
      <div class="w-2 h-2 rounded-full bg-red-400"></div>
      <div>
        <p class="text-xs text-slate-400">Annulées</p>
        <p class="font-display font-700 text-surface-900">2</p>
      </div>
    </div>
  </div>

  <!-- Table des commandes -->
  <div class="bg-white rounded-2xl border border-surface-200 overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-sm">
        <thead class="bg-surface-50 border-b border-surface-200">
          <tr>
            <th class="px-4 py-3.5 text-left text-xs text-slate-400 font-600 uppercase tracking-wide">N° Commande</th>
            <th class="px-4 py-3.5 text-left text-xs text-slate-400 font-600 uppercase tracking-wide">Date</th>
            <th class="px-4 py-3.5 text-left text-xs text-slate-400 font-600 uppercase tracking-wide">Fournisseur</th>
            <th class="px-4 py-3.5 text-left text-xs text-slate-400 font-600 uppercase tracking-wide">Nb lignes</th>
            <th class="px-4 py-3.5 text-right text-xs text-slate-400 font-600 uppercase tracking-wide">Montant total</th>
            <th class="px-4 py-3.5 text-left text-xs text-slate-400 font-600 uppercase tracking-wide">Statut</th>
            <th class="px-4 py-3.5 text-center text-xs text-slate-400 font-600 uppercase tracking-wide">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-surface-100" id="tbody-commandes">
          <!-- Ligne 1 -->
          <tr class="row-hover">
            <td class="px-4 py-3.5">
              <span class="font-display font-700 text-surface-900 text-sm">CMD-089</span>
              <p class="text-xs text-slate-400 mt-0.5">Créée le 18/03/2026</p>
            </td>
            <td class="px-4 py-3.5 text-slate-600 text-sm">18/03/2026</td>
            <td class="px-4 py-3.5">
              <p class="text-sm font-500 text-surface-900">Nestlé Cameroun</p>
              <p class="text-xs text-slate-400">ID : F-003</p>
            </td>
            <td class="px-4 py-3.5">
              <span class="bg-surface-100 text-slate-600 text-xs font-600 px-2.5 py-1 rounded-full">12 articles</span>
            </td>
            <td class="px-4 py-3.5 text-right font-display font-700 text-surface-900">320 000 F</td>
            <td class="px-4 py-3.5"><span class="badge-confirmed text-xs px-2.5 py-1 rounded-full font-500">Confirmée</span></td>
            <td class="px-4 py-3.5">
              <div class="flex items-center justify-center gap-1">
                <button onclick="openModal('modal-voir')" title="Voir détails" class="p-1.5 hover:bg-brand-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3-7C7.5 5 3 12 3 12s4.5 7 9 7 9-7 9-7-4.5-7-9-7z"/>
                  </svg>
                </button>
                <button onclick="openModal('modal-commande')" title="Éditer" class="p-1.5 hover:bg-amber-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                </button>
                <button onclick="openModal('modal-supprimer')" title="Supprimer" class="p-1.5 hover:bg-red-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                  </svg>
                </button>
              </div>
            </td>
          </tr>

          <!-- Ligne 2 -->
          <tr class="row-hover">
            <td class="px-4 py-3.5">
              <span class="font-display font-700 text-surface-900 text-sm">CMD-088</span>
              <p class="text-xs text-slate-400 mt-0.5">Créée le 17/03/2026</p>
            </td>
            <td class="px-4 py-3.5 text-slate-600 text-sm">17/03/2026</td>
            <td class="px-4 py-3.5">
              <p class="text-sm font-500 text-surface-900">Brasseries du Cameroun</p>
              <p class="text-xs text-slate-400">ID : F-001</p>
            </td>
            <td class="px-4 py-3.5">
              <span class="bg-surface-100 text-slate-600 text-xs font-600 px-2.5 py-1 rounded-full">5 articles</span>
            </td>
            <td class="px-4 py-3.5 text-right font-display font-700 text-surface-900">850 000 F</td>
            <td class="px-4 py-3.5"><span class="badge-received text-xs px-2.5 py-1 rounded-full font-500">Réceptionnée</span></td>
            <td class="px-4 py-3.5">
              <div class="flex items-center justify-center gap-1">
                <button onclick="openModal('modal-voir')" class="p-1.5 hover:bg-brand-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3-7C7.5 5 3 12 3 12s4.5 7 9 7 9-7 9-7-4.5-7-9-7z"/>
                  </svg>
                </button>
                <button onclick="openModal('modal-commande')" class="p-1.5 hover:bg-amber-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                </button>
                <button onclick="openModal('modal-supprimer')" class="p-1.5 hover:bg-red-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                  </svg>
                </button>
              </div>
            </td>
          </tr>

          <!-- Ligne 3 -->
          <tr class="row-hover">
            <td class="px-4 py-3.5">
              <span class="font-display font-700 text-surface-900 text-sm">CMD-087</span>
              <p class="text-xs text-slate-400 mt-0.5">Créée le 16/03/2026</p>
            </td>
            <td class="px-4 py-3.5 text-slate-600 text-sm">16/03/2026</td>
            <td class="px-4 py-3.5">
              <p class="text-sm font-500 text-surface-900">SCDP Douala</p>
              <p class="text-xs text-slate-400">ID : F-007</p>
            </td>
            <td class="px-4 py-3.5">
              <span class="bg-surface-100 text-slate-600 text-xs font-600 px-2.5 py-1 rounded-full">8 articles</span>
            </td>
            <td class="px-4 py-3.5 text-right font-display font-700 text-surface-900">125 000 F</td>
            <td class="px-4 py-3.5"><span class="badge-pending text-xs px-2.5 py-1 rounded-full font-500">En attente</span></td>
            <td class="px-4 py-3.5">
              <div class="flex items-center justify-center gap-1">
                <button onclick="openModal('modal-voir')" class="p-1.5 hover:bg-brand-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3-7C7.5 5 3 12 3 12s4.5 7 9 7 9-7 9-7-4.5-7-9-7z"/>
                  </svg>
                </button>
                <button onclick="openModal('modal-commande')" class="p-1.5 hover:bg-amber-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                </button>
                <button onclick="openModal('modal-supprimer')" class="p-1.5 hover:bg-red-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                  </svg>
                </button>
              </div>
            </td>
          </tr>

          <!-- Ligne 4 -->
          <tr class="row-hover">
            <td class="px-4 py-3.5">
              <span class="font-display font-700 text-surface-900 text-sm">CMD-086</span>
              <p class="text-xs text-slate-400 mt-0.5">Créée le 15/03/2026</p>
            </td>
            <td class="px-4 py-3.5 text-slate-600 text-sm">15/03/2026</td>
            <td class="px-4 py-3.5">
              <p class="text-sm font-500 text-surface-900">Promo-Conso</p>
              <p class="text-xs text-slate-400">ID : F-012</p>
            </td>
            <td class="px-4 py-3.5">
              <span class="bg-surface-100 text-slate-600 text-xs font-600 px-2.5 py-1 rounded-full">3 articles</span>
            </td>
            <td class="px-4 py-3.5 text-right font-display font-700 text-surface-900">210 500 F</td>
            <td class="px-4 py-3.5"><span class="badge-cancelled text-xs px-2.5 py-1 rounded-full font-500">Annulée</span></td>
            <td class="px-4 py-3.5">
              <div class="flex items-center justify-center gap-1">
                <button onclick="openModal('modal-voir')" class="p-1.5 hover:bg-brand-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3-7C7.5 5 3 12 3 12s4.5 7 9 7 9-7 9-7-4.5-7-9-7z"/>
                  </svg>
                </button>
                <button onclick="openModal('modal-commande')" class="p-1.5 hover:bg-amber-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                </button>
                <button onclick="openModal('modal-supprimer')" class="p-1.5 hover:bg-red-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                  </svg>
                </button>
              </div>
            </td>
          </tr>

          <!-- Ligne 5 -->
          <tr class="row-hover">
            <td class="px-4 py-3.5">
              <span class="font-display font-700 text-surface-900 text-sm">CMD-085</span>
              <p class="text-xs text-slate-400 mt-0.5">Créée le 12/03/2026</p>
            </td>
            <td class="px-4 py-3.5 text-slate-600 text-sm">12/03/2026</td>
            <td class="px-4 py-3.5">
              <p class="text-sm font-500 text-surface-900">Unilever Cameroun</p>
              <p class="text-xs text-slate-400">ID : F-005</p>
            </td>
            <td class="px-4 py-3.5">
              <span class="bg-surface-100 text-slate-600 text-xs font-600 px-2.5 py-1 rounded-full">7 articles</span>
            </td>
            <td class="px-4 py-3.5 text-right font-display font-700 text-surface-900">430 000 F</td>
            <td class="px-4 py-3.5"><span class="badge-confirmed text-xs px-2.5 py-1 rounded-full font-500">Confirmée</span></td>
            <td class="px-4 py-3.5">
              <div class="flex items-center justify-center gap-1">
                <button onclick="openModal('modal-voir')" class="p-1.5 hover:bg-brand-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3-7C7.5 5 3 12 3 12s4.5 7 9 7 9-7 9-7-4.5-7-9-7z"/>
                  </svg>
                </button>
                <button onclick="openModal('modal-commande')" class="p-1.5 hover:bg-amber-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                </button>
                <button onclick="openModal('modal-supprimer')" class="p-1.5 hover:bg-red-50 rounded-lg transition group">
                  <svg class="w-4 h-4 text-slate-400 group-hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                  </svg>
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between px-5 py-3 border-t border-surface-100 text-sm text-slate-400">
      <span>Affichage 1–5 sur 89 commandes</span>
      <div class="flex items-center gap-1">
        <button class="px-3 py-1.5 rounded-lg hover:bg-surface-100 transition">‹</button>
        <button class="px-3 py-1.5 rounded-lg bg-brand-500 text-white text-xs font-600">1</button>
        <button class="px-3 py-1.5 rounded-lg hover:bg-surface-100 transition text-xs">2</button>
        <button class="px-3 py-1.5 rounded-lg hover:bg-surface-100 transition text-xs">3</button>
        <span class="text-xs px-1">…</span>
        <button class="px-3 py-1.5 rounded-lg hover:bg-surface-100 transition text-xs">18</button>
        <button class="px-3 py-1.5 rounded-lg hover:bg-surface-100 transition">›</button>
      </div>
    </div>
  </div>
</section>

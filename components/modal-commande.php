<!-- Modal: Créer / Éditer Commande -->
<div id="modal-commande" class="modal-overlay fixed inset-0 bg-black/50 z-50 items-center justify-center p-4">
  <div class="bg-white rounded-2xl w-full max-w-4xl shadow-2xl max-h-[92vh] flex flex-col">
    
    <!-- Header du modal -->
    <div class="flex items-center justify-between px-6 py-4 border-b border-surface-100 shrink-0">
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded-lg bg-brand-50 flex items-center justify-center">
          <svg class="w-4 h-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
          </svg>
        </div>
        <h3 class="font-display font-700 text-surface-900" id="modal-commande-title">Nouvelle Commande</h3>
      </div>
      <button onclick="closeModal('modal-commande')" 
        class="text-slate-400 hover:text-slate-600 text-2xl leading-none p-2">✕</button>
    </div>

    <div class="overflow-y-auto flex-1 p-6 space-y-6">
      
      <!-- Informations générales -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-xs font-600 text-slate-500 uppercase tracking-wide mb-1.5">N° Commande</label>
          <input type="text" id="cmd-numero" value="CMD-090" readonly
            class="w-full px-3 py-2.5 rounded-xl border border-surface-200 bg-surface-50 text-sm text-slate-400 cursor-not-allowed"/>
        </div>
        <div>
          <label class="block text-xs font-600 text-slate-500 uppercase tracking-wide mb-1.5">Date de commande *</label>
          <input type="date" id="cmd-date" value="2026-03-27"
            class="w-full px-3 py-2.5 rounded-xl border border-surface-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"/>
        </div>
        <div>
          <label class="block text-xs font-600 text-slate-500 uppercase tracking-wide mb-1.5">Statut</label>
          <select id="cmd-statut" class="w-full px-3 py-2.5 rounded-xl border border-surface-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 bg-white">
            <option value="Pending" selected>En attente</option>
            <option value="Done">Confirmée</option>
          </select>
        </div>
      </div>

      <!-- Fournisseur -->
      <div>
        <label class="block text-xs font-600 text-slate-500 uppercase tracking-wide mb-1.5">Fournisseur *</label>
        <select id="cmd-fournisseur" class="w-full px-3 py-2.5 rounded-xl border border-surface-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 bg-white">
          <option value="">— Sélectionner un fournisseur —</option>
          <option value="1">Nestlé Cameroun (F-003)</option>
          <option value="2">Brasseries du Cameroun (F-001)</option>
          <option value="3">Unilever Cameroun (F-005)</option>
          <option value="4">SCDP Douala (F-007)</option>
          <option value="5">Promo-Conso (F-012)</option>
        </select>
      </div>

      <!-- Détails de la commande (lignes) -->
      <div>
        <div class="flex items-center justify-between mb-3">
          <p class="text-xs font-600 text-slate-500 uppercase tracking-wide">Articles de la commande</p>
          <button onclick="ajouterLigneModal()" 
            class="px-4 py-1.5 bg-brand-500 hover:bg-brand-600 text-white text-sm font-500 rounded-xl transition flex items-center gap-2">
            <span>+</span> Ajouter un article
          </button>
        </div>

        <div class="border border-surface-200 rounded-2xl overflow-hidden">
          <table class="w-full text-sm" id="table-lignes-modal">
            <thead class="bg-surface-800 text-white">
              <tr>
                <th class="px-4 py-3 text-left text-xs font-600 uppercase">Code Produit</th>
                <th class="px-4 py-3 text-left text-xs font-600 uppercase">Libellé</th>
                <th class="px-4 py-3 text-center text-xs font-600 uppercase">Qté</th>
                <th class="px-4 py-3 text-right text-xs font-600 uppercase">P.U. (F)</th>
                <th class="px-4 py-3 text-right text-xs font-600 uppercase">Total (F)</th>
                <th class="px-4 py-3 text-center w-12">Action</th>
              </tr>
            </thead>
            <tbody id="tbody-lignes-modal" class="divide-y divide-surface-100">
              <!-- Lignes ajoutées dynamiquement -->
            </tbody>
            <tfoot>
              <tr class="bg-brand-500 text-white">
                <td colspan="4" class="px-4 py-4 text-right font-700 text-base">TOTAL COMMANDE</td>
                <td id="total-modal" class="px-4 py-4 text-right font-display font-700 text-base">0 F</td>
                <td></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>

      <!-- Notes -->
      <div>
        <label class="block text-xs font-600 text-slate-500 uppercase tracking-wide mb-1.5">Notes / Observations</label>
        <textarea id="cmd-notes" rows="3" placeholder="Conditions de livraison, remarques..."
          class="w-full px-4 py-3 rounded-xl border border-surface-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 resize-none"></textarea>
      </div>
    </div>

    <!-- Footer du modal -->
    <div class="flex gap-3 px-6 py-5 border-t border-surface-100 shrink-0">
      <button onclick="sauvegarderCommande()" 
        class="flex-1 py-3 bg-brand-500 hover:bg-brand-600 text-white rounded-xl text-sm font-600 transition-colors">
        Enregistrer la commande
      </button>
      <button onclick="closeModal('modal-commande')" 
        class="flex-1 py-3 bg-surface-100 hover:bg-surface-200 rounded-xl text-sm font-500 transition-colors">
        Annuler
      </button>
    </div>
  </div>
</div>

<script>
// Variables pour le modal
let lignesModal = [];

// Ajouter une ligne dans le modal
function ajouterLigneModal() {
  const code = prompt("Code du produit (ex: P-012) :") || "P-XXX";
  const libelle = prompt("Libellé du produit :") || "Produit inconnu";
  const qte = parseInt(prompt("Quantité :", "10")) || 1;
  const pu = parseInt(prompt("Prix unitaire (F) :", "650")) || 0;

  if (pu <= 0) {
    alert("Le prix unitaire doit être supérieur à 0");
    return;
  }

  const total = qte * pu;
  lignesModal.push({ code, libelle, qte, pu, total });

  renderLignesModal();
  calculerTotalModal();
}

// Afficher les lignes dans le modal
function renderLignesModal() {
  const tbody = document.getElementById('tbody-lignes-modal');
  tbody.innerHTML = '';

  lignesModal.forEach((ligne, index) => {
    const tr = document.createElement('tr');
    tr.className = 'row-hover';
    tr.innerHTML = `
      <td class="px-4 py-3 font-600 text-xs">${ligne.code}</td>
      <td class="px-4 py-3">${ligne.libelle}</td>
      <td class="px-4 py-3 text-center font-500">${ligne.qte}</td>
      <td class="px-4 py-3 text-right">${ligne.pu.toLocaleString('fr-FR')}</td>
      <td class="px-4 py-3 text-right font-600">${ligne.total.toLocaleString('fr-FR')}</td>
      <td class="px-4 py-3 text-center">
        <button onclick="supprimerLigneModal(${index})" class="text-red-400 hover:text-red-600 text-xl leading-none">✕</button>
      </td>
    `;
    tbody.appendChild(tr);
  });
}

function calculerTotalModal() {
  const total = lignesModal.reduce((sum, ligne) => sum + ligne.total, 0);
  document.getElementById('total-modal').textContent = total.toLocaleString('fr-FR') + ' F';
}

function supprimerLigneModal(index) {
  if (confirm("Supprimer cet article ?")) {
    lignesModal.splice(index, 1);
    renderLignesModal();
    calculerTotalModal();
  }
}

// Sauvegarder la commande
function sauvegarderCommande() {
  const fournisseur = document.getElementById('cmd-fournisseur').value;
  
  if (!fournisseur) {
    alert("Veuillez sélectionner un fournisseur");
    return;
  }
  if (lignesModal.length === 0) {
    alert("Veuillez ajouter au moins un article à la commande");
    return;
  }

  alert("✅ Commande enregistrée avec succès !");
  closeModal('modal-commande');
  
  // Réinitialiser le modal
  setTimeout(() => {
    lignesModal = [];
    document.getElementById('tbody-lignes-modal').innerHTML = '';
    document.getElementById('total-modal').textContent = '0 F';
    document.getElementById('cmd-notes').value = '';
  }, 500);
}

// Réinitialiser le modal quand on l'ouvre (à appeler depuis les boutons)
function resetModalCommande() {
  lignesModal = [];
  document.getElementById('tbody-lignes-modal').innerHTML = '';
  document.getElementById('total-modal').textContent = '0 F';
  document.getElementById('modal-commande-title').textContent = 'Nouvelle Commande';
}
</script>

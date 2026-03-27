<!-- ═══ SECTION: NOUVELLE COMMANDE ═══ -->
<section id="sec-nouvelle" class="section-pane">
  <div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl border border-surface-200 overflow-hidden">
      <!-- Header -->
      <div class="px-6 py-5 border-b border-surface-100 bg-surface-50">
        <h3 class="font-display font-700 text-surface-900">Nouvelle commande d'approvisionnement</h3>
        <p class="text-sm text-slate-400 mt-0.5">Remplissez les informations ci-dessous</p>
      </div>

      <div class="p-6 space-y-6">
        <!-- Fournisseur + Date -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-xs font-600 text-slate-500 uppercase tracking-wide mb-1.5">Fournisseur *</label>
            <select id="fournisseur" class="w-full px-3 py-2.5 rounded-xl border border-surface-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 bg-white">
              <option value="">— Sélectionner un fournisseur —</option>
              <option value="1">Nestlé Cameroun</option>
              <option value="2">Brasseries du Cameroun</option>
              <option value="3">Unilever Cameroun</option>
              <option value="4">SCDP Douala</option>
              <option value="5">Promo-Conso</option>
            </select>
          </div>
          <div>
            <label class="block text-xs font-600 text-slate-500 uppercase tracking-wide mb-1.5">Date de livraison souhaitée</label>
            <input type="date" id="date_livraison" class="w-full px-3 py-2.5 rounded-xl border border-surface-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"/>
          </div>
        </div>

        <!-- Articles commandés -->
        <div>
          <div class="flex items-center justify-between mb-3">
            <label class="block text-xs font-600 text-slate-500 uppercase tracking-wide">Articles commandés</label>
            <button onclick="ajouterLigneNouvelle()" 
              class="text-xs text-brand-600 hover:underline font-500 flex items-center gap-1">
              <span>+</span> Ajouter un article
            </button>
          </div>

          <div class="border border-surface-200 rounded-xl overflow-hidden">
            <table class="w-full text-sm" id="table-nouvelle-commande">
              <thead class="bg-surface-50">
                <tr>
                  <th class="px-4 py-2.5 text-left text-xs text-slate-400 font-600">Produit</th>
                  <th class="px-4 py-2.5 text-center text-xs text-slate-400 font-600">Qté</th>
                  <th class="px-4 py-2.5 text-right text-xs text-slate-400 font-600">Prix unit. (F)</th>
                  <th class="px-4 py-2.5 text-right text-xs text-slate-400 font-600">Total</th>
                  <th class="px-4 py-2.5 w-10"></th>
                </tr>
              </thead>
              <tbody id="tbody-nouvelle" class="divide-y divide-surface-100">
                <!-- Les lignes seront ajoutées dynamiquement par JavaScript -->
              </tbody>
              <tfoot class="bg-surface-50">
                <tr>
                  <td colspan="3" class="px-4 py-3 text-right text-xs font-600 text-slate-500 uppercase">Total commande</td>
                  <td id="total-nouvelle" class="px-4 py-3 text-right font-display font-700 text-brand-600 text-lg">0 F</td>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

        <!-- Notes -->
        <div>
          <label class="block text-xs font-600 text-slate-500 uppercase tracking-wide mb-1.5">Notes / Observations</label>
          <textarea id="notes" rows="3" placeholder="Remarques éventuelles, conditions particulières..."
            class="w-full px-3 py-2.5 rounded-xl border border-surface-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 resize-none"></textarea>
        </div>

        <!-- Boutons -->
        <div class="flex items-center gap-3 pt-4">
          <button onclick="enregistrerCommande()" 
            class="flex-1 py-3 bg-brand-500 hover:bg-brand-600 text-white rounded-xl text-sm font-600 transition-colors">
            Enregistrer & Passer la commande
          </button>
          <button onclick="window.location.href='?page=commandes'" 
            class="px-6 py-3 bg-surface-100 hover:bg-surface-200 rounded-xl text-sm font-500 transition-colors">
            Annuler
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
// Variables globales pour la nouvelle commande
let lignesNouvelle = [];

// Ajouter une ligne dans la nouvelle commande
function ajouterLigneNouvelle() {
  const produit = prompt("Nom du produit :");
  if (!produit) return;

  const qte = parseInt(prompt("Quantité commandée :", "1")) || 1;
  const pu = parseInt(prompt("Prix unitaire (F) :", "500")) || 0;

  if (pu <= 0) {
    alert("Le prix unitaire doit être supérieur à 0");
    return;
  }

  const total = qte * pu;

  lignesNouvelle.push({ produit, qte, pu, total });

  renderTableNouvelle();
  calculerTotalNouvelle();
}

// Afficher le tableau
function renderTableNouvelle() {
  const tbody = document.getElementById('tbody-nouvelle');
  tbody.innerHTML = '';

  lignesNouvelle.forEach((ligne, index) => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td class="px-4 py-2.5">${ligne.produit}</td>
      <td class="px-4 py-2.5 text-center">${ligne.qte}</td>
      <td class="px-4 py-2.5 text-right">${ligne.pu.toLocaleString('fr-FR')}</td>
      <td class="px-4 py-2.5 text-right font-500">${ligne.total.toLocaleString('fr-FR')} F</td>
      <td class="px-4 py-2.5 text-center">
        <button onclick="supprimerLigneNouvelle(${index})" class="text-red-400 hover:text-red-600 text-lg leading-none">✕</button>
      </td>
    `;
    tbody.appendChild(tr);
  });
}

// Calculer le total
function calculerTotalNouvelle() {
  const total = lignesNouvelle.reduce((sum, ligne) => sum + ligne.total, 0);
  document.getElementById('total-nouvelle').textContent = total.toLocaleString('fr-FR') + ' F';
}

// Supprimer une ligne
function supprimerLigneNouvelle(index) {
  if (confirm("Supprimer cet article ?")) {
    lignesNouvelle.splice(index, 1);
    renderTableNouvelle();
    calculerTotalNouvelle();
  }
}

// Enregistrer la commande (simulation pour le moment)
function enregistrerCommande() {
  const fournisseur = document.getElementById('fournisseur').value;
  
  if (!fournisseur) {
    alert("Veuillez sélectionner un fournisseur");
    return;
  }
  if (lignesNouvelle.length === 0) {
    alert("Veuillez ajouter au moins un article");
    return;
  }

  alert("✅ Commande enregistrée avec succès !\n\nNuméro : CMD-" + Math.floor(1000 + Math.random() * 9000));
  
  // Réinitialiser le formulaire
  lignesNouvelle = [];
  document.getElementById('tbody-nouvelle').innerHTML = '';
  document.getElementById('total-nouvelle').textContent = '0 F';
  document.getElementById('notes').value = '';
  document.getElementById('fournisseur').value = '';
  document.getElementById('date_livraison').value = '';

  // Redirection vers la liste des commandes
  setTimeout(() => {
    window.location.href = '?page=commandes';
  }, 1500);
}
</script>

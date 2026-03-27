<!-- ═══ SECTION: FACTURES ═══ -->
<section id="sec-factures" class="section-pane">
  <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
    
    <!-- Liste des factures -->
    <div class="lg:col-span-2">
      <div class="flex items-center justify-between mb-4">
        <h3 class="font-display font-700 text-surface-900 text-lg">Factures générées</h3>
        <button onclick="nouvelleFacture()" 
          class="text-xs bg-brand-500 text-white px-4 py-2 rounded-xl font-500 hover:bg-brand-600 transition">
          + Nouvelle facture
        </button>
      </div>

      <!-- Facture 1 (sélectionnée) -->
      <div onclick="afficherFacture(1)" class="bg-white border-2 border-brand-500 rounded-2xl p-5 mb-3 cursor-pointer" id="facture-card-1">
        <div class="flex justify-between items-center mb-1">
          <p class="font-display font-700 text-surface-900">FAC-2026-0089</p>
          <span class="text-xs bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full font-500">Payée</span>
        </div>
        <p class="text-sm text-slate-600">Brasseries du Cameroun</p>
        <p class="text-xs text-slate-400 mt-0.5">17 mars 2026</p>
        <p class="font-display font-700 text-brand-600 mt-3 text-lg">850 000 FCFA</p>
      </div>

      <!-- Facture 2 -->
      <div onclick="afficherFacture(2)" class="bg-white border border-surface-200 rounded-2xl p-5 mb-3 cursor-pointer hover:border-brand-300 transition-all" id="facture-card-2">
        <div class="flex justify-between items-center mb-1">
          <p class="font-display font-700 text-surface-900">FAC-2026-0085</p>
          <span class="text-xs bg-amber-100 text-amber-700 px-3 py-1 rounded-full font-500">En attente</span>
        </div>
        <p class="text-sm text-slate-600">Unilever Cameroun</p>
        <p class="text-xs text-slate-400 mt-0.5">12 mars 2026</p>
        <p class="font-display font-700 text-slate-700 mt-3 text-lg">430 000 FCFA</p>
      </div>

      <!-- Facture 3 -->
      <div onclick="afficherFacture(3)" class="bg-white border border-surface-200 rounded-2xl p-5 cursor-pointer hover:border-brand-300 transition-all" id="facture-card-3">
        <div class="flex justify-between items-center mb-1">
          <p class="font-display font-700 text-surface-900">FAC-2026-0081</p>
          <span class="text-xs bg-red-100 text-red-600 px-3 py-1 rounded-full font-500">En retard</span>
        </div>
        <p class="text-sm text-slate-600">Nestlé Cameroun</p>
        <p class="text-xs text-slate-400 mt-0.5">05 mars 2026</p>
        <p class="font-display font-700 text-slate-700 mt-3 text-lg">220 000 FCFA</p>
      </div>
    </div>

    <!-- Aperçu de la facture -->
    <div class="lg:col-span-3 bg-white rounded-2xl border border-surface-200 overflow-hidden">
      <div class="px-6 py-5 border-b border-surface-100 bg-surface-50 flex items-center justify-between">
        <h3 class="font-display font-700 text-surface-900" id="facture-titre">Aperçu · FAC-2026-0089</h3>
        
        <div class="flex gap-2">
          <button onclick="imprimerFacture()" 
            class="flex items-center gap-2 px-4 py-2 bg-white border border-surface-200 rounded-xl text-xs font-500 hover:bg-surface-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
            </svg>
            Imprimer
          </button>
          <button onclick="telechargerPDF()" 
            class="flex items-center gap-2 px-4 py-2 bg-brand-500 text-white rounded-xl text-xs font-500 hover:bg-brand-600 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            PDF
          </button>
        </div>
      </div>

      <!-- Contenu de la facture -->
      <div class="p-8" id="facture-apercu">
        <div class="border border-surface-200 rounded-2xl p-8 bg-white">
          
          <!-- En-tête facture -->
          <div class="flex justify-between mb-10">
            <div>
              <div class="flex items-center gap-3 mb-2">
                <div class="w-9 h-9 rounded-xl bg-brand-500 flex items-center justify-center">
                  <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.4 7h12.8"/>
                  </svg>
                </div>
                <span class="font-display font-700 text-2xl text-surface-900">supermaket</span>
              </div>
              <p class="text-sm text-slate-500">Supermarché Central • Bafoussam</p>
              <p class="text-sm text-slate-500">Tel : +237 6 77 00 00 00</p>
            </div>
            
            <div class="text-right">
              <p class="font-display font-700 text-4xl tracking-wider text-surface-900">FACTURE</p>
              <p class="text-sm text-slate-400 mt-1" id="facture-numero">N° FAC-2026-0089</p>
              <p class="text-sm text-slate-400" id="facture-date">Date : 17/03/2026</p>
              <p class="text-sm text-slate-400">Échéance : 16/04/2026</p>
            </div>
          </div>

          <!-- Fournisseur -->
          <div class="mb-8">
            <p class="text-xs uppercase tracking-widest text-slate-400 mb-1">Fournisseur</p>
            <p class="font-600 text-surface-900" id="facture-fournisseur">Brasseries du Cameroun</p>
            <p class="text-sm text-slate-500" id="facture-adresse">Douala, Cameroun • Tel : +237 233 000 111</p>
          </div>

          <!-- Tableau des articles -->
          <table class="w-full mb-8 text-sm" id="table-facture">
            <thead>
              <tr class="bg-surface-800 text-white">
                <th class="px-4 py-3 text-left rounded-tl-2xl">Article</th>
                <th class="px-4 py-3 text-center">Qté</th>
                <th class="px-4 py-3 text-right">P.U. (F)</th>
                <th class="px-4 py-3 text-right rounded-tr-2xl">Total (F)</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-surface-100" id="tbody-facture">
              <!-- Rempli dynamiquement -->
            </tbody>
            <tfoot class="bg-surface-50">
              <tr>
                <td colspan="3" class="px-4 py-3 text-right font-600">Sous-total HT</td>
                <td class="px-4 py-3 text-right font-600" id="sous-total">715 000</td>
              </tr>
              <tr>
                <td colspan="3" class="px-4 py-3 text-right text-slate-400">TVA (19,25%)</td>
                <td class="px-4 py-3 text-right text-slate-400" id="tva">135 638</td>
              </tr>
              <tr class="bg-brand-500 text-white font-display">
                <td colspan="3" class="px-4 py-4 text-right font-700 text-base rounded-bl-2xl">TOTAL TTC</td>
                <td class="px-4 py-4 text-right font-700 text-base rounded-br-2xl" id="total-ttc">850 638 F</td>
              </tr>
            </tfoot>
          </table>

          <div class="text-center text-xs text-slate-400 pt-4 border-t border-surface-100">
            Merci pour votre confiance • Mode de paiement : Virement bancaire
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
// Données simulées des factures
const factures = {
  1: {
    numero: "FAC-2026-0089",
    date: "17/03/2026",
    fournisseur: "Brasseries du Cameroun",
    adresse: "Douala, Cameroun • Tel : +237 233 000 111",
    articles: [
      { nom: "Castel Beer 65cl (casier 24)", qte: 20, pu: 14000, total: 280000 },
      { nom: "Maltina 33cl (carton 24)", qte: 15, pu: 12000, total: 180000 },
      { nom: "Eau minérale 1.5L (carton 12)", qte: 30, pu: 4000, total: 120000 },
      { nom: "Jus Frutti 1L (carton 12)", qte: 20, pu: 6750, total: 135000 }
    ],
    total: 850000
  },
  2: {
    numero: "FAC-2026-0085",
    date: "12/03/2026",
    fournisseur: "Unilever Cameroun",
    adresse: "Douala, Cameroun",
    articles: [
      { nom: "Savon Lux 150g (carton)", qte: 50, pu: 4500, total: 225000 },
      { nom: "Dentifrice Close-Up 100ml", qte: 80, pu: 1800, total: 144000 }
    ],
    total: 430000
  },
  3: {
    numero: "FAC-2026-0081",
    date: "05/03/2026",
    fournisseur: "Nestlé Cameroun",
    adresse: "Yaoundé, Cameroun",
    articles: [
      { nom: "Lait concentré 410g", qte: 100, pu: 650, total: 65000 },
      { nom: "Café soluble 200g", qte: 60, pu: 1850, total: 111000 }
    ],
    total: 220000
  }
};

// Afficher une facture
function afficherFacture(id) {
  const f = factures[id];
  if (!f) return;

  // Mise à jour de l'en-tête
  document.getElementById('facture-titre').textContent = `Aperçu · ${f.numero}`;
  document.getElementById('facture-numero').textContent = `N° ${f.numero}`;
  document.getElementById('facture-date').textContent = `Date : ${f.date}`;
  document.getElementById('facture-fournisseur').textContent = f.fournisseur;
  document.getElementById('facture-adresse').textContent = f.adresse;

  // Mise en évidence de la carte sélectionnée
  document.querySelectorAll('[id^="facture-card-"]').forEach(card => {
    card.classList.remove('border-brand-500', 'border-2');
    card.classList.add('border-surface-200');
  });
  document.getElementById(`facture-card-${id}`).classList.add('border-brand-500', 'border-2');

  // Remplir le tableau
  const tbody = document.getElementById('tbody-facture');
  tbody.innerHTML = '';

  f.articles.forEach(article => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td class="px-4 py-3">${article.nom}</td>
      <td class="px-4 py-3 text-center">${article.qte}</td>
      <td class="px-4 py-3 text-right">${article.pu.toLocaleString('fr-FR')}</td>
      <td class="px-4 py-3 text-right font-500">${article.total.toLocaleString('fr-FR')}</td>
    `;
    tbody.appendChild(tr);
  });

  // Mettre à jour les totaux
  document.getElementById('sous-total').textContent = f.total.toLocaleString('fr-FR');
  document.getElementById('tva').textContent = Math.round(f.total * 0.1925).toLocaleString('fr-FR');
  document.getElementById('total-ttc').textContent = (f.total + Math.round(f.total * 0.1925)).toLocaleString('fr-FR') + ' F';
}

// Imprimer
function imprimerFacture() {
  window.print();
}

// Télécharger PDF (simulation)
function telechargerPDF() {
  alert("📄 Téléchargement du PDF en cours...\n\n(Fonctionnalité simulée - Dans la version finale, cela générera un vrai PDF)");
}

// Créer une nouvelle facture (simulation)
function nouvelleFacture() {
  alert("Création d'une nouvelle facture à partir d'une réception...\n\nRedirection vers la liste des réceptions.");
  setTimeout(() => {
    window.location.href = "?page=reception";
  }, 1000);
}

// Charger la première facture par défaut
document.addEventListener('DOMContentLoaded', () => {
  afficherFacture(1);
});
</script>


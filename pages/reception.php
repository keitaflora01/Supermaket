<!-- ═══ SECTION: RÉCEPTION ═══ -->
<section id="sec-reception" class="section-pane">
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <!-- Liste des commandes en attente de réception -->
    <div class="lg:col-span-1">
      <div class="flex items-center justify-between mb-4">
        <h3 class="font-display font-700 text-surface-900 text-lg">Commandes en attente</h3>
        <span class="text-xs bg-amber-100 text-amber-700 px-2.5 py-1 rounded-full font-500">3 commandes</span>
      </div>

      <!-- Commande 1 (sélectionnée par défaut) -->
      <div onclick="chargerReception(1)" class="bg-white border-2 border-brand-500 rounded-2xl p-5 mb-3 cursor-pointer hover:shadow-md transition-all" id="cmd-card-1">
        <div class="flex justify-between items-start mb-2">
          <p class="font-display font-700 text-surface-900">#CMD-2026-089</p>
          <span class="badge-confirmed text-xs px-3 py-1 rounded-full font-500">Confirmée</span>
        </div>
        <p class="text-sm text-slate-600">Nestlé Cameroun</p>
        <p class="text-xs text-slate-400 mt-1">Livraison prévue : 18/03/2026</p>
        <div class="mt-3 flex justify-between text-xs">
          <span class="font-600 text-brand-600">12 articles</span>
          <span class="font-display font-700 text-brand-600">320 000 F</span>
        </div>
      </div>

      <!-- Commande 2 -->
      <div onclick="chargerReception(2)" class="bg-white border border-surface-200 rounded-2xl p-5 mb-3 cursor-pointer hover:border-brand-300 transition-all" id="cmd-card-2">
        <div class="flex justify-between items-start mb-2">
          <p class="font-display font-700 text-surface-900">#CMD-2026-085</p>
          <span class="badge-confirmed text-xs px-3 py-1 rounded-full font-500">Confirmée</span>
        </div>
        <p class="text-sm text-slate-600">Unilever Cameroun</p>
        <p class="text-xs text-slate-400 mt-1">Livraison prévue : 20/03/2026</p>
        <div class="mt-3 flex justify-between text-xs">
          <span class="font-600 text-brand-600">7 articles</span>
          <span class="font-display font-700 text-brand-600">430 000 F</span>
        </div>
      </div>

      <!-- Commande 3 -->
      <div onclick="chargerReception(3)" class="bg-white border border-surface-200 rounded-2xl p-5 cursor-pointer hover:border-brand-300 transition-all" id="cmd-card-3">
        <div class="flex justify-between items-start mb-2">
          <p class="font-display font-700 text-surface-900">#CMD-2026-083</p>
          <span class="badge-confirmed text-xs px-3 py-1 rounded-full font-500">Confirmée</span>
        </div>
        <p class="text-sm text-slate-600">SCDP Douala</p>
        <p class="text-xs text-slate-400 mt-1">Livraison prévue : 22/03/2026</p>
        <div class="mt-3 flex justify-between text-xs">
          <span class="font-600 text-brand-600">4 articles</span>
          <span class="font-display font-700 text-brand-600">180 000 F</span>
        </div>
      </div>
    </div>

    <!-- Formulaire de réception -->
    <div class="lg:col-span-2 bg-white rounded-2xl border border-surface-200 overflow-hidden">
      <div class="px-6 py-5 border-b border-surface-100 bg-surface-50 flex items-center justify-between" id="reception-header">
        <div>
          <h3 class="font-display font-700 text-surface-900" id="reception-titre">Réception · #CMD-2026-089</h3>
          <p class="text-xs text-slate-400" id="reception-sous-titre">Nestlé Cameroun – 18 mars 2026</p>
        </div>
        <span class="badge-confirmed text-xs px-4 py-1.5 rounded-full font-500">Confirmée</span>
      </div>

      <div class="p-6">
        <p class="text-xs font-600 text-slate-500 uppercase tracking-wide mb-4">Vérification des articles reçus</p>

        <!-- Liste des articles à réceptionner -->
        <div id="liste-articles-reception" class="space-y-3 mb-8">
          <!-- Les lignes seront ajoutées dynamiquement par JavaScript -->
        </div>

        <!-- Observations -->
        <div class="mb-6">
          <label class="block text-xs font-600 text-slate-500 uppercase tracking-wide mb-2">Observations de réception</label>
          <textarea id="observations" rows="3" placeholder="Dommages constatés, colis manquants, écarts de quantité, etc."
            class="w-full px-4 py-3 rounded-xl border border-surface-200 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 resize-none"></textarea>
        </div>

        <!-- Boutons d'action -->
        <div class="flex gap-3">
          <button onclick="validerReception()" 
            class="flex-1 py-3.5 bg-brand-500 hover:bg-brand-600 text-white rounded-xl text-sm font-600 transition-colors flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Valider la réception
          </button>
          
          <button onclick="window.location.href='?page=factures'" 
            class="px-8 py-3.5 bg-surface-100 hover:bg-surface-200 rounded-xl text-sm font-500 transition-colors">
            Générer facture
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
// Données simulées des commandes
const commandesEnAttente = {
  1: {
    id: 1,
    numero: "CMD-2026-089",
    fournisseur: "Nestlé Cameroun",
    date: "18/03/2026",
    articles: [
      { id: 101, nom: "Lait concentré sucré 410g", qteCommande: 48, qteRecue: 48 },
      { id: 102, nom: "Café soluble Nescafé 200g", qteCommande: 24, qteRecue: 20 },
      { id: 103, nom: "Chocolat en poudre 500g", qteCommande: 36, qteRecue: 36 }
    ]
  },
  2: {
    id: 2,
    numero: "CMD-2026-085",
    fournisseur: "Unilever Cameroun",
    date: "20/03/2026",
    articles: [
      { id: 201, nom: "Savon Lux 150g", qteCommande: 120, qteRecue: 120 },
      { id: 202, nom: "Dentifrice Close-Up", qteCommande: 80, qteRecue: 75 }
    ]
  },
  3: {
    id: 3,
    numero: "CMD-2026-083",
    fournisseur: "SCDP Douala",
    date: "22/03/2026",
    articles: [
      { id: 301, nom: "Riz long grain 50kg", qteCommande: 15, qteRecue: 15 },
      { id: 302, nom: "Huile de palme 25L", qteCommande: 20, qteRecue: 18 }
    ]
  }
};

// Charger une commande dans le formulaire de réception
function chargerReception(id) {
  const cmd = commandesEnAttente[id];
  if (!cmd) return;

  // Mettre à jour l'en-tête
  document.getElementById('reception-titre').textContent = `Réception · ${cmd.numero}`;
  document.getElementById('reception-sous-titre').textContent = `${cmd.fournisseur} – ${cmd.date}`;

  // Mettre en évidence la carte sélectionnée
  document.querySelectorAll('[id^="cmd-card-"]').forEach(card => {
    card.classList.remove('border-brand-500', 'border-2');
    card.classList.add('border-surface-200');
  });
  document.getElementById(`cmd-card-${id}`).classList.add('border-brand-500', 'border-2');

  // Afficher les articles
  const container = document.getElementById('liste-articles-reception');
  container.innerHTML = '';

  cmd.articles.forEach(article => {
    const div = document.createElement('div');
    div.className = "flex items-center gap-4 p-4 rounded-xl border border-surface-100 bg-surface-50";
    div.innerHTML = `
      <input type="checkbox" checked class="w-5 h-5 accent-brand-500 rounded mt-0.5">
      <div class="flex-1">
        <p class="text-sm font-500 text-surface-900">${article.nom}</p>
        <p class="text-xs text-slate-400">Commandé : <strong>${article.qteCommande}</strong> • Reçu :</p>
      </div>
      <input type="number" value="${article.qteRecue}" min="0" 
        class="w-20 text-center bg-white border border-surface-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-brand-500">
      <span class="w-6 h-6 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center text-sm font-bold">✓</span>
    `;
    container.appendChild(div);
  });
}

// Valider la réception
function validerReception() {
  if (confirm("Confirmer la validation de cette réception ?\n\nLe stock sera mis à jour automatiquement.")) {
    alert("✅ Réception validée avec succès !\n\nLa commande est maintenant marquée comme réceptionnée.");
    
    // Simulation : retour à la liste des commandes après validation
    setTimeout(() => {
      window.location.href = "?page=commandes";
    }, 1200);
  }
}

// Charger la première commande par défaut au chargement
document.addEventListener('DOMContentLoaded', () => {
  chargerReception(1);
});
</script>


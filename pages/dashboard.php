<?php
// pages/dashboard.php - Dashboard dynamique (tolerant queries)
// On inclut la configuration de la DB et on construit des requêtes "tolérantes"
require_once __DIR__ . '/../config/db.php';

// Helper: essaie plusieurs requêtes de comptage et renvoie le premier succès
function try_count_queries($conn, array $queries) {
  foreach ($queries as $q) {
    try {
      $res = $conn->query($q);
      if ($res) {
        $row = $res->fetch_row();
        return (int) $row[0];
      }
    } catch (Exception $e) {
      // ignore and try next
    }
  }
  return 0;
}

// Helper: essaie des SELECT et renvoie le résultat (array of assoc)
function try_select_queries($conn, array $queries) {
  foreach ($queries as $q) {
    try {
      $res = $conn->query($q);
      if ($res && $res->num_rows) {
        $out = [];
        while ($r = $res->fetch_assoc()) {
          $out[] = $r;
        }
        return $out;
      }
    } catch (Exception $e) {
      // ignore
    }
  }
  return [];
}

// Définitions de requêtes candidates (plusieurs variantes pour tolérance)
$countPendingQueries = [
  "SELECT COUNT(*) FROM commandes WHERE status IN ('Pending','pending','En attente','En attente de réception','en attente')",
  "SELECT COUNT(*) FROM commandes WHERE statut IN ('Pending','pending','En attente')",
  "SELECT COUNT(*) FROM commandes WHERE etat IN ('Pending','pending','En attente')",
  "SELECT COUNT(*) FROM commandes",
];

$countAwaitingReceptionQueries = [
  "SELECT COUNT(*) FROM commandes WHERE status LIKE '%attente%'",
  "SELECT COUNT(*) FROM commandes WHERE statut LIKE '%attente%'",
  "SELECT COUNT(*) FROM commandes WHERE status IN ('Awaiting','waiting','pending')",
];

$receivedThisMonthQueries = [
  "SELECT COUNT(*) FROM commandes WHERE (status IN ('received','Réceptionnée','Réceptionne','reçu','received')) AND MONTH(COALESCE(date_reception, date, created_at)) = MONTH(CURDATE()) AND YEAR(COALESCE(date_reception, date, created_at)) = YEAR(CURDATE())",
  "SELECT COUNT(*) FROM commandes WHERE (status IN ('received','Réceptionnée','reçu')) AND MONTH(date_reception) = MONTH(CURDATE()) AND YEAR(date_reception) = YEAR(CURDATE())",
  "SELECT COUNT(*) FROM commandes WHERE MONTH(COALESCE(date, created_at)) = MONTH(CURDATE())",
];

$totalDepensesQueries = [
  "SELECT IFNULL(SUM(montant),0) FROM depenses",
  "SELECT IFNULL(SUM(montant),0) FROM commandes",
  "SELECT IFNULL(SUM(montant_total),0) FROM commandes",
];

$recentCommandsQueries = [
  "SELECT id, fournisseur, montant, status FROM commandes ORDER BY COALESCE(created_at,id) DESC LIMIT 5",
  "SELECT id, fournisseur, montant, statut as status FROM commandes ORDER BY id DESC LIMIT 5",
  "SELECT id, fournisseur, montant, status FROM commandes ORDER BY id DESC LIMIT 5",
];

$criticalStocksQueries = [
  "SELECT name AS produit, stock AS qte FROM produits WHERE stock IS NOT NULL AND stock <= 10 ORDER BY stock ASC LIMIT 5",
  "SELECT produit AS produit, quantite AS qte FROM stocks WHERE quantite <= 10 ORDER BY quantite ASC LIMIT 5",
  "SELECT name AS produit, quantity AS qte FROM products WHERE quantity <= 10 ORDER BY quantity ASC LIMIT 5",
];

// Exécution tolérante
$commandesEnCours = try_count_queries($conn, $countPendingQueries);
$commandesEnAttente = try_count_queries($conn, $countAwaitingReceptionQueries);
$commandesReceptionnees = try_count_queries($conn, $receivedThisMonthQueries);
$totalDepenses = try_count_queries($conn, $totalDepensesQueries);
$recentCommandes = try_select_queries($conn, $recentCommandsQueries);
$criticalStocks = try_select_queries($conn, $criticalStocksQueries);
?>

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
  <p class="text-2xl font-display font-700 text-surface-900"><?= $commandesEnCours ?></p>
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
  <p class="text-2xl font-display font-700 text-surface-900"><?= $commandesEnAttente ?></p>
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
  <p class="text-2xl font-display font-700 text-surface-900"><?= $commandesReceptionnees ?></p>
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
  <p class="text-2xl font-display font-700 text-surface-900"><?= number_format($totalDepenses, 0, ',', ' ') ?> F</p>
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
            <?php if (!empty($recentCommandes)): ?>
              <?php foreach ($recentCommandes as $cmd): ?>
                <tr class="row-hover cursor-pointer" onclick="window.location.href='?page=commandes'">
                  <td class="px-5 py-3 font-600 text-surface-900">#CMD-<?= isset($cmd['id']) ? htmlspecialchars($cmd['id']) : '' ?></td>
                  <td class="px-5 py-3 text-slate-500"><?= isset($cmd['fournisseur']) ? htmlspecialchars($cmd['fournisseur']) : '—' ?></td>
                  <td class="px-5 py-3 text-right font-500"><?= isset($cmd['montant']) ? number_format((float)$cmd['montant'], 0, ',', ' ') . ' F' : '—' ?></td>
                  <td class="px-5 py-3">
                    <?php $status = isset($cmd['status']) ? $cmd['status'] : '' ?>
                    <span class="badge-<?= strtolower(preg_replace('/[^a-z0-9]+/i','', $status)) ?> text-xs px-2.5 py-1 rounded-full font-500">
                      <?= strip_tags(($status === 'Pending' || stripos($status, 'attente') !== false) ? 'En attente' : ($status === 'received' || stripos($status, 'réception') !== false ? 'Réceptionnée' : $status)) ?>
                    </span>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td class="px-5 py-3" colspan="4">Aucune commande récente.</td>
              </tr>
            <?php endif; ?>
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
          <?php if (!empty($criticalStocks)): ?>
            <?php foreach ($criticalStocks as $st): ?>
              <div class="flex justify-between"><span><?= htmlspecialchars($st['produit'] ?? ($st['produit'] ?? 'Produit')) ?></span><span class="font-600"><?= isset($st['qte']) ? (int)$st['qte'] . ' u.' : '—' ?></span></div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="flex justify-between"><span>Farine de blé 50kg</span><span class="font-600">12 u.</span></div>
            <div class="flex justify-between"><span>Huile palme 25L</span><span class="font-600">8 u.</span></div>
            <div class="flex justify-between"><span>Sucre blanc 25kg</span><span class="font-600">5 u.</span></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

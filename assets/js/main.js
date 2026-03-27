// Fonctions globales pour toute l'application

// Ouvrir un modal
function openModal(id) {
  const modal = document.getElementById(id);
  if (modal) {
    modal.classList.add('open');
    
    // Si c'est le modal commande, on réinitialise
    if (id === 'modal-commande') {
      resetModalCommande();
    }
  }
}

// Fermer un modal
function closeModal(id) {
  const modal = document.getElementById(id);
  if (modal) {
    modal.classList.remove('open');
  }
}

// Fermeture automatique en cliquant sur l'overlay
document.addEventListener('DOMContentLoaded', function() {
  const overlays = document.querySelectorAll('.modal-overlay');
  overlays.forEach(overlay => {
    overlay.addEventListener('click', function(e) {
      if (e.target === overlay) {
        closeModal(overlay.id);
      }
    });
  });

  console.log("✅ main.js chargé avec succès");
});

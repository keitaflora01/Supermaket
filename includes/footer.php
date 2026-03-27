<?php
// Inclusion des modals
include 'components/modal-commande.php';
include 'components/modal-voir.php';
include 'components/modal-supprimer.php';
?>

<script>
// Fonctions globales
function openModal(id) {
  document.getElementById(id).classList.add('open');
}

function closeModal(id) {
  document.getElementById(id).classList.remove('open');
}

// Fermeture en cliquant sur l'overlay
document.querySelectorAll('.modal-overlay').forEach(modal => {
  modal.addEventListener('click', function(e) {
    if (e.target === modal) {
      closeModal(modal.id);
    }
  });
});
</script>

<script src="assets/js/main.js"></script>
</body>
</html>
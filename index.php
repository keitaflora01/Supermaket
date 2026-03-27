<?php
session_start();
$page = $_GET['page'] ?? 'dashboard';

$titres = [
    'dashboard' => 'Tableau de bord',
    'commandes' => 'Gérer les commandes',
    'nouvelle'  => 'Passer une commande',
    'reception' => 'Réceptionner une commande',
    'factures'  => 'Factures'
];

include 'includes/header.php';
?>

<body class="bg-surface-100 text-surface-800 min-h-screen flex">

<?php include 'includes/sidebar.php'; ?>

<div class="ml-64 flex-1 flex flex-col min-h-screen">

    <?php include 'includes/topbar.php'; ?>

    <main class="flex-1 p-6 overflow-y-auto">
        <?php
        switch($page) {
            case 'dashboard':
                include 'pages/dashboard.php';
                break;
            case 'commandes':
                include 'pages/commandes.php';
                break;
            case 'nouvelle':
                include 'pages/nouvelle-commande.php';
                break;
            case 'reception':
                include 'pages/reception.php';
                break;
            case 'factures':
                include 'pages/factures.php';
                break;
            default:
                include 'pages/dashboard.php';
                break;
        }
        ?>
    </main>
</div>

<?php include 'includes/footer.php'; ?>


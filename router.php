 <?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'accueil':
            include 'pages/accueil.php';
            break;
        case 'qui_nous_sommes':
            include 'pages/qui_nous_sommes.php';
            break;
        case 'les_membres':
            include 'pages/les_membres.php';
            break;
        case 'admin':
            include 'pages/admin.php';
            break;
        default:
            include 'pages/accueil.php';
            break;
    }
} else {
    include 'pages/accueil.php';
}
?>

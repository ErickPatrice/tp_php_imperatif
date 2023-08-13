 <?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'accueil':
            include 'accueil.php';
            break;
        case 'qui_nous_sommes':
            include 'qui_nous_sommes.php';
            break;
        case 'les_membres':
            include 'les_membres.php';
            break;
        case 'admin':
            include 'admin.php';
            break;
        default:
            include 'accueil.php';
            break;
    }
} else {
    include 'accueil.php';
}
?>

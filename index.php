<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Belle Affaire</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    

    <?php
    // Routeur
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

     
</body>
</html>

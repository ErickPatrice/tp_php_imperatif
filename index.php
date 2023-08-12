<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Association</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <?php
    // Routeur
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

    <?php include 'includes/footer.php'; ?>
</body>
</html>

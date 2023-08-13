<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <header>
            <?php include 'templates/header.php'; ?>
        </header>

         <!-- ... (début du fichier) ... -->

<main>
    <h1>Connexion Administrateur</h1>
    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Vérifier les informations d'authentification de l'administrateur
        if ($username === "admin" && $password === "admin") {
            $_SESSION["admin_authenticated"] = true;
            header("Location: admin.php");
            exit();
        } else {
            echo "<p class='text-danger'>Identifiants incorrects. Veuillez réessayer.</p>";
        }
    }
    ?>
    <form method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'Utilisateur</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de Passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Se Connecter</button>
    </form>
</main>

<!-- ... (fin du fichier) ... -->


        <footer>
            <?php include 'templates/footer.php'; ?>
        </footer>
    </div>
</body>
</html>

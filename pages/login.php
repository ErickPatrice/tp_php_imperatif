<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <header>
            <?php include '../templates/header.php'; ?>
        </header>

<main>
    <h1>Connexion</h1>
    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Vérifier les informations d'authentification
        if (authenticateMember($email, $password)) {
            $_SESSION["member_authenticated"] = true;
            header("Location: les_membres.php");
            exit();
        } else {
            echo "<p class='text-danger'>Identifiants incorrects. Veuillez réessayer.</p>";
        }
    }
    ?>
    <form method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Adresse Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de Passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Se Connecter</button>
    </form>
</main>




        <footer>
            <?php include '../templates/footer.php'; ?>
        </footer>
    </div>
</body>
</html>

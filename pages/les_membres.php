<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Membres</title>
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
    <h1>Liste des Membres</h1>

    <?php
    // Vérifier si l'administrateur est authentifié
    if (!isAdminAuthenticated()) {
        header("Location: admin_login.php");
        exit();
    }

    // Suppression d'un membre
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['email'])) {
        $deleted = deleteMember($_GET['email']);
        if ($deleted) {
            echo "<p class='text-success'>Membre supprimé avec succès.</p>";
        } else {
            echo "<p class='text-danger'>Erreur lors de la suppression du membre.</p>";
        }
    }

    // Traitement du formulaire d'ajout de membre
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_member'])) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (addMember($nom, $prenom, $email, $password)) {
            echo "<p class='text-success'>Membre ajouté avec succès.</p>";
        } else {
            echo "<p class='text-danger'>Erreur lors de l'ajout du membre.</p>";
        }
    }

    // Afficher le formulaire d'ajout de membre
    echo "<h2>Ajouter un Membre</h2>";
    echo "<form method='post'>
            <div class='mb-3'>
                <label for='nom' class='form-label'>Nom</label>
                <input type='text' class='form-control' id='nom' name='nom' required>
            </div>
            <div class='mb-3'>
                <label for='prenom' class='form-label'>Prénom</label>
                <input type='text' class='form-control' id='prenom' name='prenom' required>
            </div>
            <div class='mb-3'>
                <label for='email' class='form-label'>Adresse Email</label>
                <input type='email' class='form-control' id='email' name='email' required>
            </div>
            <div class='mb-3'>
                <label for='password' class='form-label'>Mot de Passe</label>
                <input type='password' class='form-control' id='password' name='password' required>
            </div>
            <button type='submit' class='btn btn-primary' name='add_member'>Ajouter Membre</button>
        </form>";
    
    // Afficher la liste des membres
    $members = getAllMembers();
    if (count($members) > 0) {
        echo "<h2>Liste des Membres</h2>";
        echo "<table class='table'>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($members as $member) {
            echo "<tr>
                    <td>{$member['nom']}</td>
                    <td>{$member['prenom']}</td>
                    <td>{$member['email']}</td>
                    <td>
                        <a href='les_membres.php?action=delete&email={$member['email']}' class='btn btn-danger btn-sm'>Supprimer</a>
                    </td>
                </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>Aucun membre enregistré.</p>";
    }
    ?>
</main>

        <footer>
            <?php include 'templates/footer.php'; ?>
        </footer>
    </div>
</body>
</html>

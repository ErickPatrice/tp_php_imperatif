// verifie l'authentication de l'admin
<?php 
function isAdminAuthenticated() {
    return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
}

// Authentifier un membre
function authenticateMember($email, $password) {
    $members = getAllMembers();
    foreach ($members as $member) {
        if ($member['email'] === $email && password_verify($password, $member['password'])) {
            $_SESSION['member'] = true;
            return true;
        }
    }
    return false;
}
?>
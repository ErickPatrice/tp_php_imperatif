// verifie l'authentication de l'admin
<?php 
function isAdminAuthenticated() {
    return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
}
?>
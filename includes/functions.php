
<?php

// ... (autres fonctions existantes) ...

// voir la liste des membres
function getAllMembers() {
    $members = array();
    $file = 'data/members.csv';

    if (file_exists($file)) {
        $handle = fopen($file, 'r');
        if ($handle) {
            while (($line = fgetcsv($handle)) !== false) {
                $members[] = array(
                    'nom' => $line[0],
                    'prenom' => $line[1],
                    'email' => $line[2],
                    'password' => $line[3]
                );
            }
            fclose($handle);
        }
    }

    return $members;
}

// Ajouter un membre
function addMember($nom, $prenom, $email, $password) {
    $members = getAllMembers();
    foreach ($members as $member) {
        if ($member['email'] === $email) {
            return false; // Membre avec la même adresse email existe déjà
        }
    }
    $newMember = array(
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'password' => $password
    );
    $members[] = $newMember;
    saveMembersToFile($members);
    return true;
}

// Supprimer un membre par email
function deleteMember($email) {
    $members = getAllMembers();
    foreach ($members as $key => $member) {
        if ($member['email'] === $email) {
            unset($members[$key]);
            $members = array_values($members);
            saveMembersToFile($members);
            return true;
        }
    }
    return false;
}

// Mettre à jour les informations d'un membre
function updateMember($email, $newNom, $newPrenom) {
    $members = getAllMembers();
    foreach ($members as &$member) {
        if ($member['email'] === $email) {
            $member['nom'] = $newNom;
            $member['prenom'] = $newPrenom;
            saveMembersToFile($members);
            return true;
        }
    }
    return false;
}

// Enregistrer la liste des membres dans le fichier CSV
function saveMembersToFile($members) {
    $file = 'data/members.csv';
    $handle = fopen($file, 'w');
    
    if ($handle) {
        foreach ($members as $member) {
            fputcsv($handle, array($member['nom'], $member['prenom'], $member['email'], $member['password']));
        }
        fclose($handle);
    }
}

?>


 

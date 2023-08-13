<?php // voir la liste des membres
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
?>

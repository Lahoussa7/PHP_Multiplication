<?php
session_start(); // Commencer la session

// Tester s'il y a déjà des valeurs dans ligne
if (isset($_GET["ligne"])) {
    // Affecter la valeur de ligne dans la variable valeur_ligne
    $valeur_ligne = $_GET["ligne"];

    // Et on ajoute la valeur de "ligne" au tableau tabline de la session
    $_SESSION['tabline'][] = $valeur_ligne;
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    unset($_SESSION['tabline']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication de a*b</title>
    <style>
        .model{
            width:100%;
            height:150%;
            background-color: bisque;
        }
    </style>
</head>
<body>
    <div class="model">
    <form action="multi.php" method="get">
     Valeur de a <input type="number" name="x" /><br>
     Valeur de b <input type="number" name="y"/>
   
        <button type="submit">save</button>
    </form>   
</div>

<?php 
// Prendre les valeurs de tabline qui sont dans la session
if (isset($_SESSION['tabline'])) {
    // S'il y a $_SESSION['tabline'], on affecte sa valeur à $tabline
    $tabline = $_SESSION['tabline'];

    // Chemin du fichier où vous souhaitez stocker les valeurs
    $chemin_fichier = '/home/test/Dossier/row.txt';

    // Ouvrir le fichier en mode écriture
    $handle = fopen($chemin_fichier, "w+");

    // Vérifier si l'ouverture du fichier a réussi
    if ($handle !== false) {
        foreach ($tabline as $valeur) {
            fwrite($handle, $valeur. PHP_EOL); 
        }

        // Fermeture du fichier
        fclose($handle);
    }
} else {
    $tabline = array();
}
?>
</body>
</html>

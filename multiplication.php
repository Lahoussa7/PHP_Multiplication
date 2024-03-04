<?php
session_start(); // commencer la session de PHP pour stocker les valeurs précédentes de tabline

// tester s'il y a déjà des valeurs dans ligne
if (isset($_GET["ligne"])) {
    // affecter la valeur ligne dans la variable valeur_ligne
    $valeur_ligne = $_GET["ligne"];

    // Et on ajoute la valeur de "ligne" au tableau tabline de la session
    $_SESSION['tabline'][] = $valeur_ligne;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tables_de_multiplication</title>
    <style>
        table,tr,td{
            border : solid 2px #eba59e;
            border-collapse: collapse;
            text-align:center;
        }
        .ligne{
            height:50%; 
            background-color:#034e28;
            color:white;
        }
        .ligne1{
            height:50%; 
            background-color:#4493eb;
            color:white;
        }
        .ligne2{
            height:50%; 
            background-color:#eba59e;
            color:white;
        }
        .taille{
            width:50%;
            height:100%;
        }
    </style>
</head>
<body>
    <div class="centre">
        <table class="taille">
            <tr class="ligne2">
                <th>b</th>
                <th>a</th>
                <th>Multiplication</th>
                <th>Action</th>
            </tr>
            <?php
            if (isset($_GET["a"]) && isset($_GET["b"])) {
                // Récupérer les valeurs de a et b
                $a = $_GET["a"];
                $b = $_GET["b"];
                echo $a;
                echo $b;
                // Chemin du fichier 
                $chemin_fichier = '/home/test/Dossier/recevoir.txt'; 
            
                $handle_w_plus = fopen($chemin_fichier, "w+");

                // Vérifier si l'ouverture du fichier a réussi
                if ($handle_w_plus !== false) {
                    // Écrire les valeurs de a et b dans le fichier
                    fwrite($handle_w_plus, "$a ");
                    fwrite($handle_w_plus, "$b");
            
                    // Fermer le fichier
                    fclose($handle_w_plus);
            
            }
            }   $line=array();
                if(!empty($_GET['x'])&&!empty($_GET['y'])){
                        $x=$_GET["x"];
                        $y=$_GET["y"];
                        echo $y;
                        echo $x;
                        $chemin = '/home/test/Dossier/row.txt';
                        $handle = fopen($chemin, "r");
                        $contline = file_get_contents($chemin);
                        echo  "where $contline";
                        
                        $line = explode(' ', $contline);
                        echo "who $line[0]  $line[1] $line[2]";
                }
                $way_file = '/home/test/Dossier/recevoir.txt'; 
            
                $hand = fopen($way_file, "r");

                $fi = file_get_contents($way_file);
                echo " where $fi";
                list($cont_a, $cont_b) = explode(' ', $fi);
                /// lire le fichier ou il y a le ligne 
            
                echo "ligne $tabline";
                // Ouvrir le fichier en mode écriture/lecture
            
                // Afficher les deux variables
                echo "cont_a : $cont_a<br>";
                echo "cont_b : $cont_b";
                // prendre  les valeurs de tabline qui est dans la session
                if (isset($_SESSION['tabline'])) {
                    // S'il y a $_SESSION['tabline'], on affecte sa valeur à $tabline
                    $tabline = $_SESSION['tabline'];
                } else {
                    // Sinon on initialise $tabline avec un tableau vide
                    $tabline = array();
                }
                $tab = array();
                for ($i = 0; $i <= $cont_b; $i++) {
                    $tab[$i][0] = $i;                // Colonne "a"
                    $tab[$i][1] = $cont_a;           // Colonne "i"
                    $tab[$i][2] = $cont_a * $i;      // Colonne "c"
                }

                // Stocker les valeurs de row.txt dans un tableau d'entiers
                $row_values = array_map('intval', $line);

                // Afficher les valeurs de row.txt
                echo "Valeurs de row.txt : ";
                print_r($row_values);

                for ($j = 0; $j <= $cont_b; $j++) {
                    if(in_array($j, $line)){
                        $tab[$j][0] = $y;           // Colonne "a"
                        $tab[$j][1] = $x;           // Colonne "i"
                        $tab[$j][2] = $x * $y; 
                    }
                    // Vérifier si $j est présent dans $tabline
                else if (in_array($j, $tabline)) {
                        // Si $j est présent dans $tabline, passer à la prochaine itération
                        continue;
                    }
                    if($j % 2 == 0){
                    echo "<tr class=\"ligne\">";
                    echo "<td>{$tab[$j][0]}</td>";
                    echo "<td>{$tab[$j][1]}</td>";
                    echo "<td>{$tab[$j][2]}</td>";
                    echo "<td><button><a href=\"http://www.Lahoussa.com/recupere.php?ligne=$j\">modifier</a></button> <a href=\"http://www.Lahoussa.com/multi.php?a=$cont_a&b=$cont_b&ligne=$j\">supprimer</a></td>";
                    echo "</tr>";
                }
                if($j % 2 != 0){

                    echo "<tr class=\"ligne1\">";
                    echo "<td>{$tab[$j][0]}</td>";
                    echo "<td>{$tab[$j][1]}</td>";
                    echo "<td>{$tab[$j][2]}</td>";
                    echo "<td><button><a href=\"http://www.Lahoussa.com/recupere.php?ligne=$j\">modifier</a></button> <a href=\"http://www.Lah
            ?>
        </table>
    </div>
</body>
</html>

<?php
// afficher les erreurs /!\ #devOnly /!\
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("./file_with_errors.php");
echo "<br>";
// end #devOnly

class B_panel {
    private $fichier;

    /************** FCTS SPECIFIQUES ****/

    public function b_panel_votes() {
        $nb = rand(3, 10);
        echo 'Nbre de participants : '.$nb.'<br>';
        $ress = array('rouge', 'bleu', 'jaune', 'orange', 'vert', 'blanc');
        //  Tableau qui récupérera les noms des couleurs tirées
        $couleurs = array();
        //  Tableau qui récupérera les nombres de votes des couleurs tirées
        $nombres = array();
        //  Pour chaque votant :
        for($i=0;$i<$nb;$i++) {
            //  Mélanger le tableau $ress et "piocher" la 1è valeur
            //  plus fiable que array_rand() qui tire quelques index plus souvent que d'autres
            shuffle($ress);
            $couleur = $ress[0];
            //  Vérif
            echo $couleur.'<br>';
            //  Si la couleur tirée est présente dans le tableau des couleurs
            //  on récupère l'index de la valeur
            //  et on ajouter 1 au même index dans le tableau nombres
            if(in_array($couleur, $couleurs)) {
                $index = array_search($couleur, $couleurs);
                $nombres[$index] += 1;
            } else {    //  sinon on ajoute le nom de la couleur dans $couleurs et 1 à $nombres
                array_push($couleurs, $couleur);
                array_push($nombres, 1);
            }
        }
        echo '<br>';
        //  Combiner $couleurs pour les keys et $nombres pour les values
        //  dans un seul tableau $votes
        $votes = array_combine($couleurs, $nombres);
        //  Trier le tableau, par défaut il trie sur les valeurs et par ordre croissant alphanumérique
        asort($votes);
        //  afficher $votes trié pour vérif
        foreach($votes as $coul => $value) {
            echo $coul.' : '.$value.'<br>';
        }
        //  Afficher la dernière valeur du tableau $votes
        $meilleursVotes = array_key_last($votes);
        //  Supprimer la dernière valeur de $votes
        array_pop($votes);
        $meilleursVotes = $meilleursVotes.' '.array_key_last($votes);

        //  Afficher le résultat final : les 2 couleurs les plus tirées
        echo '<br>Meilleurs votes : <strong>'.$meilleursVotes.'</strong><br>'; 
    }
}

$panel = new B_panel();
echo '<br>';
$panel->b_panel_votes();
echo '<br>';


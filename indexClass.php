<?php
// afficher les erreurs /!\ #devOnly /!\
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("./file_with_errors.php");
echo "<br>";
// end #devOnly

class Panel {
    private $fichier;

    public function __construct($fichier) {
        $this->fichier = file($fichier);
    }

    /************   GETTERS *************/

    public function get_fichier() {
        return $this->fichier;  //   = file($fichier);     //  'newfile.txt'
    }
/*    public function get_nb() {
//        return $this->nb = rand(3, 10);
        return $this->nb = $this->fichier[0];
    }   */
/*    public function get_tir() {
        return $this->tir = 0;
    }   */
/*    public function get_ress() {
        return $this->ress = ['rouge', 'bleu', 'jaune', 'orange', 'vert', 'blanc'];
    }   */
/*    public function get_couleur() {
        shuffle($this->ress);
        return $this->couleur = $this->ress[0];
    }   */

    /************   SETTERS *************/

    public function __set($attribute,$value) {
        $this->$attribute = $value;
    }

    /***********    FCTS SPECIFIQUES ****/

    public function panel_votes() {
        $total = count($this->fichier);
        $nb = $this->fichier[0];
        $couleurs = array();
        $nombres = array();
        echo 'Nombre de répondants : '.$nb=$this->fichier[0].'<br>';
        echo 'Votes : <br>';
        
        for($i=1;$i<$total;$i++) {
            $couleur = trim($this->fichier[$i]);
            echo $couleur.'<br>';
            if(in_array($couleur, $couleurs)) {
                $index = array_search($couleur, $couleurs);
                $nombres[$index] += 1;
            } else {
                array_push($couleurs, $couleur);
                array_push($nombres, 1);
            }
        }
/*        while($this->tir<$this->nb) {
            echo '<br>couleur tirée : '.$this->get_couleur().'<br>';
            if(array_key_exists($this->couleur, $this->votes)) {
                $this->votes[$this->couleur] += 1;
            }
            $this->tir +=1;
//            $this->nb=10;
        }   */
        echo '<br>';
        $votes = array_combine($couleurs, $nombres);
        asort($votes);
        foreach($votes as $coul => $value) {
            echo $coul.' : '.$value.'<br>';
        }
        $meilleursVotes = array_key_last($votes);
        array_pop($votes);
        $meilleursVotes = $meilleursVotes.' '.array_key_last($votes);
        echo '<br>Meilleurs votes : <strong>'.$meilleursVotes.'</strong><br>'; 
    }
}

$panel = new Panel('newfile.txt');
$panel->get_fichier();
echo '<br>';
$panel->panel_votes();
echo '<br>';

/*

/******************* code de BD *******************************

do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;
    }
}while($f!==false);
*/




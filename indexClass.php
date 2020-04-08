<?php
// afficher les erreurs /!\ #devOnly /!\
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("./file_with_errors.php");
echo "<br>";
// end #devOnly

class Panel {
    private $fichier;
    private $nb;
//    private $tir;
//    private $ress;
//    private $couleur;
    private $couleurs;
    private $nombres;
    private $votes;
    private $meilleursVotes;

    /************   GETTERS *************/

    public function get_fichier() {
        return $this->fichier = file('newfile.txt');
    }
/*    public function get_total() {
        return $this->total = count($this->fichier);
    }   */
    public function get_nb() {
//        return $this->nb = rand(3, 10);
        return $this->nb = $this->fichier[0];
    }
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
/*    public function get_couleurs() {
        return $this->couleurs;
    }   */
/*    public function get_votes() {
        return $this->votes = ['rouge'=>0, 'bleu'=>0, 'jaune'=>0, 'orange'=>0, 'vert'=>0, 'blanc'=>0];
    }   */
    public function get_couleurs() {
        return $this->couleurs = array();
    }
    public function get_nombres() {
        return $this->nombres = array();
    }
    public function get_votes() {
        return $this->votes = array();
    }
    public function get_meilleursVotes() {
        return $this->meilleursVotes;
    }

    /************   SETTERS *************/

    public function __set($attribute,$value) {
        $this->$attribute = $value;
    }

    /***********    FCTS SPECIFIQUES ****/

    public function panel_votes() {
        echo 'Nombre de répondants : '.$this->nb.'<br>';
        echo 'Votes : <br>';
        $total = count($this->fichier);
        for($i=1;$i<$total;$i++) {
            $couleur = trim($this->fichier[$i]);
            echo $couleur.'<br>';
        //    $couleur = $fichier[$i];
            if(in_array($couleur, $this->couleurs)) {
                $index = array_search($couleur, $this->couleurs);
                $this->nombres[$index] += 1;
            } else {
                array_push($this->couleurs, $couleur);
                array_push($this->nombres, 1);
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
        $votes = array_combine($this->couleurs, $this->nombres);
        asort($votes);
        foreach($votes as $coul => $value) {
            echo $coul.' : '.$value.'<br>';
        }
        $this->meilleursVotes = array_key_last($votes);
//        echo $this->meilleursVotes;
        array_pop($votes);
        $this->meilleursVotes = $this->meilleursVotes.' '.array_key_last($votes);
        echo '<br>Meilleurs votes : <strong>'.$this->meilleursVotes.'</strong><br>'; 
    }
}

$panel = new Panel();
$panel->get_fichier();
echo $panel->get_nb();
echo '<br>';
$panel->get_couleurs();
$panel->get_nombres();
echo '<br>';
$panel->get_votes();
$panel->get_meilleursVotes();
echo '<br>';
$panel->panel_votes();
echo '<br>';

/*
$tir = 0;
//  tableau de choix des couleurs

/******************* code de BD *******************************

do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;
    }
}while($f!==false);
*/




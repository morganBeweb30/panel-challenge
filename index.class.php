<?php

class Panel {
    private $nb;
    private $tir;
    private $ress;
    private $couleur;
    private $votes;
    private $meilleursVotes;

    /************   GETTERS *************/

    public function get_nb() {
        return $this->nb = rand(3, 10);
    }
    public function get_tir() {
        return $this->tir = 0;
    }
    public function get_ress() {
        return $this->ress = ['rouge', 'bleu', 'jaune', 'orange', 'vert', 'blanc'];
    }
    public function get_couleur() {
        shuffle($this->ress);
        return $this->couleur = $this->ress[0];
    }
    public function get_votes() {
        return $this->votes = ['rouge'=>0, 'bleu'=>0, 'jaune'=>0, 'orange'=>0, 'vert'=>0, 'blanc'=>0];
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
        while($this->tir<$this->nb) {
            echo '<br>couleur tirée : '.$this->get_couleur().'<br>';
            if(array_key_exists($this->couleur, $this->votes)) {
                $this->votes[$this->couleur] += 1;
            }
            $this->tir +=1;
//            $this->nb=10;
        }
        asort($this->votes);
        foreach($this->votes as $coul => $value) {
            echo $coul.' : '.$value.'<br>';
        }
        $this->meilleursVotes = array_key_last($this->votes);
        array_pop($this->votes);
        $this->meilleursVotes = $this->meilleursVotes.' '.array_key_last($this->votes);
        echo '<br>Meilleurs votes : '.$this->meilleursVotes.'<br>';
    }
}

$panel = new Panel();
echo $panel->get_nb();
echo '<br>';
$panel->get_ress();
echo '<br>';
$panel->get_votes();
echo '<br>';
$panel->panel_votes();
echo '<br>';

/*
$tir = 0;
//  tableau de choix des couleurs

while($tir<$nb) {
    shuffle($ress);
    $couleur = $ress[0];
    echo '<br>couleur tirée : '.$couleur;
    if(array_key_exists($couleur, $votes)) {
        $votes[$couleur] += 1;
    }
    $tir +=1;
}
echo '<br><br>';
asort($votes);
foreach($votes as $coul => $value) {
    echo $coul.' : '.$value.'<br>';
}
$meilleursVotes = array_key_last($votes);
array_pop($votes);
$meilleursVotes = $meilleursVotes.' '.array_key_last($votes);
echo '<br>Meilleurs votes : '.$meilleursVotes.'<br>';
*/

/******************* code de BD *******************************

do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;
    }
}while($f!==false);
*/




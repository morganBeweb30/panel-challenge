<?php
echo 'BattleDev<br>', PHP_EOL;
/********* voir favoris php.net 200330 ****************/

//  nombre de votes
$nb = rand(3, 100);      //  mettre à 10000
echo 'nb : '.$nb.'<br>';
$tir = 0;
//  tableau de choix des couleurs
$ress = ['rouge', 'bleu', 'jaune', 'orange', 'vert', 'blanc'];

$votes = array(
    'rouge'=>0,
    'bleu'=>0,
    'jaune'=>0,
    'orange'=>0,
    'vert'=>0,
    'blanc'=>0
);
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
























do{
    $f = rand(1,10000);
    $vote = rand(0, count($ress));


    if($f!==false) {
        $input[] = $f;
    }
} while($f!==false);

echo $f, PHP_EOL;




/*
do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;
    }
}while($f!==false);
*/







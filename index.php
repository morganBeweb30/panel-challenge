<?php

echo 'test<br>';
//echo readfile('newfile.txt');

$fichier = file('newfile.txt');
$total = count($fichier);
$nb=$fichier[0];

$couleurs = array();
$nombres = array();
echo 'Nombre de répondants : '.$nb.'<br>';
echo 'Votes : <br>';
for($i=1;$i<$total;$i++) {
    $couleur = trim($fichier[$i]);
    echo $couleur.'<br>';
//    $couleur = $fichier[$i];
    if(in_array($couleur, $couleurs)) {
        $index = array_search($couleur, $couleurs);
        $nombres[$index] += 1;
    } else {
        array_push($couleurs, $couleur);
        array_push($nombres, 1);
    }
}
/*
echo '$couleurs : ';
print_r($couleurs);
echo '<br>$nombres : ';
print_r($nombres);
*/
$votes = array_combine($couleurs, $nombres);
//  echo '<br>$votes : ';print_r($votes);

asort($votes);
echo '<br>$votes trié : ';print_r($votes);

$meilleursVotes = array_key_last($votes);
array_pop($votes);
$meilleursVotes = $meilleursVotes.' '.array_key_last($votes);
echo '<br>Meilleurs votes : '.$meilleursVotes.'<br>';








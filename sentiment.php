<?php

$positieveWoorden = convertFileToArray("positive-words.txt");
$neutraleWoorden = convertFileToArray("neutral-words.txt");
$negatieveWoorden = convertFileToArray("negative-words.txt");
$lyrics = file_get_contents("lyrics.txt");
$lyrics = str_replace("\n", " ", $lyrics);
$lyrics = explode(" ", $lyrics);

function convertFileToArray($file) {
    $array = file_get_contents($file);
    $array = explode("\n", $array);
    return $array;
}

$positieveWoorden;
$neutraleWoorden;
$negatieveWoorden;
$lyrics;

$countPos = 0;
$countNeg = 0;
$countNeut = 0;

foreach ($lyrics as $value) {
	foreach ($positieveWoorden as $Pval) {
		if ($Pval == $value)
			$countPos++;
	}
	foreach ($negatieveWoorden as $Nval) {
		if ($Nval == $value)
			$countNeg++;
	}
	foreach ($neutraleWoorden as $NNval) {
		if ($NNval == $value)
			$countNeut++;
	}
}
$sentiment = ($countNeut + $countPos - $countNeg)/$countNeut;
echo "Positieve woorden: " . $countPos . "\n";
echo "Neutrale woorden: " . $countNeut . "\n";
echo "Negatieve woorden: " . $countNeg . "\n";
echo "Het sentiment van de tekst krijgt een score van: " . number_format($sentiment, 2) . "\n";
?>
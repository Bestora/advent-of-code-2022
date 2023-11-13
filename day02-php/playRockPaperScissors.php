<?php

if ($argc != 2) die("Missing input file");

$input = file_get_contents($argv[1]);
$input = str_replace("\r", "", $input); // fixing windows
$games = explode("\n", $input);

$opponentLookup = [
    "A" => 1, // Rock
    "B" => 2, // Paper
    "C" => 3, // Scissors
];
$meLookup = [
    "X" => 1, // Rock
    "Y" => 2, // Paper
    "Z" => 3, // Scissors
];

foreach ($games as &$game) {
    list($opponent, $me) = explode(" ", $game);
    $game = 0;

    if($meLookup[$me] == $opponentLookup[$opponent]) {
        $game+= 3;
    }

    $game+= $meLookup[$me];

    if($meLookup[$me] == 1 && $opponentLookup[$opponent] == 3) { // Rock wins against Scissors
        $game+= 6;
    }
    if($meLookup[$me] == 2 && $opponentLookup[$opponent] == 1) { // Paper wins against Rock
        $game+= 6;
    }
    if($meLookup[$me] == 3 && $opponentLookup[$opponent] == 2) { // Scissors wins against Paper
        $game+= 6;
    }
}

echo array_sum($games);

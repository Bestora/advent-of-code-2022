<?php
if($argc != 2) die("Missing input file");

$input = file_get_contents($argv[1]);
$input = str_replace("\r", "", $input); // fixing windows
$elfes = explode("\n\n", $input);
foreach($elfes as &$elv) {
    $calories = explode("\n", $elv);
    $elv = array_sum($calories);
}

$solution = max($elfes);

echo "\n\n";
echo "Solution for Part One: {$solution}";
echo "\n\n";

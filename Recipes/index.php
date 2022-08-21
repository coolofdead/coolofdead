<head>
    <link rel="apple-touch-icon" href="recipe.png">
</head>

<?php

const MIDI_RECIPE_INDEX = 0;  
const SOIR_RECIPE_INDEX = 0;  

$url = "https://api.spoonacular.com/mealplanner/generate?apiKey=abe80cba312b4d70889d88cf1b7337df&timeFrame=day";

$recipesOfTheWeek = json_decode(file_get_contents($url));

date_default_timezone_set('Europe/Paris');
$hour = intval(date('H'));
$mealTime = $hour < 15 ? MIDI_RECIPE_INDEX : SOIR_RECIPE_INDEX;

header("Location: {$recipesOfTheWeek->meals[$mealTime]->sourceUrl}");



<?php


function getChapterData($text) {
  // Utiliser une expression régulière pour extraire les numéros de chapitre
  preg_match_all('/Chapter (\d+)/', $text, $matches);
  // Créer un tableau associatif pour stocker les données
  $data = array();

  // Pour chaque numéro de chapitre trouvé, extraire le contenu du chapitre
  foreach ($matches[1] as $chapterNumber) {
    // Utiliser une expression régulière pour trouver le début et la fin du chapitre
    preg_match('/Chapter ' . $chapterNumber . '.*?(?=Chapter|$)/s', $text, $match);
    // Ajouter le contenu du chapitre au tableau associatif
    $data[$chapterNumber] = $match[0];
  }

  // Renvoyer les données sous forme de fichier JSON
  return json_encode($data);
}
$text = "Chapter 1
  C'est mon premier chapitre
  Chapter 2
  C'est mon premier chapitre
  Chapter 3
  C'est mon premier chapitre
  ";
$json = getChapterData($text);
echo($json);
?>


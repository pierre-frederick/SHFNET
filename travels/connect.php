<?php

header("Content-type: text/xml");

function parseToXML($htmlStr)
{
    $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions

setlocale(LC_ALL, 'fr_FR.UTF-8');
$bdd = connexionDB();

function getmarkers(PDO $bdd)
{
    try {
        $request = $bdd->query('SELECT * FROM site.public.travels;');
        return $request->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

$markers = getmarkers($bdd);

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
foreach ($markers as $marker) {
    // Add to XML document node
    echo '<marker ';
    echo 'name="' . parseToXML($marker['name']) . '" ';
    echo 'address="' . parseToXML($marker['address']) . '" ';
    echo 'lat="' . $marker['lat'] . '" ';
    echo 'lng="' . $marker['lng'] . '" ';
    echo 'type="' . $marker['type'] . '" ';
    echo '/>';
}

// End XML file
echo '</markers>';




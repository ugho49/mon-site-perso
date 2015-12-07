<?php
$pdo        = null;
$host       = "localhost";
$database   = "ughostephan_fr";
$user       = "ughostephan";
$password   = "ughostephan";
$errorDatabase = "Erreur de connexion à la base de données.";

if($_SERVER['SERVER_ADDR'] == '151.80.158.49') {
    // Fichier database sur le server
    $filename = "/var/www/databases.json";
    // Si le fichier existe
    if (file_exists($filename)) {
        // Open and read file
        $handle = fopen($filename, "rb");
        // Read the JSON file
        $content = fread($handle, filesize($filename));
        // Close the file
        fclose($handle);
        // Decode the JSON into an associative array
        $json = json_decode($content, true);
        // Récupération des données pour pdo
        $host       = $json['ughostephan']['fr']['host'];
        $database   = $json['ughostephan']['fr']['database'];
        $user       = $json['ughostephan']['fr']['user'];
        $password   = $json['ughostephan']['fr']['password'];
    } else {
        die($errorDatabase);
    }
}

try {
    // Instanciation de pdo
    $pdo = new PDO('mysql:host='.$host.';dbname='.$database.';charset=utf8', $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch( PDOException $Exception ) {
    // Afficher l'erreur pdo si localhost
    if($_SERVER['SERVER_ADDR'] != '151.80.158.49') {
        die('code : '.(int)$Exception->getCode().', Message : '.$Exception->getMessage());
    } else {
        //Sinon afficher erreur standard
        die($errorDatabase);
    }
}

return $pdo;
?>

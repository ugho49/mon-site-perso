<?php
/**
* Vérifications params
*/
if (empty($_POST['recaptcha'])) {
    $obj = array('status' => 'warning', 'libelle' => 'Il faut cliquez sur "Je ne suis pas un robot"');
    die(json_encode($obj));
} else {
    if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['message'])) {
        $obj = array('status' => 'warning', 'libelle' => 'Des champs sont manquants');
        die(json_encode($obj));
    }
    else {
        if(isValid($_POST['recaptcha'])) {
            sendMail($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['message']);
            $obj = array('status' => 'success', 'libelle' => 'Le message à été envoyé avec succès.');
            die(json_encode($obj));
        } else {
            $obj = array('status' => 'danger', 'libelle' => 'Le champ "Je ne suis pas un robot" est en erreur.');
            die(json_encode($obj));
        }
    }
}

/**
* Functions
*/
function isValid($code)
{
    if (empty($code)) {
        return false; // Si aucun code n'est entré, on ne cherche pas plus loin
    }
    $params = [
        'secret'    => '6Ldu2wkTAAAAABnUbpPx3iJkofFkbdVF5WbCTzF0',
        'response'  => $code
    ];

    $url = "https://www.google.com/recaptcha/api/siteverify?" . http_build_query($params);
    if (function_exists('curl_version')) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Evite les problèmes, si le ser
        $response = curl_exec($curl);
    } else {
        // Si curl n'est pas dispo, un bon vieux file_get_contents
        $response = file_get_contents($url);
    }

    if (empty($response) || is_null($response)) {
        return false;
    }

    $json = json_decode($response);
    return $json->success;
}

function sendMail($prenom, $nom, $email, $message){
	/* Destinataire */
	$to = "stephan.ugho@gmail.com";

	/* Sujet du message */
	$sujet = "Nouveau message ugho-stephan.fr";

	/* Construction du message */
	$msg  = 'Bonjour,'."\r\n\r\n";
	$msg .= 'Ce mail a été envoyé de façon automatique'."\r\n\r\n";
	$msg .= ucfirst(strtolower($prenom)).' '.strtoupper($nom).' ('.$email.') vous à envoyé un message :'."\r\n\r\n";
	$msg .= '************************'."\r\n\r\n";
	$msg .= $message ."\r\n\r\n";
    $msg .= '************************'."\r\n\r\n";

	/* En-têtes de l'e-mail */
	$headers = 'From: ugho-stephan.fr <contact@ugho-stephan.fr>'."\r\n\r\n";

	/* Envoi de l'e-mail */
	mail($to, $sujet, $msg, $headers);
}
?>

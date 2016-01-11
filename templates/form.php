<?php
$app    = $slim->controleur;
$mailer = $slim->mailer;
$logger = $slim->logger;
$lang   = $app->getLang();

/**
* Vérifications params
*/
if (empty($_POST['recaptcha'])) {
    $obj = array('status' => 'warning', 'libelle' => $lang->formMessageNotARobot);
    die(json_encode($obj));
} else {
    if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['message'])) {
        $obj = array('status' => 'warning', 'libelle' => $lang->formMessageFieldsMissing);
        die(json_encode($obj));
    }
    else {
        if(isValid($app, $logger, $_POST['recaptcha'])) {
            sendMail($app, $mailer, $logger, $_POST['prenom'], $_POST['nom'], $_POST['email'], nl2br(htmlspecialchars($_POST['message'])));
            $obj = array('status' => 'success', 'libelle' => $lang->formMessageSuccess);
            die(json_encode($obj));
        } else {
            $obj = array('status' => 'danger', 'libelle' => $lang->formMessageRobotNotGood);
            die(json_encode($obj));
        }
    }
}

/**
* Functions
*/
function isValid($app, $logger, $code)
{
    if (empty($code)) {
        return false; // Si aucun code n'est entré, on ne cherche pas plus loin
    }

    $params = [
        'secret'    => $app->getInformations()['recaptcha_secret'],
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

function sendMail($app, $mailer, $logger, $prenom, $nom, $email, $message){

    //Set who the message is to be sent from
    $mailer->setFrom('contact@ugho-stephan.fr', 'ugho-stephan.fr');
    //Set who the message is to be sent to
    $mailer->addAddress($app->getInformations()['mail'], 'Ugho STEPHAN');
    //Set the subject line
    $mailer->Subject = 'Nouveau message ugho-stephan.fr';
    // Set email format to HTML
    $mailer->isHTML(true);
    // Construction du message
	$msg  = '<h3>'.ucfirst(strtolower($prenom)).' '.strtoupper($nom).' ('.$email.') vous à envoyé un message : </h3>';
	$msg .= '<br><hr><br>';
	$msg .= '<p>'.$message.'</p>';
    $msg .= '<br><hr><br>';
    $msg .= 'Ce mail a été envoyé de façon automatique';
    //convert HTML into a basic plain-text alternative body
    $mailer->Body = $msg;
    //Attach an image file
    //$mailer->addAttachment('images/phpmailer_mini.png');

    //DKIM
    $mailer->DKIM_domain = 'ugho-stephan.fr';
    $mailer->DKIM_private = '/var/www/dkim.private.key';
    $mailer->DKIM_selector = 'default';
    $mailer->DKIM_passphrase = '';

    //send the message, check for errors
    if (!$mailer->send()) {
        $logger->info("Mailer Error: " . $mailer->ErrorInfo);
    }
}
?>

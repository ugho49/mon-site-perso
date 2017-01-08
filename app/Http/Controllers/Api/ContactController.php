<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    public function sendMessage() {

        $response = $this->checkParams();
        if ($response != null) {
            return $response;
        }

        $mailer = new \PHPMailer();

        //Set who the message is to be sent from
        $mailer->setFrom('contact@ugho-stephan.fr', 'ugho-stephan.fr');
        //Set who the message is to be sent to
        $mailer->addAddress('stephan.ugho@gmail.com', 'Ugho STEPHAN');
        //Set the subject line
        $mailer->Subject = 'Nouveau message ugho-stephan.fr';
        // Set email format to HTML
        $mailer->isHTML(true);
        $mailer->CharSet = 'UTF-8';
        //convert HTML into a basic plain-text alternative body
        $mailer->Body = View::make('mail.contact-mail', [
            'firstname' => Input::get('firstname'),
            'lastname' => Input::get('lastname'),
            'email' => Input::get('email'),
            'message' => Input::get('message')
        ])->render();

        //Replace the plain text body with one created manually
        $mailer->AltBody = 'Message au format HTML, merci de l\'ouvrir avec un logiciel compatible.';

        if(env('APP_ENV') == "local") {
            $mailer->isSMTP();
            $mailer->Host = '127.0.0.1';
            $mailer->SMTPAuth = false;
            $mailer->Port = 1025;
            $mailer->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
        } else {
            //DKIM
            $mailer->DKIM_domain = env('DKIM_DOMAIN', '');
            $mailer->DKIM_private = env('DKIM_PRIVATE', '');
            $mailer->DKIM_selector = env('DKIM_SELECTOR', '');
            $mailer->DKIM_passphrase = env('DKIM_PASSPHRASE', '');
        }

        //send the message, check for errors
        if (!$mailer->send()) {
            Log::error($mailer->ErrorInfo);
            return Response::json(['error' => true, 'message' => Lang::get('messages.formMessageInternalError')], 500);
        }

        return Response::json(['error' => false, 'message' => Lang::get('messages.formMessageSuccess')], 200);
    }

    private function checkParams() {

        Log::info("========= BEGIN INFO =========");
        Log::info("firstname => " . Input::get('firstname'));
        Log::info("lastname => " . Input::get('lastname'));
        Log::info("email => " . Input::get('email'));
        Log::info("message => " . Input::get('message'));
        Log::info("recaptcha => " . Input::get('recaptcha'));

        if (empty(Input::get('firstname')) || empty(Input::get('lastname')) || empty(Input::get('email')) || empty(Input::get('message'))) {
            Log::error("values are missing");
            return Response::json(['error' => true, 'message' => Lang::get('messages.formMessageFieldsMissing')], 400);
        }

        // Check recaptcha is not empty
        if (empty(Input::get('recaptcha'))) {
            Log::error("missing i'm not a robot");
            return Response::json(['error' => true, 'message' => Lang::get('messages.formMessageNotARobot')], 400);
        }

        // Checks message field contain less or equal 1000 characters
        if(strlen(Input::get('message')) > 1000) {
            Log::error("the field message is too long");
            return Response::json(['error' => true, 'message' => Lang::get('messages.formMessageFieldsTooLong')], 400);
        }

        // Check recaptcha is valid
        if(!$this->isRecaptchaValid(Input::get('recaptcha'))) {
            Log::error("unauthorized : field not a robot not good");
            return Response::json(['error' => true, 'message' => Lang::get('messages.formMessageRobotNotGood')], 403);
        }

        Log::info("========= END INFO =========");

        return null;
    }

    private function isRecaptchaValid($recaptcha_response) {
        if (empty($recaptcha_response)) {
            return false; // Si aucune reponse n'est entré, on ne cherche pas plus loin
        }
        
        $info_recaptcha_secret = Information::where('key', InformationController::recaptcha_secret)->first();

        $params = [
            'secret'    => $info_recaptcha_secret->value,
            'response'  => $recaptcha_response
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
}

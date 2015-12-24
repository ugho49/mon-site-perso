<?php

namespace App;
/**
* Class Application
*/
class App
{
    private $pdo;

    private $color = "grey lighten-5";

    function __construct() {
        $database = new Database();
        $this->pdo = $database->getPdo();
    }

    public function getColor() {
        return $this->color;
    }

    public function getInformations() {
        $result = [];
        $requete = $this->pdo->prepare('SELECT * FROM informations');
        $requete->execute();

        foreach ($requete->fetchAll() as $r) {
            $result[$r->libelle] = $r->value;
        }

        return $result;
    }

    public function getTimeline() {
        $requete = $this->pdo->prepare('SELECT * FROM timeline ti INNER JOIN type_timeline typ ON typ.id = ti.id_type_timeline ORDER BY start DESC, end ASC');
        $requete->execute();
        return $requete->fetchAll();
    }

    public function getProjects() {
        $requete = $this->pdo->prepare('SELECT * FROM projects ORDER BY id ASC');
        $requete->execute();
        return $requete->fetchAll();
    }

    public function getTypeSkills() {
        $requete = $this->pdo->prepare('SELECT * FROM type_skills ORDER BY id ASC');
        $requete->execute();
        return $requete->fetchAll();
    }

    public function getSkillsByType($idTypeSkill) {
        $requete = $this->pdo->prepare('SELECT * FROM skills WHERE type_skill_id = ?');
        $requete->execute([$idTypeSkill]);
        return $requete->fetchAll();
    }

    public static function getLang() {

        $filename = "";

        if(!isset($_SESSION['lang'])) {
            // Si la variable de session lang n'est pas défini, défault en francais
            $_SESSION['lang'] = 'fr';
            // Sinon récupération en session
        }

        $lang = $_SESSION['lang'];

        if ($lang == 'fr') {
            setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
            $filename = "../lang/fr.json";
        } else {
            $filename = "../lang/en.json";
        }

        if(file_exists($filename)) {
            $handle = fopen($filename, "rb");
            $content = fread($handle, filesize($filename));
            fclose($handle);

            return json_decode($content);
        } else {
            die ("Erreur interne du serveur.");
        }
    }

    public function checkScreen() {
        $tablet_browser = 0;
        $mobile_browser = 0;

        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
        }

        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }

        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }

        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
            'newt','noki','palm','pana','pant','phil','play','port','prox',
            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
            'wapr','webc','winw','winw','xda ','xda-');

            if (in_array($mobile_ua,$mobile_agents)) {
                $mobile_browser++;
            }

            if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
                $mobile_browser++;
                //Check for tablets on opera mini alternative headers
                $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
                if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                    $tablet_browser++;
                }
            }

            if ($tablet_browser > 0) {
                return 'TABLET';
            }
            else if ($mobile_browser > 0) {
                return 'MOBILE';
            }
            else {
                return 'DESKTOP';
            }
        }
    }

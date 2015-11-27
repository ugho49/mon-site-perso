<?php
/**
* Class Application
*/
class App
{
    private $pdo;

    private $color = "grey lighten-5";

    function __construct() {
        $this->pdo = require_once 'Pdo.php';
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

    public function getFormation() {
        $requete = $this->pdo->prepare('SELECT * FROM formations ORDER BY start DESC');
        $requete->execute();
        return $requete->fetchAll();
    }

    public function getExperience() {
        $requete = $this->pdo->prepare('SELECT * FROM experiences ORDER BY start DESC');
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
}

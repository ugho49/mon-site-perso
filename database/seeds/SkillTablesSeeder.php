<?php

use App\Models\Skill;
use App\Models\SkillType;
use Illuminate\Database\Seeder;

class SkillTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = SkillType::create([
            'fr' => [
                'libelle' => 'Informatique'
            ],
            'en' => [
                'libelle' => 'Computer Science'
            ]
        ]);

        $t2 = SkillType::create([
            'fr' => [
                'libelle' => 'Economie et gestion'
            ],
            'en' => [
                'libelle' => 'Economics and Management'
            ]
        ]);

        $t3 = SkillType::create([
            'fr' => [
                'libelle' => 'Langues'
            ],
            'en' => [
                'libelle' => 'Languages'
            ]
        ]);

        Skill::create([
            'skill_type_id' => $t1->id,
            'percentage' => 100,
            'color_hexa' => '#81C784',
            'fr' => [
                'libelle' => 'HTML / CSS / SASS'
            ],
            'en' => [
                'libelle' => 'HTML / CSS / SASS'
            ]
        ]);

        Skill::create([
            'skill_type_id' => $t1->id,
            'percentage' => 80,
            'color_hexa' => '#E57373',
            'fr' => [
                'libelle' => 'PHP'
            ],
            'en' => [
                'libelle' => 'PHP'
            ]
        ]);

        Skill::create([
            'skill_type_id' => $t1->id,
            'percentage' => 80,
            'color_hexa' => '#5E8A9F',
            'fr' => [
                'libelle' => 'SQL / PLSQL'
            ],
            'en' => [
                'libelle' => 'SQL / PLSQL'
            ]
        ]);

        Skill::create([
            'skill_type_id' => $t1->id,
            'percentage' => 60,
            'color_hexa' => '#4db6ac',
            'fr' => [
                'libelle' => 'Javascript / NodeJS / Express / SocketIO'
            ],
            'en' => [
                'libelle' => 'Javascript / NodeJS / Express / SocketIO'
            ]
        ]);

        Skill::create([
            'skill_type_id' => $t1->id,
            'percentage' => 80,
            'color_hexa' => '#81d4fa',
            'fr' => [
                'libelle' => 'MERISE / UML'
            ],
            'en' => [
                'libelle' => 'MERISE / UML'
            ]
        ]);

        Skill::create([
            'skill_type_id' => $t1->id,
            'percentage' => 90,
            'color_hexa' => '#ff8a65',
            'fr' => [
                'libelle' => 'JAVA / J2EE / Android'
            ],
            'en' => [
                'libelle' => 'JAVA / J2EE / Android'
            ]
        ]);

        Skill::create([
            'skill_type_id' => $t1->id,
            'percentage' => 60,
            'color_hexa' => '#9ccc65',
            'fr' => [
                'libelle' => 'C / C++ / C#'
            ],
            'en' => [
                'libelle' => 'C / C++ / C#'
            ]
        ]);

        Skill::create([
            'skill_type_id' => $t1->id,
            'percentage' => 70,
            'color_hexa' => '#ba68c8',
            'fr' => [
                'libelle' => 'Serveur : Debian / Nginx & Apache'
            ],
            'en' => [
                'libelle' => 'Server : Debian / Nginx & Apache'
            ]
        ]);

        Skill::create([
            'skill_type_id' => $t2->id,
            'percentage' => 50,
            'color_hexa' => '#009688',
            'fr' => [
                'libelle' => 'Economie des entreprises'
            ],
            'en' => [
                'libelle' => 'Economics Business'
            ]
        ]);

        Skill::create([
            'skill_type_id' => $t2->id,
            'percentage' => 50,
            'color_hexa' => '#00acc1',
            'fr' => [
                'libelle' => 'Comptabilité'
            ],
            'en' => [
                'libelle' => 'Accounting'
            ]
        ]);

        Skill::create([
            'skill_type_id' => $t3->id,
            'percentage' => 100,
            'color_hexa' => '#03a9f4',
            'fr' => [
                'libelle' => 'Français'
            ],
            'en' => [
                'libelle' => 'French'
            ]
        ]);

        Skill::create([
            'skill_type_id' => $t3->id,
            'percentage' => 70,
            'color_hexa' => '#ffd54f',
            'fr' => [
                'libelle' => 'Anglais'
            ],
            'en' => [
                'libelle' => 'English'
            ]
        ]);
    }
}

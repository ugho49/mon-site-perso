<?php

use App\Models\Project;
use App\Models\Timeline;
use App\Models\TimelineType;
use Illuminate\Database\Seeder;

class TimelineTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = TimelineType::create([
            'type' => 'school',
            'background_class' => 'icon-school',
            'ico_class' => 'fa fa-graduation-cap'
        ]);

        $t2 = TimelineType::create([
            'type' => 'compagny',
            'background_class' => 'icon-compagny',
            'ico_class' => 'fa fa-building'
        ]);

        $t3 = TimelineType::create([
            'type' => 'other-school',
            'background_class' => 'icon-other',
            'ico_class' => 'fa fa-graduation-cap'
        ]);

        $t4 = TimelineType::create([
            'type' => 'other-compagny',
            'background_class' => 'icon-other',
            'ico_class' => 'fa fa-building'
        ]);

        $t5 = TimelineType::create([
            'type' => 'other',
            'background_class' => 'icon-other',
            'ico_class' => 'fa fa-globe'
        ]);

        Timeline::create([
            'timeline_type_id' => $t2->id,
            'start' => '2015-09-02',
            'en' => [
                'title' => 'Junior Analyst Programmer',
                'subtitle' => 'CGI',
                'description' => 'Integration of a team of 15 people on a maintenance project for the customer « La Poste ». - J2EE application with an Oracle database - Method SCRUM'
            ],
            'fr' => [
                'title' => 'Analyste programmeur junior',
                'subtitle' => "CGI",
                'description' => "Intégration d'une équipe de 15 personnes sur une TMA pour le client « La Poste ». - Application J2EE avec une base Oracle - Méthode SCRUM"
            ]
        ]);

        Timeline::create([
            'timeline_type_id' => $t2->id,
            'start' => '2015-04-13',
            'end' => '2015-08-14',
            'en' => [
                'title' => 'J2EE developer',
                'subtitle' => 'Sopra Steria',
                'description' => 'Development of an application for a large ministry.- Integration of a team of 15 people on a maintenance project in J2EE with an Oracle Database.- Making changes and corrections with a quality process set up through HP Quality Center software.'
            ],
            'fr' => [
                'title' => 'Développeur J2EE',
                'subtitle' => 'Sopra Steria',
                'description' => 'Développement du patrimoine applicatif d\'un grand ministère.
- Intégration d\'une équipe de 15 personnes sur la TMA d\'un projet réalisé en J2EE avec une base Oracle.
- Réalisation d\'évolutions et de corrections avec un process qualité mis en place grâce au logiciel HP Quality Center.'
            ]
        ]);

        Timeline::create([
            'timeline_type_id' => $t2->id,
            'start' => '2014-01-12',
            'end' => '2014-03-07',
            'en' => [
                'title' => 'Android developer',
                'subtitle' => 'Playmoweb',
                'description' => 'I created Android applications with integration of socials API !I also realized various modules such as a photo gallery or twitter timeline.'
            ],
            'fr' => [
                'title' => 'Développeur Android',
                'subtitle' => 'Playmoweb',
                'description' => 'Création d\'application Android avec intégration de réseaux sociaux ! Réalisation de différents modules tel qu\'une galerie photo ou une timeline twitter.'
            ]
        ]);

        Timeline::create([
            'timeline_type_id' => $t2->id,
            'start' => '2013-05-06',
            'end' => '2013-06-28',
            'en' => [
                'title' => 'Webdev developer',
                'subtitle' => 'ThyssenKrup',
                'description' => 'I worked with WebDev software and created many stored procedures in MySQL Workbench.'
            ],
            'fr' => [
                'title' => 'Developpeur WebDev',
                'subtitle' => 'ThyssenKrup',
                'description' => 'Travail sur l\'intranet propre aux informaticiens ! Travail avec le logiciel WebDev et créations de nombreuses procédures stockés avec MySQL workbench.'
            ]
        ]);

        Timeline::create([
            'timeline_type_id' => $t3->id,
            'start' => '2015-09-02',
            'en' => [
                'title' => 'Professional License',
                'subtitle' => 'IUT Nantes',
                'description' => 'Softwares and IT systems'
            ],
            'fr' => [
                'title' => 'Licence Pro',
                'subtitle' => 'IUT Nantes',
                'description' => 'Système informatiques et logiciels'
            ]
        ]);

        Timeline::create([
            'timeline_type_id' => $t1->id,
            'start' => '2014-09-05',
            'end' => '2015-06-05',
            'en' => [
                'title' => 'Computer License',
                'subtitle' => 'University of Nantes',
                'description' => 'Computer methods applied to corporate management'
            ],
            'fr' => [
                'title' => 'Licence 3 informatique',
                'subtitle' => 'Université de Nantes',
                'description' => 'MIAGE (Méthodes informatiques appliquées à la gestion des entreprises)'
            ]
        ]);

        Timeline::create([
            'timeline_type_id' => $t1->id,
            'start' => '2012-09-05',
            'end' => '2014-06-30',
            'en' => [
                'title' => 'Advanced Technician Certificate',
                'subtitle' => 'Chevrollier High School',
                'description' => 'IT Services for organizations'
            ],
            'fr' => [
                'title' => 'BTS Services informatiques aux organisations',
                'subtitle' => 'Lycée Chevrollier',
                'description' => 'Option Solutions logicielles et applications métiers'
            ]
        ]);

        Timeline::create([
            'timeline_type_id' => $t1->id,
            'start' => '2009-09-02',
            'end' => '2012-06-30',
            'en' => [
                'title' => 'Scientific baccalaureate degree',
                'subtitle' => 'Chevrollier High School',
                'description' => 'Option Engineering Sciences'
            ],
            'fr' => [
                'title' => 'Baccalauréat Scientifique',
                'subtitle' => 'Lycée Chevrollier',
                'description' => 'Option Sciences de l\'ingénieur'
            ]
        ]);
    }
}

<?php

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'url' => "http://www.myosine-club-fitness-angers.fr/",
            'imagePath' => "myosine-min.jpg",
            'enabled' => true,
            'fr'  => [
                'title' => "Création de site web",
                'description' => "J'ai créé ce site web afin de répondre au besoin d'un ami qui dirige une salle de sport. Ce site devait être responsive et entièrement modifiable à l'aide d'une partie back-end.
Enfin une partie formulaire de contact est disponible pour les gens souhaitant plus d'informations.",
                'action' => "Voir le site"
            ],
            'en'  => [
                'title' => "Website creation",
                'description' => "I created this website to respond to the need of a friend who manages a fitness center. This site should be responsive and fully editable by means of a back-end part.
Finally a contact form part is available for people who want more information.",
                'action' => "Go to website"
            ],
        ]);

        Project::create([
            'url' => "files/puissance4",
            'imagePath' => "puissance4-min.jpg",
            'enabled' => true,
            'fr'  => [
                'title' => "Puissance 4 (Android)",
                'description' => "Dans le cadre de ma 2ème année de BTS, j'ai dû créer une application android disposant d'une intelligence artificielle. 
J'ai donc imaginé ce puissance 4 respectant les codes du material design. Pour l'IA, l'algorithme du min-max a été utilisé.
Le code est disponible sur Github.",
                'action' => "Tester l'application"
            ],
            'en'  => [
                'title' => "Four in a line (Android)",
                'description' => "In the context of my 2nd year of Advanced Technician Certificate, I had to create an android application with an artificial intelligence.
So I designed this connect 4 respecting the material design codes. For AI, the min-max algorithm was used.
The code is available on Github.",
                'action' => "Download app"
            ],
        ]);

        Project::create([
            'url' => "files/ruvcom",
            'imagePath' => "ruvcom-min.png",
            'enabled' => true,
            'fr'  => [
                'title' => "Messenger Like (Android)",
                'description' => "Dans le cadre d'un projet de licence, il m'a fallu imaginer une application android disposant des mêmes fonctionnalités que l'application Messenger (à savoir messages entre amis et envois de photos).
Le code est disponible sur Github.",
                'action' => "Tester l'application"
            ],
            'en'  => [
                'title' => "Messenger Like (Android)",
                'description' => "In the context of a license project, I had to imagine an android application with the same functionality as Messenger application (messages with friends and send photos).
The code is available on Github.",
                'action' => "Download app"
            ],
        ]);
    }
}

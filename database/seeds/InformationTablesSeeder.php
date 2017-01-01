<?php

use App\Models\Information;
use Illuminate\Database\Seeder;

class InformationTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::create([
            'key' => 'facebook',
            'value' => 'https://www.facebook.com/ugho.stephan'
        ]);

        Information::create([
            'key' => 'github',
            'value' => 'https://github.com/ugho49'
        ]);

        Information::create([
            'key' => 'google+',
            'value' => 'https://plus.google.com/+UghoSTEPHAN'
        ]);

        Information::create([
            'key' => 'linkedin',
            'value' => 'https://fr.linkedin.com/in/ugho-stephan-37127aa0'
        ]);

        Information::create([
            'key' => 'location',
            'value' => 'Nantes, France'
        ]);

        Information::create([
            'key' => 'mail',
            'value' => 'stephan.ugho@gmail.com'
        ]);

        Information::create([
            'key' => 'phone',
            'value' => '06 88 10 65 38'
        ]);

        Information::create([
            'key' => 'recaptcha_public',
            'value' => '6Ldu2wkTAAAAAEg7atOJ4HFQYM8EYpdBGgCFN6Ri'
        ]);

        Information::create([
            'key' => 'recaptcha_secret',
            'value' => '6Ldu2wkTAAAAABnUbpPx3iJkofFkbdVF5WbCTzF0'
        ]);

        Information::create([
            'key' => 'subtitle',
            'fr' => [
                'value_locale' => 'Développeur Web & Mobile'
            ],
            'en' => [
                'value_locale' => 'IT Developer'
            ]
        ]);

        Information::create([
            'key' => 'title',
            'value' => 'Ugho Stephan'
        ]);

        Information::create([
            'key' => 'twitter',
            'value' => 'https://twitter.com/ughoste'
        ]);
    }
}

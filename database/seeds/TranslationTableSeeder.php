<?php

use Illuminate\Database\Seeder;
use App\Models as App;

class TranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trans = [];

        $trans[] = new App\Translation([
            'locale' => 'fr',
            'name'   => 'Français'
        ]);

        $trans[] = new App\Translation([
            'locale' => 'en',
            'name'   => 'English'
        ]);

        foreach ($trans as $k => $v) {
            $v->save();
        }
    }
}

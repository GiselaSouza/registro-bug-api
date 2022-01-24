<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class CadastrarPerfisAdminQaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = [
            [ "name" => "Administrador" ],
            [ "name" => "QA" ]
        ];

        foreach ($profiles as $profile) {
            Profile::firstOrCreate($profile);
        }
    }
}

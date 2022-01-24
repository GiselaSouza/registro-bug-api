<?php

namespace Database\Seeders;

use App\Models\ClassificationBug;
use Illuminate\Database\Seeder;

class CadastrarClassificationBugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classificationBugs = [
            [ "name" => "Crítica"],
            [ "name" => "Grave"],
            [ "name" => "Moderada"],
            [ "name" => "Pequena"],
        ];

        foreach ($classificationBugs as $classificationBug) {
            ClassificationBug::firstOrCreate($classificationBug);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Proposal;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->count(200)->create();


        // assim poderemos criar os projetos com base em 10 usuários existentes
        // fazendo assim que não aconteça do seeder adicionar mais usuários
        User::query()
            ->inRandomOrder()
            ->limit(10)
            ->get()->each(function ($user) {

                $project = Project::factory()->create(['created_by' => $user->id]);

                Proposal::factory()->count(random_int(4, 45))->create(['project_id'=> $project->id]);

            });


    }
}

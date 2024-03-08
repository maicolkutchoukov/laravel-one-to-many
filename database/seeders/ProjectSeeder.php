<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Project;
use App\Models\Type;

// Helpers
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        for ($i = 0; $i < 10; $i++) {
            $title = fake()->sentence();
            $slug = Str::slug($title);
            $randomType = Type::inRandomOrder()->first();

            $project = Project::create([
                'title' => $title,
                'slug' => $slug,
                'content' => fake()->paragraph(),
                'type_id' => $randomType->id,

            ]);
        }
    }
}

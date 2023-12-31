<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $type_ids = Type::pluck('id')->toArray();
        $technology_ids = Technology::pluck('id')->toArray();

        Storage::makeDirectory('project_images');
        for ($i = 0; $i < 50; $i++) {
            $project = new Project();

            $project->type_id = Arr::random($type_ids);
            $project->title = $faker->text(20);
            $project->slug = Str::slug($project->title, '-');
            $project->content = $faker->paragraphs(15, true);
            // $project->image = Storage::putFile('project_images', $faker->image(storage_path('app/public/project_images'), 250, 250));
            $project->link = $faker->url();

            $project->save();

            $project_technologies = [];
            foreach ($technology_ids as $technology_id) {
                if (rand(0, 1)) $project_technologies[] = $technology_id;
            }

            $project->technologies()->attach($project_technologies);
        }
    }
}

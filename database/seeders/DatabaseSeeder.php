<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Blog::factory(20)->create();
        \App\Models\Forum::factory(20)->create();
        \App\Models\MetaData::factory(20)->create();
        \App\Models\Quiz::factory(20)->create();
        \App\Models\StudentReport::factory(20)->create();
        \App\Models\Student::factory(20)->create();
        \App\Models\Admin::factory(1)->create();
        \App\Models\Note::factory(20)->create();
        \App\Models\ChapterVideo::factory(20)->create();
    }
}

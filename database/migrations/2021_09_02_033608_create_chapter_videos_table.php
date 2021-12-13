<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_videos', function (Blueprint $table) {
            $table->id();
            $table->string('chapter');
            $table->string('category');
            $table->mediumText('videoUrl');
            $table->string('subChapter')->nullable();
            $table->string('mediaType');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter_videos');
    }
}

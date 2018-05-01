<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->BigInteger('user_id');
            $table->integer('category_id');
            $table->string('video_key',32);
            $table->string('title',128);
            $table->text('description');
            $table->integer('duration');
            $table->text('tags');
            $table->enum('accessType', ['public', 'linkOnly']);
            $table->tinyInteger('isCommentable');
            $table->tinyInteger('isAdult');
            $table->tinyInteger('is240p');
            $table->tinyInteger('is360p');
            $table->tinyInteger('is480p');
            $table->tinyInteger('is720p');
            $table->tinyInteger('is1080p');
            $table->integer('server_id');
            $table->text('videoLocation');
            $table->text('thumbnailLocation');
            $table->text('pageUrl');
            $table->ipAddress('uploadedIp');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}

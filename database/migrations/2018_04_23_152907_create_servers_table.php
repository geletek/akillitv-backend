<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title', 128);
          $table->ipAddress('ipAddress', 15);
          $table->enum('serverType', ['backend', 'frontend', 'file']);
          $table->string('defaultUploadPath', 128);
          $table->string('ftpUsername', 32);
          $table->string('ftpPassword', 32);
          $table->enum('status', ['active', 'passive']);
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
        Schema::dropIfExists('servers');
    }
}

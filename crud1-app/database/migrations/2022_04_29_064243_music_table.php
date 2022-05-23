<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_table', function (Blueprint $table) {
            $table->id();
            $table->string('music_name');
            $table->string('music_singer');
            $table->enum('singer_gender', ['Male', 'Female']);
            $table->string('music_writer');
            $table->string('music_feat')->nullable();
            $table->text('description');
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
        //
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description')->nullable();

            $table->timestamp('start');
            $table->timestamp('end')->nullable();
            $table->enum('type', [
                'project',
                'competition',
                'seminar',
                'workshop',
                'guest_lecture',
                'co_curricular',
                'certification',
                'training',
                'other',
                'volunteer',
                'publication'
            ]);
            $table->string('link')->nullable();
            $table->json('meta')->nullable();

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
        Schema::dropIfExists('activities');
    }
}

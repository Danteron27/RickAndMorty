<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->bigInteger('origin_id')->unsigned()->nullable();
            $table->enum('status',[ 'Alive' , 'Dead' , 'unknown' ]);
            $table->enum('species',[ 'Alien' , 'Animal' , 'Cronenberg', 'Disease', 'Human', 'Humanoid', 'Mythological Creature', 'Planet', 'Robot', 'unknown', 'Poopybutthole' ]);
            $table->string('Type')->nullable();
            $table->enum('gender',[ 'Male' , 'Female' ,'Genderless', 'unknown']);;
            $table->string('image');
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('origin_id')->references('id')->on('origins')->onDelete('cascade');
    
        });
    }

    public function down()
    {
        Schema::dropIfExists('characters');
    }
}

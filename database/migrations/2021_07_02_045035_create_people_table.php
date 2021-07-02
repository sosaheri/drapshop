<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('people_dni', 10);
            $table->string('people_fname', 255);
            $table->string('people_sname', 255)->nullable();
            $table->string('people_fsurname', 255);
            $table->string('people_ssurname', 255)->nullable();
            $table->date('people_birth_at');
            $table->string('people_phone', 255)->nullable();
            $table->text('people_address')->nullable();
            $table->string('people_email', 255);
            $table->integer('people_age');
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
        Schema::dropIfExists('people');
    }
}

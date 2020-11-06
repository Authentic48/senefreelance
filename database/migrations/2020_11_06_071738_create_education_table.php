<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('education'))
        {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('school');
            $table->string('diploma');
            $table->unsignedInteger('freelancer_id');
            $table->string('from');
            $table->string('to');
            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
    }
}

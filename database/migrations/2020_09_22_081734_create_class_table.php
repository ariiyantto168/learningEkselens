<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->increments('idclass');
            $table->integer('idcategories');
            $table->string('name');
            $table->string('slug');
            $table->string('instructor');
            $table->string('imagesinstructor');
            $table->string('roleinstructor');
            $table->string('price');
            $table->string('rating');
            $table->string('duration');
            $table->string('images')->nullable();
            $table->string('demo')->nullable();
            $table->text('tutor')->nullable();
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class');
    }
}

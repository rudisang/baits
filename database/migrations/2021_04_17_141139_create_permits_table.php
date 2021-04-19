<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('from');
            $table->integer('to');
            $table->integer('location_origin');
            $table->integer('location_destination');
            $table->boolean('is_interzonal');
            $table->text('animal');
            $table->string('affidavit');
            $table->string('omang');
            $table->string('other_docs')->nullable();
            $table->integer('status');
            $table->date('validity')->nullable();
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
        Schema::dropIfExists('permits');
    }
}

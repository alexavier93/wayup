<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution_items', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('solution_id')->nullable();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('solution_id')->references('id')->on('solutions')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solution_items');
    }
}

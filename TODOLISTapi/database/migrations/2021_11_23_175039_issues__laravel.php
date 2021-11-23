<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IssuesLaravel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues_laravel', function (Blueprint $table) {
            $table->id();
            $table->string('desc');
            $table->date('create_at');
            $table->boolean('todo');
            $table->boolean('doing');
            $table->boolean('done');
            
          
            
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
        Schema::dropIfExists('issues_laravel');
    }
}

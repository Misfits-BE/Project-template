<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateFragmentsTable
 */
class CreateFragmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('fragments', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('editor_id')->unsigned()->nullable();
            $table->boolean('is_public'); 
            $table->string('route'); 
            $table->string('title'); 
            $table->text('content');                        
            $table->timestamps();

            // Foreign keys 
            $table->foreign('editor_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('fragments');
    }
}

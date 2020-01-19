<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateProjectsTable
 */
class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('projects', static function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('verantwoordelijke_id')->index()->nullable();
            $table->boolean('active');
            $table->string('naam');
            $table->text('beschrijving');
            $table->timestamps();

            // Foreign keys and indexes
            $table->foreign('verantwoordelijke_id')->references('id')->on('users')->ondelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTeamsTable
 */
class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('teams', static function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->string('name')->unique();
            $table->text('description');
            $table->timestamps();

            // Foreign keys & indexes
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::create('team_members', static function (Blueprint $table): void {
            $table->unsignedBigInteger('volunteer_id')->index();
            $table->unsignedBigInteger('team_id')->index();
            $table->timestamp('member_since');
            $table->timestamp('deactivated_at')->nullable();

            // Foreign keys & index
            $table->foreign('volunteer_id')->references('id')->on('volunteers')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('teams');
    }
}

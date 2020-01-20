<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateVolunteersTable
 */
class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('volunteers', static function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->boolean('is_active')->default(true);
            $table->string('name');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->date('birth_date');
            $table->text('extra_information');
            $table->timestamp('deactivated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
}

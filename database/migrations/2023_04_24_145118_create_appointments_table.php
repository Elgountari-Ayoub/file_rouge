<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('coach_id');
            $table->foreign('coach_id')
                ->references('user_id')
                ->on('coaches')
                ->onDelete('cascade');

            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')
                ->references('user_id')
                ->on('clients')
                ->onDelete('cascade');

            $table->dateTime('start_time')->unique();
            // $table->unique(DB::raw('DATE_FORMAT(start_time, "%Y/%m/%d %H")'), 'unique_start_time');
            $table->dateTime('end_time')->unique();

            


            $table->string('status')->default('pending');
            // $table->dateTime('start_time');
            // $table->dateTime('end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};

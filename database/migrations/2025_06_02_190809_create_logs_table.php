<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->timestamp('logged_at')->index();
            $table->timestamps();

            $table->foreignId('site_id')
                ->constrained()->onDelete('cascade');

            $table->string('level', 50)->index();
            $table->text('message');
            $table->json('context')->nullable();

            $table->string('remote_ip', 45)->nullable();
            $table->string('user_agent')->nullable();

            $table->string('request_id', 36)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('environment')->nullable();
            $table->string('http_method')->nullable();
            $table->string('http_path')->nullable();
            $table->integer('response_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};

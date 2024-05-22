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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->enum('roles', ['admin', 'owner']);
            $table->enum('aktif', ['active', 'not active']);
            $table->rememberToken();
            $table->timestamps();
        });

        // Set initial user with Bcrypt hashed password
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@kamerad.com',
            'password' => Hash::make('adminpassword'),
            'roles' => 'admin',
            'aktif' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

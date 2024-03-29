<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('phone');
            $table->string('type_number');
            $table->bigInteger('dnumber')->unique();
            $table->date('birthdate');
            $table->string('gender');
            $table->string('address');
            $table->string('photo')->default('img/no-photo.png');
            $table->timestamp('email_verified_at')->nullabel();
            $table->string('password');
            $table->string('role')->default('Admin');
            $table->dateTime('last_login')->nullable();
            $table->ipAddress('last_ip')->nullable();
            $table->boolean('active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

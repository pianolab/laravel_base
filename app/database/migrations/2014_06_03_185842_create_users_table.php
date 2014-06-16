<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  public function up()
  {
    Schema::create('users', function(Blueprint $table) {
      $table->increments('id');
      $table->string('username', 100);
      $table->string('password', 100);
      $table->string('remember_token', 100)->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down()
  {
    Schema::dropIfExists('users');
  }
}
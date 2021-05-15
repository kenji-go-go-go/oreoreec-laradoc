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
            $table->bigIncrements('id');
            $table->string('name')->comment('ユーザー名');
            $table->string('email')->unique()->comment('メールアドレス');;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('パスワード');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->text('company')->comment('会社名');
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

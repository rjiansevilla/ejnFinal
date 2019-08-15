<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('fname', 200)->after("name")->nullable();
            $table->string('lname', 200)->after("fname")->nullable();
            $table->text('jwt_token')->after("remember_token")->nullable();
            $table->boolean('is_active')->default(1)->after("jwt_token")->nullable();
            $table->index(['fname', 'lname'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('fname');
            $table->dropColumn('lname');
            $table->dropColumn('jwt_token');
            $table->dropColumn('is_active');
        });
    }
}
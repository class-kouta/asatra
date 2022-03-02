<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDescribeExplainSpecifyToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('describe')->nullable(true)->change();
            $table->string('explain')->nullable(true)->change();
            $table->string('specify')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('describe')->nullable(false)->change();
            $table->string('explain')->nullable(false)->change();
            $table->string('specify')->nullable(false)->change();
        });
    }
}

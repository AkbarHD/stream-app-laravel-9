<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_premium_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained('packages');
            $table->foreignId('user_id')->constrained('users');
            $table->date('end_of_subscription'); // utk mngecek dia sbg member udh expied or blm?
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
        Schema::dropIfExists('user_premium_tables');
    }
};

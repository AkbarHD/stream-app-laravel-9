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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained('packages'); // rleasi to packages
            $table->foreignId('user_id')->constrained('users'); // relasi to users
            $table->float('amount'); // total transaction
            $table->string('transaction_code'); // meyimpan transaction code
            $table->string('status'); // jd trnasaksinya itu gagal atau sukses
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
        Schema::dropIfExists('transactions');
    }
};

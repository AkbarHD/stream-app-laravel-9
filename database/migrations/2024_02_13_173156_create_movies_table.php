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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('trailer');
            $table->string('movie'); // url dari film nya
            $table->string('casts');  // pemain (aktor)
            $table->string('categories');  // pemain (aktor)
            $table->string('small_thumbnail'); // gambar sm dari film
            $table->string('large_thumbnail'); //gambar lg dari film
            $table->date('release_date'); // tanggal terbit
            $table->text('about'); // like desc
            $table->string('short_about'); // ringkasan dari about
            $table->string('duration'); // durasi film brp lama
            $table->boolean('featured'); // apakah film ini trend or nor? if trend(1) maka munucul paling atas
            $table->softDeletes(); //whern data di delete, but data tersebut tdk di dlete jd kita kaya kasi penanda di db, kalo seolah olah data tersebut sdh dihapus
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
        Schema::dropIfExists('movies');
    }
};

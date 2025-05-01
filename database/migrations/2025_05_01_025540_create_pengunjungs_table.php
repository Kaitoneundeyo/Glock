<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengunjungsTable extends Migration
{
    public function up()
    {
        Schema::create('pengunjungs', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->string('customer_number', 50);
            $table->string('phone_number', 20);
            $table->text('address');
            $table->timestamps();

            $table->primary('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengunjung');
    }

};

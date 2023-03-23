<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_user', function (Blueprint $table) {
            $table->id();
            // $table->integer('user_id')->nullable();
            // $table->integer('type_user_id')->nullable();
            
            $table->foreignId('user_id')->nullable()->index('fk_detail_user_to_users');
            $table->foreignId('type_user_id')->nullable()->index('fk_detail_user_to_type_user');
            $table->string('contact')->unique()->nullable();
            $table->longText('address')->nullable();
            $table->longText('photo')->nullable();
            $table->enum('gender', [1,2])->nullable();
            $table->integer('age')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_user');
    }
}

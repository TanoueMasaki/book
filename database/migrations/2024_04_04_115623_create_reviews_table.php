<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->integer('rating');
            $table->BigInteger('isbn_id'); //外部キー
            $table->unsignedBigInteger('user_id'); //外部キー
            $table->timestamps();

            //リレーションシップ(外部参照制約)の設定
            //外部キー「user_id」はテーブル「users」の「id」列を参照する
            $table->foreign('user_id')->references('id')->on('users');

            //外部キー「isbn_id」はテーブル「books」の「isbn」列を参照する
            $table->foreign('isbn_id')->references('isbn')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
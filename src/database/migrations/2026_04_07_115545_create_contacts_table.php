<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            // 外部キー
            $table->unsignedBigInteger('category_id');

            // 名前
            $table->string('first_name', 255);
            $table->string('last_name', 255);

            // 性別
            $table->tinyInteger('gender');

            // 連絡先
            $table->string('email', 255);
            $table->string('tel', 255);

            // 住所
            $table->string('address', 255);
            $table->string('building', 255)->nullable();

            // お問い合わせ内容
            $table->text('detail');

            // timestamps
            $table->timestamps();

            // 外部キー制約
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // アイテム名
            $table->text('description')->nullable(); // アイテムの説明（オプション）
            $table->integer('quantity')->default(1); // 購入予定数（デフォルト1）
            $table->boolean('purchased')->default(false); // 購入済みかどうか
            $table->unsignedBigInteger('user_id'); // ユーザID
            $table->timestamps();

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

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
        Schema::create('transfer_wallets', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->integer('user');
            $table->float('amount', 15, 2);
            $table->string('type');
            $table->string('method');
            $table->longText('description')->nullable();
            $table->integer('receiver_id')->nullable();
            $table->string('received_from')->nullable();
            $table->string('status')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_wallets');
    }
};

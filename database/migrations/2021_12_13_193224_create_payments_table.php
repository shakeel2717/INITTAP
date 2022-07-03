<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('corporate_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('pricing_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('type');
            $table->string('description')->nullable();
            $table->string('status')->default('pending');
            $table->string('amount')->nullable();
            $table->string('transactionId')->nullable();
            $table->string('responseMsg')->nullable();
            $table->string('responseCode')->nullable();
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
        Schema::dropIfExists('payments');
    }
}

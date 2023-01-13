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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('payable_id');
            $table->string('payable_type');
            $table->decimal('price', 10, 2);
            $table->decimal('amount_paid', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->enum('mode', ['online', 'offline']);
            $table->string('rzp_payment_id')->nullable();
            $table->text('payment_details')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('payments');
    }
};

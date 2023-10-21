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
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('address');
            $table->string('phone');
            $table->boolean('show_tax_note');
            // The decimal(5,2) data type on the 'tax_amount' column allows you to store numbers with a maximum of 5 digits, where 2 digits are used for decimals. This is suitable for tax values with two decimals, such as 12.34 or 567.89.
            $table->decimal('tax_amount', 5, 2); 
            $table->string('taxpayer_name')->nullable();
            $table->string('taxpayer_address')->nullable();
            $table->string('nopd')->nullable();
            $table->string('npwpd')->nullable();
            $table->unsignedBigInteger('id_business_category');
            $table->string('opening_hours')->nullable();
            $table->boolean('print_memo');
            $table->boolean('print_kitchen_memo');
            $table->date('active_until')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlets');
    }
};

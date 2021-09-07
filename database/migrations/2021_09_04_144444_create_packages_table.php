<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->mediumText('description');
            $table->unsignedFloat('price');
            $table->unsignedFloat('compare_price')->nullable();
            $table->enum('billing_type', ['monthly', 'quarterly', 'yearly'])->nullable();
            $table->unsignedBigInteger('links_limit')->default(0);
            $table->unsignedTinyInteger('links_period')->default(1);
            $table->string('currency')->default('USD');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('packages');
    }
}

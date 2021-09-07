<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('package_id')->nullable()->constrained('packages', 'id')->nullOnDelete();
            $table->string('package_name');
            $table->string('package_price');
            $table->enum('billing_type', ['monthly', 'quarterly', 'yearly'])->nullable();
            $table->string('currency')->default('USD');
            $table->unsignedBigInteger('links_limit')->default(0);
            $table->unsignedTinyInteger('links_period')->default(1);
            $table->string('start_at');
            $table->string('end_at');
            $table->enum('status', ['active', 'expired', 'deactivate']);
            $table->softDeletes();
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
        Schema::dropIfExists('subscriptions');
    }
}

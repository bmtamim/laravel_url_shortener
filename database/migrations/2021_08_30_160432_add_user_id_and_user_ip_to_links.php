<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdAndUserIpToLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained('users', 'id')->cascadeOnDelete();
            $table->string('user_ip')->nullable()->index()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->dropForeign('links_user_id_foreign');
            $table->dropIndex('links_user_ip_index');
            $table->dropColumn(['user_id', 'user_ip']);
        });
    }
}

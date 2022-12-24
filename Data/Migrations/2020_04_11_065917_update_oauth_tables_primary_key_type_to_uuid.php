<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOauthTablesPrimaryKeyTypeToUuid extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // First drop all `id` columns, so they can be re-added with new type.
        Schema::table('oauth_auth_codes', function (Blueprint $table) {
            $table->dropColumn('id');
        });
        Schema::table('oauth_clients', function (Blueprint $table) {
            $table->dropColumn('id');
        });
        Schema::table('oauth_personal_access_clients', function (Blueprint $table) {
            $table->dropColumn('id');
        });

        // Now Add `id` columns and update foreign keys
        Schema::table('oauth_auth_codes', function (Blueprint $table) {
            $table->uuid('id')->primary()->first();
            $table->uuid('user_id')->change();
            $table->uuid('client_id')->change();
        });

        Schema::table('oauth_access_tokens', function (Blueprint $table) {
            $table->uuid('user_id')->nullable()->change();
            $table->uuid('client_id')->nullable()->change();
        });

        Schema::table('oauth_clients', function (Blueprint $table) {
            $table->uuid('id')->primary()->first();
            $table->uuid('user_id')->nullable()->change();
        });

        Schema::table('oauth_personal_access_clients', function (Blueprint $table) {
            $table->uuid('id')->primary()->first();
            $table->uuid('client_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {

    }
}
